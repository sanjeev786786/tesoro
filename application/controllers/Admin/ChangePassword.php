<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {
	public  function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
        $this->load->library('email');
		$this->load->model('ChangePasswordModel');
		}
	public function index(){  
         $user = $this->session->userdata('user');
		 if(isset($_POST['c_pass'])){
			  $currentPassword = $this->input->post('currentPassword');
              $id =  $user['user_id'];
			  $user_data= $this->ChangePasswordModel->user_data($id);
			  $userpass = $user_data['password'];
			  $pass =$this->encrypt->decode($userpass);
			  if($pass == $currentPassword){
				  $newPassword = $this->input->post('newPassword');				  
				  $pass1 =$this->encrypt->encode($newPassword); 
				  $match_new = $this->ChangePasswordModel->change_pass($id,$pass1);
				  $this->session->set_flashdata('msg',"Password Changed Successfully.");	
				  redirect('admin/change_password');
			   }else{
				   $this->session->set_flashdata('error'," Incorrect Current Password.");	
					redirect('admin/change_password');
			   }
		     }
            $this->load->view('admin/header');
			$this->load->view('admin/changepassword');
			$this->load->view('admin/footer');	
	}
	
	

}