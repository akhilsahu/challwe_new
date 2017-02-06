<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Artist_Model');
        $this->load->model('Forum_model');
    }


    public function index()
    {
        $this->load->model('Category_model');
        $data['category']= $this->Category_model->getTop10Category();
        $data['page']='forum_list';
        $data['page_title']='Forum';
        $this->load->view('public/page',$data);
    }


}
