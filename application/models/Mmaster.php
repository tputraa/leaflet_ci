<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmaster extends CI_Model {

	public $variable;
	//kategori
	var $column_order = array('id','nama_kategori'); //set column field database for datatable orderable
    var $column_search = array('id','nama_kategori'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 
    //end kategori

	public function __construct()
	{
		parent::__construct();
		
	}

    function savepublicservice($publicservice){
        $this->db->insert('publicservice',$publicservice);
    }

    function updatepublicservice($id,$publicservice){
        $this->db->where('id',$id);
        $this->db->update('publicservice',$publicservice);
    }

    function Selectpublicserviceid($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        return $this->db->get('publicservice')->row();
    }

    function Deletepublicservice($id){
        $this->db->where('id',$id);
        $this->db->delete('publicservice');
    }

	function savekategori($kategori){
		$this->db->insert('kategori',$kategori);
	}

    function updateKategori($data,$id){
        $this->db->where('id',$id);
        $this->db->update('kategori',$data);
    }

    function SelectKategoriId($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        return $this->db->get('kategori')->row();
    }

	function Deletekategori($id){
		$this->db->where('id',$id);
		$this->db->delete('kategori');
	}

	function _get_datatables_query()
    {
         
        $this->db->from('kategori');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all()
    {
        $this->db->from('kategori');
        return $this->db->count_all_results();
    }

    function getKategori(){
    	return $this->db->get('kategori')->result();
    }
}

/* End of file Mmaster.php */
/* Location: ./application/models/Mmaster.php */