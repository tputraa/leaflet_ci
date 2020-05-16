<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('muser');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['page'] = 'users/user';
 		$this->load->view('index',$data);
	}

	public function Newuser(){
		$data['page'] = 'users/user_add';
		$data['script'] = 'assets/global/css/custom.css';
		$this->load->view('index',$data);
	}

	public function edit($id){
    	$data['page'] = 'users/user_edit';
    	$data['level'] = $this->muser->getlevel();
    	$data['user'] = $this->muser->Selectuserid($id);	

    	$this->load->view('index',$data);
    }

    public function delete($id){
    	$result = $this->muser->Deleteuser($id);
    	$this->session->set_flashdata('success','Delete Data Berhasil');	

 		redirect('user');
    }

    public function Updateuser(){
    	$userid = $this->input->post('id',true);

    	$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules('nama_lengkap','Nama','trim|required');	
		$this->form_validation->set_rules('nik','NIK','trim|required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','trim|required');
		$this->form_validation->set_rules('no_telp','No Telp','trim|required');	
		$this->form_validation->set_rules('alamat','Alamat','trim|required');	
		$this->form_validation->set_rules('email','Email','trim|required');	
		$this->form_validation->set_rules('agama','Agama','trim|required');
		

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error', 'Data Error');
			$this->edit($userid);
		}
		else{
			$nik 			= $this->input->post('nik',true);
			$nama_lengkap 	= $this->input->post('nama_lengkap',true);
			$jenis_kelamin  = $this->input->post('jenis_kelamin',true);
			$no_telp		= $this->input->post('no_telp',true);
			$alamat 		= $this->input->post('alamat',true);
			$agama     		= $this->input->post('agama',true);
			$email 			= $this->input->post('email',true);
			$level 			= $this->input->post('level',true);

			$user = array(
					'nik' => $nik,
	                'nama_lengkap' => $nama_lengkap,
	                'jenis_kelamin' => $jenis_kelamin,
	                'no_telp' => $no_telp,
	                'alamat' => $alamat,
	                'agama' => $agama,
	                'email' => $email,
	                'level' => $level
	                
	            );

	            $this->muser->updateuser($userid,$user);
	            $this->session->set_flashdata('success', 'Update Data Berhasil');
	            redirect('User');
		}
    }

	public function Saveuser(){
		
		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules('nama_lengkap','Nama','trim|required');	
		$this->form_validation->set_rules('nik','NIK','trim|required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','trim|required');
		$this->form_validation->set_rules('no_telp','No Telp','trim|required');	
		$this->form_validation->set_rules('alamat','Alamat','trim|required');	
		$this->form_validation->set_rules('email','Email','trim|required');	
		$this->form_validation->set_rules('agama','Agama','trim|required');	
		$this->form_validation->set_rules('username','Username','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');
		

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error', 'Data Error');
			$this->Newuser();
		}
		else{
			$nik 			= $this->input->post('nik',true);
			$nama_lengkap 	= $this->input->post('nama_lengkap',true);
			$jenis_kelamin  = $this->input->post('jenis_kelamin',true);
			$no_telp		= $this->input->post('no_telp',true);
			$alamat 		= $this->input->post('alamat',true);
			$agama     		= $this->input->post('agama',true);
			$username 		= $this->input->post('username',true);
			$email 			= $this->input->post('email',true);
			$password 		= $this->input->post('password',true);
			$level 			= $this->input->post('level',true);

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
	                'level' => $level
	            );

	            $this->muser->Saveuser($user);
	            $this->session->set_flashdata('success', 'Tambah Data Berhasil');
	            redirect('User');
		}
	}

	public function checkEmailExists()
    {
        $email = $this->input->post("email",TRUE);
        $result = $this->muser->checkEmailExists($email);

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }

    public function checkUsernameExists()
    {
        $username = $this->input->post("username",TRUE);
        $result = $this->muser->checkUsernameExists($username);

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }

	public function User_list()
    {
        $list = $this->muser->get_datatables();
        $data = array();
        foreach ($list as $users) {
        	
            $row = array();
            $row[] = $users->nik;
            $row[] = $users->nama_lengkap;
            $row[] = $users->no_telp;
            $row[] = $users->alamat;
            $row[] = $users->nama_level;
 			$row[] = '<a href="user/edit/'.$users->id.'" class="btn btn-sm blue">Edit</a><a class="btn btn-sm red" href="user/delete/'.$users->id.'">Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->muser->count_all(),
                        "recordsFiltered" => $this->muser->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */