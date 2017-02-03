<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends CI_Controller {

	public $user;
   
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Artist_Model');
		$this->load->model('Post_Model');
        $this->user=$this->session->userdata('user');
		//print_r($this->user);exit;
        if($this->user['txt_email']==''){
        	redirect('user','refresh');
        } 

    }
	
	public function index(){
/*		$data['page']='home';
		$data['page_title']='Home';
    	$this->load->view('public/page',$data);*/
	}

	public function create_post()
	{
		$data['page']='create_post';
		$data['page_title']='Create Post';
        $this->load->view('artist/page',$data);
	}
	
	function addPost() 
	{
		$data=$this->input->post();
		//print_r()
		if($_FILES['post_file']['name']!=''){
			$img_type=array("image/jpeg","image/jpg","image/png","image/gif");
			$video_type=array("video/webm","video/mp4","video/avi");
			$audio_type=array("audio/mpeg","audio/wav","audio/x-wav","audio/mp3");
			$filetype=0;
			if (in_array($_FILES["post_file"]["type"],$img_type)) $filetype=1;
			if (in_array($_FILES["post_file"]["type"],$video_type)) $filetype=2;
			if (in_array($_FILES["post_file"]["type"],$audio_type)) $filetype=3;
			
			if ($filetype!=0){
				$ext=explode(".",$_FILES["post_file"]["name"]);		
				$filename=$postId;
				$imgtype=$_FILES["post_file"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="post_media/".$file_name;
				move_uploaded_file($_FILES['post_file']['tmp_name'],$filepath);
				$data['filepath']=$filepath;
			}
		}
		$data['post_type']=$filetype;
		$abc=$this->Post_Model->addPost($data);
		redirect('artist/create_post','refresh');
    }
}
