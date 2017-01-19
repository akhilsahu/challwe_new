<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Wallet extends CI_Controller{
	public $paypalID;
    function __construct()
    {
        parent::__construct();
        $user=$this->session->userdata('user');
        if(!isset($user) || $user==''){
            redirect('user/login', 'refresh');  
            die();
        }
		$this->load->library('paypal_lib');		
		$this->paypalID='vsec.shivam-facilitator@gmail.com';
    }
	
	function addAmount(){
		$this->load->model('settings_model');
		$data['cost_per_coin']=$this->settings_model->getValueByKey('txt_cost_per_coin');
		$data['txt_currency_type']=$this->settings_model->getValueByKey('txt_currency_type');
		$data['page']='addAmount';
		$this->load->view('artist/page',$data);
	}
	
	function buy(){
		$user=$this->session->userdata('user');
		$this->form_validation->set_rules('txt_no_of_coins', 'No Of COins', 'required');
        if($this->form_validation->run())
        {
			$this->load->model('settings_model');
			$cost_per_coin=$this->settings_model->getValueByKey('txt_cost_per_coin');
			$txt_currency_type=$this->settings_model->getValueByKey('txt_currency_type');
			$txt_no_of_coins=$this->input->post('txt_no_of_coins');
			//Set variables for paypal form
			$returnURL = site_url().'/paypal/success'; //payment success url
			$cancelURL = site_url().'/paypal/cancel'; //payment cancel url
			$notifyURL = site_url().'/paypal/ipn'; //ipn url
			//get particular product data
			//$product = $this->product->getRows($id);
			
			$price=(integer)$cost_per_coin['txt_meta_value']*(integer)$txt_no_of_coins;
			//echo $price;die();
			//$logo = base_url().'assets/images/codexworld-logo.png';			
			$this->paypal_lib->add_field('business', $this->paypalID);
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', "Challwe Coins");
			$this->paypal_lib->add_field('custom', $user['int_artist_id']);
			$this->paypal_lib->add_field('item_number',  '1');
			$this->paypal_lib->add_field('amount',  $price); 
			$this->paypal_lib->add_field('currency_code',  $txt_currency_type); 		
			///$this->paypal_lib->image($logo);
			
			$this->paypal_lib->paypal_auto_form();
		}else{
			redirect('/wallet/addAmount', 'refresh');
		}
    }
	
	
	function mytransections(){
		$user=$this->session->userdata('user');
		$this->load->model('settings_model');
		$this->load->model('wallet_model');
		$data['txt_currency_type']=$this->settings_model->getValueByKey('txt_currency_type');
		$data['list']=$this->wallet_model->getTransactionsByMember($user['int_artist_id']);
		$data['page']='mytransections';
		$this->load->view('artist/page',$data);
	
	}
	
	
	
}