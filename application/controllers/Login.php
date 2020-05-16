<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');
	}

	public function index()
	{
		if($this->session->userdata('status') == "login"){
				redirect(site_url().'Home');
		}
		else{
			$this->load->view('login');
		}
	}

	public function signin(){

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="alerterror">', '</div>');
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');	
		
		if ($this->form_validation->run() == FALSE ){
			$this->index();	
		}
		else{

			$username 	= $this->input->post('username');
	        $password 	= md5($this->input->post('password'));
	        $cek		= $this->mlogin->cekLogin();

	       if($cek){
	       		redirect('home');
	       }
	        else{
	            redirect('login','refresh');
		    }
		}
	}

	public function Signout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */