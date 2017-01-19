<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Content extends CI_Controller{
	
    function __construct()
    {
            parent::__construct();
    }

    function home(){
    	$this->load->model('user_model');
        $this->load->model('fields_model');
        $data['directory']=$this->fields_model->allActiveDirectorylist();
        $data['page_title']='Industry Directory';
        $data['page']='home';
        $this->load->view('artist/page_home',$data);
    }		
	
	function postvideos($postId){
    	$this->load->model('follow_model');
        $this->load->model('post_model');
        $session_arr=$this->session->userdata('user');
		$data['post_detail']=$this->post_model->getPostDetailById($postId);
		$data['post_list']=$this->post_model->getArtistPost($data['post_detail']['int_artist_id']);
		if($session_arr['int_artist_id']) $data['is_follower']=$this->follow_model->getFollowStatus($data['post_detail']['int_artist_id']);
		//echo "<pre>";print_r($data);die();
        $data['page_title']='Post View';
        $data['page']='video-player';
        $this->load->view('artist/page',$data);
    }	
	
	function contest_download($contest_id,$sno){
		$this->load->model('contest_model');
		$data=$this->contest_model->getContestMedia($contest_id);	
		$data=json_decode($data[0]['txt_attachements']);
		$dir=base_url().$data[$sno-1];
		if($dir){
		   header('Pragma: public');
		   header('Cache-Control: public, no-cache');
		   header('Content-Type: application/octet-stream');
		   header('Content-Length: ' . filesize($dir));
		   header('Content-Disposition: attachment; filename="' . basename($dir) . '"');
		   header('Content-Transfer-Encoding: binary');

		   readfile($dir);
		}
	 }
	
	function listcontest(){	
		$this->load->model('contest_model');
        $this->load->model('fields_model');
        $i=0;
        $response_data = array();
       // $data['list'] = $this->contest_model->allActiveContestlist();
        $data_list =$this->contest_model->allActiveContestlist();
        foreach($data_list as $value) {
                $skill = $this->fields_model->allShowActiveDirectorylist($value['int_skill1'],$value['int_skill2'],$value['int_skill3'],$value['int_skill4'],$value['int_skill5']);
                $response_data[$i]["int_contest_id"] = $value["int_contest_id"];
                $response_data[$i]["txt_contest_name"] = $value["txt_contest_name"];
                $response_data[$i]["dt_start_date"] = $value["dt_start_date"];
                $response_data[$i]["dt_last_date"] = $value["dt_last_date"];
                $response_data[$i]["txt_budget"] = $value["txt_budget"];
                $response_data[$i]["int_created_by"] = $value["int_created_by"];
                $response_data[$i]["int_status"] = $value["int_status"];
				$response_data[$i]["user_status"] = $value["user_status"];
                $response_data[$i]["skills"] = $skill[0]['skill_name'];
                $i++;   
        }
        $data['list'] = $response_data;
        $data['page_title'] = 'Contest List';
        $data['page'] = 'listContest';
        $this->load->view('artist/page_home', $data);		
	}

     function searchlist(){
        if($this->input->post('search_directory')){
            $this->load->model('user_model');
            $data['artists']=$this->user_model->getDirectoryArtist();
            // print_r($data);die();
            $data['page_title']='Industry Directory';
            $data['page']='searchList';
            $this->load->view('artist/page',$data);
        }else{
            redirect('/content/home/','refresh');
        }   

    }

    function viewProfile($artist_id){
		$this->load->library('user_agent');	
		$this->load->model('fields_model');
		$this->load->model('follow_model');	
		$this->load->model('post_model');		
		//$this->load->library('encrypt');
		$session_arr=$this->session->userdata('user');
        if($artist_id){
			$data['is_follower']=array();
            $this->load->model('user_model');
            $data['user_details']=$this->user_model->getArtistBasicDetails($artist_id);
			$data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['user_details']['int_skill1'],$data['user_details']['int_skill2'],$data['user_details']['int_skill3'],$data['user_details']['int_skill4'],$data['user_details']['int_skill5']);
			$data['display_details']=$this->user_model->getArtistShowDetails($artist_id);
			$data['followers']=$this->follow_model->getFollowerList($artist_id);
			if($session_arr['int_artist_id']) $data['is_follower']=$this->follow_model->getFollowStatus($artist_id);
			$data['media_details']=$this->user_model->getArtistNoAlbumMedia($artist_id);
			$data['album_details']=$this->user_model->getArtistAlbum($artist_id);
			$data['post_list']=$this->post_model->getArtistPost($artist_id);
            //print_r($data['followers']);die();
			//$data['social_details']=$this->user_model->getArtistLinks($artist_id);
            $data['page_title']='Profile';
            $data['page']='artistProfile';
            $this->load->view('artist/page',$data);
        }else{
            redirect($this->agent->referrer());
        }
    }
	
	function viewFollowers($userId){
		$this->load->library('user_agent');	
		$this->load->model('fields_model');
		$this->load->model('follow_model');	
		$this->load->model('user_model');		
		//$this->load->library('encrypt');
		$session_arr=$this->session->userdata('user');
        if($userId){
			$data['followers']=$this->follow_model->getFollowerList($userId);
			$data['user_details']=$this->user_model->getArtistBasicDetails($userId);
			$data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['user_details']['int_skill1'],$data['user_details']['int_skill2'],$data['user_details']['int_skill3'],$data['user_details']['int_skill4'],$data['user_details']['int_skill5']);
			if($session_arr['int_artist_id']) $data['is_follower']=$this->follow_model->getFollowStatus($userId);
			//echo "<pre>";print_r($data);die();
			$data['page_title']='Artist Profile';
            $data['page']='viewFollowers';
            $this->load->view('artist/page',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}
	
	function viewPortfolio($userId){
		$this->load->library('user_agent');	
		$this->load->model('fields_model');
		$this->load->model('follow_model');	
		$this->load->model('user_model');		
		//$this->load->library('encrypt');
		$session_arr=$this->session->userdata('user');
        if($userId){
			$data['media_details']=$this->user_model->getArtistNoAlbumMedia($userId);
			$data['album_details']=$this->user_model->getArtistAlbum($userId);
			$data['user_details']=$this->user_model->getArtistBasicDetails($userId);
			$data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['user_details']['int_skill1'],$data['user_details']['int_skill2'],$data['user_details']['int_skill3'],$data['user_details']['int_skill4'],$data['user_details']['int_skill5']);
			if($session_arr['int_artist_id']) $data['is_follower']=$this->follow_model->getFollowStatus($userId);
			//echo "<pre>";print_r($data);die();
			$data['page_title']='Portfoilo';
            $data['page']='viewPortfolio';
            $this->load->view('artist/page',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}
	
	function showAlbum($userId,$slug){
		$this->load->library('user_agent');	
		$this->load->model('fields_model');
		$this->load->model('follow_model');	
		$this->load->model('user_model');		
		//$this->load->library('encrypt');
		$session_arr=$this->session->userdata('user');
        if($userId && $slug){
			$data['media_details']=$this->user_model->getArtistAlbumMedia($slug,$userId);
			$data['user_details']=$this->user_model->getArtistBasicDetails($userId);
			$data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['user_details']['int_skill1'],$data['user_details']['int_skill2'],$data['user_details']['int_skill3'],$data['user_details']['int_skill4'],$data['user_details']['int_skill5']);
			if($session_arr['int_artist_id']) $data['is_follower']=$this->follow_model->getFollowStatus($userId);
			//echo "<pre>";print_r($data);die();
			$data['page_title']='Album';
            $data['page']='showAlbum';
            $this->load->view('artist/page',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}

    function blogList(){
        $data['page_title']='Blog';
        $data['page']='bloglist';
        $this->load->view('artist/page',$data);
    }

	function showComment(){
		$this->load->model('contest_model');
		if($this->input->post('id')){
			$id=$this->input->post('id');
			$result=$this->contest_model->getSubmissionComments($id);
			$data['msg']="success";
			$data['result']=$result;
			$data['success']=true;
			echo json_encode($data);
		}else{
			$data['msg']="failed";
			$data['success']=true;
			echo json_encode($data);
		}
	}
	
	function getPhotoComments(){
		$this->load->model('user_model');
		if($this->input->post('id')){
			$id=$this->input->post('id');
			$result=$this->user_model->getMediaComments($id);
			$data['msg']="success";
			$data['result']=$result;
			$data['success']=true;
			echo json_encode($data);
		}else{
			$data['msg']="failed";
			$data['success']=true;
			echo json_encode($data);
		}
	}
	
	function getPostComments(){
		$this->load->model('post_model');
		if($this->input->post('id')){
			$id=$this->input->post('id');
			$result=$this->post_model->getPostComments($id);
			$data['msg']="success";
			$data['result']=$result;
			$data['success']=true;
			echo json_encode($data);
		}else{
			$data['msg']="failed";
			$data['success']=true;
			echo json_encode($data);
		}
	}
	
	function getPostSubComments(){
		$this->load->model('post_model');
		if($this->input->post('id') && $this->input->post('commentId')){
			$id=$this->input->post('id');
			$commentId=$this->input->post('commentId');
			$result=$this->post_model->getPostSubComments($id,$commentId);
			$data['msg']="success";
			$data['result']=$result;
			$data['success']=true;
			echo json_encode($data);
		}else{
			$data['msg']="failed";
			$data['success']=true;
			echo json_encode($data);
		}
	}

    function showcontest(){ 
      
        $this->load->model('contest_model');
        $this->load->model('fields_model');
		$user=$this->session->userdata('user');
        $data['list']=$this->contest_model->showContestDetails($_GET['id']);
        //print_r($data['list']);
        $data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['list'][0]['int_skill1'],$data['list'][0]['int_skill2'],$data['list'][0]['int_skill3'],$data['list'][0]['int_skill4'],$data['list'][0]['int_skill5']);

        $data['userContestStatus']= $this->contest_model->getUserContestStatus($_GET['id']);
		$data['is_Submitted']=array();
        if($user['int_artist_id'])$data['is_Submitted']=$this->contest_model->getUserContestSubmitDetails($user['int_artist_id']);
		
		$data['submission_details']= $this->contest_model->getContestSubmission($_GET['id']);
		//print_r($data['submission_details']);die();
        $data['page_title']='Contest List';        
        $data['page']='showContest';        
        $this->load->view('artist/page',$data);     
    }
    function updateparticipate($id){
		$this->load->model('contest_model');
        $data['list']=$this->contest_model->allActiveContestlist();
        $data['page_title']='Contest List';        
        $data['page']='showContest';        
        $this->load->view('artist/page',$data);    
}
 
       
      


}











?>
