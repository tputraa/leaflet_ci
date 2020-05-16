<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyProfile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mprofile');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['page'] = 'profile/myprofile'; //view position
		$this->load->view('index',$data);
	}

	public function UpdateInfo(){

		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p><br>');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');	

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Cannot Null');
			redirect('myprofile');
		}
		else{
			$nama = trim($this->input->post('nama'));
			$email = trim($this->input->post('email'));

			$user_id  	= $this->session->userdata('user_id');

			$update = array(
	            	'nama_lengkap' 		=> $nama,
	            	'email'		=> $email
	            );

	        $this->db->where('id',$user_id);
			$this->db->update('users',$update);
			$this->session->set_userdata($update);
			$this->session->set_flashdata('success', 'Update berhasil');
	    	redirect('myprofile');
		}

	}

	public function UpdateAvatar(){

		$config['upload_path'] 		= "assets/upload/avatar/";
        $config['allowed_types'] 	= "jpg|jpeg|png";
        $config['encrypt_name']		= TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('file')){

            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error',$error);
            redirect('myprofile');
        }
        else{
        	// echo "masuk else";exit();
            $data = $this->upload->data();

            $file   = $config['upload_path'].$data['file_name'];
                
            $resize = $this->load->helper('image_lib');
              
            $resize = new Image_lib($file);
            $path   = $config['upload_path'].$data['file_name'];
                            
            $thumb_namanya 	= "thumb_".$data['file_name'];
            $newpath1       = $config['upload_path']."/thumb/".$thumb_namanya;
            $resize 		= new Image_lib($file);
          
            $resize->resizeTo(300, 300, 'exact');
            $resize->saveImage($newpath1);

        	$user_id  	= $this->session->userdata('user_id');
            $query 		= $this->mprofile->selectbyid($user_id);

            foreach ($query->result() as $row) {
                @unlink('assets/upload/avatar/'.$row->avatar);
                @unlink('assets/upload/avatar/thumb/'.$row->avatar_thumb);
            }

            $update = array(
            	'avatar' 		=> $data['file_name'],
            	'avatar_thumb'	=> $thumb_namanya
            );

            $this->db->where('id',$user_id);
			$this->db->update('users',$update);

            $this->session->set_userdata($update);
            $this->session->set_flashdata('success', 'Update avatar berhasil');
	        redirect('myprofile');
	    }
	}

	public function UpdatePw(){

		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p><br>');
		$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
		$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');	

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Cannot Null');
			redirect('myprofile');
		}
		else{

			$password 	= $this->input->post('newpassword',TRUE);
			$userid 	= $this->session->userdata('user_id');
			$oldpass    = md5(trim($this->input->post('oldpassword',TRUE)));

			$cekpass    = $this->mprofile->passbyid($userid,$oldpass);

			if(!$cekpass){
				$this->session->set_flashdata('error', 'Password tidak cocok');
				redirect('myprofile');
			}else{
				
				$pw_update = array('password' => md5($password));

				$this->db->where('id', $userid);
				$this->db->update('users',$pw_update);

				$this->session->set_flashdata('success', 'Ganti password berhasil');
				redirect('myprofile');
			}
		}
	}

}

/* End of file MyProfile.php */
/* Location: ./application/controllers/MyProfile.php */