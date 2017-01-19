<?php

class Fields_model extends CI_Model{



	public $table="tab_fields";






	function fields_model(){

		parent::__construct();

	}



	function allDirectorylist(){

		$sql="select * from ".$this->table." ";

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
////////////////////////////////////////////////////////Created By Kavita ///////////////////////////////////////////

	function allShowActiveDirectorylist($sk1='',$sk2='',$sk3='',$sk4='',$sk5=''){
	
		$sk1=$sk1!=''?$sk1:'0';
		$sk2=$sk2!=''?$sk2:'0';
		$sk3=$sk3!=''?$sk3:'0';
		$sk4=$sk4!=''?$sk4:'0';
		$sk5=$sk5!=''?$sk5:'0';
		
/*
		$sql="select string_agg(txt_field_name,',') as skill_name
		 from ".$this->table." where int_is_active=1 
		and ( int_field_id = '".$sk1."' OR int_field_id = '".$sk2."' OR int_field_id = '".$sk3."' OR int_field_id = '".$sk4."'  OR int_field_id = '".$sk5."' ) ";

		$query=$this->db->query($sql);

		$result=$query->result_array();
*/
		return $result;

	}

	function itemsadd(){
	

		$formdata=$this->input->post();
		extract($formdata);

		$data=array(

			'txt_name'=>$txt_field_name,

			

			'txt_challwecoins'=>$txt_challwecoins

			);

		$this->db->insert('tab_items',$data);

		$items_id=$this->db->insert_id();

		if($_FILES['file_image']['name']!=''){

			if (($_FILES["file_image"]["type"] == "image/jpeg") || ($_FILES["file_image"]["type"] == "image/jpg")|| ($_FILES["file_image"]["type"] == "image/png") || ($_FILES["file_image"]["type"] == "image/gif")){

				$ext=explode(".",$_FILES["file_image"]["name"]);		

				$filename=$items_id;

				$imgtype=$_FILES["file_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="Items_media/".$file_name;


				move_uploaded_file($_FILES['file_image']['tmp_name'],$filepath);

				// $data['txt_file_image']=$filepath;					

				

				$data1=array(

						'txt_filename'=>$filepath

						);

				$this->db->where('int_items_id',$items_id);

				$this->db->update('tab_items',$data1);

			}

		}
	}
	
	function categoryadd(){	
		$formdata=$this->input->post();
		extract($formdata);
		$data=array(
			'txt_name'=>$txt_name
			);
		$this->db->insert('tab_category',$data);
		$items_id=$this->db->insert_id();
		if($_FILES['file_image']['name']!=''){
			if (($_FILES["file_image"]["type"] == "image/jpeg") || ($_FILES["file_image"]["type"] == "image/jpg")|| ($_FILES["file_image"]["type"] == "image/png") || ($_FILES["file_image"]["type"] == "image/gif")){
				$ext=explode(".",$_FILES["file_image"]["name"]);		
				$filename=$items_id;
				$imgtype=$_FILES["file_image"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="Category_media/".$file_name;
				move_uploaded_file($_FILES['file_image']['tmp_name'],$filepath);
				$data1=array(
						'txt_filepath'=>$filepath
						);
				$this->db->where('int_category_id',$items_id);
				$this->db->update('tab_category',$data1);
			}
		}
	}
	
	function iconsadd(){
		$items_id=$this->input->post('int_unique_id');
		if($_FILES['file_image']['name']!=''){
			if (($_FILES["file_image"]["type"] == "image/jpeg") || ($_FILES["file_image"]["type"] == "image/jpg")|| ($_FILES["file_image"]["type"] == "image/png") || ($_FILES["file_image"]["type"] == "image/gif")){
				$ext=explode(".",$_FILES["file_image"]["name"]);		
				$filename=$items_id;
				$imgtype=$_FILES["file_image"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="Icons_media/".$file_name;

				move_uploaded_file($_FILES['file_image']['tmp_name'],$filepath);
				$data1=array(
						'txt_filepath'=>$filepath
						);
				$this->db->where('int_unique_id',$items_id);
				$this->db->update('tab_icon',$data1);
			}
		}
	}

	function allItemslist(){

		$sql="select * from tab_items";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}
	
	function allCategorylist(){
		$sql="select * from tab_category";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function alliconslist(){

		$sql="select * from tab_icon";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}

	function itemsdelete($id){

		$this->db->delete('tab_items',array('int_items_id'=>$id));

	}

	function categorydelete($id){
		$this->db->delete('tab_category',array('int_category_id'=>$id));
	}	

	FUNCTION getItemsDetail($id){

		$sql="select * from tab_items where int_items_id=".$id;

		$query=$this->db->query($sql);

		$result=$query->row_array();

		return $result;

	}
	
	function getCategoryDetail($id){

		$sql="select * from tab_category where int_category_id=".$id;

		$query=$this->db->query($sql);

		$result=$query->row_array();

		return $result;

	}


	function itemsedit(){		
	

	$formdata=$this->input->post();
		extract($formdata);

		$data=array(

			'txt_name'=>$txt_field_name,

			'txt_challwecoins'=>$txt_challwecoins

			);

			if($_FILES['file_image']['name']!=''){

			if (($_FILES["file_image"]["type"] == "image/jpeg") || ($_FILES["file_image"]["type"] == "image/jpg")|| ($_FILES["file_image"]["type"] == "image/png") || ($_FILES["file_image"]["type"] == "image/gif")){

				$ext=explode(".",$_FILES["file_image"]["name"]);		

				$filename=$int_items_id;

				$imgtype=$_FILES["file_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="Items_media/".$file_name;

				move_uploaded_file($_FILES['file_image']['tmp_name'],$filepath);

				$data['txt_filename']=$filepath;

			}

		}
		

		$this->db->where('int_items_id',$int_items_id);

		$this->db->update('tab_items',$data);

	}
	
	function categoryedit(){		
	
		$formdata=$this->input->post();
		extract($formdata);
		$data=array(
			'txt_name'=>$txt_name,
			);
			if($_FILES['file_image']['name']!=''){
			if (($_FILES["file_image"]["type"] == "image/jpeg") || ($_FILES["file_image"]["type"] == "image/jpg")|| ($_FILES["file_image"]["type"] == "image/png") || ($_FILES["file_image"]["type"] == "image/gif")){
				$ext=explode(".",$_FILES["file_image"]["name"]);		
				$filename=$int_category_id;
				$imgtype=$_FILES["file_image"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="Category_media/".$file_name;
				move_uploaded_file($_FILES['file_image']['tmp_name'],$filepath);
				$data['txt_filepath']=$filepath;
			}
		}		
		$this->db->where('int_category_id',$int_category_id);
		$this->db->update('tab_category',$data);
	}
################################


	function leveladd(){
	

		$formdata=$this->input->post();
		extract($formdata);

		$data=array(

			'txt_title'=>$txt_field_name,

			'txt_challwecoins_min'=>$txt_challwecoins_min,

			'txt_challwecoins_max'=>$txt_challwecoins_max

			

			);

		$this->db->insert('tab_level',$data);

		$field_id=$this->db->insert_id();

		if($_FILES['file_image']['name']!=''){

			if (($_FILES["file_image"]["type"] == "image/jpeg") || ($_FILES["file_image"]["type"] == "image/jpg")|| ($_FILES["file_image"]["type"] == "image/png") || ($_FILES["file_image"]["type"] == "image/gif")){

				$ext=explode(".",$_FILES["file_image"]["name"]);		

				$filename=$field_id;

				$imgtype=$_FILES["file_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="Level_media/".$file_name;

				move_uploaded_file($_FILES['file_image']['tmp_name'],$filepath);

				// $data['txt_file_image']=$filepath;					

				$data1=array(

						'txt_filename'=>$filepath

						);

				$this->db->where('int_level_id',$field_id);

				$this->db->update('tab_level',$data1);

			}

		}





	}

	function alllevellist(){

		$sql="select * from tab_level ";

		$query=$this->db->query($sql);

		$result=$query->result_array();

		return $result;

	}

	function leveldelete($id){

		$this->db->delete('tab_level',array('int_level_id'=>$id));

	}


	FUNCTION getlevelDetail($id){

		$sql="select * from tab_level where int_level_id=".$id;

		$query=$this->db->query($sql);

		$result=$query->row_array();

		return $result;

	}


	function leveledit(){		
	

	$formdata=$this->input->post();
		extract($formdata);

		$data=array(

			'txt_title'=>$txt_field_name,

			'txt_challwecoins_min'=>$txt_challwecoins_min,

			'txt_challwecoins_max'=>$txt_challwecoins_max,

			'txt_filename'=>$txt_filename

			);
		if($_FILES['file_image']['name']!=''){

			if (($_FILES["file_image"]["type"] == "image/jpeg") || ($_FILES["file_image"]["type"] == "image/jpg")|| ($_FILES["file_image"]["type"] == "image/png") || ($_FILES["file_image"]["type"] == "image/gif")){

				$ext=explode(".",$_FILES["file_image"]["name"]);		

				$filename=$int_level_id;

				$imgtype=$_FILES["file_image"]["type"];

				$file_name=$filename.".".$ext[count($ext)-1];

				$filepath="Level_media/".$file_name;

				move_uploaded_file($_FILES['file_image']['tmp_name'],$filepath);

				$data['txt_filename']=$filepath;

			}

		}
		

		$this->db->where('int_level_id',$int_level_id);

		$this->db->update('tab_level',$data);

	}


}
///////////////////////////////////////////////////////////////////





?>