<?php defined('BASEPATH') or die('No direct script access allowed');

class Customer extends CI_Controller
{
	var $layout = 'template/template';
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if (!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
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
			'page_js' => 'js/pages/customer_index.js',
			'content' => 'customers/index',
		);
		$this->load->view($this->layout, $data);
	}

	function create_account()
	{
		$data = array(
			'cb' => new Template('KFCL', '1.0', base_url('assets')),
			'js_plugins' => ['js/plugins/jquery-validation/jquery.validate.min.js'],
			'page_js' => 'js/pages/customer_register.js',
			'content' => 'customers/create_account'
		);
		$this->load->view($this->layout, $data);
	}

	function validate_email()
	{
		$email = $this->input->post('email');
		$customer = $this->users_model->get_user_by_email($email);
		echo json_encode(!empty($customer) ? 'Email is registered to an existing account' : true);
	}

	function create_account_process()
	{
		$res = array();
		$user_data = array(
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'user_type' => 'customer'
		);
		try {
			$this->db->trans_begin();
			$user_id = $this->users_model->add_user($user_data);
			if (!$user_id) throw new \Exception("Could not create account. Try again later");

			$token = get_crypto_safe_token(random_int(25, 30));
			$token_data = array(
				'token' => $token,
				'token_expiry' => 7200,
				'user_id' => $user_id
			);
			$token_id = $this->tokens_model->add_token($token_data);
			if (!$token_id) throw new \Exception("Could not create account. Try again later");

			//? send email
			$to = array(
				'name' =>  'Customer',
				'email' => $user_data['email']
			);
			$subject = 'Customer account registration';
			$email_data = array(
				'subject' => $subject,
				'verification_url' => base_url('customer/account_verification/' . $token_id),
				'name' => $to['name']
			);
			$body = $this->load->view('emails/customer_registration', $email_data, true);
			$response_code = $this->email->send_email($to, $subject, $body);
			if ($response_code !== 202) throw new \Exception("Could not create account. Try again later");
			$this->db->trans_commit();
			$res = array('ok' => true, 'msg' => 'Registration successful. An email has been sent for verification');
		} catch (\Throwable $th) {
			$this->db->trans_rollback();
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	function account_verification($token_id)
	{
		try {
			if (empty($token_id)) redirect(base_url('auth/login'), 'location');

			$this->tokens_model->invalidate_expired_tokens();
			$token = $this->tokens_model->get_token($token_id);
			if (empty($token)) throw new \Exception("Invalid token provided");
			if (!$token['valid']) throw new \Exception("Expired token provided");

			// ? verify account
			if (!$this->users_model->update_user(array('verified' => true), $token['user_id'])) throw new \Exception("Error Processing Request. Try again later");
			$this->tokens_model->invalidate_token($token['token_id']);
			$this->session->set_flashdata('msg', ['type' => 'success', 'content' => 'Account verified,you can now sign in']);
			redirect(base_url('auth/login'), 'location');
		} catch (\Throwable $th) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'content' => $th->getMessage()]);
			redirect(base_url('auth/login'), 'location');
		}
	}

	function new_order()
	{
		if (!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
		$data = array(
			'cb' => new Template('KFCL', '1.0', base_url('assets')),
			'page_config' => true,
			'js_plugins' => [
				'js/plugins/jquery-validation/jquery.validate.min.js',
				'js/plugins/sweetalert2/sweetalert2.min.js',
				'js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
			],
			'js_plugins_css' => [
				'js/plugins/sweetalert2/sweetalert2.min.css',
				'js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'
			],
			'page_js' => 'js/pages/new_order.js',
			'locations' => $this->locations_model->get_all(true),
			'content' => 'customers/new_order',
		);
		$this->load->view($this->layout, $data);
	}

	function submit_new_order()
	{
		if (!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
		$order_data = array(
			'customer_id' => $this->session->userdata('user_id'),
			'product_units' => $this->input->post('product_units'),
			'pickup_location' => $this->input->post('pickup_location'),
			'collection_date' => date_format(date_create($this->input->post('collection_date')), "Y-m-d")
		);
		$res = array();
		try {
			$order_id = $this->orders_model->create($order_data);
			if (!$order_id) throw new \Exception("Oops! Could not submit new order");

			$res = array('ok' => true, 'msg' => 'New order submitted. In case of any issues, an email will be sent to you.');
		} catch (\Throwable $th) {
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	function get_all_orders_json()
	{
		if (!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
		$user_id = $this->session->userdata('user_id');
		$orders = $this->orders_model->get_by_customer_id($user_id);
		foreach ($orders as $key => $order) {
			$orders[$key]['actions'] = get_dropdown_action_html();
		}
		echo json_encode($orders);
	}
}
