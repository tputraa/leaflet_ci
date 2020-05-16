<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapi extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function saveUser($user){
		$this->db->insert('users',$user);
		return true;
	}
}

/* End of file Mapi.php */
/* Location: ./application/models/Mapi.php */