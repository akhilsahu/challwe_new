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
        return  $result=$query->result_array();
        //print_r($result);
    }
    public function sub_category($id)
    {
        $sql="select * from tab_catagories where int_sub_catagory=$id";
        $query=$this->db->query($sql);
        return  $result=$query->result_array();
        //print_r($result);
    }
}