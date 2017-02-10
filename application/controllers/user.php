
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function User()
    {
        parent::__construct();
		
	
        $this->load->model('Artist_Model');
        $this->load->model('user_model');
        
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

	public function category()
	{
		$data['page']='category';
		$data['page_title']='Category';
        $data['cat']= $this->user_model->category();
        $this->load->view('public/page',$data);
               
	}
        public function sub_category($id)
                
	{
            
		$data['page']='category';
		$data['page_title']='Category';
        $data['sub_cat']= $this->user_model->sub_category($id);
        print_r($data['sub_cat']);exit;
	}
	
	
	public function get_followers()
	{
            
		$data=$this->session->userdata('user');
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
        $data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
        $data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		$data['page']='profile-followers';
		$data['page_title']='Profile';
        $this->load->view('public/page',$data);
	}
	public function user_profile()
	{
            
		$data=$this->session->userdata('user');
		//print_r($data);
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
         
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
		//print_r($data['pro']);
        $data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);   
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		$data['comment']=$this->Artist_Model->show_comments($data['pro'][0]['int_artist_id']);
		//print_r($data['comment']);exit;
		$data['page']='profile';
		$data['page_title']='Profile';
        $this->load->view('public/page',$data);
	}
	public function profile_follower($id)
	{
            
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		$data['pro']=$this->Artist_Model->get_profile_detail_follower($id);
        $data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
	    $data['page']='profile-followers';
		$data['page_title']='Profile';
        $this->load->view('public/page',$data);
	}
	
	public function profile_following()
	{
		$data=$this->session->userdata('user');
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		$data['page']='profile_following';
		$data['page_title']='Profile-following';
        $this->load->view('public/page',$data);
	}
	
	public function delete_following($id)           
		{
			
			$data=$this->session->userdata('user');
			$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
			$executed=$this->Artist_Model->delete_following($id,$data['pro'][0]['int_artist_id']);
			
			if($executed)
			{
				echo 'success';
			}
			else
			{
				echo 'fail';
			}
		}
	
	public function register()
	{

		$this->load->library('form_validation');
	    $this->form_validation->set_rules('txt_email', 'Email', 'required');
	    $this->form_validation->set_rules('txt_password', 'Password', 'required');
	    $this->form_validation->set_rules('txt_fname', 'First Name', 'required');
	    $this->form_validation->set_rules('txt_lname', 'Last Name', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$this->Artist_Model->register();
			$data['page']='home';
			$data['page_title']='Home';
			$this->load->view('public/page',$data);
		}
		else
		{
			$data['page']='login-register';
			$data['page_title']='Register';
			$this->load->view('public/page',$data);
		}		
	}

	public function login()
	{
            
		$valid_login =  $this->Artist_Model->login($this->input->post('txt_email'),$this->input->post('txt_password'));
		if($valid_login)
		{
	   	   $this->session->set_userdata('user',$valid_login);
		  redirect('User','refresh');
		 
	   }
	   else
	   {
	   	
        $data['page']='home';
		$data['page_title']='Home';
        $this->load->view('public/page',$data);
       }

    }

		function logout()
		 {
		 $this->session->sess_destroy();
		 redirect('User','refresh');
		 }
 
		function  view_profile($id)
		 {  
			 $user=$this->session->userdata('user');
			 $data['page']='view_profile';
			 $data['pro']=$this->Artist_Model->profile_view($id);
			 $data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
			 $this->load->view('public/page',$data);
		 
		 }    

	 public function add_comment()
	
	{
		$abc=$this->input->post('comment');
		//print_r($abc);exit;
		$data['details']=$this->Artist_Model->add_comment($abc);
		echo json_encode($data['details']);	
		
	}
	
	
	 public function get_comment()
	{
		
		$abc=$this->input->post('comment');
		$data=$this->session->userdata('user');
		//$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
		if($data['txt_email']=='') die();
		$data['details']=$this->Artist_Model->getAllUsercomments($data['int_artist_id']);
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		//print_r($data['details']);
		echo json_encode($data['details']);	
		
	}
	
	public function userComments()
	{
		$data=$this->session->userdata('user');
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		$data['page']='usercomment';
		$data['page_title']='comments';
        $this->load->view('public/page',$data);
	}
	
	public function profile_settings()
	{
		$data=$this->session->userdata('user');
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
        //print_r($data);exit;
		$data['result']=$this->user_model->get_profile_settings($data['int_artist_id']);
		//print_r($data['result']);exit;
		$data['get_data']=$this->user_model->insert_update($data['int_artist_id']);
		//print_r($data['get_data']);exit;
		$data['page']='profile-settings';
		$data['page_title']='Profile-Settings';
        $this->load->view('public/page',$data);
	}
    
	public function count_like()
	{
		$abc=$this->input->post('id');
		$xyz=$this->input->post('pid');
		$data=$this->Artist_Model->countlikes($abc,$xyz);
		echo json_encode($data);
		
	}
	public function count_dislike()
	{
		$abc=$this->input->post('id');
		$xyz=$this->input->post('pid');
		$data=$this->Artist_Model->countdislikes($abc,$xyz);
		echo json_encode($data);
		
	}
}
?>