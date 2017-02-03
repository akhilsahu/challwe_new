<?php
 class Blog_Model extends CI_Model{

 public function blog(){
	 $q=$this->db->query("select B.*,A.txt_fname,A.txt_lname,(select count(int_comment_id) from tab_comments c where c.int_blog_id=b.int_blog_id) as t_comments from tab_artists as A inner join tab_blogs as B on A.int_artist_id=B.int_artist_id limit 4");
	return $q = $q->result_array();               
  }
  
 public function blog_single($id){
   $q=$this->db->query("select B.*,A.txt_fname,A.txt_lname,(select count(int_comment_id) from tab_comments c where c.int_blog_id=b.int_blog_id) as t_comments from tab_artists as A inner join tab_blogs as B on A.int_artist_id=B.int_artist_id where int_blog_id=$id");
	return $q = $q->result_array();         
  }
  public function update_views($id,$counter){
	  $counter1=$counter+1;
	  $data = array(
                   'int_views' => $counter1);
					$this->db->where('int_blog_id',$id);
					return $this->db->update("tab_blogs",$data);   
  }
 public function comments($id){
	$q=$this->db->query("select * from tab_comments where int_blog_id=$id");
	return $q=$q->result_array();
        
  }
   }
?>