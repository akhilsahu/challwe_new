<?php
 class Artist_Model extends CI_Model
 {

  public function register()
  {
  	$data = array('txt_email' => $this->input->post('txt_email'),
                   'txt_password' => md5($this->input->post('txt_password')),
                   'txt_fname' => $this->input->post('txt_fname'),
                   'txt_lname' => $this->input->post('txt_lname')
                   );
  $this->db->insert('tab_artists',$data);         
  }

  public function login($email,$password)
  {
      $this->db->select('txt_email,txt_password');
      $q=$this->db->where(['txt_email'=>$email,'txt_password'=>md5($password)])
                  ->get('tab_artists');
      if($q->num_rows())
	  {
        return $q->row_array();
      }
	  else
	  {
        return FALSE;
      }
    }
	
  public function get_profile_detail($email)
 {
	//print_r($email);exit;
     $q=$this->db->query("select * from tab_artists where txt_email='$email'");
     return $q->result_array();
      }
	  
	  function get_all_followers($user_id)
	{
		$abc="select tab1.txt_profile_image,tab1.txt_fname,tab1.txt_lname from tab_artists as tab1 left join tab_follow as tab2 on tab2.int_follower_id=tab1.int_artist_id where tab2.int_following_id=$user_id"; 
		$query=$this->db->query($abc);
		$result=$query->result_array();
		//print_r($result);die;
		return $result;
	}
	  
	 
	  
  }


?>