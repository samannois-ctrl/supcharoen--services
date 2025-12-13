<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    public function getInsuranceList(){
        $this->db->select('tbl_insurance_company.company_name');
        $this->db->from('tbl_insurance_company');
        $this->db->join('tbl_insurance_income','tbl_insurance_income.ins_company = tbl_insurance_company.id');
        $this->db->join('tbl_insurance_type','tbl_insurance_type.id = tbl_insurance_income.ins_type_id');
        $this->db->where('company_status', '1');
        $this->db->where_not_in('insurance_type_name', ['พรบ.', 'ขนส่งสินค้า']);
        return $this->db->get()->result();
    }

    public function getActList(){
        $this->db->select('tbl_insurance_company.company_name');
        $this->db->from('tbl_insurance_company');
        $this->db->join('tbl_insurance_income','tbl_insurance_income.ins_company = tbl_insurance_company.id');
        $this->db->join('tbl_insurance_type','tbl_insurance_type.id = tbl_insurance_income.ins_type_id');
        $this->db->where('company_status', '1');
        $this->db->like('insurance_type_name', 'พรบ');
        return $this->db->get()->result();
    }

    public function getTransportationList(){
        $this->db->select('tbl_insurance_company.company_name');
        $this->db->from('tbl_insurance_company');
        $this->db->join('tbl_insurance_income','tbl_insurance_income.ins_company = tbl_insurance_company.id');
        $this->db->join('tbl_insurance_type','tbl_insurance_type.id = tbl_insurance_income.ins_type_id');
        $this->db->where('company_status', '1');
        $this->db->where('insurance_type_name', 'ขนส่งสินค้า');
        return $this->db->get()->result();
    }
}

?>