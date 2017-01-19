<?php



class Wallet_model extends CI_Model{

	public $table="payments";

	function wallet_model(){
		parent::__construct();
	}
	
	 public function insertTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
	
	function getTransactionsByMember($memberId){
		$sql="Select * from ".$this->table." where user_id=".$memberId;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
}