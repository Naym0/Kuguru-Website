<?php defined('BASEPATH') or die('No direct script access allowed');

class Dashboard extends CI_Controller
{
	var $layout = 'template/template';

	function __construct() {
		parent::__construct();
		if(!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
	}
	
	function index()
	{
		$data = array(
			'content' => 'dashboard/home'
		);
		$this->load->view($this->layout, $data);
	}

}
