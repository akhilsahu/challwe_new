<?php
 class Artist_Model extends CI_Model{

  public function register(){
  	$data = array(  
                   'txt_email' => $this->input->post('txt_email'),
                   'txt_password' => md5($this->input->post('txt_password')),
                   'txt_fname' => $this->input->post('txt_fname'),
                   'txt_lname' => $this->input->post('txt_lname')
                   );
  $this->db->insert('tab_artists',$data);         
  }

  public function login($email,$password){
      $this->db->select('int_artist_id,txt_email,txt_password');
      $q=$this->db->where(['txt_email'=>$email,'txt_password'=>md5($password)])
                  ->get('tab_artists');
      if($q->num_rows()){
        return $q->row_array();
      }else{
        return FALSE;
      }
  }
  public function get_profile_detail($email)
    {
	
     $q=$this->db->query("select * from tab_artists where txt_email='$email'");
	 //print_r($q);exit;
     return $q->result_array();
	 //print_r($q);exit;
      }
 
     public function addcomment($data)
    {
		$com=$this->session->userdata('user');
		$comment=$data['commentText'];
		$sql="insert into tab_pcomm values(Default,'$comment','".$com['int_artist_id']."','')";
		
		$result=$this->db->query($sql);
	 
	  
	  
  
      }
	  function get_all()
    {
        $query = $this->db->get('tab_pcomm');
        return $query->result_array();
    }
 }


?>