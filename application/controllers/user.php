<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function User()
    {
        parent::__construct();
		//$data=$this->session->userdata('user');
	//	print_r($data);exit;
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
               //print_r($data['category']);exit;
	}
        public function sub_category($id)
                
	{
            //echo $id;die;
		$data['page']='category';
		$data['page_title']='Category';
                $data['sub_cat']= $this->user_model->sub_category($id);
               // $this->load->view('public/page',$data);
               print_r($data['sub_cat']);exit;
	}
	
	
	public function profile()
	{
            
		$data=$this->session->userdata('user');
                //print_r($data);die;
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
                
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		//print_r($data['follow']);exit;
		$data['page']='profile-followers';
		$data['page_title']='Profile';
        $this->load->view('public/page',$data);
	}
	public function user_profile()
	{
            
		$data=$this->session->userdata('user');
         //   print_r($data); 
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
            //    print_r($data['pro']);exit;
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		//print_r($data['follow']);exit;
		$data['page']='profile';
		$data['page_title']='Profile';
        $this->load->view('public/page',$data);
	}
	public function profile_follower($id)
	{
            
		
		$data['pro']=$this->Artist_Model->get_profile_detail_follower($id);
          // print_r($data['pro']);exit;     
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		//print_r($data['follow']);exit;
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
	    //print_r($data['follow']);exit;
		$data['page']='profile-followers';
		$data['page_title']='Profile';
        $this->load->view('public/page',$data);
	}
	
	public function profile_following()
	{
		$data=$this->session->userdata('user');
		
		$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
		
		$data['follow']=$this->Artist_Model->get_all_followers($data['pro'][0]['int_artist_id']);
		
		$data['following']=$this->Artist_Model->get_all_following($data['pro'][0]['int_artist_id']);
		//print_r($data['following']);exit;
	    //print_r($data['following']['abc'][0]['int_artist_id']);exit;
		$data['page']='profile_following';
		$data['page_title']='Profile-following';
        $this->load->view('public/page',$data);
	}
	public function delete_following($id)           
		{
			
			$data=$this->session->userdata('user');
			$data['pro']=$this->Artist_Model->get_profile_detail($data['txt_email']);
			//print_r($data['pro'][0]['int_artist_id']);exit;
			$executed=$this->Artist_Model->delete_following($id,$data['pro'][0]['int_artist_id']);
			//print_r($executed);exit;
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
		//echo"<pre>"; print_r($valid_login); die();
                //echo "login";die;
		if($valid_login)
		{
			
	   	   $this->session->set_userdata('user',$valid_login);
		  redirect('User','refresh');
		  //$this->load->view('User/profile');
	   }
	   else
	   {
	   	//echo "usernmae & password wrong ";
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
     //echo $user['int_artist_id'];die;
     //echo $this->session['int_artist_id'];die;
     $data['page']='view_profile';
     $data['pro']=$this->Artist_Model->profile_view($id);
    $this->load->view('public/page',$data);
   //print_r($data);
 
 }    

	 public function add_comment()
	{
		$abc=$this->input->post('comment');
		//print_r($data);
		$data['details']=$this->Artist_Model->add_comment($abc);
		echo json_encode($data['details']);	
		//print_r($data['details']);exit;

		/*$html .= ""
		
		$html .=  $in_parent == 0 ? "<ul class='tree'>" : "<ul>";
        
        $html .= " <li class='comment_box'>
            <div class='aut'>".$re['comment_name']."</div>
            <div class='aut'>".$re['comment_email']."</div>
            <div class='comment-body'>".$re['comment_body']."</div>
            <div class='timestamp'>".date("F j, Y", $re['comment_created'])."</div>
            <a  href='#comment_form' class='reply' id='" . $re['comment_id'] . "'>Replay </a>";
                $html .=$this->in_parent($re['comment_id'],$ne_id, $store_all_id);
                $html .= "</li>";
        
            $html .=  "</ul>";*/
		//echo json_encode($data['details']);		
	}
    


}
