<?php defined('BASEPATH') or die('No direct script access allowed');

class Dashboard extends CI_Controller
{
	var $layout = 'template/template';

	function __construct() {
		parent::__construct();
		// if(!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
	}
	
	function index()
	{
		$data = array(
			'cb' => new Template('KFCL', '1.0', base_url('assets')),
			'page_config' => true,
			'js_plugins' => ['js/plugins/jquery-validation/jquery.validate.min.js'],
			'page_js' => 'js/pages/op_auth_signin.min.js',
			'content' => 'dashboard/home'
		);
		$this->load->view($this->layout, $data);
	}

	function view_users()
	{
		$data = array(
			'cb' => new Template('KFCL', '1.0', base_url('assets')),
			'page_config' => true,
			'js_plugins' => ['js/plugins/jquery-validation/jquery.validate.min.js'],
			'page_js' => 'js/pages/op_auth_signin.min.js',
			'content' => 'dashboard/view_users'
		);
		$this->load->view($this->layout, $data);
	}

}
