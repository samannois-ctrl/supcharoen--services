<?php
require_once APPPATH . 'controllers/MainController.php';

class AuthController extends MainController{
    public function __construct(){
        parent::__construct();
        $this->load->model('AdminModel', 'admin');
        $this->load->model('MemberModel', 'member');
        $this->load->library('line');
    }

    public function form_login_admin()
    {
        if (!empty($this->session->admin_info)) {
            redirect('dashboard', 'refresh');
        }
        $this->load->view('login_admin');
    }

    public function check_member(){
        $sql = $this->member->checkMember($this->input->post('uid'));
        $num = $sql->num_rows();
        if ($num == 0) {
            $array = array(
                'error' => true,
                'msg' => 'ไม่พบข้อมูล'
            );
        } else {
            $array = array(
                'success' => true,
                'msg' => 'เป็นสมาชิกแล้ว',
            );
        }
        echo json_encode($array);
    }

    public function login_admin()
    {
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
        $this->form_validation->set_error_delimiters('<small class="text-red-600">', '</small>');

        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error' => true,
                'error_from' => true,
                'password_error' => form_error('password')
            );
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $sql = $this->admin->checkAdmin($username);
            $num = $sql->num_rows();
            // print_r($sql);
            // exit();
            if ($num == 0) {
                $array = array(
                    'error' => true,
                    'error_from' => false,
                    'msg' => 'ไม่พบชื่อผู้ใช้'
                );
            } else {
                $row = $sql->row();
                if (password_verify($password, $row->password)) {
                    if ($row->status == 'ACTIVE') {
                        $data = [
                            'last_login' => date('Y-m-d H:i:s'),
                        ];
                        $updateAdmin = $this->admin->updateAdmin($data, $row->admin_code);
                        if ($updateAdmin) {
                            $sqlGetinfoAdmin = $this->admin->checkAdmin($row->username);
                            $rowGetinfoAdmin = $sqlGetinfoAdmin->row();
                            $_SESSION['admin_info'] = $rowGetinfoAdmin;
                            $array = array(
                                'success' => true,
                                'message' => 'เข้าสู่ระบบสำเร็จ'
                            );
                        } else {
                            $array = array(
                                'error' => true,
                                'error_from' => false,
                                'msg' => 'อัพเดพข้อมูลไม่สำเร็จ'
                            );
                        }

                    } else {
                        $array = array(
                            'error' => true,
                            'error_from' => false,
                            'msg' => 'บัญชีของท่านถูกระงับ'
                        );
                    }

                } else {
                    $array = array(
                        'error' => true,
                        'error_from' => false,
                        'msg' => 'รหัสผ่านไม่ถูกต้อง'
                    );
                }
            }
        }
        echo json_encode($array);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo json_encode(array('success' => true, 'msg' => 'ออกจากระบบสำเร็จ'));
    }

    public function add_member()
    {
        $this->form_validation->set_rules(
            'telephone',
            'Telephone',
            'required|min_length[10]|max_length[10]|is_unique[tb_members.phone_number]',
            array(
                'is_unique' => 'หมายเลขโทรศัพท์ ' . $this->input->post('telephone') . ' มีอยู่แล้ว'
            )
        );
        $this->form_validation->set_rules(
            'uid',
            'uid',
            'required|is_unique[tb_members.uid]',
            array(
                'is_unique' => 'ไลน์ไอดีนี้มีอยู่แล้ว'
            )
        );
        $this->form_validation->set_error_delimiters('<small class="text-red-600">', '</small>');
        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error' => true,
                'error_from' => true,
                'telephone_error' => form_error('telephone'),
                'uid_error' => form_error('uid')
            );
        } else {
            $data = [
                'uid' => $this->input->post('uid'),
                'phone_number' => $this->input->post('telephone'),
                // 'first_name' => $this->input->post('first_name'),
                // 'last_name' => $this->input->post('last_name'),
                'nick_name' => $this->input->post('displayName'),
            ];

            $link = $this->line->LinkRichMenuMember($this->input->post('uid'));
            if ($link['result'] == 'S') {
                $sql = $this->member->addMember($data);
                if ($sql) {
                    $array = [
                        'success' => true,
                        'error_from' => false,
                        'msg' => 'ลงทะเบียนสำเร็จ'
                    ];
                } else {
                    $array = [
                        'error' => true,
                        'error_from' => false,
                        'msg' => 'ลงทะเบียนไม่สำเร็จ'
                    ];
                }
            } else {
                $array = [
                    'error' => true,
                    'msg' => $link['message']
                ];
            }
        }
        echo json_encode($array);
    }
}
