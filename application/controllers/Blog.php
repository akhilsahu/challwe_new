<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
		
        $this->load->model('Blog_Model');
		
    }

	public function get_blog()
	{
		$data['page']='blog';
		$data['page_title']='Home';
		$data['blogs']=$this->Blog_Model->blog();
		$data['most_viewed']=$this->Blog_Model->most_viewed($abc);
		if($this->session->userdata('user'))
		{
			$this->load->view('artist/page',$data);
		}
		else{
			$this->load->view('public/page',$data);
		}
	}

	public function single_blog_post($id){
	$data['page']='blog_single_post';
	$data['page_title']='Home';
	$data['blog_single']=$this->Blog_Model->blog_single($id);
	$data['update']=$this->Blog_Model->update_views($id,$data['blog_single'][0]['int_views']);
	$data['comments']=$this->Blog_Model->comments($id);	
	$data['update']=$this->Blog_Model->update_views($id,$data['blog_single'][0]['int_views']);
	$data['most_viewed']=$this->Blog_Model->most_viewed($abc);
	$sess=$this->session->userdata('user');
	$data['get']=$this->Blog_Model->get_login_user_detail($sess['int_artist_id']);
	if($this->session->userdata('user'))
		{
        $this->load->view('artist/page',$data);		
		}
		else{$this->load->view('public/page',$data);		}
	}
	public function add_comment(){
		$data=$this->Blog_Model->add_comment($this->session->userdata('user'));
		if($data)
		{
			redirect('Blog/get_blog','refresh');
		}
		else
		{
			echo 'failed';
		}
	}
	
	/*public function comments(){
	$data['comments'] =  $this->Blog_Model->get_comments();
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
*/


}
?>