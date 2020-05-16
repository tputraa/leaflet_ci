<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function cekLogin(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->or_where('nik', $this->input->post('username'));
       	$query = $this->db->get('users');

       	if($query->num_rows() == 1){

       			$result = $query->result();
       			$db_pass = $result[0]->password;

       			$password = md5($this->input->post('password'));
       			
       			if($db_pass == $password){

					$data_session = array(
						'user_id' => $result[0]->id,
						'nama_lengkap' => $result[0]->nama_lengkap,
						'username' => $result[0]->username,
						'level' => $result[0]->level,
						'email' => $result[0]->email,
						//'avatar' => $result[0]->avatar,
						//'avatar_thumb' => $result[0]->avatar_thumb,
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