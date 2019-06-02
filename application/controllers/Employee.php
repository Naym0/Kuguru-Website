<?php defined('BASEPATH') or die('No direct script access allowed');

class Employee extends CI_Controller {
	var $layout = 'template/template';

	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
	}

	//? orders view
	function orders() {
		$data = array(
			'cb' => new Template('KFCL', '1.0', base_url('assets')),
			'page_config' => true,
			'js_plugins' => [
				'js/plugins/datatables/jquery.dataTables.min.js',
				'js/plugins/datatables/dataTables.bootstrap4.min.js',
				'js/plugins/sweetalert2/sweetalert2.min.js'
			],
			'js_plugins_css' => [
				'js/plugins/datatables/dataTables.bootstrap4.css',
				'js/plugins/sweetalert2/sweetalert2.min.css'
			],
			'page_js' => 'js/pages/employee_orders.js',
			'content' => 'employee/orders',
		);
		$this->load->view($this->layout, $data);
	}

	function get_all_location_orders() {
		$employee = $this->employees_model->get_by_user_id($this->session->userdata('user_id'));
		$location_orders = $this->orders_model->get_by_pickup_location($employee['location_id']);
		foreach ($location_orders as $key => $order) {
			$location_orders[$key]['actions'] = get_emp_dropdown_action_html();
			$location_orders[$key]['processed_at'] = $order['processed_at'] ? $order['processed_at'] : 'N/A';
			$location_orders[$key]['employee_last_name'] = $order['processed_at'] ? $order['employee_last_name'] : 'N/A';
		}
		echo json_encode($location_orders);
	}
}
