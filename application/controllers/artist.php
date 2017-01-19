<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Artist extends CI_Controller{
	public $user;
    function __construct()
    {
        parent::__construct();
        $user=$this->session->userdata('user');
        // if(!isset($user) || $user=='' || $user['int_user_type_code']!='artist'){
        if(!isset($user) || $user==''){
            redirect('user/login', 'refresh');  
            die();
        }
		$this->user=$this->session->userdata('user');
    }
       
    function dashboard(){
		$session_arr=$this->session->userdata('user');
        $this->load->model('location_model');
        $this->load->model('user_model'); 
        $this->load->model('fields_model');
		$this->load->model('follow_model');
		$this->load->model('post_model');
		$artist_id=$session_arr['int_artist_id'];
		$data['user_details']=$this->user_model->getArtistBasicDetails($artist_id);
		$data['directory']=$this->fields_model->allActiveDirectorylist();
		$data['display_details']=$this->user_model->getArtistShowDetails($artist_id);
        $data['countries']=$this->location_model->get_all_countries();
		$data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['user_details']['int_skill1'],$data['user_details']['int_skill2'],$data['user_details']['int_skill3'],$data['user_details']['int_skill4'],$data['user_details']['int_skill5']);
		$data['business_details']=$this->user_model->getArtistBusinessDetails($artist_id);
		$data['followers']=$this->follow_model->getFollowerList($artist_id);
		$data['media_details']=$this->user_model->getArtistNoAlbumMedia($artist_id);
		$data['album_details']=$this->user_model->getArtistAlbum($artist_id);
		$data['post_list']=$this->post_model->getArtistPost($artist_id);
        //echo "<pre>";print_r($data);die();
		$data['page_title']='Dashboard';
        $data['page']='myaccount';
        $this->load->view('artist/page',$data);
    }		
	
	function addPost(){
		$session_arr=$this->session->userdata('user');
		$this->load->model('post_model');
		if($this->input->post('post_description')){
			$this->post_model->addPost();	
		}
		redirect('/artist/dashboard/','refresh');
		
	}
	
	function addContest(){		
		$this->load->model('contest_model');		
		$this->load->model('fields_model');		        
		$this->form_validation->set_rules('txt_contest_name', 'Contest Name', 'required');        
		$this->form_validation->set_rules('txt_budget', 'Price', 'required');        
		if($this->form_validation->run()){                   
			$this->contest_model->addContest();     
			redirect('/artist/myContest/','refresh');			
		}else{			
			$data['skills']=$this->fields_model->allActiveDirectorylist();			
			$data['page_title']='Add Contest';			
			$data['page']='addContest';			
			$this->load->view('artist/page',$data);					
		}	
	}		
	
	

    function accountDetails(){
        $session_arr=$this->session->userdata('user');
        $this->load->model('location_model');
        $this->load->model('user_model'); 
        $this->load->model('fields_model');        
        $data['user_details']=$this->user_model->getArtistDetails($session_arr['int_artist_id']);
		$data['display_details']=$this->user_model->getArtistShowDetails($session_arr['int_artist_id']);
        $data['business_details']=$this->user_model->getArtistBusinessDetails($session_arr['int_artist_id']);
        $data['directory']=$this->fields_model->allActiveDirectorylist();
        $data['countries']=$this->location_model->get_all_countries();
        if($data['user_details']['int_country_id']) $data['states']=$this->location_model->getStatesByCountry($data['user_details']['int_country_id']);
        if($data['user_details']['int_state_id']) $data['cities']=$this->location_model->getCityByState($data['user_details']['int_state_id']);
        // print_r($data['user_details']);die();
        $data['page_title']='Account Details';
        $data['page']='account_details';
        $this->load->view('artist/page',$data);
    }

    function saveBusinessDetails(){
        $session_arr=$this->session->userdata('user');
        $formdata=$this->input->post();
        if($formdata['txt_name']!=''){
            $data=array(
                'txt_name'=>$formdata['txt_name'],
                'txt_description'=>$formdata['txt_description'],
                'txt_reg_city'=>$formdata['txt_reg_city'],
                'int_registered_year'=>$formdata['txt_registered_year'],
                'txt_website'=>$formdata['txt_website'],
                'int_artist_id'=>$session_arr['int_artist_id']
            );
            $this->db->insert('tab_artist_business',$data);
            echo $this->db->insert_id();
        }
    }
    
    function updateArtistdetails(){
        // echo "<pre>";print_r($this->input->post());print_r($_FILES);die();
        $this->load->model('user_model');
        $this->form_validation->set_rules('txt_fname', 'First Name', 'required');
        if($this->form_validation->run())
        {       
            $this->user_model->artistUpdatedetails();
            
        }
        redirect('/artist/dashboard/', 'refresh'); 
    }

    function porfolioUpload(){
        $sess_array=$this->session->userdata('user');
        $artistId=$sess_array['int_artist_id'];
        if($_FILES['files']['name']!=''){
            if (($_FILES["files"]["type"][0] == "image/jpeg") || ($_FILES["files"]["type"][0] == "image/jpg")|| ($_FILES["files"]["type"][0] == "image/png")){
                $ext=explode(".",$_FILES["files"]["name"][0]);       
                $filename=$artistId."_".date('YmdHis');
                $imgtype=$_FILES["files"]["type"][0];
                $file_name=$filename.".".$ext[count($ext)-1];
                $filepath="artist_media/media/".$file_name;
                move_uploaded_file($_FILES['files']['tmp_name'][0],$filepath);
                
                $data=array(
                    'txt_path'=>$filepath,
                    'int_artist_id'=>$artistId,
                    'int_type'=>1
                    );
                $this->db->insert('tab_artist_media',$data);
            }
        }
    }

    function removeBusinessDetails(){
        $session_arr=$this->session->userdata('user');
        $id=$this->input->post('id',true);
        if($id){
            $this->db->delete("tab_artist_business",array('int_business_id'=>$id,'int_artist_id'=>$session_arr['int_artist_id']));
            echo "success";
        }else{
            echo "failed";
        }
    }

    function saveSocialLinks(){
        $session_arr=$this->session->userdata('user');
        $formdata=$this->input->post();
        if($formdata['txt_title']!='' && $formdata['txt_url']!=''){
            $data=array(
                'txt_title'=>$formdata['txt_title'],
                'txt_url'=>$formdata['txt_url'],
                'int_artist_id'=>$session_arr['int_artist_id']
            );
            $this->db->insert('tab_artist_links',$data);
            echo $this->db->insert_id();
        }
    }

    function removeSocialLinks(){
        $session_arr=$this->session->userdata('user');
        $id=$this->input->post('id',true);
        if($id){
            $this->db->delete("tab_artist_links",array('int_unique_id'=>$id,'int_artist_id'=>$session_arr['int_artist_id']));
            echo "success";
        }else{
            echo "failed";
        }
    }

    function accountPortfolio(){
        $session_arr=$this->session->userdata('user');
        $this->load->model('user_model');        
        $data['media_details']=$this->user_model->getArtistNoAlbumMedia($session_arr['int_artist_id']);
		$data['album_details']=$this->user_model->getArtistAlbum($session_arr['int_artist_id']);
        $data['page_title']='Account Details';
        $data['page']='account_portfolio';
        $this->load->view('artist/page',$data);
    }

    function accountSocial(){
        $session_arr=$this->session->userdata('user');
        $this->load->model('user_model');        
        $data['media_details']=$this->user_model->getArtistLinks($session_arr['int_artist_id']);
        $data['page_title']='Social Links';
        $data['page']='account_social';
        $this->load->view('artist/page',$data);
    }

    function removeArtistMedia(){
        $session_arr=$this->session->userdata('user');
        $media_id=$this->input->post('id');
        if($media_id){
            $this->db->delete('tab_artist_media',array('int_media_id'=>$media_id,'int_artist_id'=>$session_arr['int_artist_id']));
            echo "Success";
        }else{
            echo "Failed";
        }
    }
	
	function removeArtistAlbum(){
        $session_arr=$this->session->userdata('user');
        $album_id=$this->input->post('id');
        if($album_id){
            $this->db->delete('tab_album',array('int_album_id'=>$album_id,'int_artist_id'=>$session_arr['int_artist_id']));
            $data=array('int_album_id'=>0);
			$this->db->where('int_album_id',$album_id);
			$this->db->where('int_artist_id',$session_arr['int_artist_id']);
			$this->db->update('tab_artist_media',$data);
			echo "Success";
        }else{
            echo "Failed";
        }
    }
	
	function createAlbum(){
		$this->load->model('user_model');	        
		$this->form_validation->set_rules('txt_name', 'Album Name', 'required');     
		if($this->form_validation->run()){                   
			$this->user_model->createAlbum();     
			redirect('artist/dashboard','refresh');			
		}else{			
			redirect('artist/dashboard','refresh');				
		}	
	}
	
	function editAlbum(){
		$this->load->model('user_model');
		$this->load->library('user_agent');		
		$this->form_validation->set_rules('int_album_id', 'Album Name', 'required');     
		if($this->form_validation->run()){                   
			$this->user_model->editAlbum(); 
			redirect($this->agent->referrer());						
		}else{			
			redirect($this->agent->referrer());					
		}	
	}
	
	function myAlbum($slug){
		if($slug){
			$session_arr=$this->session->userdata('user');
			$this->load->model('user_model');        
			$data['no_album_media_details']=$this->user_model->getArtistNoAlbumMedia($session_arr['int_artist_id']);
			$data['media_details']=$this->user_model->getArtistAlbumMedia($slug,$session_arr['int_artist_id']);
			$data['album_details']=$this->user_model->getAlbumDetails($slug);
			$data['page_title']='My Album';
			$data['page']='myalbum';
			$this->load->view('artist/page',$data);
		}else{
			redirect('artist/accountPortfolio','refresh');	
		}
	}
	
	function follow($userId){
		$this->load->library('user_agent');
		$this->load->model('follow_model');
		if($userId){
			$checkFollow=$this->follow_model->getFollowStatus($userId);
			if(count($checkFollow)==0){
				$this->follow_model->followUser($userId);
				redirect($this->agent->referrer());
			}else{
				redirect($this->agent->referrer());
			}
		}else{
			redirect($this->agent->referrer());
		}
	}
	
	function unfollow($userId){
		$this->load->library('user_agent');
		$this->load->model('follow_model');
		if($userId){
			$checkFollow=$this->follow_model->getFollowStatus($userId);
			if(count($checkFollow)>0){
				$this->follow_model->unfollowUser($userId);
				redirect($this->agent->referrer());
			}else{
				redirect($this->agent->referrer());
			}
		}else{
			redirect($this->agent->referrer());
		}
	}

    function accountStatistics(){
        $session_arr=$this->session->userdata('user');
        $this->load->model('artistview_model');        
        $data['view_details']=$this->artistview_model->getArtistViews($session_arr['int_artist_id']);
        $data['page_title']='Profile Statistics';
        $data['page']='account_statistics';
        $this->load->view('artist/page',$data);
    }
	
	//////////////////////////////////////////////Created By Me/////////////////////////////////////////////////////

function viewcontest(){ 
        $this->load->model('contest_model');
        $this->load->model('fields_model');
        $this->load->model('user_model'); 
        $data['list']=$this->contest_model->getContestByOwner($_GET['id']);
        //print_r($data['list']);
        $data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['list'][0]['int_skill1'],$data['list'][0]['int_skill2'],$data['list'][0]['int_skill3'],$data['list'][0]['int_skill4'],$data['list'][0]['int_skill5']);

        $data['participated']= $this->contest_model->getContestParticipant($_GET['id']);
		$data['requests']= $this->contest_model->getContestRequest($_GET['id']);
		//echo "<pre>";print_r($data);die();
        $data['media_details']= $this->contest_model->getContestMedia($_GET['id']);
        $data['page_title']='Contest List';        
        $data['page']='viewContest';        
        $this->load->view('artist/page',$data);     
    }

/////////////////////////////////////////////////////Created By Kavita/////////////////////////////////////////

    function manageContest(){ 
        $this->load->model('contest_model');
        $this->load->model('fields_model');
        $i=0;
        $response_data = array();
       // $data['list'] = $this->contest_model->allActiveContestlist();
        $data_list =$this->contest_model->allloginActiveContestlist($this->user['int_artist_id']);
        foreach($data_list as $value) {
                $skill = $this->fields_model->allShowActiveDirectorylist($value['int_skill1'],$value['int_skill2'],$value['int_skill3'],$value['int_skill4'],$value['int_skill5']);
                $response_data[$i]["int_contest_id"] = $value["int_contest_id"];
                $response_data[$i]["txt_contest_name"] = $value["txt_contest_name"];
                $response_data[$i]["dt_start_date"] = $value["dt_start_date"];
                $response_data[$i]["dt_last_date"] = $value["dt_last_date"];
                $response_data[$i]["txt_budget"] = $value["txt_budget"];
                $response_data[$i]["int_created_by"] = $value["int_created_by"];
                $response_data[$i]["int_status"] = $value["int_status"];
                $response_data[$i]["skills"] = $skill[0]['skill_name'];
                $i++;   
        }
        $data['list'] = $response_data;
        $data['page_title']='Manage Contest List';        
        $data['page']='manageContest';        
        $this->load->view('artist/page',$data);     
    }
    function updateparticipate($id){ 
       // echo "<pre>";print_r($this->input->post());
        $formdata=$this->input->post();
        extract($formdata);
        $data=array(
            'int_contest_id'=>$id,
            'int_artist_id'=>$this->user['int_artist_id'],
            'int_status'=> 0
            );
        $this->db->insert('tab_invites',$data);
        echo $invites_id=$this->db->insert_id();
    }
	function updateparticipateac(){ 
		$this->load->model('contest_model');		
        $formdata=$this->input->post();
        extract($formdata);
		$owner=$this->contest_model->getContestOwner($id);
		if($this->user['int_artist_id']==$owner['int_created_by']){
			$data=array(
				'int_status'=> 1
				);
			$this->db->where('int_artist_id',$artist_id);
			$this->db->where('int_contest_id',$id);
			$this->db->update('tab_invites',$data);
			echo "Success";
		}else{
			echo "Failed";
		}
    }

    function updateparticipaterj($id,$name){
		$this->load->model('contest_model');		
        $formdata=$this->input->post();
        extract($formdata);
		$owner=$this->contest_model->getContestOwner($id);
		if($this->user['int_artist_id']==$owner['int_created_by']){
			$data=array(
				'int_status'=> 2
				);
			$this->db->where('int_artist_id',$artist_id);
			$this->db->where('int_contest_id',$id);
			$this->db->update('tab_invites',$data);
			echo "Success";
		}else{
			echo "Failed";
		}
    }
	
	function submitContest(){
		$this->load->model('contest_model');
		$this->load->library('user_agent');
        $this->form_validation->set_rules('txt_description', 'Description', 'required');
		$this->form_validation->set_rules('int_contest_id', 'Contest', 'required');
        if($this->form_validation->run())
        {       
            $this->contest_model->submitContest();            
        }
        	
		redirect($this->agent->referrer());
	}
	
	function addComment(){
		$this->load->model('contest_model');
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_rules('id', 'Contest', 'required');
        if($this->form_validation->run())
        {       
            $this->contest_model->addComment();   
			echo "Success";	
        }else{
			echo "Failed";
		}
	}
	
	function addMediaComment(){
		$this->load->model('user_model');
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_rules('id', 'Media', 'required');
        if($this->form_validation->run())
        {       
            $this->user_model->addMediaComment();   
			echo "Success";	
        }else{
			echo "Failed";
		}
	}
	
	function addPostComment(){
		$this->load->model('post_model');
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_rules('id', 'Post', 'required');
        if($this->form_validation->run())
        {       
            $this->post_model->addPostComment();   
			echo "Success";	
        }else{
			echo "Failed";
		}
	}
	
	function voteSubmission(){
		$this->load->model('contest_model');
		$this->form_validation->set_rules('id', 'Contest', 'required');
		$session_arr=$this->session->userdata('user');
        if($this->form_validation->run())
        {   
			$formdata=$this->input->post('id');
			$voteExist=$this->contest_model->getVoteByUser($formdata['id'],$session_arr['int_artist_id']);
            if(count($voteExist)==0){
				$this->contest_model->voteSubmission($formdata['id'],$session_arr['int_artist_id']);   
				echo "Success";
			}else{
				echo "Already Voted";
			}
        }else{
			echo "Failed";
		}
	}

    function myContest(){       
        $this->load->model('contest_model');
        $this->load->model('fields_model');
        $i=0;
        $response_data = array();
       // $data['list'] = $this->contest_model->allActiveContestlist();
        $data_list =$this->contest_model->myContestlist();
        foreach($data_list as $value) {
                $skill = $this->fields_model->allShowActiveDirectorylist($value['int_skill1'],$value['int_skill2'],$value['int_skill3'],$value['int_skill4'],$value['int_skill5']);
                $response_data[$i]["int_contest_id"] = $value["int_contest_id"];
                $response_data[$i]["txt_contest_name"] = $value["txt_contest_name"];
                $response_data[$i]["dt_start_date"] = $value["dt_start_date"];
                $response_data[$i]["dt_last_date"] = $value["dt_last_date"];
                $response_data[$i]["txt_budget"] = $value["txt_budget"];
                $response_data[$i]["int_created_by"] = $value["int_created_by"];
                $response_data[$i]["int_status"] = $value["int_status"];
                $response_data[$i]["skills"] = $skill[0]['skill_name'];
                $i++;   
        }
        $data['list'] = $response_data;       
        $data['page_title']='My Contest';       
        $data['page']='myContest';      
        $this->load->view('artist/page',$data); 
    }

}
