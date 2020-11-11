<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('login_model');

    }

	public function index()
	{
        
        if($this->login_model->logged_in()){
            //jika memang session sudah terdaftar
            redirect('Dashboard');
        }else{
            $this->load->view('v_login');
        }
        
	}
	
	public function signin(){
        
		$in['username'] = $this->input->post('username');
        $in['password'] = $this->input->post('password');
        $this->login_model->check_login($in);
       
    }
	
	public function signout(){
        $this->session->sess_destroy();
		redirect('login');
    }
}
