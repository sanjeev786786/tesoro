<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtsController extends CI_Controller {
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
		
		//http://localhost/tesoro/index.php/json/Ctsdate="12-02-2018"&language="EN"
         if(isset($_GET['Ctsdate']) && isset($_GET['language'])){
		 $ctsdate = $_GET['Ctsdate'];
         $language = $_GET['language'];
		 $check_cts = $this->Client_listingModel->check_user_cts($ctsdate,$language);
            $addresses = $check_cts;
		 }else {
			 $addresses = array('Invalid Data');
		 } 	
		echo json_encode($addresses); 
	}
   
}
