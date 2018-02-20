<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_listingModel extends CI_Model {
	 public function client_listing(){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user_type','client');
			$query = $this->db->get();
			return $query->result();
	 }
	 public function delete_client($id){
		  $this -> db -> where('id', $id);
          $this -> db -> delete('user');
	 }
	 public function add_client($data){
		 $this->db->insert('user',$data);
	 }
	 public function edit_client($user_id){
		 $this->db->select('*');
		 $this->db->from('user');
		 $this->db->where('id',$user_id);
		 $query = $this->db->get();
		 return $query->row();
	 }
	 public function update_client($data,$ids){
		 $this->db->where('id',$ids);
         $this->db->update('user',$data);
	 }
	 public function add_create_cts($data){
		 $this->db->insert('created_cts',$data);
		 $insert_id = $this->db->insert_id();
         return  $insert_id;
	 }
	 public function list_add_create_cts($ids){
		    $this->db->select('*');
			$this->db->from('created_cts');
			$this->db->where('user_id',$ids);
			$query = $this->db->get();
			return $query->result();
	 }
	 public function delete_ct($id){
		  $this -> db -> where('id', $id);
          $this -> db -> delete('created_cts');
	 }
	 public function created_cts_add($id){
		  $this -> db -> where('created_cts_id', $id);
          $this -> db -> delete('created_cts_add');
	 }
	 public function edit_create($user_id){
		 $this->db->select('*');
		 $this->db->from('created_cts');
		 $this->db->where('id',$user_id);
		 $query = $this->db->get();
		 return $query->row();
	 }
	 public function edit_create_cts($id,$data){
		 $this->db->where('id',$id);
         $this->db->update('created_cts',$data);
	 }
	 public function create_cts_add($add_create){
		    $cat_id = $this->input->post('cat_id');
			$title = $this->input->post('categories_rendered_title');
			$input_name = $this->input->post('input');
			foreach($title as $k=>$value){
				$title_title = $value;
				$catId = $cat_id[$k];
				$inputName = $input_name[$k];
				$order = $k;
				$data=array(
				'title_title'=>$title_title,
				'catId'=>$catId,
				'inputName'=>$inputName,
				'sort_order'=>$k,
				'created_cts_id'=>$add_create
				);
			$this->db->insert('created_CTs_add',$data);	
			}
	 }
	 public function create_cts_edit($id){
		$this->db->select('catId');
        $this->db->from('created_cts_add');
		$this->db->where('created_cts_id', $id);
        $query = $this->db->get();
        $ret1 = $query->result_array();
		    foreach ($ret1 as $row)  
            $vector[] = $row['catId'];
            $cat_id = $this->input->post('cat_id');
			//print_r($cat_id); 
			$title = $this->input->post('categories_rendered_title');
			$input_name = $this->input->post('input');
			foreach($title as $k=>$value){
				//echo "<pre>";
				//print_r($vector);  exit();
				//print_r($cat_id[$k]); 
				if(in_array($cat_id[$k],$vector)){
				 //echo "pdate"; 
				$title_title = $value;
				$catId = $cat_id[$k];
				$inputName = $input_name[$k];
				$order = $k;
				$data=array(
				'title_title'=>$title_title,
				'catId'=>$catId,
				'inputName'=>$inputName,
				'sort_order'=>$k,
				
				);
				//print_r($data); 
				 $this->db->where('created_cts_id',$id);
				 $this->db->where('catId',$catId);
				 $this->db->update('created_cts_add',$data);
		 }else{
			 //echo "add"; 
			$cat_id = $this->input->post('cat_id');
			$title = $this->input->post('categories_rendered_title');
			$input_name = $this->input->post('input');
			
				$title_title = $value;
				$catId = $cat_id[$k];
				$inputName = $input_name[$k];
				$order = $k;
				$data=array(
				'title_title'=>$title_title,
				'catId'=>$catId,
				'inputName'=>$inputName,
				'sort_order'=>$k,
				'created_cts_id'=>$id
				);
			//print_r($data); 
			$this->db->insert('created_CTs_add',$data);	
			
		 }
	   }
	   
	 }
	 public function client_cts_listing(){
		    $this->db->select('*');
			$this->db->from('created_cts');
			$query = $this->db->get();
			return $query->result(); 
	 }
	 public function check_user_cts($ctsdate,$language){
			$date=date_create($ctsdate);
			$start_date=date_format($date,"d/m/Y");
			//echo $start_date; exit();
		    $this->db->select('*');
			$this->db->from('created_cts');
			$this->db->where('start_date',$start_date);
			$this->db->where('language',$language);
			$query = $this->db->get();
			$data_created_cts=array();
			if($query->result_array()){
				foreach ($query->result_array() as $key=>$row)
				{
					   $data_created_cts[$key] = $row;
					   $res_data =$row['id'];
					   $this->db->select('*');
					   $this->db->from('created_cts_add');
					   $this->db->where('created_cts_id',$res_data);
					   $query = $this->db->get();
					   //echo $this->db->last_query(); exit();
					   $data_created_cts[$key]['ct_title'] = $query->result_array();
					  
				}
			}
			return $data_created_cts;
	 }
}