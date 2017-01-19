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


	function addPost(){
		$session_arr=$this->session->userdata('user');
		$data=array(
				'txt_description'=>$this->input->post('post_description'),
				'int_artist_id'=>$session_arr['int_artist_id'],
				'dt_created_on'=>date('Y-m-d h:i:s')
			);
		$this->db->insert($this->table,$data);	
		$postId=$this->db->insert_id();
		$data1=array();
		if($_FILES['post_file']['name']!=''){
			$img_type=array("image/jpeg","image/jpg","image/png","image/gif");
			$video_type=array("video/webm","video/mp4","video/ogv");
			$audio_type=array("audio/mpeg","audio/wav","audio/x-wav");
			$filetype=0;
			if (in_array($_FILES["post_file"]["type"],$img_type)) $filetype=1;
			if (in_array($_FILES["post_file"]["type"],$video_type)) $filetype=2;
			if (in_array($_FILES["post_file"]["type"],$audio_type)) $filetype=3;
			
			if ($filetype!=0){
				$ext=explode(".",$_FILES["post_file"]["name"]);		
				$filename=$postId;
				$imgtype=$_FILES["post_file"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="post_media/".$file_name;
				move_uploaded_file($_FILES['post_file']['tmp_name'],$filepath);
				$data1['txt_filepath']=$filepath;
			}
		}
		$data1['int_post_type']=$filetype;
		$this->db->where("int_post_id",$postId);
		$this->db->update($this->table,$data1);	
					
	}

	function getArtistPost($userId){
		$sql="Select a.*,b.txt_fname,b.txt_lname,b.txt_profile_image from ".$this->table." a inner join tab_artists b on a.int_artist_id=b.int_artist_id where a.int_artist_id=".$userId;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function getPostDetailById($postId){
		$sql="Select a.*,b.txt_fname,b.txt_lname,b.txt_profile_image,( select count(*) from tab_follow f where f.int_following_id=b.int_artist_id ) as follow_count from ".$this->table." a inner join tab_artists b on a.int_artist_id=b.int_artist_id where a.int_post_id=".$postId;
		$query=$this->db->query($sql);
		$result=$query->row_array();
		return $result;
	}
	
	function addPostComment(){
		$formdata=$this->input->post();
		extract($formdata);
		$user=$this->session->userdata('user');
		$data=array(
				'int_artist_id'=>$user['int_artist_id'],
				'int_post_id'=>$id,
				'txt_comment'=>$comment,
				'int_parent_comment_id'=>($parent_id)?$parent_id:0,
				'dt_commented_on'=>date('Y-m-d h:i:s')
			);
		$this->db->insert('tab_post_comments',$data);	
	}
	
	function getPostComments($postId){
		$sql="Select a.*,u.txt_fname,u.txt_lname,u.txt_profile_image,( select count(*) from tab_post_comments pc where pc.int_parent_comment_id=a.int_comment_id ) as child_post_count from tab_post_comments a inner join tab_artists u on a.int_artist_id=u.int_artist_id where a.int_post_id=".$postId." and a.int_parent_comment_id=0 order by dt_commented_on asc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function getPostSubComments($postId,$commentId){
		$sql="Select a.*,u.txt_fname,u.txt_lname,u.txt_profile_image from tab_post_comments a inner join tab_artists u on a.int_artist_id=u.int_artist_id where a.int_post_id=".$postId." and a.int_parent_comment_id=".$commentId." order by dt_commented_on asc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}


/*
	
	function getFollowStatus($userId){
		$session_arr=$this->session->userdata('user');
		$sql="Select * from ".$this->table." where int_follower_id=".$session_arr['int_artist_id']." And int_following_id=".$userId;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function followUser($userId){
		$session_arr=$this->session->userdata('user');
		$data=array(
				'int_follower_id'=>$session_arr['int_artist_id'],
				'int_following_id'=>$userId,
			);
		$this->db->insert($this->table,$data);	
	}
	
	function unfollowUser($userId){
		$session_arr=$this->session->userdata('user');
		$this->db->delete($this->table,array('int_follower_id'=>$session_arr['int_artist_id'],'int_following_id'=>$userId));
	}
	
	function getFollowerList($userId){
		$sql="Select a.*,b.int_artist_id,b.txt_fname,b.txt_lname,b.txt_profile_image from ".$this->table." a inner join ".$this->table_artists." b on a.int_follower_id=b.int_artist_id where a.int_following_id=".$userId;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

*/
	
}