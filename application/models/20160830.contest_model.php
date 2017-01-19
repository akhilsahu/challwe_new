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
			'dt_created_on'=>date('Y-m-d H:i:s'),
			'int_created_by'=>$user['int_artist_id'],
			'dt_start_date'=>date('Y-m-d H:i:s',strtotime($dt_start_date)),
			'dt_last_date'=>date('Y-m-d H:i:s',strtotime($dt_end_date)),
			'int_status'=>0,
			'int_winner1'=>0,
			'int_winner2'=>0,
			'int_winner3'=>0
		);
		$this->db->insert('tab_contest',$data);
		$contestId=$this->db->insert_id();
		
		mkdir("contest_documents/".$contestId);	
		$arr=array();
		for($i=0;$i<count($_FILES['image_file']['name']);$i++){	
			if($_FILES['image_file']['name'][$i]!=''){
				$allowedtype=array("image/jpg","image/png","image/jpeg");
				
				if (in_array($_FILES["image_file"]["type"][$i],$allowedtype)){
					$ext=explode(".",$_FILES["image_file"]["name"][$i]);		
					$filename=date('Ymdhis').$i;
					$imgtype=$_FILES["image_file"]["type"][$i];
					$file_name="contest_documents/".$contestId."/".$filename.".".$ext[count($ext)-1];
					move_uploaded_file($_FILES['image_file'][tmp_name][$i],$file_name);
					$arr[]=$file_name;
				}
				
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



	function allActiveContestlist($id='',$limit=10,$offset=0){

	$sql="select a.*,  c.int_status from ".$this->table."  as a  
			LEFT JOIN tab_invites c ON a.int_contest_id = c.int_contest_id
			where a.int_status=0 and a.dt_last_date> '".date('Y-m-d H:i:s')."'";
			if($id) $sql .= " and  a.int_contest_id=".$_GET['id'];
		$sql.=" order by dt_created_on desc";
		//if($limit!='') $sql.=" Limit ".$limit." offset ".$limit;


		
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

	

}



?>