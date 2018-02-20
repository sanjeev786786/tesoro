<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    public  function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
        $this->load->library('email');
		$this->load->model('AccountModel');
    }
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('login');
		$this->load->view('template/footer');
	}
	public function login(){
		 if(isset($_POST['submit'])){
           $check['email'] = $this->input->post('email');
           $user = $this->AccountModel->email_check('user',$check);
           if(!empty($user)){
			   $user_id =$user['id'];
			   $check_status = $this->AccountModel->check_user_status($user_id);
               if (!empty($check_status)){
                 $hase = $user['password'];
				 $pass =$this->encrypt->decode($hase);
                 if($pass == $this->input->post('password'))
                    {
                    $remember = $this->input->post('remember');
                    if(!empty($remember)){
                    $user_data['remember'] = array(
								'email'=>$user['email'],
								'password'=>$pass,
								'remember_me'=>true
							);
                    }
                    $user_data['user'] = array(
							  'logged_in' => TRUE, 
							  'user_type' =>$user['user_type'],
							  'user_name' =>$user['name'],
							  'user_id' => $user['id'],
							  'email' =>$user['email'],
							  );
                    
					$this->session->set_userdata($user_data);
                    if($user['user_type'] == 'admin'){
                        redirect('admin');
                        }
                    else{
						redirect('client');
						}
				    } else { 
                    $this->session->set_flashdata('msg',"Incorrect Email/Password or Blocked user");	
				    redirect('/');
                    }
                 }else{ 
                 $this->session->set_flashdata('msg',"Sorry! Your account is inactive. Please activate from your Email.");	
		         redirect('/');
                }
             }else{
             $this->session->set_flashdata('msg',"Incorrect Email Id.");	
		     redirect('/');
            }
        }
	}
    public function forgot(){
        if(isset($_POST['submit'])){
        $check['email'] = $this->input->post('email');
        $forgot_email_check = $this->AccountModel->email_check('user',$check);
          if (!empty($forgot_email_check)){
            $email_id = $forgot_email_check['email'];
			$id = $forgot_email_check['id'];
            $pw = ""; 
		    $pw = rand(100000,999999);
			$pass1 =$this->encrypt->encode($pw);
            $data['forgotupdate'] = $this->AccountModel->forgotupdate($id,$pass1);
			$code = $pw;
			$to = $email_id;
			$subject = "Your Recovered Password";				            
			$message = "Please use this password to login " . $code; 
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: Tesoro Senery <tesoro@senery.com>' . "\r\n";
				if(mail($to,$subject,$message,$headers)){
					$this->session->set_flashdata('thank',"Your Password has been sent to your email id.");	
					redirect('/', 'refresh');
				}else{
                    $this->session->set_flashdata('thank',"Failed to Recover your password, try again email id.");	
					redirect('forgot');
				}
            }else {
            $this->session->set_flashdata('msg',"Incorrect Email Address");	
		    redirect('forgot', 'refresh');
            }
        }
        $this->load->view('template/header');
		$this->load->view('forgot');
		$this->load->view('template/footer');
    }
    public function logout(){
		$this->session->unset_userdata('user');
        redirect('/');
	}   
}
