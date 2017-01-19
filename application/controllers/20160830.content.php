<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Content extends CI_Controller{
	public $datas = array();
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
                $response_data[$i]["skills"] = $skill[0]['skill_name'];
                $i++;   
        }
        $data['list'] = $response_data;

        
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

function viewcontest(){ 
        $this->load->model('contest_model');
        $this->load->model('fields_model');

        $data['list']=$this->contest_model->allShowActiveContest($_GET['id']);
        //print_r($data['list']);
        $data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['list'][0]['int_skill1'],$data['list'][0]['int_skill2'],$data['list'][0]['int_skill3'],$data['list'][0]['int_skill4'],$data['list'][0]['int_skill5']);
        $i=0;
        $response_data = array();
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
                $response_data[$i]["skills"] = $skill[0]['skill_name'];
                $i++;   
        }
        $data['participated']= $response_data;


        
        $data['page_title']='Contest List';        
        $data['page']='viewContest';        
        $this->load->view('artist/page',$data);     
    }


    function showcontest(){ 
        $this->load->model('contest_model');
        $this->load->model('fields_model');

        $data['list']=$this->contest_model->allShowActiveContest($_GET['id']);
        //print_r($data['list']);
        $data['getskill']=$this->fields_model->allShowActiveDirectorylist($data['list'][0]['int_skill1'],$data['list'][0]['int_skill2'],$data['list'][0]['int_skill3'],$data['list'][0]['int_skill4'],$data['list'][0]['int_skill5']);
        
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