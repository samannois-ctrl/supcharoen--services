<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RenewModel extends CI_Model
{
    public function insertRenew($data){
        return $this->db->insert('tb_renews', $data);
    }

    public function insertInterested($data){
        return $this->db->insert('tb_interested', $data);
    }

    public function fetchRenew(){
        $this->db->select('tb_renews.renew_id,tb_renews.car_code,tb_renews.province,tb_renews.create_at,tb_members.nick_name,tb_members.phone_number');
        $this->db->from('tb_renews');
        $this->db->join('tb_members', 'tb_members.uid = tb_renews.uid_member');
        $this->db->order_by('tb_renews.create_at', 'DESC');
        return $this->db->get();
    }

    public function fetchInterested(){
        $this->db->from('tb_interested');
        $this->db->order_by('tb_interested.create_at', 'DESC');
        return $this->db->get();
    }

    public function getSearchRenew($data){
        $this->db->select('tb_renews.renew_id,tb_renews.car_code,tb_renews.province,tb_renews.create_at,tb_members.nick_name,tb_members.phone_number');
        $this->db->from('tb_renews');
        $this->db->join('tb_members', 'tb_members.uid = tb_renews.uid_member');
        if (!empty($data['phone_number'])) {
            $this->db->where('tb_members.phone_number', $data['phone_number']);
        }
        if (!empty($data['car_code'])) {
            $this->db->where('tb_renews.car_code', $data['car_code']);
        }
        if (!empty($data['start_date'])) {
            $this->db->where('tb_renews.create_at >=', $data['start_date']. ' 00:00:00');
        }
        if (!empty($data['end_date'])) {
            $this->db->where('tb_renews.create_at <=', $data['end_date']. ' 23:59:59');
        }
        return $this->db->get();
    }

    public function getSearchInterested($data){
        $this->db->from('tb_interested');
        if (!empty($data['customer_number_phone'])) {
            $this->db->where('customer_number_phone', $data['customer_number_phone']);
        }
        if ($data['type_car'] > 0) {
            $this->db->where('type_car', $data['type_car']);
        }
        if ($data['type_insurance'] > 0) {
            $this->db->where('type_insurance', $data['type_insurance']);
        }
        if (!empty($data['start_date'])) {
            $this->db->where('transaction_date >=', $data['start_date']);
        }
        if (!empty($data['end_date'])) {
            $this->db->where('transaction_date <=', $data['end_date']);
        }
        return $this->db->get();
    }

}
