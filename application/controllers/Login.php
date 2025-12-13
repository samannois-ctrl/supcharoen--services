<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {

	

	function __construct()

    {

        parent::__construct();

        $this->load->model('user_model');

        //$this->load->model('Control_model');

        //$this->load->model('Download_model');

    }

		

	public function index($E1=NULL){
        $data=array();
        if(isset($E1)){
            $data['ErrTxt']="กรุณาเช็ค username  password";
        }
		$this->load->view('login',$data);
        $this->load->view('login_script');

	}

    public function checkLogin(){
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $UserData = $this->user_model->getUserLogin($username,$pass);
        //echo $username." ".$pass;
       // print_r($UserData);
       $userID = "notLogin";
       $userName = '';
        foreach($UserData AS $data){
            if(isset($data->id)){
                $userID = $data->id;
                $userName = $data->name_sname;

                $userdata = array(
                    'user_id' => $data->id,
                    'user_name' => $data->name_sname,
                    'user_branch' => $data->user_branch
                    );
                  
               $this->session->set_userdata($userdata);
            }
        
        };
				
		
        echo $userID;
    }
	
    public function goLogout(){
	    $this->session->unset_userdata(array('user_id','user_name'));
        $this->session->sess_destroy();
         redirect(base_url().'login', 'refresh');
   }



	

}

	