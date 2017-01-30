<?php
 class Artist_Model extends CI_Model{

  public function register(){
  	$data = array(  
                   'txt_email' => $this->input->post('txt_email'),
                   'txt_password' => $this->input->post('txt_password')
                   );
  $this->db->insert('tab_artists',$data);         
  }

  public function login($email,$password){
    $this->db->select('txt_email,txt_password');
    $q=$this->db->where(['txt_email'=>$email,'txt_password'=>$password])
                ->get('tab_artists');
                if($q->num_rows()){
                  return $q->row_array();
                }else{
                  return FALSE;
                }
  }

 }


?>