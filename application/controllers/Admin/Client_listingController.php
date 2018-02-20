<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_listingController extends CI_Controller {
	public  function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
        $this->load->library('email');
		$this->load->model('Client_listingModel');
		}
	public function index()
	{
		$data['client'] = $this->Client_listingModel->client_listing();
		$this->load->view('admin/header');
		$this->load->view('admin/client_listing',$data);
		$this->load->view('admin/footer');
	}
	public function delete_client(){
		$id = $_GET['id'];
		$data['delete_client'] = $this->Client_listingModel->delete_client($id);
		$this->session->set_flashdata('msg',"Client Deleted Successfully.");
        redirect('admin/client_listing');
	}
	public function add_client(){
		$data = [];
		if(isset($_POST['submit'])){
			$password = $this->input->post('password');				  
			$pass_word =$this->encrypt->encode($password);
			$data = array(
			'name' => $this->input->post('name'),
			'last_name' => $this->input->post('lname'),
			'company' => $this->input->post('company'),
			'street' => $this->input->post('street'),
			'country' => $this->input->post('country'),
			'phone_number' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'status' => '1',
			'user_type'=>'client',
			'updated_at' => date('Y-m-d'),
			'created_at' => date('Y-m-d'),
			'password' => $pass_word
			);
			$data['add_client'] = $this->Client_listingModel->add_client($data);
			$this->session->set_flashdata('msg',"Add Client Successfully.");
            redirect('admin/client_listing');
        }
		  if(isset($_GET['edit_id'])){
			$user_id=$_GET['edit_id'];
			$data['edit_client'] = $this->Client_listingModel->edit_client($user_id);
			}
		$this->load->view('admin/header');
		$this->load->view('admin/add_client',$data);
		$this->load->view('admin/footer');
	}
	public function update_client(){
		if(isset($_POST['update'])){
			$ids = $this->input->post('id');
			$password = $this->input->post('password');
            //print_r($password);		 exit();	
			$pass_word =$this->encrypt->encode($password);
			$data = array(
			'name' => $this->input->post('name'),
			'last_name' => $this->input->post('lname'),
			'company' => $this->input->post('company'),
			'street' => $this->input->post('street'),
			'country' => $this->input->post('country'),
			'phone_number' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'status' => '1',
			'user_type'=>'client',
			'updated_at' => date('Y-m-d'),
			'password' => $pass_word
			);
			$data['update_client'] = $this->Client_listingModel->update_client($data,$ids);
			$this->session->set_flashdata('msg',"Client data updated successfully.");
            redirect('admin/client_listing');
		}
	}
	public function client_cts_listing(){
		$data['client_cts'] = $this->Client_listingModel->client_cts_listing();
		//print_r($data['client_cts']); exit();
		$this->load->view('admin/header');
		$this->load->view('admin/client_cts_listing',$data);
		$this->load->view('admin/footer');
	}
	public function delete_create(){
		//echo "hi"; exit();
		$id = $_GET['id'];
		$data['delete_ct'] = $this->Client_listingModel->delete_ct($id);
		$data['created_cts_add'] = $this->Client_listingModel->created_cts_add($id);
		
		$this->session->set_flashdata('msg',"CT Deleted Successfully.");
        redirect('admin/client_cts_listing');
	}
	public function edit_create(){
		   if(isset($_POST['update'])){
			   // print_r($_POST); exit();
				$id = $this->input->post('id');
				
				$data= array(
				'user_id'=>$this->input->post('user_id'),
				'name'=>$this->input->post('name'),
				'start_date'=>$this->input->post('start_date'),
				'end_date'=>$this->input->post('end_date'),
				'quantity'=>$this->input->post('quantity'),
				'description'=>$this->input->post('description')
			);
			$edit_create= $this->Client_listingModel->edit_create_cts($id,$data);
			$create_cts_edit= $this->Client_listingModel->create_cts_edit($id);
			
		    redirect('admin/client_cts_listing');
			}
		    if(isset($_GET['edit_id'])){
			$user_id=$_GET['edit_id'];
			$data['edit_create'] = $this->Client_listingModel->edit_create($user_id);
			$data['categories']=$this->curl();
			}
		    $this->load->view('admin/header');
		    $this->load->view('admin/edit_create',$data);
		    $this->load->view('admin/footer');	
	}
	function curl(){
		$url = $this->config->item('api_url');
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$contents = curl_exec($ch);
        curl_close($ch);
		$result_arr = json_decode($contents, true);
		$array = array();
		$count =0;
        foreach($result_arr as $key=>$row){
			
		  $url_categories = $this->config->item('api_url_categories');
		  $url_categories_data = $url_categories.$row['id'];
		  $ch1 = curl_init();
		  curl_setopt ($ch1, CURLOPT_URL, $url_categories_data);
		  curl_setopt ($ch1, CURLOPT_CONNECTTIMEOUT, 5);
		  curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, true);
		  $cont = curl_exec($ch1);
		  curl_close($ch1);
		  
		  $result_arr1 = json_decode($cont, true);
          foreach($result_arr1 as $key1=>$row1){
			 
          if(isset($row1['title']) && isset($row1['content'])){
				 $array[$count]['cat_id'] = $row1['id'];
                 $array[$count]['categories_rendered']=$row1['title']['rendered'];
				 $array[$count]['categories_rendered_content']=$row1['content']['rendered'];
				 $count++;
             }
		  }
		}
		
		return $array;
	}
   
}
