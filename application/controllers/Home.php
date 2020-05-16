<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('leaflet');
		$this->load->model('mhome');
	}

	public function index()
	{
		$data['page'] = 'home/home'; //view position

		$putmarker = $this->mhome->getData();

        $config = array(
		 	'center'         => '-6.272092, 106.808554', // Center of the map
		 	'zoom'           => 15, // Map zoom
		 	);
        
		$this->leaflet->initialize($config);
		// var_dump($putmarker[0]['latitude'].','.$putmarker[0]['longitude']);exit();
		foreach($putmarker as $row){

			$marker = array();
			$marker['latlng']		= $row->latitude.','.$row->longitude; // Marker Location
			$marker['popupContent'] = '<strong> '.$row->nama_lengkap.'</strong>'.
			 							'<br><b>Alamat : </b> '.$row->alamat.
			 							'<br><b>Telp :  </b>'.$row->no_telp.
			 							'<br><b>latlong :  </b>'.$row->latitude.','.$row->longitude; // Popup Content
			if($row->kategori_id == 1){
				//damkar
				$marker['iconUrl'] = 'assets/global/img/icon/damkar.png';
			}
			elseif($row->kategori_id == 2){
				//rs
				$marker['iconUrl'] = 'assets/global/img/icon/rumahsakit.png';
			}
			elseif($row->kategori_id == 3){
				//rs
				$marker['iconUrl'] = 'assets/global/img/icon/kantorpolisi.png';
			}
			elseif($row->kategori_id == 4){
				//rs
				$marker['iconUrl'] = 'assets/global/img/icon/kecamatan.png';
			}
			elseif($row->kategori_id == 5){
				//rs
				$marker['iconUrl'] = 'assets/global/img/icon/kelurahan.png';
			}
			elseif($row->kategori_id == 6){
				//rs
				$marker['iconUrl'] = 'assets/global/img/icon/spbu.png';
			}
			else{
				$marker['iconUrl'] = 'assets/global/img/icon/marker-icon-yellow.png';
			}

			 	
		 	$this->leaflet->add_marker($marker);
			
		}
		//var_dump($marker);exit();
		$data['map'] =  $this->leaflet->create_map();
		$this->load->view('index',$data);
	}

}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */