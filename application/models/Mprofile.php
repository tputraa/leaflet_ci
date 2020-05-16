<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mprofile extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function selectbyid($userid){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$userid);
		return $this->db->get();
	}

	public function passbyid($userid,$pass){
		$this->db->select('password');
		$this->db->where('id',$userid);
		$this->db->where('password',$pass);
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

}

/* End of file Mprofile.php */
/* Location: ./application/models/Mprofile.php */