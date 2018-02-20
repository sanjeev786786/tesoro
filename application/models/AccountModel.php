<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AccountModel extends CI_Model {
    public  function __construct() {
		parent::__construct();
	}
    public function email_check($table,$where){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where('email',$where['email']);
        $query = $this->db->get(); 
		return $query->row_array();
	}
	public function check_user_status($user_id){
        //echo $user_id; 
		$this->db->select('*');
        $this->db->from('user');
        $array = array('id' => $user_id,'status' => 1);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->num_rows();
	}
	
	 public function forgotupdate($id,$pass1){
	    $this->db->where('id', $id);
		$this->db->set('password', $pass1);
		$query = $this->db->update('user');
		//echo $this->db->last_query(); exit();
		if($query){
			return true;
		}else{
			return false;
		}
	   
	}   
	
}
	