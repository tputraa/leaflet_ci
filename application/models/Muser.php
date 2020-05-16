<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model {

	public $variable;

	var $table = 'users';
    var $column_order = array('nik','nama_lengkap','no_telp','alamat','level'); //set column field database for datatable orderable
    var $column_search = array('nik','nama_lengkap','no_telp','alamat','level'); //set column field database for datatable searchable 
    var $order = array('u.id' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
    }

    function checkEmailExists($email)
    {
        $this->db->select("email");
        $this->db->where("email", $email);   
        $query = $this->db->get($this->table);

        return $query->result();
    }

    function checkUsernameExists($username)
    {
        $this->db->select("username");
        $this->db->where("username", $username);   
        $query = $this->db->get($this->table);

        return $query->result();
    }
    
    function Saveuser($user){
        $this->db->insert('users',$user);
    }

    function Selectuserid($user_id){
        $this->db->select('*');
        $this->db->where('id', $user_id);
        return $this->db->get($this->table)->row();
    }

    function getlevel(){
        return $this->db->get('level')->result();
    }

    function Deleteuser($user_id){
        $this->db->where('id',$user_id);
        $this->db->delete('users');
    }

    function updateuser($id,$user){
        $this->db->where('id',$id);
        $this->db->update('users',$user);
    }

    function _get_datatables_query()
    {
         
        $this->db->from('users u');
        $this->db->join('level L','L.id = u.level');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                    $this->db->or_like('L.nama_level', $_POST['search']['value']);
                }
                else
                {
                    $this->db->like('L.nama_level', $_POST['search']['value']);
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

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */