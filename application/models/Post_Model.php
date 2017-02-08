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
		//print_r($this->user);exit;
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
		$sql="insert into tab_post values(Default,'$title','$description','$filepath','$url_text','".$this->user['int_artist_id']."','".date('Y-m-d h:i:s')."','','','$filetype','$metatitle','$category','')";
	//print_r($sql);exit;
	
		$query=$this->db->query($sql);
		//print_r($acb);exit;
		return $query;
		//print_r($data);exit;
	
}
 function get_all_posts($user_id)
	{
		 $abc="select * from tab_post where int_artist_id='$user_id'";
		$query=$this->db->query($abc);
		return $result=$query->result_array();
		
	}
	
	function video_data()
	{
		$sql1="select B.*,A.txt_fname,A.txt_lname from tab_artists as A inner join tab_post as B on A.int_artist_id=B.int_artist_id order by int_post_id desc limit 6";
		
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		//print_r($result);exit;
		return $result;
	}
	
	function video_delete($del_id)
	{
		$sql="delete from tab_post where int_post_id='$del_id'";
		return $query1=$this->db->query($sql);
	}
	
	
	
  public function get_views($id){
	   $q=$this->db->query("select int_views from tab_post where int_post_id=$id");
	return $q = $q->result_array();
  }
  
  function update_views($user_id,$counter1)
	{
			$data=array('int_views' => $counter1);
			$this->db->where('int_post_id',$user_id);
			return $this->db->update("tab_post",$data);
	}

}
?>