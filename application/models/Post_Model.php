<?php

/*
Post type{
	0=>Text
	1=>Image
	2=>Video
	3=>Audio
}
*/

class Post_model extends CI_Model{

	public $table="tab_post";
	public $table_artists="tab_post_comments";
	
	function post_model(){
		parent::__construct();
	}


	function addPost($data)
	{
		$this->user=$this->session->userdata('user');
		//print_r($this->user['int_artist_id']);exit;
		$title=$data['title'];
		$description=$data['description'];
		$filename=$data['filename'];
		$url_text=$data['url_text'];
		$filepath=$data['filepath'];
		$filetype=$data['post_type'];
		$description=$data['description'];
		$metatitle=$data['metatitle'];
		$category=$data['category'];
		//$artist_id=$data['int_artist_id']
		$sql="insert into tab_post values(Default,'$title','$description','$filepath','$url_text','".$this->user['int_artist_id']."','".date('Y-m-d h:i:s')."','','','$filetype','$metatitle','$category')";
		$query=$this->db->query($sql);
		return $query;
		//print_r($data);exit;
	
}
}
?>