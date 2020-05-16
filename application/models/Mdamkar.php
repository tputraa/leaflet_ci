<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdamkar extends CI_Model {

	public $variable;
	var $table = 'publicservice';
    var $column_order = array('id','nama_lengkap','no_telp','alamat','latitude','longitude'); //set column field database for datatable orderable
    var $column_search = array('ps.id','nama_lengkap','no_telp','alamat','latitude','longitude','nama_kategori'); //set column field database for datatable searchable 
    var $order = array('ps.id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		
	}


	function _get_datatables_query()
    {
        $this->db->from('publicservice as ps');
        $this->db->join('kategori as ka','ka.id = ps.kategori_id');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {

            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                    $this->db->or_like('ka.nama_kategori', $_POST['search']['value']);
                }
                else
                {
                    $this->db->like('ka.nama_kategori', $_POST['search']['value']);
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}

/* End of file Mdamkar.php */
/* Location: ./application/models/Mdamkar.php */