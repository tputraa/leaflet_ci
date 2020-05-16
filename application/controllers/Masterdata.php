<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterdata extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mmaster');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['page'] = "publicservice/publicservice";
		$this->load->view('index',$data);
	}

	public function kategori(){
		$data['page'] = "publicservice/kategori";
		$this->load->view('index',$data);
	}	

	public function kategori_add(){
		$data['page'] = "publicservice/kategori_add";
		$this->load->view('index',$data);
	}

	public function kategori_delete($id){
    	$result = $this->mmaster->Deletekategori($id);
    	$this->session->set_flashdata('success','Delete Data Berhasil');	

 		redirect(site_url().'/masterdata/kategori');
    }

     public function kategori_edit($id){
		$data['page'] = 'publicservice/kategori_edit';
		// $data['kategori'] = $this->mmaster->getKategori(); 
    	$data['kategori'] = $this->mmaster->SelectKategoriId($id);	

    	$this->load->view('index',$data);
	}


	public function kategori_save(){
		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules('nama_kategori','Nama Kategori','trim|required');
		

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error', 'Data Error');
			$this->kategori_add();
		}
		else{
			$kategori_id   = $this->input->post('kategori_id',TRUE);
			$nama_kategori = $this->input->post('nama_kategori',TRUE);

			if($kategori_id){
				$kategori = array(
	                'nama_kategori' => $nama_kategori
	        	);
	        	$this->mmaster->updateKategori($kategori,$kategori_id);
			}else{
				$kategori = array(
	                'nama_kategori' => $nama_kategori
	        	);

				$this->mmaster->savekategori($kategori);
			}

			
			$this->session->set_flashdata('success', 'Tambah Data Berhasil');
	        redirect(site_url().'/masterdata/kategori');
		}
	}

	public function kategori_list()
    {
        $list = $this->mmaster->get_datatables();
        $data = array();
        foreach ($list as $users) {
            $row = array();
            $row[] = $users->nama_kategori;
 			$row[] = '<a href="kategori_edit/'.$users->id.'" class="btn btn-sm blue">Edit</a><a class="btn btn-sm red" href="kategori_delete/'.$users->id.'">Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mmaster->count_all(),
                        "recordsFiltered" => $this->mmaster->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    //crud publicservices

    public function publicservice_add(){
    	$data['page'] = 'publicservice/publicservice_add';
    	$data['kategori'] = $this->mmaster->getKategori();
    	$this->load->view('index',$data);
    }

    public function publicservice_edit($id){
		$data['page'] = 'publicservice/publicservice_edit';
		$data['kategori'] = $this->mmaster->getKategori(); 
    	$data['ps'] = $this->mmaster->Selectpublicserviceid($id);	

    	$this->load->view('index',$data);
	}

	public function publicservice_delete($id){
    	$result = $this->mmaster->Deletepublicservice($id);
    	$this->session->set_flashdata('success','Delete Data Berhasil');	

 		redirect('masterdata');
    }

    public function publicservice_save(){
    	$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules('nama','Nama','trim|required');	
		$this->form_validation->set_rules('no_telp','No Telp','trim|required');	
		$this->form_validation->set_rules('alamat','Alamat','trim|required');	
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('kategori','Kategori','trim|required');	
		

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error', 'Data Error');
			$this->publicservice_add();
		}
		else{
			$nama 			= $this->input->post('nama',true);
			$no_telp		= $this->input->post('no_telp',true);
			$alamat 		= $this->input->post('alamat',true);
			$email 			= $this->input->post('email',true);
			$kategori 		= $this->input->post('kategori',true);
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
	        	$publicservice = array(
	                'nama_tempat' => $nama,
	                'alamat' => $alamat,
	                'no_telp' => $no_telp,
	                'email' => $email,
	                'kategori_id' => $kategori,
	                'latitude' => $latitude,
	                'longitude' => $longitude,
	                
	            );
	        }
	        else{
	        	$publicservice = array(
	                'nama_tempat' => $nama,
	                'alamat' => $alamat,
	                'no_telp' => $no_telp,
	                'email' => $email,
	                'kategori_id' => $kategori,
	                'latitude' => $lat,
	                'longitude' => $long,
	                
	            );
	        }

	        $this->mmaster->savepublicservice($publicservice);
	        $this->session->set_flashdata('success', 'Tambah Data Berhasil');
	        redirect('masterdata');
		}
    }

    public function publicservice_update(){

    	$userid = $this->input->post('id',true);

    	$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules('nama','Nama','trim|required');	
		$this->form_validation->set_rules('no_telp','No Telp','trim|required');	
		$this->form_validation->set_rules('alamat','Alamat','trim|required');	
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('kategori','Kategori','trim|required');	
		$this->form_validation->set_rules('latitude','Latitude','trim|required');	
		$this->form_validation->set_rules('longitude','Longitude','trim|required');		

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error', 'Data Error');
			$this->publicservice_edit($userid);
		}
		else{
			$nama 			= $this->input->post('nama',true);
			$no_telp		= $this->input->post('no_telp',true);
			$alamat 		= $this->input->post('alamat',true);
			$email 			= $this->input->post('email',true);
			$kategori 		= $this->input->post('kategori',true);
			$latitude 		= $this->input->post('latitude',true);
			$longitude 		= $this->input->post('longitude',true);

			$publicservice = array(
	                'nama_tempat' => $nama,
	                'alamat' => $alamat,
	                'no_telp' => $no_telp,
	                'email' => $email,
	                'kategori_id' => $kategori,
	                'latitude' => $latitude,
	                'longitude' => $longitude,
	                
	            );

	            $this->mmaster->updatepublicservice($userid,$publicservice);
	            $this->session->set_flashdata('success', 'Update Data Berhasil');
	            redirect('masterdata');
		}
    }

    
}

/* End of file Masterdata.php */
/* Location: ./application/controllers/Masterdata.php */