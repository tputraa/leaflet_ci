<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Damkar extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdamkar');
		$this->load->library('form_validation');
	}

    public function Updatedamkar(){

    	$userid = $this->input->post('id',true);

    	$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules('nama','Nama','trim|required');	
		$this->form_validation->set_rules('no_telp','No Telp','trim|required');	
		$this->form_validation->set_rules('alamat','Alamat','trim|required');	
		$this->form_validation->set_rules('email','Email','trim|required');	
		$this->form_validation->set_rules('latitude','Latitude','trim|required');	
		$this->form_validation->set_rules('longitude','Longitude','trim|required');		

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error', 'Data Error');
			$this->edit($userid);
		}
		else{
			$nama 			= $this->input->post('nama',true);
			$no_telp		= $this->input->post('no_telp',true);
			$alamat 		= $this->input->post('alamat',true);
			$email 			= $this->input->post('email',true);
			$latitude 		= $this->input->post('latitude',true);
			$longitude 		= $this->input->post('longitude',true);

			$damkar = array(
	                'nama_lengkap' => $nama,
	                'alamat' => $alamat,
	                'no_telp' => $no_telp,
	                'email' => $email,
	                'latitude' => $latitude,
	                'longitude' => $longitude,
	                
	            );

	            $this->mdamkar->updatedamkar($userid,$damkar);
	            $this->session->set_flashdata('success', 'Update Data Berhasil');
	            redirect('damkar');
		}
    }

	public function savedamkar(){

		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules('nama','Nama','trim|required');	
		$this->form_validation->set_rules('no_telp','No Telp','trim|required');	
		$this->form_validation->set_rules('alamat','Alamat','trim|required');	
		$this->form_validation->set_rules('email','Email','trim|required');	
		

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error', 'Data Error');
			$this->newdamkar();
		}
		else{
			$nama 			= $this->input->post('nama',true);
			$no_telp		= $this->input->post('no_telp',true);
			$alamat 		= $this->input->post('alamat',true);
			$email 			= $this->input->post('email',true);
			$latitude 		= $this->input->post('latitude',true);
			$longitude 		= $this->input->post('longitude',true);
			

			$formattedAddr = str_replace(' ','+',$alamat);
			$userAgent = $_SERVER['HTTP_USER_AGENT'];
			$curl = curl_init();

	        curl_setopt_array($curl, array(
	            CURLOPT_URL => 'https://nominatim.openstreetmap.org/search?q='.$formattedAddr.'&format=json&addressdetails=1',
	            CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_ENCODING => "",
	            CURLOPT_MAXREDIRS => 10,
	            CURLOPT_TIMEOUT => 30,
	            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	            curl_setopt($curl, CURLOPT_REFERER, 'http://103.25.209.134:8080/damkar/index.php/damkar/login'),
				curl_setopt($curl,CURLOPT_USERAGENT, $userAgent),
	            CURLOPT_CUSTOMREQUEST => "POST",
	            CURLOPT_POSTFIELDS => "",
	            CURLOPT_HTTPHEADER => array(
	                "cache-control: no-cache"
	            ),
	        ));

	        $response = curl_exec($curl);
	        $err = curl_error($curl);

	        curl_close($curl);
	        $result = json_decode($response,TRUE);

	        $lat = $result[0]['lat'];
	        $long = $result[0]['lon'];

	        if($latitude != null && $longitude != null){
	        	$damkar = array(
	                'nama_lengkap' => $nama,
	                'alamat' => $alamat,
	                'no_telp' => $no_telp,
	                'email' => $email,
	                'latitude' => $latitude,
	                'longitude' => $longitude,
	                
	            );
	        }
	        else{
	        	$damkar = array(
	                'nama_lengkap' => $nama,
	                'alamat' => $alamat,
	                'no_telp' => $no_telp,
	                'email' => $email,
	                'latitude' => $lat,
	                'longitude' => $long,
	                
	            );
	        }

	        $this->mdamkar->savedamkar($damkar);
	        $this->session->set_flashdata('success', 'Tambah Data Berhasil');
	        redirect('damkar');
		}
	}

	public function public_list()
    {
        $list = $this->mdamkar->get_datatables();

        $data = array();
        foreach ($list as $users) {
            $row = array();
            $row[] = $users->nama_lengkap;
            $row[] = $users->alamat;
            $row[] = $users->no_telp;
            $row[] = $users->latitude;
            $row[] = $users->longitude;
            $row[] = $users->nama_kategori;
 			$row[] = '<a href="masterdata/publicservice_edit/'.$users->id.'" class="btn btn-sm blue">Edit</a><a class="btn btn-sm red" href="masterdata/publicservice_delete/'.$users->id.'">Delete</a>';
            $data[] = $row;
        }

 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdamkar->count_all(),
                        "recordsFiltered" => $this->mdamkar->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}

/* End of file Damkar.php */
/* Location: ./application/controllers/Damkar.php */