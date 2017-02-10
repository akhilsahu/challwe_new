<?php
 class Artist_Model extends CI_Model
 {

  public function register()
  {
  	$data = array('txt_email' => $this->input->post('txt_email'),
                   'txt_password' => md5($this->input->post('txt_password')),
                   'txt_fname' => $this->input->post('txt_fname'),
                   'txt_lname' => $this->input->post('txt_lname'),
				   'int_phone_no' =>$this->input->post('int_number')
                   );
  $this->db->insert('tab_artists',$data);         
  }

  public function login($email,$password){
      
      
      $this->db->select('int_artist_id,txt_email,txt_password,txt_cover_image');
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
	
   
	  
	  function get_all_followers($user_id)
	{
		$abc="select tab1.int_artist_id,tab1.txt_profile_image,tab1.txt_fname,tab1.txt_lname from tab_artists as tab1 left join tab_follow as tab2 on tab2.int_follower_id=tab1.int_artist_id where tab2.int_following_id=$user_id"; 
		$query=$this->db->query($abc);
		$result['abc']=$query->result_array();
		//print_r($result['abc']);exit;
		$result['pqr']=count($query->result_array());
		return $result;
		
	}
	
	   public function get_profile_detail_follower($id)
     {
	//print_r($email);exit;
    $q=$this->db->query("select * from tab_artists where int_artist_id='$id'");
     return $q->result_array();
      }
	  
	  function get_all_following($user_id)
	{
		$abc="select tab1.int_artist_id,tab1.txt_profile_image,tab1.txt_fname,tab1.txt_lname from tab_artists as tab1 left join tab_follow as tab2 on tab2.int_following_id=tab1.int_artist_id where tab2.int_follower_id=$user_id"; 
		$query=$this->db->query($abc);
		$result['abc']=$query->result_array();
		//print_r($result['abc']);exit;
		$result['pqr']=count($query->result_array());
		return $result;
	}
	 
	  function delete_following($id,$idd)
	{
		//print_r($id);exit;
	$abc="Delete from tab_follow where int_following_id=$id and int_follower_id=$idd"; 
	return $query=$this->db->query($abc);
	}
  
   function get_profile_detail($email)
    {
       $q=$this->db->query("select * from tab_artists where txt_email='$email'");
	 return $q->result_array();
	 
      }
 
     function add_comment($abc)
 {
	 $data=$this->session->userdata('user');
	$pqr=$data['int_artist_id'];
	
     $sql="insert into tab_pcomm values(Default,'$abc','$pqr','','','','".date('Y-m-d H-i-s')."')";
	 $this->db->query($sql);
	 //return $result;
	 
	 /*$q=$this->db->query("select a.*, b.txt_fname, b.txt_lname,b.txt_profile_image from tab_pcomm as a Left JOIN tab_artists as b ON a.int_artist_id=b.int_artist_id ORDER BY int_pcid DESC limit 1 offset 0");
      return $q->result_array();*/
      }
	  
	  function show_comments($id)
	  {
		  //$data=$this->session->userdata('user');
	      //$pqr=$data['int_artist_id'];
		  $q=$this->db->query("select  txt_comments,dt_timestamp from tab_pcomm where int_artist_id='$id' ORDER BY int_pcid DESC limit 3 ");
	      return $q->result_array();
		  //echo $sql="select txt_comments from tab_pcomm where int_artist_id='$id'";
	       //$this->db->query($sql);
		  
	  }
	  
	  function getAllUsercomments($id){
		  $sql="select a.*, b.txt_fname, b.txt_lname,b.txt_profile_image from tab_pcomm as a Left JOIN tab_artists as b ON a.int_artist_id=b.int_artist_id where a.int_artist_id='$id' ORDER BY int_pcid DESC ";
		  $q=$this->db->query($sql);
	      return $q->result_array();
	  }
	  function getcomments($id){
		  $sql="select a.*, b.txt_fname, b.txt_lname,b.txt_profile_image from tab_pcomm as a Left JOIN tab_artists as b ON a.int_artist_id=b.int_artist_id where a.int_artist_id='$id' ORDER BY int_pcid DESC ";
		  $q=$this->db->query($sql);
		  $result['xyz']=$q->result_array();
		  $result['abc']=count($q->result_array());
		  return $result;
	  }
	 function countlikes($abc,$xyz)
	 {
		 $sql="update tab_pcomm set int_like_count=int_like_count+1 where int_artist_id='$abc' AND int_pcid='$xyz'";
		 $response=$this->db->query($sql);
		 $query="select int_like_count from tab_pcomm where int_artist_id='$abc' AND int_pcid='$xyz'";
		 $q=$this->db->query($query);
		 return $q->result_array();
		 
	 }
	 function countdislikes($abc,$xyz)
	 {
		 $sql="update tab_pcomm set int_dislike_count=int_dislike_count+1 where int_artist_id='$abc' AND int_pcid='$xyz'";
		 $response=$this->db->query($sql);
		 $query="select int_dislike_count from tab_pcomm where int_artist_id='$abc' AND int_pcid='$xyz'";
		 $q=$this->db->query($query);
		 return $q->result_array();
		 
	 }
    function profile_view($id)
    {
        
        $sql1="select * from tab_artists where int_artist_id =$id";
        $query1=$this->db->query($sql1);
        $result['artist']=$query1->row_array();
        $sql2="select A.txt_fname,A.txt_lname,(select count(int_follower_id) from tab_follow as C"
                . " where C.int_follower_id=B.int_follower_id)as followers from tab_follow as B inner JOIN"
                . " tab_artists as A on B.int_follower_id=A.int_artist_id WHERE int_following_id=$id";
        $query2=$this->db->query($sql2);
         $result['follow']=$query2->row_array();
         
         $sql5="select A.txt_fname,A.txt_lname,(select count(int_follower_id) from tab_follow as C"
                . " where C.int_follower_id=B.int_follower_id)as followers from tab_follow as B inner JOIN"
                . " tab_artists as A on B.int_follower_id=A.int_artist_id WHERE int_following_id=$id";
        $query5=$this->db->query($sql5);
         $result['follower']=$query2->result_array();
         
        $sql3="SELECT A.*,B.txt_fname from tab_post as A inner JOIN tab_artists as B on A.int_artist_id=B.int_artist_id "
                . "WHERE A.int_artist_id=$id AND A.txt_filepath LIKE '%.mp4'";
         $query3=$this->db->query($sql3);
         $result['video']=$query3->result_array();
        $sql4=" select A.* from tab_comments as A inner join tab_artists as B on A.int_user_id=B.int_artist_id where A.int_user_id=$id";
        $query4=$this->db->query($sql4);
         $result['comment']=$query4->result_array();
        //print_r($result['video']);die;
         //echo count($result['video']);die;
        return $result;
        
    }
 }
?>
