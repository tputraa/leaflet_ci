<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function cekLogin(){
		$this->db->where('username', $this->input->post('username'));
		// $this->db->or_where('nik', $this->input->post('username'));
       	$query = $this->db->get('m_users');

       	if($query->num_rows() == 1){

       			$result = $query->row();
       			$db_pass = $result->password;

       			$password = md5($this->input->post('password'));
       			
       			if($db_pass == $password){

					$data_session = array(
						'user_id' => $result->id,
						'nama_lengkap' => $result->nama_lengkap,
						'username' => $result->username,
						'level' => $result->level,
						'email' => $result->email,
						//'avatar' => $result->avatar,
						//'avatar_thumb' => $result->avatar_thumb,
						'status' => 'login');
					$this->session->set_userdata($data_session);
					return 1;
					
       			}
       			else{
       				return 0;
       			}
	    }
	    else{
	    	return 0;
	    }
	}

}

/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */