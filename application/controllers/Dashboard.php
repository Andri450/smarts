<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        //$this->load->model('login_model');
    }

	public function index()
	{
		if($this->session->userdata('id') == NULL){
            redirect('Login');
        }else{
			$this->load->view('parts/header');
			$this->load->view('parts/sidebar');
			$this->load->view('parts/navbar');
			$this->load->view('v_dashboard');
			$this->load->view('parts/footer');
		}
	}

	public function tampil_jumlah_sm()
	{
		$nip = $this->input->get('nik',true);
        $jumlah = 0;

		$this->db->where('publish', NULL);
		$this->db->or_where('publish', "U");
        $srt = $this->db->get('t_surat')->result();
        foreach ($srt as $surats){
                
            $id_user = $surats->diteruskan_kepada;
            $id_user_ex = explode(",", $id_user);
                
            foreach ($id_user_ex as $users) {
                    
                if ($users == $nip) {
                    $jumlah++;
                }
                    
            }

		}
		echo $jumlah;
	}

	public function tampil_jumlah_sk()
	{
		$nip = $this->input->get('nik',true);

        $whr = array(
			'nik' => $this->session->userdata('nik')
		);

		$this->db->select('publish');
		$this->db->where($whr);
        // $this->db->or_where('publish', NULL);
		$dt = $this->db->get('t_surat')->result();
		$jumlah = 0;
		foreach($dt as $data){

			if ($data->publish == NULL || $data->publish == "U") {
				$jumlah++;
			}

		}
		
		echo $jumlah;
	}

	public function tampil_jumlah_users()
	{
		$this->db->where('active', 'T');
		$this->db->select('nik');
		$jumlah = $this->db->get('users')->num_rows();
	
		echo $jumlah;
	}
	
}
