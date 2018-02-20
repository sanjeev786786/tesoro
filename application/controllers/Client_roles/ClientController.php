<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {
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
        //print_r($this->session->userdata()); exit();
        $this->load->view('client/header');
		$this->load->view('client/dashboard');
		$this->load->view('client/footer');
	}
	public function create(){
		$user=$this->session->userdata('user');
		$ids =$user['user_id'];
		//print_r($ids); exit();
		$data['add_create'] = $this->Client_listingModel->list_add_create_cts($ids);
		//print_r($data['add_create']); exit();
		$this->load->view('client/header');
		$this->load->view('client/create',$data);
		$this->load->view('client/footer');
	}
	public function add_create_step(){
		if(isset($_GET['language']) && $_GET['language']=='Deutsch' ) {
			$lang['name']="Naam";
			$lang['start_date'] = "Degin datum";
			$lang['end_date']="Einddatum";
			$lang['quantity']="Aantal stuks";
			$lang['description']="Beschrijving";
		}elseif(isset($_GET['language']) && $_GET['language']=='Français'){
			$lang['name']="Prénom";
			$lang['start_date'] = "Date de début";
			$lang['end_date']="Date de fin";
			$lang['quantity']="Quantité";
			$lang['description']="La description";
		}elseif(isset($_GET['language']) && $_GET['language']=='Italian'){
			$lang['name']="Nome";
			$lang['start_date'] = "Data d'inizio";
			$lang['end_date']="Data di fine";
			$lang['quantity']="Quantità";
			$lang['description']="Descrizione";
		}else{
			$lang['name']="Name";
			$lang['start_date'] = "Start date";
			$lang['end_date']="End date";
			$lang['quantity']="Quantity";
			$lang['description']="Description";
		}
		$lang['categories']=$this->curl();
		$this->load->view('client/header');
		$this->load->view('client/add_create_step',$lang);
		$this->load->view('client/footer');
	}
	
	public function add_create(){
		$user=$this->session->userdata('user');
		$ids =$user['user_id'];
		if(isset($_POST['submit'])){
           $data= array(
			'language'=>$this->input->post('language'),
			'user_id'=>$ids,
			'name'=>$this->input->post('name'),
			'start_date'=>$this->input->post('start_date'),
			'end_date'=>$this->input->post('end_date'),
			'quantity'=>$this->input->post('quantity'),
			'description'=>$this->input->post('description'),
			);	
		   $add_create = $this->Client_listingModel->add_create_cts($data);
		   $create_cts_add= $this->Client_listingModel->create_cts_add($add_create);
		   redirect('client/create');
		}
		$this->load->view('client/header');
		$this->load->view('client/add_create');
		$this->load->view('client/footer');
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
			
		    redirect('client/create');
			}
		    if(isset($_GET['edit_id'])){
			$user_id=$_GET['edit_id'];
			$data['edit_create'] = $this->Client_listingModel->edit_create($user_id);
			$data['categories']=$this->curl();
			}
		    $this->load->view('client/header');
		    $this->load->view('client/edit_create',$data);
		    $this->load->view('client/footer');	
	} 
	public function delete_create(){
		$id = $_GET['id'];
		$data['delete_ct'] = $this->Client_listingModel->delete_ct($id);
		$data['created_cts_add'] = $this->Client_listingModel->created_cts_add($id);
		
		$this->session->set_flashdata('msg',"CT Deleted Successfully.");
        redirect('client/create');
	}
	
}
