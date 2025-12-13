<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberModel extends CI_Model
{
    public function addMember($data){
        return $this->db->insert('tb_members', $data);
    }

    public function fetchMember(){
        $this->db->from('tb_members');
        return $this->db->get();
    }

    public function fetchMemberById($uid){
        $this->db->select('*');
        $this->db->from('tb_members');
        $this->db->join('tbl_insurance_data', "REPLACE(tbl_insurance_data.cust_telephone_1, '-', '') = tb_members.phone_number", 'inner', false);
        $this->db->join('tbl_province', 'tbl_province.id = tbl_insurance_data.province_regis');
        $this->db->where('tb_members.uid', $uid);
        $this->db->order_by('tbl_insurance_data.date_work', 'DESC');
        // $this->db->limit(1);
        return $this->db->get();
    }

    public function fetchInfoMemberById($uid){
        $this->db->from('tb_members');
        $this->db->where('tb_members.uid', $uid);
        return $this->db->get()->row();
    }

    public function checkMember($uid){
        $this->db->from('tb_members');
        $this->db->where('tb_members.uid', $uid);
        return $this->db->get();
    }

    public function getSearchMember($data){
        
        $this->db->from('tb_members');
        if (!empty($data['phone_number'])) {
            $this->db->where('tb_members.phone_number', $data['phone_number']);
        }
        return $this->db->get();
    }

    public function delMember($data){
        return $this->db->delete('tb_members', $data);
    }

    public function fetchInsuranceMember($uid){
        $this->db->select('
            t_id.id,
            t_ic.company_name,
            t_ic_act.company_name act_company_name,
            t_ic.company_telephone,
            t_id.insurance_no,
            t_id.act_no,
            t_id.cust_name,
            CONCAT(t_cb.car_brand_name," ",t_id.car_model) brand_car,
            t_id.cust_telephone_1,
            t_id.vehicle_regis,
            t_p.province_name,
            t_id.car_model,
            CONCAT(DATE_FORMAT(t_id.insurance_start, "%d/%m/"), YEAR(t_id.insurance_start) + 543) AS insurance_start_th,
            CONCAT(DATE_FORMAT(t_id.insurance_end, "%d/%m/"), YEAR(t_id.insurance_end) + 543) AS insurance_end_th,
            CONCAT(DATE_FORMAT(t_id.act_date_start, "%d/%m/"), YEAR(t_id.act_date_start) + 543) AS act_date_start_th,
            CONCAT(DATE_FORMAT(t_id.act_date_end, "%d/%m/"), YEAR(t_id.act_date_end) + 543) AS act_date_end_th,
            t_id.date_regist,
            CASE 
                WHEN t_id.date_regist != "-x-" THEN DATE_FORMAT(t_id.date_regist, "%d/%m/%Y")
                ELSE "-"
            END AS date_regis,
            IF(t_id.is_installment = "0", "สด", "ผ่อน") AS payment_type,
            IF(t_id.insurance_fix_garace = "2", "ซ่อมอู่", "ซ่อมห้าง") AS insurance_fix_garace,
            t_it.insurance_type_name,
            FORMAT(t_id.sum_insured, 2) AS sum_insured,
            FORMAT(t_id.insurance_price, 2) AS insurance_price,
            FORMAT(t_id.act_price, 2) AS act_price,
            t_id.insurance_total,
            t_fuc.folow_1,
            t_m.uid
        ');

        $this->db->from('tbl_insurance_data t_id');
        $this->db->join('tbl_province t_p', 't_p.id = t_id.province_regis', 'inner');
        $this->db->join('tbl_car_brand t_cb', 't_id.brand_id = t_cb.id', 'inner');
        $this->db->join('tbl_insurance_type t_it', 't_it.id = t_id.insurance_type_id', 'left');
        $this->db->join('tbl_follow_up_customer t_fuc', 't_fuc.work_id = t_id.id', 'left');
        $this->db->join('tbl_insurance_company t_ic', 't_ic.id = t_id.insurance_corp_id', 'left');
        $this->db->join('tbl_insurance_company t_ic_act', 't_ic_act.id = t_id.corp_id', 'left');
        $this->db->join('tb_members t_m', "REPLACE(t_id.cust_telephone_1, '-', '') = t_m.phone_number", 'left', false);

        $this->db->where('(t_id.insurance_end > NOW() OR t_id.act_date_end > NOW())', null, false);
        $this->db->where('t_m.uid', $uid);
        $this->db->where('t_id.car_type_id !=', '4');
        $this->db->group_by('t_id.id');
        return $this->db->get();
    }

    public function fetchInsuranceAccident($uid) {
        $sql = "SELECT 
            t_id.id,
            t_id.work_id,
            t_ic.company_name,
            t_ic.company_telephone,
            t_id.policy_number,
            t_id.cust_name,
            t_main.cust_telephone_1,
            t_id.insurance_start,
            DATE_FORMAT(t_id.insurance_start_time, '%H:%i') AS insurance_start_time,
            t_id.insurance_end,
            DATE_FORMAT(t_id.insurance_end_time, '%H:%i') AS insurance_end_time,
            FORMAT(t_id.treatment_costs,2) AS treatment_costs,
            FORMAT(t_id.insurance_limit,2) AS insurance_limit,
            FORMAT(t_id.total_price,2) AS total_price,
            CASE 
            WHEN t_main.insurance_remark LIKE '%มีชดเชยรายวัน%' THEN t_main.insurance_remark
            ELSE '-'
            END AS daily_compensation
        FROM (((tbl_insurance_accident_data t_id
        LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id)
        LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id)
        LEFT JOIN tb_members t_m ON REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number)
        WHERE t_id.insurance_end > NOW() AND t_m.uid = ?";

        return $this->db->query($sql, array($uid));
    }

    public function fetchInsuranceHome($uid) {
        $sql = "SELECT 
            t_id.id,
            t_id.work_id,
            t_ic.company_name,
            t_ic.company_telephone,
            t_id.policy_number,
            t_id.cust_name,
            t_main.cust_telephone_1,
            t_id.insurance_start,
            DATE_FORMAT(t_id.insurance_start_time, '%H:%i') AS insurance_start_time,
            t_id.insurance_end,
            DATE_FORMAT(t_id.insurance_end_time, '%H:%i') AS insurance_end_time,
            FORMAT(t_id.insurance_limit,2) AS insurance_limit,
            FORMAT(t_id.total_price,2) AS total_price,
            t_id.location_insured
        FROM (((tbl_insurance_home_data t_id
        LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id)
        LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id)
        LEFT JOIN tb_members t_m ON REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number)
        WHERE t_id.insurance_end > NOW() AND t_m.uid = ?";

        return $this->db->query($sql, array($uid));
    }

    public function fetchInsuranceTransport($uid) {
        $sql = "SELECT 
            t_id.id,
            t_id.work_id,
            t_id.register,
            t_ic.company_name,
            t_ic.company_telephone,
            t_id.policy_number,
            t_id.cust_name,
            t_main.cust_telephone_1,
            t_id.insurance_start,
            DATE_FORMAT(t_id.insurance_start_time, '%H:%i') AS insurance_start_time,
            t_id.insurance_end,
            DATE_FORMAT(t_id.insurance_end_time, '%H:%i') AS insurance_end_time,
            FORMAT(t_id.insurance_limit,2) AS insurance_limit,
            FORMAT(t_id.total_price,2) AS total_price
        FROM (((tbl_insurance_shpping_data t_id
        LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id)
        LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id)
        LEFT JOIN tb_members t_m ON REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number)
        WHERE t_id.insurance_end > NOW() AND t_m.uid = ?";

        return $this->db->query($sql, array($uid));
    }
}
