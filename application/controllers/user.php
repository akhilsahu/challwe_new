<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Artist_Model');

    }


	public function index()
	{
		$data['page']='home';
		$data['page_title']='Home';
        $this->load->view('public/page',$data);
	}

	public function aboutUs()
	{
		$data['page']='aboutUs';
		$data['page_title']='About Us';
        $this->load->view('public/page',$data);
	}

	public function register(){

		$this->load->library('form_validation');
	    $this->form_validation->set_rules('txt_email', 'Email', 'required');
	    $this->form_validation->set_rules('txt_password', 'Password', 'required');
	    $this->form_validation->set_rules('txt_fname', 'First Name', 'required');
	    $this->form_validation->set_rules('txt_lname', 'Last Name', 'required');
		if ($this->form_validation->run() == TRUE){
			$this->Artist_Model->register();
			$data['page']='home';
			$data['page_title']='Home';
			$this->load->view('public/page',$data);
		}else{
			$data['page']='login-register';
			$data['page_title']='Register';
			$this->load->view('public/page',$data);
		}		
	}

	public function login(){
		$valid_login =  $this->Artist_Model->login($this->input->post('txt_email'),$this->input->post('txt_password'));
		//echo"<pre>"; print_r($valid_login); die();
		if($valid_login){
	   	   $this->session->set_userdata('user',$valid_login);
		  redirect('User','refresh');
	   }else{
	   	//echo "usernmae & password wrong ";
        $data['page']='home';
		$data['page_title']='Home';
        $this->load->view('public/page',$data);
   }

 }

 function logout(){
 $this->session->sess_destroy();
 redirect('User','refresh');
}



}
