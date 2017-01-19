<?php

class Contest_model extends CI_Model{



	public $table="tab_contest";


	/*
		int_status{
			0=>incomplete
			1=>Complete
		}
	*/


	function contest_model(){

		parent::__construct();

	}
	
	function addContest(){
		$formdata=$this->input->post();
		extract($formdata);
		$user=$this->session->userdata('user');
		
		$data=array(
			'txt_contest_name'=>$txt_contest_name,
			'txt_contest_description'=>$txt_description,
			'int_skill1'=>$int_skills[0],
			'int_skill2'=>$int_skills[1],
			'int_skill3'=>$int_skills[2],
			'int_skill4'=>$int_skills[3],
			'int_skill5'=>$int_skills[4],
			'txt_budget'=>$txt_budget,
			'int_status'=>0,
			'dt_created_on'=>date('Y-m-d H:i:s'),
			'int_created_by'=>$user['int_artist_id'],
			'dt_start_date'=>date('Y-m-d H:i:s',strtotime($dt_start_date)),
			'dt_last_date'=>date('Y-m-d H:i:s',strtotime($dt_end_date))
		);
		$this->db->insert('tab_contest',$data);
		$contestId=$this->db->insert_id();
		
		mkdir("contest_documents/".$contestId);	
		$arr=array();
		for($i=0;$i<count($_FILES['image_file']['name']);$i++){	
			if($_FILES['image_file']['name'][$i]!=''){
				//$allowedtype=array("image/jpg","image/png","image/jpeg");
				
				//if (in_array($_FILES["image_file"]["type"][$i],$allowedtype)){
					$ext=explode(".",$_FILES["image_file"]["name"][$i]);		
					$filename=date('Ymdhis').$i;
					$imgtype=$_FILES["image_file"]["type"][$i];
					$file_name="contest_documents/".$contestId."/".$filename.".".$ext[count($ext)-1];
					move_uploaded_file($_FILES['image_file'][tmp_name][$i],$file_name);
					$arr[]=$file_name;
				//}
				
			}
		}

		if(count($arr)>0){
			$val=json_encode($arr);
			$data1=array(
				'txt_attachements'=>$val
			);
			$this->db->where('int_contest_id',$contestId);
			$this->db->update('tab_contest',$data1);
		}
		
	}
	
	function getUserContestSubmitDetails($user){
		$sql="select * from tab_contest_submit where int_artist_id=".$user;
		$query=$this->db->query($sql);
		$result=$query->row_array();
		return $result;
	}
	
	function getContestSubmission($contestId){
		//$sql="select a.*,u.txt_fname,u.txt_lname,u.txt_profile_image from tab_contest_submit a inner join tab_artists u on a.int_artist_id=u.int_artist_id where a.int_contest_id=".$contestId;
		$sql="select a.*,u.txt_fname,u.txt_lname,u.txt_profile_image,(Select Count(*) from tab_contest_vote v where v.int_submission_id=a.int_unique_id ) as no_of_votes from tab_contest_submit a inner join tab_artists u on a.int_artist_id=u.int_artist_id where a.int_contest_id=".$contestId." order By no_of_votes desc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function addComment(){
		$formdata=$this->input->post();
		extract($formdata);
		$user=$this->session->userdata('user');
		$data=array(
				'int_artist_id'=>$user['int_artist_id'],
				'int_submission_id'=>$id,
				'txt_comment'=>$comment,
				'dt_commented_on'=>date('Y-m-d h:i:s')
			);
		$this->db->insert('tab_contest_comments',$data);	
	}
	
	function voteSubmission($submissionId,$user){
		$data=array(
				'int_submission_id'=>$submissionId,
				'int_artist_id'=>$user
			);
		$this->db->insert('tab_contest_vote',$data);	
	}
	
	function getVoteByUser($submissionId,$user){
		$sql="Select * from tab_contest_vote where int_submission_id=".$submissionId." And int_artist_id=".$user;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function getSubmissionComments($submissionId){
		$sql="Select a.*,u.txt_fname,u.txt_lname,u.txt_profile_image from tab_contest_comments a inner join tab_artists u on a.int_artist_id=u.int_artist_id where a.int_submission_id=".$submissionId." order by dt_commented_on asc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function submitContest(){
		$formdata=$this->input->post();
		extract($formdata);
		$user=$this->session->userdata('user');
		$alreadySubmit=$this->getUserContestSubmitDetails($user['int_artist_id']);
		$userStatus=$this->getUserContestStatus($int_contest_id);
		//print_r($alreadySubmit);echo "tttt";print_r($userStatus);die();
		if(count($alreadySubmit)==0 && $userStatus[0]['int_status']==1){
			$data=array(
					'int_artist_id'=>$user['int_artist_id'],
					'int_contest_id'=>$int_contest_id,
					'dt_submited_on'=>date('Y-m-d h:i:s'),
					'txt_description'=>$txt_description
				);
			$this->db->insert('tab_contest_submit',$data);	
			$submitId=$this->db->insert_id();
			
			mkdir("contest_submissions/".$int_contest_id);	
			$arr=array();
			for($i=0;$i<count($_FILES['image_file']['name']);$i++){	
				if($_FILES['image_file']['name'][$i]!=''){
					//$allowedtype=array("image/jpg","image/png","image/jpeg");
					
					//if (in_array($_FILES["image_file"]["type"][$i],$allowedtype)){
						$ext=explode(".",$_FILES["image_file"]["name"][$i]);		
						$filename=$submitId."_".date('Ymdhis').$i;
						$imgtype=$_FILES["image_file"]["type"][$i];
						$file_name="contest_submissions/".$int_contest_id."/".$filename.".".$ext[count($ext)-1];
						move_uploaded_file($_FILES['image_file'][tmp_name][$i],$file_name);
						$arr[]=$file_name;
					//}
					
				}
			}

			if(count($arr)>0){
				$val=json_encode($arr);
				$data1=array(
					'txt_attachments'=>$val
				);
				$this->db->where('int_contest_id',$int_contest_id);
				$this->db->where('int_artist_id',$user['int_artist_id']);
				$this->db->update('tab_contest_submit',$data1);
			}
			
		}
	}
	
	function myContestlist($limit=10,$offset=0){
		$session_arr=$this->session->userdata('user');
		$sql="select a.*,  c.int_status from ".$this->table."  as a  
			INNER JOIN tab_invites c ON a.int_contest_id = c.int_contest_id
			where c.int_status=1 and c.int_artist_id=".$session_arr['int_artist_id']." and a.dt_last_date> '".date('Y-m-d H:i:s')."'";
		$sql.=" order by dt_created_on desc";
		//if($limit!='') $sql.=" Limit ".$limit." offset ".$limit;
		
		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}
	
	function showContestDetails($id){ 
		$session_arr=$this->session->userdata('user');
		if($session_arr['int_artist_id']) $sql="select a.*,  (select d.int_status from tab_invites d where d.int_artist_id=".$session_arr['int_artist_id']." and d.int_contest_id=a.int_contest_id ) as user_status ";
		else $sql="select a.* ";
		$sql.=" from ".$this->table."  as a  
			LEFT JOIN tab_invites c ON a.int_contest_id = c.int_contest_id
			where a.int_contest_id=".$id;
		
		//echo $sql;die();
	
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function getContestParticipant($id){
		$sql=" select a.*,b.txt_fname,b.txt_lname,txt_profile_image from tab_invites a inner join tab_artists b on a.int_artist_id=b.int_artist_id where a.int_status=1 And a.int_contest_id=".$id;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function getContestOwner($id){
		$sql=" select a.int_created_by from tab_contest a where a.int_contest_id=".$id;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result[0];
	}
	
	function getContestRequest($id){
		$sql=" select a.*,b.txt_fname,b.txt_lname,txt_profile_image from tab_invites a inner join tab_artists b on a.int_artist_id=b.int_artist_id where a.int_status=0 And a.int_contest_id=".$id;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function getContestByOwner($id){
		$session_arr=$this->session->userdata('user');
		$sql="select a.* from ".$this->table."  as a  
			LEFT JOIN tab_invites c ON a.int_contest_id = c.int_contest_id
			where a.int_contest_id=".$id." And a.int_created_by=".$session_arr['int_artist_id'];
		
		//echo $sql;die();
	
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function getUserContestStatus($id){
		$session_arr=$this->session->userdata('user');
		if($session_arr['int_artist_id']){
			$sql="select int_status from tab_invites where int_artist_id=".$session_arr['int_artist_id']." and int_contest_id=".$id;
		
			$query=$this->db->query($sql);
			$result=$query->result_array();
			return $result;
		}
	}

	function allActiveContestlist($id='',$limit=10,$offset=0){
		$session_arr=$this->session->userdata('user');
		if($session_arr['int_artist_id']) $sql="select a.*,  (select d.int_status from tab_invites d where d.int_artist_id=".$session_arr['int_artist_id']." and d.int_contest_id=a.int_contest_id ) as user_status ";
		else $sql="select a.* ";
		$sql.=" from ".$this->table."  as a  
			LEFT JOIN tab_invites c ON a.int_contest_id = c.int_contest_id
			where a.int_status=0 and a.dt_last_date> '".date('Y-m-d H:i:s')."'";
			if($id) $sql .= " and  a.int_contest_id=".$_GET['id'];
		$sql.=" order by dt_created_on desc";
		//if($limit!='') $sql.=" Limit ".$limit." offset ".$limit;

		//echo $sql;die();
		
		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function allActiveDirectorylist(){

		$sql="select * from ".$this->table." where int_is_active=1 ";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function fieldsadd(){

		$formdata=$this->input->post();

		extract($formdata);

		$data=array(

			'txt_field_name'=>$txt_field_name,

			'txt_description'=>$txt_description,

			'int_is_active'=>1

			);

		$this->db->insert($this->table,$data);

		$field_id=$this->db->insert_id();



		if($_FILES['cover_image']['name']!=''){

			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")){

				$ext=explode(".",$_FILES["cover_image"]["name"]);		

				$filename=$field_id;

				$imgtype=$_FILES["cover_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="directory_media/".$file_name;

				move_uploaded_file($_FILES['cover_image']['tmp_name'],$filepath);

				// $data['txt_cover_image']=$filepath;					

				

				$data1=array(

						'txt_cover_image'=>$filepath

						);

				$this->db->where('int_field_id',$field_id);

				$this->db->update($this->table,$data1);

			}

		}

	}



	function fieldedit(){		

		$formdata=$this->input->post();

		extract($formdata);

		$data=array(

			'txt_field_name'=>$txt_field_name,

			'txt_description'=>$txt_description

			);

		if($_FILES['cover_image']['name']!=''){

			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")){

				$ext=explode(".",$_FILES["cover_image"]["name"]);		

				$filename=$int_field_id;

				$imgtype=$_FILES["cover_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="directory_media/".$file_name;

				move_uploaded_file($_FILES['cover_image']['tmp_name'],$filepath);

				$data['txt_cover_image']=$filepath;

			}

		}

		$this->db->where('int_field_id',$int_field_id);

		$this->db->update($this->table,$data);

	}



	function directorydelete($id){

		$this->db->delete($this->table,array('int_field_id'=>$id));

	}



	FUNCTION getFieldDetail($id){

		$sql="select * from ".$this->table." where int_field_id=".$id;

		$query=$this->db->query($sql);

		$result=$query->row_array();

		return $result;

	}

/////////////////////////////////////////Created By Me///////////////////////////////////////////////////////////////

	function allManageContestlist($limit=10,$offset=0){

	$sql="select * from ".$this->table." as a  LEFT JOIN tab_fields b ON a.int_skill1 = b.int_field_id

	 where a.int_status=0 and a.dt_last_date> '".date('Y-m-d H:i:s')."' ";
		
		$sql.=" order by dt_created_on desc";
		
		//if($limit!='') $sql.=" Limit ".$limit." offset ".$limit;


		
		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}


	function allShowActiveContest($id='',$limit=10,$offset=0){

	$sql="select a.*, b.*, c.int_status from ".$this->table."  as a  
			LEFT JOIN tab_fields b ON a.int_skill1 = b.int_field_id
			LEFT JOIN tab_invites c ON a.int_contest_id = c.int_contest_id
			where a.int_status=0 ";
			if($id) $sql .= " and  a.int_contest_id=".$_GET['id'];
		$sql.=" order by dt_created_on desc";
		
		//if($limit!='') $sql.=" Limit ".$limit." offset ".$limit;


		
		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}


	function allloginActiveContestlist($id='',$limit=10,$offset=0){

	 $sql="select a.*,  c.int_status from ".$this->table."  as a  
			LEFT JOIN tab_invites c ON a.int_contest_id = c.int_contest_id
			where  a.int_created_by=".$id;
		$sql.=" order by dt_created_on desc";
		//if($limit!='') $sql.=" Limit ".$limit." offset ".$limit;
		
		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}


	function getContestMedia($id){

		$sql="select txt_attachements from  tab_contest  where int_contest_id =$id";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}


	

}



?>
