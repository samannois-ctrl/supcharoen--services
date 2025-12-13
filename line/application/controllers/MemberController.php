<?php
require_once APPPATH . 'controllers/MainController.php';

class MemberController extends MainController
{
    public function __construct(){
        parent::__construct();
        $this->load->model('MemberModel', 'member');
        $this->load->library('line');
    }

    public function fetch_member(){
        $sql = $this->member->fetchMember();
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
    
    public function get_member_info_by_uid(){
        $uid = $this->input->post('uid');
        $sql = $this->member->fetchMemberById($uid);
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

    public function get_insurance_info_by_uid(){
        $uid = $this->input->post('uid');
        $sql = $this->member->fetchInsuranceMember($uid);
        $num = $sql->num_rows();
        // == accident insurance ==
        $sqlAccident = $this->member->fetchInsuranceAccident($uid);
        $numAccident = $sqlAccident->num_rows();
        // == accident insurance ==
        // == home insurance ==
        $sqlHome = $this->member->fetchInsuranceHome($uid);
        $numHome = $sqlHome->num_rows();
        // == home insurance ==
        // == transport insurance ==
        $sqlTransport = $this->member->fetchInsuranceTransport($uid);
        $numTransport = $sqlTransport->num_rows();
        // == transport insurance ==
        $arrayBody = [];
        if ($num == 0) {
            // $array = array(
            //     'error' => true,
            //     'msg' => 'ไม่พบข้อมูล'
            // );
            $arrayBody['insurance'] = [];
        }else{
            $row = $sql->result();
            // $array = array(
            //     'success' => true,
            //     'data' => $row,
            //     'rows' => $num
            // );
            $arrayBody['insurance'] = $row;
        }
        if ($numAccident == 0) {
            $arrayBody['accident_insurance'] = [];
        }else{
            $row = $sqlAccident->result();
            $arrayBody['accident_insurance'] = $row;
        }
        if ($numHome == 0) {
            $arrayBody['home_insurance'] = [];
        }else{
            $row = $sqlHome->result();
            $arrayBody['home_insurance'] = $row;
        }
        if ($numTransport == 0) {
            $arrayBody['transport_insurance'] = [];
        }else{
            $row = $sqlTransport->result();
            $arrayBody['transport_insurance'] = $row;
        }
        echo json_encode($arrayBody);
    }

    public function get_member_info(){
        $member_info = $this->member->fetchInfoMemberById($this->input->post('uid'));
        echo json_encode($member_info);
    }

    public function search_member(){
        $data = [
            'phone_number' => $this->input->post('phone_number')
        ];

        $sql = $this->member->getSearchMember($data);
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

    public function del_member(){
        $data = [
            'uid' => $this->input->post('member_id')
        ];
        $sql = $this->member->delMember($data);
        if ($sql) {
            $link = $this->line->UnlinkRichMenuMember($this->input->post('member_id'));
            if ($link['result'] == 'S') {
                $array = [
                    'success' => true,
                    'msg' => 'ลบข้อมูลสำเร็จ'
                ];
            } else {
                $array = [
                    'error' => true,
                    'msg' => $link['message']
                ];
            }
        }else{
            $array = [
                'error' => true,
                'msg' => 'ลบข้อมูลไม่สำเร็จ'
            ];
        }
        echo json_encode($array);
    }
}
