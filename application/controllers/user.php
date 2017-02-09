
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function User()
    {
        parent::__construct();
		$this->load->database();
        $this->load->model('Artist_Model');
        $this->load->model('user_model');
        $this->load->model('Post_Model');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
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
		//print_r($data);exit;
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
        $data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
	//	print_r($data['pro']);exit;
        $data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		//print_r($data['follow']);exit;
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
		$data['page']='profile-followers';
		$data['page_title']='Profile';
        $this->load->view('public/page',$data);
	}
	public function user_profile()
	{
            
		$data=$this->session->userdata('user');
		$data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);
         
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
        $data['com']=$this->Artist_Model->getcomments($data['int_artist_id']);   
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		$data['comment']=$this->Artist_Model->show_comments($data['pro'][0]['int_artist_id']);
		$data['vedio']=$this->Post_Model->video_data();
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
		
		//print_r($data['int_artist_id']);
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');					
		if($this->form_validation->run())
		{
				
			//	print_r($_FILES);exit;
				$cover_img='';
				if($_FILES['topfileupload']['name']!='')
				{
					if (($_FILES["topfileupload"]["type"] == "image/gif") || ($_FILES["topfileupload"]["type"] == "image/jpeg")|| ($_FILES["topfileupload"]["type"] == "image/jpg")|| ($_FILES["topfileupload"]["type"] == "image/pjpeg")|| ($_FILES["topfileupload"]["type"] == "image/x-png")|| ($_FILES["topfileupload"]["type"] == "image/png")){
						$ext=explode(".",$_FILES["topfileupload"]["name"]);		
						$file_name="artist_media/cover_image/".date("YmdHis").".".$ext[count($ext)-1];
						move_uploaded_file($_FILES['topfileupload'][tmp_name],$file_name);
						$cover_img=$file_name;
						// print_r($data['file_name']);exit;
					}
				}
								
				//print_r($_FILES);exit;
				$image_name='';
				if($_FILES['imgfileupload']['name']!='')
				{
					if (($_FILES["imgfileupload"]["type"] == "image/gif") || ($_FILES["imgfileupload"]["type"] == "image/jpeg")|| ($_FILES["imgfileupload"]["type"] == "image/jpg")|| ($_FILES["imgfileupload"]["type"] == "image/pjpeg")|| ($_FILES["imgfileupload"]["type"] == "image/x-png")|| ($_FILES["imgfileupload"]["type"] == "image/png")){
						$ext=explode(".",$_FILES["imgfileupload"]["name"]);		
						$file_name="artist_media/profile/".date("YmdHis").".".$ext[count($ext)-1];
						move_uploaded_file($_FILES['imgfileupload'][tmp_name],$file_name);
						$image_name=$file_name;
						// print_r($data['file_name']);exit;
					}
				}
				$data['get_data']=$this->user_model->insert_update($data['int_artist_id'],$image_name,$cover_img);
				//print_r($data['get_data']);
			redirect('user/profile_settings','refresh');
		}
		else
		{
			$data=$this->session->userdata('user');
			$data['result']=$this->user_model->get_profile_settings($data['int_artist_id']);
			//print_r($data['result']);exit;
			$data['page']='profile-settings';
			$data['page_title']='Profile-Settings';
			$this->load->view('public/page',$data);
		}
	}
	
}
?>
