<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class API extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mapi');
		
	}

	public function insertUser()
	{
		$nik 			= $this->input->post('nik',true);
		$nama_lengkap 	= $this->input->post('nama_lengkap',true);
		$jenis_kelamin  = $this->input->post('jenis_kelamin',true);
		$no_telp		= $this->input->post('no_telp',true);
		$alamat 		= $this->input->post('alamat',true);
		$agama     		= $this->input->post('agama',true);
		$username 		= $this->input->post('username',true);
		$email 			= $this->input->post('email',true);
		$password 		= $this->input->post('password',true);

		$user = array(
				'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'jenis_kelamin' => $jenis_kelamin,
                'no_telp' => $no_telp,
                'alamat' => $alamat,
                'agama' => $agama,
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'level' => 1
        );

        $res = $this->mapi->saveUser($user);

        if($res){
        	$response["error"] = FALSE;
            $response["message"] = "Success";
        }else{
            $response["error"] = TRUE;
            $response["message"] = "Data Gagal Disimpan";
        }

        echo json_encode($response);
	}

	public function getListKategori(){
		$this->output->set_content_type('application/json');
		$res = $this->db->get('kategori')->result();
		$this->output->set_output(json_encode($res));
	}

	public function getPublicServicePlace(){
		$this->output->set_content_type('application/json');
		$res = $this->db->get('publicservice')->result();
		$this->output->set_output(json_encode($res));
	}

}

/* End of file API.php */
/* Location: ./application/controllers/API.php */