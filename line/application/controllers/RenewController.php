<?php
require_once APPPATH . 'controllers/MainController.php';

class RenewController extends MainController
{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->admin_info)) {
            redirect('login-admin', 'refresh');
        }
        $this->load->model('RenewModel','renew');
    }

    public function search_renew(){
        $data = [
            'car_code' => $this->input->post('car_code'),
            'phone_number' => $this->input->post('phone_number'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date')
        ];

        $sql = $this->renew->getSearchRenew($data);
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

    public function search_interested(){
        $data = [
            'customer_number_phone' => $this->input->post('customer_number_phone'),
            'type_car' => $this->input->post('type_car'),
            'type_insurance' => $this->input->post('type_insurance'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date')
        ];

        $sql = $this->renew->getSearchInterested($data);
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

}
