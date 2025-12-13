<?php
require_once APPPATH . 'controllers/MainController.php';

class LiffController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RenewModel', 'renew');
        $this->load->model('MemberModel', 'member');
        $this->load->model('ProductModel', 'product');

    }

    public function register()
    {
        $this->session->page_name = 'ลงทะเบียน';
        $this->load->view('liff/register');
    }

    public function renew()
    {

        $this->session->page_name = 'แจ้งต่อประกัน';

        $this->load->view('liff/renew');
    }

    public function profile()
    {
        $this->session->page_name = 'หน้าหลัก';
        $this->load->view('liff/profile');
    }

    public function info()
    {
        $this->session->page_name = 'ข้อมูลส่วนตัว';
        $this->load->view('liff/info');
    }

    public function interested()
    {
        $this->session->page_name = 'สนใจ';
        $this->load->view('liff/interested');
    }

    public function payment()
    {
        $this->session->page_name = 'ข้อมูลชำระเงิน';
        $this->load->view('liff/payment');
    }

    public function product($param)
    {
        $this->session->page_name = 'ข้อมูลผลิตภัณฑ์';
        if ($param == 'insurance') {
            $title = 'รายการชื่อประกันภัย';
            $data_insurance = $this->product->getInsuranceList();
        }

        if ($param == 'act') {
            $title = 'รายการชื่อพรบ.';
            $data_insurance = $this->product->getActList();
        }

        if ($param == 'transportation') {
            $title = 'รายการชื่อประกันขนส่ง';
            $data_insurance = $this->product->getTransportationList();
        }

        $data = [
            'title' => $title,
            'data_insurance' => $data_insurance
        ];
        $this->load->view('liff/product', $data);
    }

    public function add_renew()
    {
        $renew_id = "RE-" . $this->generateRandomString(10) . date('Ymdhis');
        $data = [
            'renew_id' => $renew_id,
            'uid_member' => $this->input->post('uid'),
            'car_code' => $this->input->post('car_code'),
            'province' => $this->input->post('province'),
        ];
        $sql = $this->renew->insertRenew($data);
        if ($sql) {
            $member_info = $this->member->fetchInfoMemberById($this->input->post('uid'));
            $message = "แจ้งเตือนต่ออายุ\n";
            $message .= "🚗 " . $this->input->post('car_code') . " " . $this->input->post('province');
            $message .= "\n 👤 " . $member_info->nick_name;
            $message .= "\n 📞 " . $member_info->phone_number;
            $notify = $this->sendTelegramNotify($message);
            $array = [
                'success' => true,
                'msg' => 'ทำรายการสำเร็จ'
            ];
        } else {
            $array = [
                'error' => true,
                'msg' => 'ทำรายการไม่สำเร็จ'
            ];
        }
        echo json_encode($array);
    }

    public function add_interested()
    {
        switch ($this->input->post('type_car')) {
            case '1':
                $type_car = 'รถเก๋ง, รถกระบะ 4 ประตู';
                break;
            case '2':
                $type_car = 'รถตู้, รถ 2 แถว';
                break;
            case '3':
                $type_car = 'รถกระบะ';
                break;
            case '4':
                $type_car = 'รถจักรยานยนต์';
                break;
            default:
                # code...
                break;
        }
        $data = [
            'customer_name' => $this->input->post('customer_name'),
            'customer_uid' => $this->input->post('uid'),
            'car_brand' => $this->input->post('car_brand'),
            'customer_number_phone' => $this->input->post('customer_number_phone'),
            'type_car' => $this->input->post('type_car'),
            'reg_year' => $this->input->post('reg_year'),
            'transaction_date' => date('Y-m-d'),
            'type_insurance' => $this->input->post('type_insurance'),
        ];
        $sql = $this->renew->insertInterested($data);
        if ($sql) {
            $message = "แจ้งสนใจประกัน";
            $message .= "\n 👤 " . $this->input->post('customer_name');
            $message .= "\n 📞 " . $this->input->post('customer_number_phone');
            $message .= "\n 🚗 " . $this->input->post('car_brand');
            $message .= "\n 🚙 " . $type_car;
            $message .= "\n 📅 " . $this->input->post('reg_year');
            $message .= "\n 🪪 " . $this->input->post('type_insurance');
            $notify = $this->sendTelegramNotify($message);
            $array = [
                'success' => true,
                'msg' => 'ทำรายการสำเร็จ'
            ];
        } else {
            $array = [
                'error' => true,
                'msg' => 'ทำรายการไม่สำเร็จ'
            ];
        }
        echo json_encode($array);
    }

    public function fetch_renew()
    {
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $sql = $this->renew->fetchRenew();
        $num = $sql->num_rows();
        if ($num == 0) {
            $array = array(
                'error' => true,
                'msg' => 'ไม่พบข้อมูล'
            );
        } else {
            $row = $sql->result();
            $array = array(
                'success' => true,
                'data' => $row,
                'rows' => $num
            );
        }
        echo json_encode($array);
    }

    public function fetch_interested()
    {
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $sql = $this->renew->fetchInterested();
        $num = $sql->num_rows();
        if ($num == 0) {
            $array = array(
                'error' => true,
                'msg' => 'ไม่พบข้อมูล'
            );
        } else {
            $row = $sql->result();
            $array = array(
                'success' => true,
                'data' => $row,
                'rows' => $num
            );
        }
        echo json_encode($array);
    }
}
