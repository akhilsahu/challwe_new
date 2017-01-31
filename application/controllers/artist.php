<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends CI_Controller {

	public $user;
   
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Artist_Model');
        $this->user=$this->session->userdata('user');
        if($this->user['txt_email']==''){
        	redirect('user','refresh');
        } 

    }


	public function index(){
/*		$data['page']='home';
		$data['page_title']='Home';
    	$this->load->view('public/page',$data);*/
	}

	public function create_post(){
		$data['page']='create_post';
		$data['page_title']='Create Post';
        $this->load->view('artist/page',$data);
	}

	



}
