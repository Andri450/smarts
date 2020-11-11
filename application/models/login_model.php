<?php

class login_model extends CI_Model
{
    var $users = "users";

    public function logged_in()
    {
        return $this->session->userdata('id');
    }


    //fungsi check login
    public function check_login($data){
		$username = $data['username'];
        $password = $data['password'];		

        $cek = $this->db->get_where($this->users,array('username'=>$username))->num_rows();
        $result = $this->db->get_where($this->users,array('username'=>$username))->result();
        if ($cek != 0){

            $pass_hash = $result[0]->password;

            if (password_verify($password,$pass_hash)){
					
                $hakAkses = $result[0]->id;
                $session['id'] = $result[0]->id;
                $session['name'] = $result[0]->name;
                $session['nik'] = $result[0]->nik;
                $session['foto'] = $result[0]->picture;
                //$session['role'] = $result[0]->role;
                $this->session->set_userdata($session);
                //redirect('dashboard');
				echo "success"; 

            }else{
                $this->session->set_flashdata("error","Login Gagal, cek kembali Username dan password anda");
                //redirect('login');
				echo "error1";
            }

        } else{
            $this->session->set_flashdata("error","Login Gagal, cek kembali Username dan password anda");
            //redirect('login');
			echo "error2";
        }
    }

    // public function create_user($data) {
    //     date_default_timezone_set('Asia/Jakarta');

    //     $data = array(
    //      'nama_lengkap' => 'Administrator',
    //      'username'     => $data['username'],
    //      'password'  => $this->hash_password($data['password']),
    //      'confirm_password'  => $this->hash_password($data['password']),
    //      'role'  => 'staff',
    //      'created_at' => date('Y-m-d H:i:s'),
    //     );
    //     return $this->db->insert('user_tb', $data);
    //    }

    // private function hash_password($pass_user)
    // {
    //     return password_hash($pass_user, PASSWORD_BCRYPT);
    // }

}