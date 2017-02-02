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
}