<?php

Class User_model extends CI_Model{
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
        $sql2="Select A.*,B.txt_title from tab_post AS A inner join tab_catagories AS B on A.int_category=B.int_catagory_id";
        $query2=$this->db->query($sql2);
        $result['category']=$query->result_array();  
        $result['sub_category']=$query1->result_array();
        $result['video']=$query2->result_array();
         return $result;
         
        //print_r($result);die;
       
    }
    public function sub_category($id)
    {
        $sql1="select * from tab_catagories where int_sub_catagory!=0";
        $query1=$this->db->query($sql1);
        return  $result=$query1->result_array();
        //print_r($result);
    }
}