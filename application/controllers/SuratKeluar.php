<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {
	
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
        
        $whr = [
            'publish' => 'U', 
            'nik' => $this->session->userdata('nik')
        ];

		$this->db->where($whr);
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
		$this->load->view('v_suratkeluar',$data);
		// $this->load->view('parts/footer');
    }
    
    public function tambah_surat()
    {
        $this->db->where('active', 'T');
        $users = $this->db->get('users')->result();

        $data['usr'] = $users;

        $this->load->view('parts/header');
		$this->load->view('parts/sidebar');
		$this->load->view('parts/navbar');
		$this->load->view('v_tambah_surat',$data);
		// $this->load->view('parts/footer');
    }

    public function sys_tambah_surat()
    {
        // ambil data file
        $namaFile = $_FILES['file']['name'];
        $namaSementara = $_FILES['file']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = $_SERVER['DOCUMENT_ROOT'] . '/smart-master/assets/file_surat/';

        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

        if ($terupload) {
            
            // $arr_diteruskan[] = explode(",", "123,321");

            $data = array(
                'id_surat'          => $this->input->post('id_surat',true),
                'no_agenda'         => $this->input->post('no_agenda',true),
                'jenis_surat'       => $this->input->post('jenis_surat',true),
                'tahun'             => $this->input->post('tahun',true),
                'no_surat'          => $this->input->post('no_surat',true),
                'tgl_surat'         => date("Y-m-d", strtotime($this->input->post('tgl_surat',true))),
                'perihal'           => $this->input->post('perihal',true),
                'surat_dari'        => $this->input->post('surat_dari',true),
                'isi_disposisi'     => $this->input->post('isi_disposisi',true),
                'diteruskan_kepada' => $this->input->post('pilihan',true),
                'scan_surat'        => $namaFile,
                'id_log'            => $this->input->post('id_log',true),
                'nik'               => $this->input->post('nik',true)
            );

            $insert = $this->db->insert('t_surat', $data);
            if ($insert) {
                echo "berhasil";
            } else {
                echo "error";
            }

        } else {
            echo "gagal";
        }
    }

    public function edit_surat($id = null)
    {
        if ($id == null) {
            redirect('dashboard');
        }else{

            $whr = ['id_surat' => $id];
            $this->db->where($whr);
            $srt = $this->db->get('t_surat')->result();
            foreach ($srt as $surats){
                
                $id_user = $surats->diteruskan_kepada;
                $id_user_ex = explode(",", $id_user);
                
                foreach ($id_user_ex as $users) {
                    
                    $this->db->select('name');
                    $this->db->where('nik', $users);
                    $dat_user = $this->db->get('users')->result();        
                    
                    foreach ($dat_user as $datas) {
                        $dat[] = $datas->name;
                    }
                    
                }

                $surats->nama_user = $dat;
                unset($dat);
                $data_s[] = $surats;
            }

            $data['dat'] = $data_s;

            $this->db->where('active', 'T');
            $users = $this->db->get('users')->result();

            $data['usr'] = $users;

            $data['id'] = $id;

            // die(var_dump($data_s));

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('parts/navbar');
            $this->load->view('v_edit_surat',$data);

        }
    }

    public function sys_edit_surat()
    {
        // ambil data file
        $namaFile = $_FILES['file']['name'];
        $namaSementara = $_FILES['file']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = $_SERVER['DOCUMENT_ROOT'] . '/smart-master/assets/file_surat/';

        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

        if ($terupload) {
            
            // $arr_diteruskan[] = explode(",", "123,321");

            $data = array(
                'no_agenda'         => $this->input->post('no_agenda',true),
                'jenis_surat'       => $this->input->post('jenis_surat',true),
                'tahun'             => $this->input->post('tahun',true),
                'no_surat'          => $this->input->post('no_surat',true),
                'tgl_surat'         => date("Y-m-d", strtotime($this->input->post('tgl_surat',true))),
                'perihal'           => $this->input->post('perihal',true),
                'surat_dari'        => $this->input->post('surat_dari',true),
                'isi_disposisi'     => $this->input->post('isi_disposisi',true),
                'diteruskan_kepada' => $this->input->post('pilihan',true),
                'scan_surat'        => $namaFile,
                'id_log'            => $this->input->post('id_log',true),
                'nik'               => $this->input->post('nik',true),
                'publish' => 'U'
            );

            $this->db->where('id_surat',$this->input->post('ids',true));
            $ubah = $this->db->update('t_surat', $data);
            if ($ubah) {
                echo "berhasil";
            } else {
                echo "error";
            }

        } else {
            
            $data = array(
                'no_agenda'         => $this->input->post('no_agenda',true),
                'jenis_surat'       => $this->input->post('jenis_surat',true),
                'tahun'             => $this->input->post('tahun',true),
                'no_surat'          => $this->input->post('no_surat',true),
                'tgl_surat'         => date("Y-m-d", strtotime($this->input->post('tgl_surat',true))),
                'perihal'           => $this->input->post('perihal',true),
                'surat_dari'        => $this->input->post('surat_dari',true),
                'isi_disposisi'     => $this->input->post('isi_disposisi',true),
                'diteruskan_kepada' => $this->input->post('pilihan',true),
                'id_log'            => $this->input->post('id_log',true),
                'nik'               => $this->input->post('nik',true),
                'publish' => 'U'
            );

            $this->db->where('id_surat',$this->input->post('ids',true));
            $ubah = $this->db->update('t_surat', $data);
            if ($ubah) {
                echo "berhasil";
            } else {
                echo "error";
            }

        }
    }

    public function hapus_surat($id)
    {
        $data = array( 'publish' => 'D' );
        $this->db->where('id_surat', $id);
        $this->db->update('t_surat', $data);
        redirect(base_url('suratkeluar'));
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
