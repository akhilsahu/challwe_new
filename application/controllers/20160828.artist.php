<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Artist extends CI_Controller{
	
    function __construct()
    {
        parent::__construct();
        $user=$this->session->userdata('user');
        // if(!isset($user) || $user=='' || $user['int_user_type_code']!='artist'){
        if(!isset($user) || $user==''){
            redirect('user/login', 'refresh');  
            die();
        }
    }
       
    function dashboard(){
        $data['page_title']='Dashboard';
        $data['page']='myaccount';
        $this->load->view('artist/page',$data);
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
	
	function myContest(){		
		$this->load->model('contest_model');		
		$data['page_title']='My Contest';		
		$data['page']='myContest';		
		$this->load->view('artist/page',$data);	
	}

    function accountDetails(){
        $session_arr=$this->session->userdata('user');
        $this->load->model('location_model');
        $this->load->model('user_model'); 
        $this->load->model('fields_model');        
        $data['user_details']=$this->user_model->getArtistDetails($session_arr['int_artist_id']);
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
        $this->form_validation->set_rules('txt_lname', 'Last Name', 'required');
        if($this->form_validation->run())
        {       
            $this->user_model->artistUpdatedetails();
            
        }
        redirect('/artist/accountDetails/', 'refresh'); 
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
        $data['media_details']=$this->user_model->getArtistMedia($session_arr['int_artist_id']);
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

    function accountStatistics(){
        $session_arr=$this->session->userdata('user');
        $this->load->model('artistview_model');        
        $data['view_details']=$this->artistview_model->getArtistViews($session_arr['int_artist_id']);
        $data['page_title']='Profile Statistics';
        $data['page']='account_statistics';
        $this->load->view('artist/page',$data);
    }

/////////////////////////////////////////////////////Created By Kavita/////////////////////////////////////////

    function manageContest(){ 
        $this->load->model('contest_model');
        $data['list']=$this->contest_model->allManageContestlist();
        $data['page_title']='Manage Contest List';        
        $data['page']='manageContest';        
        $this->load->view('artist/page',$data);     
    }
    function updateparticipate($id,$name){
       // echo "<pre>";print_r($this->input->post());
        $formdata=$this->input->post();
        extract($formdata);
        $data=array(
            'int_contest_id'=>$id,
            'int_artist_id'=>$artist_id,
            'int_status'=> 1

            );
        $this->db->insert('tab_invites',$data);
        echo $invites_id=$this->db->insert_id();
    }

}