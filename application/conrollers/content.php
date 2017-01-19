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
        $this->load->view('artist/page',$data);
    }		
	
	function listcontest(){	
		$this->load->model('contest_model');
        $data['list']=$this->contest_model->allActiveContestlist();
		$data['page_title']='Contest List';        
		$data['page']='listContest';        
		$this->load->view('artist/page',$data);		
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
        if($artist_id){
            $this->load->model('user_model');
            $data['user_details']=$this->user_model->getArtistBasicDetails($artist_id);
            $data['business_details']=$this->user_model->getArtistBusinessDetails($artist_id);
            $data['media_details']=$this->user_model->getArtistMedia($artist_id);
            $data['social_details']=$this->user_model->getArtistLinks($artist_id);
            $data['page_title']='Artist Profile';
            $data['page']='artistProfile';
            $this->load->view('artist/page',$data);
        }else{
            redirect('/content/home/','refresh');
        }
    }

    function blogList(){
        $data['page_title']='Blog';
        $data['page']='bloglist';
        $this->load->view('artist/page',$data);
    }



//////////////////////////////////////////////Created By Me/////////////////////////////////////////////////////

function showcontest(){ 
        $this->load->model('contest_model');
        $data['list']=$this->contest_model->allActiveContestlist();
        $data['page_title']='Contest List';        
        $data['page']='showContest';        
        $this->load->view('artist/page',$data);     
    }

}






?>