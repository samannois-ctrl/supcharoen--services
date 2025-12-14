<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load typical models used across controllers
        $this->load->model('user_model');
        $this->load->model('setting_model');
        $this->load->model('insurance_model');

        // enforce session-based auth like other controllers
        if ($this->session->userdata('user_id') == '') {
            redirect(base_url().'login', 'refresh');
        }
    }

    // index() mirrors typical pattern from Insurance controllers: prepare minimal data and load a view
    public function index()
    {
        $data = array();
        $data['currentDate'] = date('d');
        $data['currMonth'] = date('m');
        $data['currYear'] = date('Y');

        // example: load commonly used lists (safe to call even if empty)
        $dataStatus = '1'; $use_branch = 1;
        $agentStatus = '1';
        $data['listInsCorp'] = $this->setting_model->listCompany($dataStatus, $use_branch);
        $data['listAgent'] = $this->setting_model->listAgent($agentStatus);

        // render a simple view if present; fallback to a generic view name
        if (file_exists(APPPATH.'views/insurance_car.php')) {
            $this->load->view('insurance_car', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

}
