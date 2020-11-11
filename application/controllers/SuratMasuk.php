<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','download'));
        $this->load->library(array('form_validation','pagination','session'));
        //$this->load->model('login_model');
    }

	public function index()
	{
		if($this->session->userdata('id') == NULL){
            redirect('Login');
		}
		
		$this->db->where('publish', 'U');
        $this->db->or_where('publish', NULL);
        $this->db->from('t_surat');
		$srt = $this->db->get()->result();
		// foreach ($srt as $sr){
		// 	$sr->tes = 'ss';
		// 	$dt[] = $sr;
		// }
		foreach ($srt as $surats){
                
			$id_user = $surats->diteruskan_kepada;
			$id_user_ex = explode(",", $id_user);
			
			foreach ($id_user_ex as $users) {
				
				$this->db->select('name');
				$this->db->where('nik', $users);
				$dat_user = $this->db->get('users')->result();        
				
				foreach ($dat_user as $datas) {
					$dats[] = $datas->name;
				}
				
			}

			$surats->nama_user = $dats;
			unset($dats);

			if (is_object($surats)) {
				$dat_array[] = get_object_vars($surats);
			}

		}
		$data['dat'] = $dat_array;

		// die(var_dump($dat_array));

		$this->load->view('parts/header');
		$this->load->view('parts/sidebar');
		$this->load->view('parts/navbar');
		$this->load->view('v_suratmasuk',$data);
		$this->load->view('parts/footer');
	}

	public function download(){

		$id = $this->input->post('id',true);

		$this->db->select('scan_surat');
        $this->db->where('id_surat', $id);
        $dat_surat = $this->db->get('t_surat')->result();        
                    
        foreach ($dat_surat as $datas) {}

        force_download('assets/file_surat/'.$datas->scan_surat,NULL);

		echo $datas->scan_surat;
	}

	// public function tampil_surat_masuk(){
	// 	$this->db->where('publish', 'U');
    //     $this->db->or_where('publish', NULL);
    //     $this->db->from('t_surat');
    // 	$srt = $this->db->get()->result();
	// 	echo json_encode($srt);
	// }
	
}
