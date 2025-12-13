<?php
date_default_timezone_set('Asia/Bangkok');
defined('BASEPATH') or exit('No direct script access allowed');
class MainController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        
    }

    function convertToBuddhistYear($date) {
        // แปลงวันที่เป็น DateTime object
        $datetime = new DateTime($date);
        
        // ดึงปีจากวันที่
        $year = $datetime->format('Y');

        $thaiMonthName = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
        $month = $thaiMonthName[ $datetime->format('m') -1 ];
        
        // เพิ่ม 543 ปีเพื่อแปลงเป็นพุทธศักราช
        $buddhistYear = $year + 543;
        
        // แสดงวันที่ในรูปแบบ พ.ศ. (วัน, เดือน, ปี)
        $formattedDate = $datetime->format('d '.$month.' ') . $buddhistYear;
        
        return $formattedDate;
    }

    public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }

    public function dashboard(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->session->page_name = 'DASHBOARD';
        $this->load->view('dashboard');
    }

    public function reply_message(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->session->page_name = 'REPLY';
        $this->load->view('reply_message');
    }

    public function manage_admin(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->session->page_name = 'ADMIN';
        $this->load->view('admin');
    }

    public function manage_member(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->session->page_name = 'MEMBER';
        $this->load->view('member');
    }

    public function manage_renew(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->session->page_name = 'RENEW';
        $this->load->view('renew');
    }

    public function manage_interested(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->session->page_name = 'INTERESTED';
        $this->load->view('interested');
    }


    public function manage_broadcast(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->session->page_name = 'BROADCAST';
        $this->load->view('broadcast');
    }

    public function sendTelegramNotify($message){
        $url = "https://api.telegram.org/bot7679310642:AAEhZZwaMLh5POFAmFaJsJ8gCsN3dgunfg4/sendMessage";
        $data = [
            'chat_id' => '-4605418671',
            'text' => $message,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch); // เก็บ Response ที่ได้จาก API
        curl_close($ch);
        return json_decode($response, true); // ส่งกลับ Response

    }


    public function manual(){
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $file_path = base_url('uploads/คู่มือการใช้งาน.pdf');
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
        readfile($file_path);
    }



    public function testSendTelegramNotify($message){
        $url = "https://api.telegram.org/bot7686038575:AAEwKr5Wt5QQ0pjA_mC6S1ld3yuJDSf9j_w/sendMessage";
        $data = [
            'chat_id' => '1166014508',
            'text' => $message,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch); // เก็บ Response ที่ได้จาก API
        curl_close($ch);
        return json_decode($response, true); // ส่งกลับ Response

    }
}

?>