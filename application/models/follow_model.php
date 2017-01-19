<?php



class Follow_model extends CI_Model{

	public $table="tab_follow";
	public $table_artists="tab_artists";
	
	function follow_model(){
		parent::__construct();
	}
	
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

	
	/*function getTransactionsByMember($memberId){
		$sql="Select * from ".$this->table." where user_id=".$memberId;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}*/
	
}