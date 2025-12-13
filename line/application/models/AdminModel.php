<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function checkAdmin($username){
        return $this->db->get_where('tb_admin', array('username' => $username));
    }

    public function getAdmin(){
        $this->db->from('tb_admin');
        $this->db->where('type_id != ', 0);
        $this->db->order_by('status', 'ASC');
        return $this->db->get();
    }

    public function insertAdmin($data){
        return $this->db->insert('tb_admin', $data);
    }

    public function getInfoAdmin($admin_code){
        $this->db->from('tb_admin');
        $this->db->where('admin_code', $admin_code);
        return $this->db->get()->result();
    }

    public function updateAdmin($data,$admin_code){
        $this->db->where('admin_code', $admin_code);
        return $this->db->update('tb_admin', $data);
    }
}

?>