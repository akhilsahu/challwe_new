<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
 {
 
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
		$data['recent_viewed']=$this->Blog_Model->recent_viewed($abc);
		$data['get_all_categories']=$this->Blog_Model->get_all_category();
		
		if($this->session->userdata('user'))
		{
			$this->load->view('artist/page',$data);
		}
		else
		{
			$this->load->view('public/page',$data);
		}
	}

	public function single_blog_post($id)
	{
		
	$data['page']='blog_single_post';
	$data['page_title']='Blog';
	$data['blog_single']=$this->Blog_Model->blog_single($id);
	$data['update']=$this->Blog_Model->update_views($id,$data['blog_single'][0]['int_views']);
	$data['comments']=$this->Blog_Model->comments($id);	
	$data['update']=$this->Blog_Model->update_views($id,$data['blog_single'][0]['int_views']);
	$data['most_viewed']=$this->Blog_Model->most_viewed();
	$data['recent_viewed']=$this->Blog_Model->recent_viewed();
	$data['get_cat']=$this->Blog_Model->get_category($id);
	$data['get_all_categories']=$this->Blog_Model->get_all_category();
	$sess=$this->session->userdata('user');
	$data['get']=$this->Blog_Model->get_login_user_detail($sess['int_artist_id']);
	
	if($this->session->userdata('user'))
		{
        $this->load->view('artist/page',$data);		
		}
		
		else
		{
		 $this->load->view('public/page',$data);	
		}
	}
	
	
	public function add_comment($id)
	{
		$abc=$this->input->post('comment');
		$data=$this->Blog_Model->add_comment($id,$this->session->userdata('user'),$abc);
		if($data)
		{
			echo 'success';
		}
		else
		{
			echo 'failed';
		}
	}
	
	public function get_comment($id)
	{
		$data=$this->Blog_Model->get_comment($id);
		if($data)
		{
		   echo	json_encode($data);
		}
		else
		{
			echo 'failed';
		}
	}
	
	public function search_blog(){
	$data['bloglist'] =  $this->Blog_Model->search_blog();
	$data['page']='search_blog';
	$this->load->view('artist/page',$data);
	}

 /*function logout(){
 $this->session->sess_destroy();
 redirect('User','refresh');
}
*/


}
?>