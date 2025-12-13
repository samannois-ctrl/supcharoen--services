<?php
class MySQLBackup {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;
    private $backup_directory;
    
    public function __construct($host, $username, $password, $database, $backup_directory = './backups/') {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->backup_directory = rtrim($backup_directory, '/') . '/';
        
        // สร้างโฟลเดอร์ backup หากไม่มี
        if (!is_dir($this->backup_directory)) {
            mkdir($this->backup_directory, 0755, true);
        }
        
        // สร้างการเชื่อมต่อฐานข้อมูล
        $this->connection = new mysqli($host, $username, $password, $database);
        
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        
        // ตั้งค่า charset
        $this->connection->set_charset("utf8");
    }
    
    public function backup($filename = null, $keep_days = 2) {
        if ($filename === null) {
            $filename = $this->database . '_backup_' . date('Y-m-d_H-i-s') . '.sql';
        }
        
        // เพิ่ม path ของ backup directory
        $full_path = $this->backup_directory . $filename;
        
        $sql_dump = '';
        
        // เพิ่ม header comments
        $sql_dump .= "-- MySQL Database Backup\n";
        $sql_dump .= "-- Database: " . $this->database . "\n";
        $sql_dump .= "-- Date: " . date('Y-m-d H:i:s') . "\n";
        $sql_dump .= "-- Host: " . $this->host . "\n\n";
        
        // ตั้งค่าต่างๆ
        $sql_dump .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n";
        $sql_dump .= "SET AUTOCOMMIT = 0;\n";
        $sql_dump .= "START TRANSACTION;\n";
        $sql_dump .= "SET time_zone = \"+00:00\";\n\n";
        
        // ดึงรายชื่อตารางทั้งหมด
        $tables = $this->getTables();
        
        foreach ($tables as $table) {
            echo "Backing up table: $table\n";
            
            // เพิ่ม DROP TABLE
            $sql_dump .= "\n-- --------------------------------------------------------\n";
            $sql_dump .= "-- Table structure for table `$table`\n";
            $sql_dump .= "-- --------------------------------------------------------\n\n";
            $sql_dump .= "DROP TABLE IF EXISTS `$table`;\n";
            
            // ดึง CREATE TABLE statement
            $create_table = $this->getCreateTableStatement($table);
            $sql_dump .= $create_table . "\n\n";
            
            // ดึงข้อมูลในตาราง
            $data = $this->getTableData($table);
            if (!empty($data)) {
                $sql_dump .= "-- Dumping data for table `$table`\n\n";
                $sql_dump .= $data . "\n";
            }
        }
        
        // เพิ่ม footer
        $sql_dump .= "COMMIT;\n";
        
        // บันทึกไฟล์
        if (file_put_contents($full_path, $sql_dump)) {
            echo "Backup completed successfully: $full_path\n";
            echo "File size: " . $this->formatBytes(filesize($full_path)) . "\n";
            
            // ลบไฟล์เก่าที่เกิน keep_days
            $this->cleanOldBackups($keep_days);
            
            return true;
        } else {
            echo "Error: Unable to create backup file\n";
            return false;
        }
    }
    
    private function getTables() {
        $tables = array();
        $result = $this->connection->query("SHOW TABLES");
        
        if ($result) {
            while ($row = $result->fetch_row()) {
                $tables[] = $row[0];
            }
            $result->free();
        }
        
        return $tables;
    }
    
    private function getCreateTableStatement($table) {
        $result = $this->connection->query("SHOW CREATE TABLE `$table`");
        
        if ($result) {
            $row = $result->fetch_row();
            $result->free();
            return $row[1] . ";";
        }
        
        return "";
    }
    
    private function getTableData($table) {
        $sql_data = '';
        
        // นับจำนวนแถว
        $count_result = $this->connection->query("SELECT COUNT(*) as count FROM `$table`");
        $count_row = $count_result->fetch_assoc();
        $row_count = $count_row['count'];
        $count_result->free();
        
        if ($row_count == 0) {
            return '';
        }
        
        // ดึงข้อมูล
        $result = $this->connection->query("SELECT * FROM `$table`");
        
        if ($result && $result->num_rows > 0) {
            // ดึงชื่อคอลัมน์
            $fields = array();
            $field_info = $result->fetch_fields();
            foreach ($field_info as $field) {
                $fields[] = "`" . $field->name . "`";
            }
            
            $sql_data .= "INSERT INTO `$table` (" . implode(', ', $fields) . ") VALUES\n";
            
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $values = array();
                foreach ($row as $value) {
                    if ($value === null) {
                        $values[] = 'NULL';
                    } else {
                        $values[] = "'" . $this->connection->real_escape_string($value) . "'";
                    }
                }
                $rows[] = "(" . implode(', ', $values) . ")";
            }
            
            $sql_data .= implode(",\n", $rows) . ";\n";
            $result->free();
        }
        
        return $sql_data;
    }
    
    private function formatBytes($size, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        
        return round($size, $precision) . ' ' . $units[$i];
    }
    
    /**
     * ลบไฟล์ backup ที่เก่ากว่าจำนวนวันที่กำหนด
     */
    public function cleanOldBackups($keep_days = 2) {
        echo "\nCleaning old backup files...\n";
        
        $files = glob($this->backup_directory . '*.sql');
        $deleted_count = 0;
        $current_time = time();
        $keep_seconds = $keep_days * 24 * 60 * 60; // แปลงวันเป็นวินาที
        
        foreach ($files as $file) {
            $file_time = filemtime($file);
            $age_seconds = $current_time - $file_time;
            
            if ($age_seconds > $keep_seconds) {
                $age_days = round($age_seconds / (24 * 60 * 60), 1);
                if (unlink($file)) {
                    echo "Deleted old backup: " . basename($file) . " (Age: {$age_days} days)\n";
                    $deleted_count++;
                } else {
                    echo "Failed to delete: " . basename($file) . "\n";
                }
            }
        }
        
        if ($deleted_count > 0) {
            echo "Deleted $deleted_count old backup file(s)\n";
        } else {
            echo "No old backup files to delete\n";
        }
        
        // แสดงไฟล์ backup ที่เหลือ
        $this->listBackupFiles();
    }
    
    /**
     * แสดงรายการไฟล์ backup ทั้งหมด
     */
    public function listBackupFiles() {
        $files = glob($this->backup_directory . '*.sql');
        
        if (empty($files)) {
            echo "\nNo backup files found.\n";
            return;
        }
        
        echo "\nRemaining backup files:\n";
        echo str_repeat("-", 80) . "\n";
        printf("%-40s %-15s %-15s\n", "Filename", "Size", "Age");
        echo str_repeat("-", 80) . "\n";
        
        $current_time = time();
        
        // เรียงตามวันที่ใหม่ไปเก่า
        usort($files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        
        foreach ($files as $file) {
            $filename = basename($file);
            $size = $this->formatBytes(filesize($file));
            $age_seconds = $current_time - filemtime($file);
            
            if ($age_seconds < 3600) { // น้อยกว่า 1 ชั่วโมง
                $age = round($age_seconds / 60) . ' mins';
            } elseif ($age_seconds < 86400) { // น้อยกว่า 1 วัน
                $age = round($age_seconds / 3600, 1) . ' hours';
            } else { // มากกว่า 1 วัน
                $age = round($age_seconds / 86400, 1) . ' days';
            }
            
            printf("%-40s %-15s %-15s\n", $filename, $size, $age);
        }
        echo str_repeat("-", 80) . "\n";
    }
    
    /**
     * ลบไฟล์ backup ทั้งหมด
     */
    public function deleteAllBackups() {
        $files = glob($this->backup_directory . '*.sql');
        $deleted_count = 0;
        
        foreach ($files as $file) {
            if (unlink($file)) {
                echo "Deleted: " . basename($file) . "\n";
                $deleted_count++;
            }
        }
        
        echo "Deleted $deleted_count backup file(s)\n";
    }
    
    public function __destruct() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}

// การใช้งาน
try {
    // ตั้งค่าการเชื่อมต่อฐานข้อมูล
    $host = 'localhost';
    $username = 'supcharoen_data';
    $password = 'VHF8DH51Nm965sX';
    $database = 'supcharoen_data';
    $backup_dir = './backups/'; // โฟลเดอร์สำหรับเก็บไฟล์ backup
    
    // สร้าง instance ของ MySQLBackup
    $backup = new MySQLBackup($host, $username, $password, $database, $backup_dir);
    
    // ทำการ backup (เก็บไฟล์ไว้ 2 วัน)
    $backup_filename = $database . '_backup_' . date('Y-m-d_H-i-s') . '.sql';
    $backup->backup($backup_filename, 2); // 2 = เก็บไฟล์ไว้ 2 วัน
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// ตัวอย่างการใช้งานแบบง่าย
function quickBackup($host, $username, $password, $database, $output_file = null, $backup_dir = './backups/', $keep_days = 2) {
    $backup = new MySQLBackup($host, $username, $password, $database, $backup_dir);
    return $backup->backup($output_file, $keep_days);
}

// ตัวอย่างการใช้งานสำหรับ cron job (รันทุกวัน)
function dailyBackup() {
    $config = [
        'host' => 'localhost',
        'username' => 'supcharoen_data', 
        'password' => 'VHF8DH51Nm965sX',
        'database' => 'supcharoen_data',
        'backup_dir' => './backups/',
        'keep_days' => 2
    ];
    
    echo "Starting daily backup at " . date('Y-m-d H:i:s') . "\n";
    echo str_repeat("=", 50) . "\n";
    
    $backup = new MySQLBackup(
        $config['host'], 
        $config['username'], 
        $config['password'], 
        $config['database'], 
        $config['backup_dir']
    );
    
    $filename = $config['database'] . '_daily_' . date('Y-m-d') . '.sql';
    $result = $backup->backup($filename, $config['keep_days']);
    
    echo str_repeat("=", 50) . "\n";
    echo "Daily backup completed at " . date('Y-m-d H:i:s') . "\n";
    
    return $result;
}

// เรียกใช้แบบง่าย
// quickBackup('localhost', 'root', 'password', 'mydatabase');

// สำหรับ cron job
// dailyBackup();
?>