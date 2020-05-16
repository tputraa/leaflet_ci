<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $level;
    public $user_id;
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
				redirect(base_url("login"));
		}
		$this->level  = $this->session->userdata('level');
		$this->user_id = $this->session->userdata('user_id');
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */