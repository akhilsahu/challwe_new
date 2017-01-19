<?php

class User_model extends CI_Model{



	public $table="tab_users";

	public $table_artist="tab_artists";

	public $table_artist__business="tab_artist_business";

	public $table_artist_media="tab_artist_media";

	public $table_artist_links="tab_artist_links";



	function user_model(){

		parent::__construct();

	}



	function verifyUser($data){

		extract($data);

		$password=md5($password);

		$sql="select * from ".$this->table." where txt_email='".$username."' and txt_password='".$password."'  ";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result[0];

	}

	

	function verifyArtist($data){

		extract($data);

		$password=md5($txt_password);

		$sql="select txt_fname,txt_lname,txt_password,int_artist_id,txt_email,txt_profile_image,int_is_blocked,int_challwe_coins from ".$this->table_artist." where txt_email='".$txt_email."' and txt_password='".$password."' and int_is_blocked=0  ";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result[0];

	}



	function allArtistlist(){

		$sql="select a.* from ".$this->table_artist." a where 1 ";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function getDirectoryArtist(){

		$formdata=$this->input->post();

		$sql="Select * from ".$this->table_artist." where int_is_active=1 And int_is_blocked=0 And int_directory_id=".$formdata['search_directory'];

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function registerArtist($formdata){

		extract($formdata);

		$data=array(

			'txt_email'=>$txt_email,

			'txt_password'=>md5($txt_password),

			'txt_fname'=>$txt_fname,

			'txt_lname'=>$txt_lname,

			'dt_added'=>date('Y-m-d'),

			'int_is_active'=>1

			);

		$this->db->insert($this->table_artist,$data);

	}



	function Artistadd(){

		$sess_array=$this->session->userdata('logged_in');

		extract($this->input->post());

		// $user_id=$this->db->insert_id();



		$data=array(

			'txt_email'=>$txt_email,

			'txt_password'=>md5($txt_password),

			'txt_fname'=>$txt_fname,

			'txt_lname'=>$txt_lname,

			'dt_dob'=>date('Y-m-d',strtotime($dt_dob)),

			'txt_cell_no'=>$txt_cell_no,

			'int_country_id'=>$int_country_id,

			'int_state_id'=>$int_state_id,

			'int_city_id'=>$int_city_id,

			'txt_office_address'=>$txt_office_address,

			'txt_office_no'=>$txt_office_no,

			'int_directory_id'=>$int_directory_id,

			'txt_experience'=>$txt_experience,

			'txt_description'=>$txt_description,

			'txt_tagline'=>$txt_tagline,

			'txt_hourly_charge'=>$txt_hourly_charge,

			'txt_fashion_community_roles'=>$txt_fashion_community_roles,

			'txt_biographic_info'=>$txt_biographic_info,

			'dt_added'=>date('Y-m-d'),

			'int_is_active'=>1,

			'int_added_by'=>$sess_array['int_user_id']

			);

		$this->db->insert($this->table_artist,$data);

		$artistId=$this->db->insert_id();



		for($i=0;$i<count($b_txt_name);$i++){

			$data1[] =array(

			      'txt_name' => $b_txt_name[$i] ,

			      'txt_description' => $b_txt_description[$i] ,

			      'txt_reg_city' => $b_txt_reg_city[$i],

			      'int_registered_year'=>$b_int_registered_year[$i],

			      'txt_website'=>$b_txt_website[$i],

			      'int_artist_id'=>$artistId

			   );

		}

		$this->db->insert_batch($this->table_artist__business,$data1);



		$ext="";

		for($i=0;$i<count($_FILES['image_file']['name']);$i++){	

			if($_FILES['image_file']['name'][$i]!=''){

				if (($_FILES["image_file"]["type"][$i] == "image/jpeg") || ($_FILES["image_file"]["type"][$i] == "image/jpg")|| ($_FILES["image_file"]["type"][$i] == "image/png")){

					$ext=explode(".",$_FILES["image_file"]["name"][$i]);		

					$filename=$artistId."_".$i;

					$imgtype=$_FILES["image_file"]["type"][$i];

					$file_name=$filename.".".$ext[count($ext)-1];

					$filepath="artist_media/media/".$file_name;

					move_uploaded_file($_FILES['image_file'][tmp_name][$i],$filepath);



					$data=array(

						'int_artist_id'=>$artistId,

						'txt_path'=>$filepath,

						'int_type'=>1

						);

					$this->db->insert($this->table_artist_media,$data);



				}

			}

		}



		if($_FILES['profile_img']['name']!=''){

			if (($_FILES["profile_img"]["type"] == "image/jpeg") || ($_FILES["profile_img"]["type"] == "image/jpg")|| ($_FILES["profile_img"]["type"] == "image/png")){

				$ext=explode(".",$_FILES["profile_img"]["name"]);		

				$filename=$artistId;

				$imgtype=$_FILES["profile_img"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="artist_media/profile/".$file_name;

				move_uploaded_file($_FILES['profile_img'][tmp_name],$filepath);



				$data=array(

					'txt_profile_image'=>$filepath

					);

				$this->db->where('int_artist_id',$artistId);

				$this->db->update($this->table_artist,$data);



			}

		}



		if($_FILES['cover_image']['name']!=''){

			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png")){

				$ext=explode(".",$_FILES["cover_image"]["name"]);		

				$filename=$artistId;

				$imgtype=$_FILES["cover_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="artist_media/cover_image/".$file_name;

				move_uploaded_file($_FILES['cover_image'][tmp_name],$filepath);



				$data=array(

					'txt_cover_image'=>$filepath

					);

				$this->db->where('int_artist_id',$artistId);

				$this->db->update($this->table_artist,$data);



			}

		}

	}



	function allMemberlist(){

		$sql="select a.* from ".$this->table." a where int_user_type=3 ";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}





	function getUserDetails($user){

		$sql="select * from ".$this->table." where int_user_id=$user";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function getArtistDetails($user){

		$sql="select * from ".$this->table_artist." where int_artist_id=$user";

		$query=$this->db->query($sql);

		$result=$query->row_array();

		return $result;

	}



	function getArtistBasicDetails($user){

		$sql="select a.*,b.name as country_name,c.name as state_name,d.name as city_name from ".$this->table_artist." a left join countries b on a.int_country_id=b.id left join states c on a.int_state_id=c.id left join cities d on a.int_city_id=d.id  where int_artist_id=$user";

		$query=$this->db->query($sql);

		$result=$query->row_array();

		return $result;

	}



	function getArtistBusinessDetails($user){

		$sql="select a.*,c.name as reg_city from ".$this->table_artist__business." a left join cities c on a.txt_reg_city = c.id where int_artist_id=$user";
		//$sql="select a.*,c.name as reg_city from ".$this->table_artist__business." a left join cities c on a.txt_reg_city::integer = c.id where int_artist_id=$user";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function getArtistMedia($user){

		$sql="select * from ".$this->table_artist_media."  where int_artist_id=$user";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function getArtistLinks($user){

		$sql="select * from ".$this->table_artist_links."  where int_artist_id=$user";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}



	function artistdelete($id){

		$this->db->delete($this->table_artist,array('int_artist_id'=>$id));

	}



	function memberdelete($id){

		$this->db->delete($this->table,array('int_user_id'=>$id,'int_user_type'=>3));

	}



	function artistUpdatedetails(){

		$sess_array=$this->session->userdata('user');

		extract($this->input->post());
		
		$data=array(

			'txt_fname'=>$txt_fname,

			'txt_lname'=>$txt_lname,

			'dt_dob'=>date('Y-m-d',strtotime($dt_dob)),

			'txt_cell_no'=>$txt_cell_no,

			'int_country_id'=>$int_country_id,

			'int_state_id'=>$int_state_id,

			'int_city_id'=>$int_city_id,

			'txt_office_address'=>$txt_office_address,

			'txt_office_no'=>$txt_office_no,

			'int_directory_id'=>implode($int_directory_id,","),

			'txt_experience'=>$txt_experience,

			'txt_description'=>$txt_description,

			'txt_tagline'=>$txt_tagline,

			'txt_hourly_charge'=>$txt_hourly_charge,

			'txt_fashion_community_roles'=>$txt_fashion_community_roles,

			'txt_biographic_info'=>$txt_biographic_info

			);

			
		if($txt_password!=$sess_array['txt_password']) $data['txt_password']=md5($txt_password);



		//$artistId=$sess_array['int_artist_id'];
		$artistId = $hid_int_artist_id;

		$ext="";

		if($_FILES['profile_img']['name']!=''){

			if (($_FILES["profile_img"]["type"] == "image/jpeg") || ($_FILES["profile_img"]["type"] == "image/jpg")|| ($_FILES["profile_img"]["type"] == "image/png")){

				$ext=explode(".",$_FILES["profile_img"]["name"]);		

				$filename=$artistId;

				$imgtype=$_FILES["profile_img"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="artist_media/profile/".$file_name;

				move_uploaded_file($_FILES['profile_img']['tmp_name'],$filepath);

				$data['txt_profile_image']=$filepath;				

			}

		}



		if($_FILES['cover_image']['name']!=''){

			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png")){

				$ext=explode(".",$_FILES["cover_image"]["name"]);		

				$filename=$artistId;

				$imgtype=$_FILES["cover_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="artist_media/cover_image/".$file_name;

				move_uploaded_file($_FILES['cover_image']['tmp_name'],$filepath);

				$data['txt_cover_image']=$filepath;					

			}

		}

		

		$this->db->where('int_artist_id',$artistId);

		$this->db->update($this->table_artist,$data);

	}



	function update($data,$userid)

	{

		if($data['old_password']!=$data['txt_password'])

		{

			$password=md5($data['txt_password']);

		}

		else

		{

			$password=$data['old_password'];

		}

		$extra_query='';

		if($data['file_name']!='')

		{

			$extra_query=",txt_profile_image='".$data['file_name']."'";

		}

		$sql="update ".$this->table." set txt_name='".$data['txt_name']."', txt_password='$password', txt_email='".$data['txt_email']."'".$extra_query." where int_user_id=".$userid."";

		$query=$this->db->query($sql);

		$sql_sel="select * from ".$this->table." where int_user_id=".$userid."";

		$query=$this->db->query($sql_sel);

		$result=$query->result_array();

		$this->session->set_userdata('user', $result[0]);

		return $query?1:0;

	}


}



?>