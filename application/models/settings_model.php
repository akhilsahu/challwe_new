<?php

class Settings_model extends CI_Model{

	public $table="tab_settings";

	function Settings_model(){
		parent::__construct();
	}
	
	 function getAllSettings(){
		$sql="Select * from ".$this->table."";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	 }
	 
	 function settingsEdit(){
		$formdata=$this->input->post();
		foreach($formdata as $key=>$val){
			$data=array(
					'txt_meta_value'=>$val
				);
			$this->db->where('txt_meta_key',$key);
			$this->db->update($this->table,$data);	
		}
	 }
	 
	 function getValueByKey($key){
		$sql="Select * from ".$this->table." where  txt_meta_key='".$key."'";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result[0];		
	 }
	
}