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
      //echo "logoing";die;
      //$sql="select int_artist_id,txt_email,txt_password from tab_artists where txt_email='$email'";
      $this->db->select('int_artist_id,txt_email,txt_password');
      $q=$this->db->where(['txt_email'=>$email,'txt_password'=>md5($password)])
                ->get('tab_artists');
      //  $q=$this->db->query($sql);
        //echo 'log';die;
      //echo $q?1:23;die;
      //echo $q->num_rows();die;
      if($q->num_rows())
	  {
          //echo 'log';die;
        return $q->row_array();
      }
	  else
	  {
            // echo 'log_else';die;
        return FALSE;
      }
    }
	
   
	  
	  function get_all_followers($user_id)
	{
		$abc="select tab1.txt_profile_image,tab1.txt_fname,tab1.txt_lname from tab_artists as tab1 left join tab_follow as tab2 on tab2.int_follower_id=tab1.int_artist_id where tab2.int_following_id=$user_id"; 
		$query=$this->db->query($abc);
		$result=$query->result_array();
		//print_r($result);die;
		return $result;
	}
	  
	 
	  
  
   function get_profile_detail($email)
    {
      // echo 'get_profile';die;
	
     $q=$this->db->query("select * from tab_artists where txt_email='$email'");
	// print_r($q);exit;
     return $q->result_array();
	 //print_r($q);exit;
      }
 
       public function add_comment($abc)
 {
	 $data=$this->session->userdata('user');
	 $pqr=$data['int_artist_id'];
	
     $sql="insert into tab_pcomm values(Default,'$abc','$pqr','')";
	 $result=$this->db->query($sql);
	 return $result;

      }
	  
	  
	  function get_all()
    {
        $query = $this->db->get('tab_pcomm');
        return $query->result_array();
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
        $sql3="SELECT A.*,B.txt_fname from tab_post as A inner JOIN tab_artists as B on A.int_artist_id=B.int_artist_id "
                . "WHERE A.int_artist_id=$id AND A.txt_filepath LIKE '%.mp4'";
        $query3=$this->db->query($sql3);
        $result['video']=$query3->result_array();
        $sql4=" select A.* from tab_comments as A inner join tab_artists as B on A.int_user_id=B.int_artist_id where A.int_user_id=$id";
        $query4=$this->db->query($sql4);
        $sql5="select A.txt_fname,A.txt_lname,(select count(int_follower_id) from tab_follow as C"
                . " where C.int_follower_id=B.int_follower_id)as followers from tab_follow as B inner JOIN"
                . " tab_artists as A on B.int_follower_id=A.int_artist_id WHERE int_following_id=$id";
        $query5=$this->db->query($sql5);
        $result['follower']=$query5->result_array();
        $result['comment']=$query4->result_array();
         $sql6="select * from tab_catagories where int_sub_catagory=0";
        $query6=$this->db->query($sql6);
        $result['category']=$query6->result_array();
        //print_r($result['video']);die;
         //echo count($result['video']);die;
        return $result;
        //print_r($result);die;
    }
 }


?>
