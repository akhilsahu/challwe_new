<?php

class User extends CI_Controller{

	public $user;

	function User(){

		parent::__construct();

		$this->load->database();

		$this->load->model('user_model');

		$this->user=$this->session->userdata('user');

		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	}

	public function facebooklogin(){

		$this->load->library('facebook'); // Automatically picks appId and secret from config
		$user = $this->facebook->getUser();  
		$this->load->library('user_agent');
		if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                $status_array['txt_fname']=$data['user_profile']['name'];
                $status_array['logged_in']="1";
                $status_array['int_user_type']="2";
				$status_array['int_user_type_code']="artist";
				$status_array['login_type']="facebook";
				$this->session->set_userdata('user', $status_array);
				redirect($this->agent->referrer());

            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }
        if ($user) {
            $data['logout_url'] = site_url('user/facebooklogout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('user/facebooklogin'), 
                'scope' => array("email","public_profile") // permissions here
            ));
        }
        //$this->load->view('login',$data);
	}

	function facebooklogout(){
		$this->load->library('facebook');
        $this->facebook->destroySession();
        $this->session->unset_userdata('user');
		$this->session->sess_destroy();
        redirect('content/home');
	}

	function login(){

		$this->load->library('facebook'); // Automatically picks appId and secret from config
	 	$data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('user/facebooklogin'), 
                'scope' => array("email") // permissions here
            ));
		
		$data['page_title']='Login';
        $data['page']='login';
        $this->load->view('artist/page',$data);
    	
	}

	function loginSub(){
		$this->load->model('user_model');
		$this->load->library('user_agent');		
        $this->form_validation->set_rules('txt_email', 'Email', 'required');
        $this->form_validation->set_rules('txt_password', 'Password', 'required');
        if($this->form_validation->run())
        {		
        	$formdata=$this->input->post();
			$status_array=$this->user_model->verifyArtist($formdata);
			if(count($status_array)>0)
			{
				$status_array['logged_in']="1";	
				$status_array['int_user_type']="2";
				$status_array['int_user_type_code']="artist";
				$status_array['login_type']="web";
				$this->session->set_userdata('user', $status_array);
				redirect($this->agent->referrer());
			}
			else
			{
				redirect($this->agent->referrer());
			}
        }else{
        	redirect($this->agent->referrer());
        }
	}

	function registerSub(){
		$this->load->model('user_model');
        $this->form_validation->set_rules('txt_fname', 'First Name', 'required');
        $this->form_validation->set_rules('txt_email', 'Email', 'required');
        $this->form_validation->set_rules('txt_password', 'Password', 'required');
        $this->form_validation->set_rules('con_password', 'Password', 'required');

        if($this->form_validation->run())
        {		
        	$formdata=$this->input->post();
			if($formdata['txt_password']==$formdata['con_password']){
				$status_array=$this->user_model->registerArtist($formdata);
				$this->sendWelcomeMail($formdata['txt_email'],$formdata['txt_fname'],$formdata['txt_password']);
				redirect('content/home', 'refresh');			
			}else{
				redirect('content/home', 'refresh');
			}
        }else{
        	redirect('content/home', 'refresh');
        }
	}

	function sendWelcomeMail($email,$fname,$pass){
		$name=$fname;
		$html="Hi ".$name."<br>";		
		$html.="Welcome to Challwe.You have successfully created your account.<br><br>";
		$html.="Please Login to your account from below link.<br>";
		$html.="Login Url:".site_url()."<br><br>";
		$html.="Regards<br>";
		$html.="Challwe Team<br>";
		
		$subject="Welcome to Challwe";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($email,$subject,$html,$headers);
	}

	function adminlogin()
	{
		$user_id=$this->session->userdata('user');
		if(isset($user_id) && $user_id!='')
		{
			//echo "hello";exit;			
			redirect('user/dashboard', 'refresh');
		}
		else
		{
			$this->load->view('admin/login');	
		}
	}



	function loginadmin(){



		$response_data=array();

		if($this->input->post()){

			$formdata=$this->input->post();

			$status_array=$this->user_model->verifyUser($formdata);

			if(count($status_array)>0)

			{
				$status_array['logged_in']="1";
				$status_array['login_type']="web";
				$this->session->set_userdata('user', $status_array);

				redirect('user/dashboard', 'refresh');

			}

			else

			{

				redirect('user/adminlogin', 'refresh');			

			}

		}else{

			redirect('user/adminlogin', 'refresh');

		}

	}



	function dashboard()

	{

		$user=$this->session->userdata('user');

		if(isset($user['int_user_id']) && $user['int_user_id']!='')

		{

			$data["page"]="dashboard";

			$this->load->view('admin/page',$data);	

		}

		else

		{

			$this->load->view('login');	

		}	

	}



	function changeStatus(){



		if($this->input->post('int_lead_id') && $this->input->post('int_is_followup')){

			$data=array(

					'int_is_followup'=>$this->input->post('int_is_followup')

				);

			$this->db->where('int_lead_id',$this->input->post('int_lead_id'));

			$this->db->update('tab_leads',$data);

			echo  "Success";

		}else{

			echo  "Invalid Request";

		}

	}


	function profile()

	{

		$user=$this->session->userdata('user');

		if(isset($user['int_user_id']) && $user['int_user_id']!='')

		{

			$data["page"]="profile";

			$this->load->view('page',$data);	

		}

		else

		{

			$this->load->view('login');	

		}	

	}



	function profile_update()

	{

		$data=$this->input->post();

		

		$data['file_name']='';

		if($_FILES['profile_image']['name']!='')

		{

			if (($_FILES["profile_image"]["type"] == "image/gif") || ($_FILES["profile_image"]["type"] == "image/jpeg")|| ($_FILES["profile_image"]["type"] == "image/jpg")|| ($_FILES["profile_image"]["type"] == "image/pjpeg")|| ($_FILES["profile_image"]["type"] == "image/x-png")|| ($_FILES["profile_image"]["type"] == "image/png")){

				$ext=explode(".",$_FILES["profile_image"]["name"]);		

				$file_name=date("YmdHis").".".$ext[count($ext)-1];

				move_uploaded_file($_FILES['profile_image'][tmp_name],"uploads/".$file_name);

				$data['file_name']=$file_name;

			}

		}

		$status=$this->user_model->update($data,$this->user['int_user_id']);

		$data["page"]="profile";

		redirect('user/dashboard', 'refresh');

	}

	function signoutArt(){
		$user=$this->session->userdata('user');
		if($user['logged_in']==1){
			   $this->session->unset_userdata('user');
			   $this->session->sess_destroy();
			   redirect('content/home', 'refresh');
		}else{
			redirect('content/home', 'refresh');
		}
	}

	function signout()

	{

		$user=$this->session->userdata('user');

		if(isset($user['int_user_id']) && $user['int_user_id']!='')

		{

			   $this->session->unset_userdata('user');

			   $this->session->sess_destroy();

			   redirect('user/adminlogin', 'refresh');

		}

		else

		{

			redirect('user/adminlogin', 'refresh');

		}	

	}




}





?>