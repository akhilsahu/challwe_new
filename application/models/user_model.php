<?php

Class User_model extends CI_Model
{
    public function User_model()
    {
      parent::__construct();
    }
	
    public function category()
    {
        $sql="select * from tab_catagories where int_sub_catagory=0";
        $query=$this->db->query($sql);
        
        $sql1="select * from tab_catagories where int_sub_catagory!=0";
        $query1=$this->db->query($sql1);
        $result['category']=$query->result_array();  
        $result['sub_category']=$query1->result_array();
        
         
        //print_r($result);die;
        return $result;
    }
    public function sub_category($id)
    {
        $sql1="select * from tab_catagories where int_sub_catagory!=0";
        $query1=$this->db->query($sql1);
        return  $result=$query1->result_array();
        //print_r($result);
    }
    
    
	
	 public function get_profile_settings($id)
	{
		$sql="select * from tab_artists where int_artist_id='$id'";
		 $sql1="select * from tab_artist_links";
		//print_r($sql);exit;
		$query=$this->db->query($sql);
		$query1=$this->db->query($sql1);
		$result['abc']=$query->result_array();
		//print_r($result['abc']);exit;
		$result['pqr']=$query1->result_array();
		//print_r($result);exit;
	//	print_r($result['pqr']);exit;
		return $result;
		
			//print_r($sql1);exit;
		
			
	}
	
	public function insert_update($id,$image_name,$cover_img)
	{
		$data=$this->session->userdata('user');
		//print_r($data);exit;
		$get_data=$this->input->post();
		//print_r($data);exit;
		 $sql="select int_artist_id from tab_artist_links where int_artist_id='$id'";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		//print_r($result);exit;
		$data1=array('txt_fname'=>$get_data['fname'],'txt_lname'=>$get_data['lname'],'txt_email'=>$get_data['email'],'txt_cell_no'=>$get_data['phone_no'],'txt_description'=>$get_data['description']);
					
					
		
		if($image_name!='') $data1['txt_profile_image']=$image_name;
		if($cover_img!='') $data1['txt_cover_image']=$cover_img;
		$this->db->where('int_artist_id',$get_data['id']);
		$this->db->update('tab_artists',$data1);
	
		
	if($data['txt_password']!=md5($password)) $data1['txt_password']=md5($password);
	//print_r($data['txt_password']);exit;
		if(count($result)>0)
		{
			$data=$this->input->post();
			$sql="update tab_artist_links set txt_facebook='".$data['facebook']."',txt_website_url='".$data['website_url']."',txt_twitter='".$data['twitter']."',txt_google_plus='".$data['google_plus']."',txt_youtube='".$data['youtube']."',txt_vimeo='".$data['vimeo']."',txt_pinterest='".$data['pinterest']."',txt_instagram='".$data['instagram']."',txt_linkedin='".$data['linkedin']."' where int_artist_id=".$data['id']."";

			$query=$this->db->query($sql);
			//print_r($query);exit;
			return $result;
		}
		else
		{
			//$data=$this->input->post();
			//print_r($data);exit;
			$facebook=$data['facebook'];
			$twitter=$data['twitter'];
			$google_plus=$data['google_plus'];
			$youtube=$data['youtube'];
			$vimeo=$data['vimeo'];
			$pinterest=$data['pinterest'];
			$instagram=$data['instagram'];
			$linkedin=$data['linkedin'];
			$website_url=$data['website_url'];
			
		$sql="insert into tab_artist_links values(Default,'".$data['int_artist_id']."','$website_url','$facebook','$twitter','$google_plus','$youtube','$vimeo','$pinterest','$instagram','$linkedin')";
		//print_r($sql);exit;
		$result=$this->db->query($sql);
		//print_r($result);exit;
		//return $result;
		}
	}
}
