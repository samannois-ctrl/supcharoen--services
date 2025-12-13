<?php
require_once APPPATH . 'controllers/MainController.php';
class AdminController extends MainController
{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->load->model('AdminModel', 'admin');
    }

    public function fetch_admin(): void{
        $sql = $this->admin->getAdmin();
        $num = $sql->num_rows();
        if ($num == 0) {
            $array = array(
                'error' => true,
                'msg' => 'ไม่พบข้อมูล'
            );
        }else{
            $row = $sql->result();
            $array = array(
                'success' => true,
                'data' => $row,
                'rows' => $num
            );
        }
        echo json_encode($array);
    }

    public function add_admin(){
        $this->form_validation->set_rules(
            'first_name',
            'First Name',
            'required|is_unique[tb_admin.first_name]',
            array(
                'required' => 'กรุณากรอกชื่อ',
                'is_unique' => 'ชื่อ ' . $this->input->post('first_name') . ' มีอยู่แล้ว'
            )
        );
        $this->form_validation->set_rules(
            'last_name',
            'Last Name',
            'required|is_unique[tb_admin.last_name]',
            array(
                'required' => 'กรุณากรอกนามสกุล',
                'is_unique' => 'นามสกุล ' . $this->input->post('last_name') . ' มีอยู่แล้ว'
            )
        );
        $this->form_validation->set_rules(
            'username',
            'User Name',
            'required|min_length[6]|max_length[16]|is_unique[tb_admin.username]',
            
            array(
                'required' => 'กรุณากรอกชื่อ',
                'min_length' => 'ชื่อผู้ใช้ต้องมากกว่า 6 ตัวอักษร',
                'max_length' => 'ชื่อผู้ใช้ต้องน้อยกว่า 16 ตัวอักษร',
                'is_unique' => 'เบอร์โทรศัพท์ ' . $this->input->post('username') . ' มีอยู่แล้ว'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[8]|max_length[16]',
            array(
                'required' => 'กรุณาป้อนรหัสผ่าน',
                'min_length' => 'รหัสผ่านต้องมากกว่า 8 ตัวอักษร',
                'max_length' => 'รหัสผ่านต้องน้อยกว่า 16 ตัวอักษร'
            )
        );
        $this->form_validation->set_rules(
            'phone_number',
            'Phone Number',
            'required|numeric|exact_length[10]|is_unique[tb_admin.phone_number]',
            array(
                'required' => 'กรุณาป้อนเบอร์โทรศัพท์',
                'numeric' => 'เบอร์โทรศัพท์ต้องเป็นตัวเลขเท่านั้น',
                'exact_length' => 'เบอร์โทรศัพท์ต้องตัวเลข 10 ตัว',
                'is_unique' => 'เบอร์โทรศัพท์ ' . $this->input->post('phone_number') . ' มีอยู่แล้ว'
            )
        );
        $this->form_validation->set_error_delimiters('<small class="text-red-600">', '</small>');
        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error' => true,
                'error_from' => true,
                'first_name_error' => form_error('first_name'),
                'last_name_error' => form_error('last_name'),
                'username_error' => form_error('username'),
                'password_error' => form_error('password'),
                'phone_number_error' => form_error('phone_number'),
            );
        }else{
            $type_name = $this->input->post('type_id') == 1 ? '@manage' : '@admin' ;
            $username = $this->input->post('username').$type_name;

            $sql = $this->admin->checkAdmin($username);
            $num = $sql->num_rows();
            if ($num > 0) {
                $array = array(
                    'error' => true,
                    'error_from' => false,
                    'first_name_error' => '',
                    'last_name_error' => '',
                    'password_error' => '',
                    'phone_number_error' => '',
                    'username_error' => '<small class="text-red-600">ชื่อผู้ใช้ '.$username.' มีอยู่แล้ว</small>'
                );
            }else{
                $admin_code = 'AD-' . $this->generateRandomString(5) . '-'. rand(1000,9999);
                $data = [
                    'admin_code' => $admin_code,
                    'username' => $username,
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone_number' => $this->input->post('phone_number'),
                    'type_id' => $this->input->post('type_id'),
                    'last_login' => date('Y-m-d H:i:s'),
                    'created_by' => $this->session->admin_info->username
                ];
                $sql = $this->admin->insertAdmin($data);
                if ($sql) {
                    $array = array(
                        'success' => true,
                        'error_from' => false,
                        'created_in' => TRUE,
                        'code' => 200,
                        'msg' => 'ทำรายการสำเร็จ'
                    );
                } else {
                    $array = array(
                        'error' => true,
                        'error_from' => false,
                        'created_in' => FALSE,
                        'code' => 500,
                        'msg' => 'ทำรายการไม่สำเร็จ'
                    );
                }
            }

            
        }
        echo json_encode($array);
    }

    public function get_admin(){
        $data_admin = $this->admin->getInfoAdmin($this->input->post('admin_code'));
        $res = array(
            'success' => true,
            'data' => $data_admin
        );
        echo json_encode($res);
    }

    public function reset_password_admin(){

        $error = false;
        if ($this->input->post('reset_password') != $this->input->post('re_password')) {
            $error = true;
            $error_msg = 'รหัสผ่านไม่ตรงกัน';
        }

        if ($error == false) {
            $sql = $this->admin->checkAdmin($this->session->admin_info->username);
            $row = $sql->row();
            if (!password_verify($this->input->post('password_admin'), $row->password)) {
                $error = true;
                $error_msg = 'รหัสผ่านแอดมินไม่ถูกต้อง';
            }
        }

        if ($error == false) {
            $data = [
                'password' => password_hash($this->input->post('reset_password'), PASSWORD_DEFAULT),
                'modified_by' => $this->session->admin_info->username
            ];
            $sql = $this->admin->updateAdmin($data,$this->input->post('admin_code_reset_password'));
            if(!$sql){
                $error = true;
                $error_msg = 'ทำรายการไม่สำเร็จ';
            }
        }

        if ($error) {
            $res = [
                'error' => true,
                'msg' => $error_msg
            ];
        } else {
            $res = [
                'success' => true,
                'msg' => 'ทำรายการสำเร็จ'
            ];
        }
        
        echo json_encode($res);
    }

    public function update_status_admin(){
        $data = [
            'status' => $this->input->post('action'),
            'modified_by' => $this->session->admin_info->username
        ];
        $sql = $this->admin->updateAdmin($data,$this->input->post('admin_code'));
        if ($sql) {
            $res = [
                'success' => true,
                'msg' => 'ทำรายการสำเร็จ'
            ];
        } else {
            $res = [
                'error' => true,
                'msg' => 'ทำรายการไม่สำเร็จ'
            ];
        }
        echo json_encode($res);
    }
}

?>