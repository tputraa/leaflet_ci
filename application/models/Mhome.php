<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhome extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getData(){
		return $this->db->get('publicservice')->result();
	}

}

/* End of file Mhome.php */
/* Location: ./application/models/Mhome.php */