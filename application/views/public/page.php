<?php 
	$user=$this->session->userdata('user');
	require_once('header.php');
	require_once($page.'.php');
	require_once('footer.php');


?>