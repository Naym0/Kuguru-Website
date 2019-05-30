<?php defined('BASEPATH') or die('No direct script access allowed');

class Dashboard extends CI_Controller
{
	var $layout = 'template/template';

	function __construct()
	{
		parent::__construct();
		//? auth library
		$ci_instance = &get_instance();
		$this->load->library('auth', array($ci_instance));

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

	function employees()
	{
		$data = array(
			'cb' => new Template('KFCL', '1.0', base_url('assets')),
			'page_config' => true,
			'js_plugins' => [
				'js/plugins/datatables/jquery.dataTables.min.js',
				'js/plugins/datatables/dataTables.bootstrap4.min.js',
				'js/plugins/jquery-validation/jquery.validate.min.js',
				'js/plugins/sweetalert2/sweetalert2.min.js'
			],
			'js_plugins_css' => [
				'js/plugins/datatables/dataTables.bootstrap4.css',
				'js/plugins/sweetalert2/sweetalert2.min.css'
			],
			'page_js' => 'js/pages/employees.js',
			'content' => 'dashboard/employees',
			'locations' => $this->locations_model->get_all(),
		);
		$this->load->view($this->layout, $data);
	}

	function get_employees_json()
	{
		$employees = $this->employees_model->get_all();
		foreach ($employees as $key => $employee) {
			$employees[$key]['actions'] = get_action_html();
			$employees[$key]['status'] = $employee['suspended'] ? 'Suspended' : 'Active';
		}
		echo json_encode($employees);
	}

	function add_employee()
	{
		$res = array();
		try {
			$this->db->trans_begin();
			if ($this->form_validation->run('register_employee') == FALSE) throw new \Exception(validation_errors(),1);
			//? Add user
			$emp_user_data = array(
				'email' => $this->input->post('email'),
				'password' => null
			);
			$user_id = $this->users_model->add_user($emp_user_data);
			if (!$user_id) throw new \Exception();

			//? add employee record
			$emp_data = array(
				'user_id' => $user_id,
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name')
			);
			$employee_id = $this->employees_model->create($emp_data);
			if (!$employee_id) throw new \Exception();

			//? Location employee record
			$loc_emp_data = array(
				'location_id' => $this->input->post('location_id'),
				'employee_id' => $employee_id,
				'from_date' => $this->input->post('from_date'),
				'end_date' => $this->input->post('to_date'),
				'role' => $this->input->post('role')
			);
			$location_emp_id = $this->locationemployees_model->create($loc_emp_data);
			if (!$location_emp_id) throw new \Exception();

			//? get token and send email
			$token = get_crypto_safe_token(random_int(25, 30));
			$token_data = array(
				'token' => $token,
				'token_expiry' => 7200,
				'user_id' => $user_id
			);
			$token_id = $this->tokens_model->add_token($token_data);
			if (!$token_id) throw new \Exception("Could not add user");

			//? send email
			$to = array(
				'name' =>  $emp_data['last_name'],
				'email' => $emp_user_data['email']
			);
			$subject = 'Account registration';
			$email_data = array(
				'subject' => $subject,
				'reset_url' => base_url('auth/reset_password/' . $token_id.'/verify'),
				'name' => $to['name']
			);
			$body = $this->load->view('emails/registration', $email_data, true);
			$response_code = $this->email->send_email($to, $subject, $body);
			if ($response_code !== 202) throw new \Exception();

			if ($this->db->trans_status() === FALSE) throw new \Exception();
			$this->db->trans_commit();
			$res = array('ok' => true, 'msg' => 'Employee record added');
		} catch (\Throwable $th) {
			$this->db->trans_rollback();
			if($th->getCode() == 1) {
				$res = array('ok' => false, 'msg' => $th->getMessage());
			} else {
				$res = array('ok' => false, 'msg' => 'Could not add employee');
			}
		}
		echo json_encode($res);
	}

	//? edit employee
	//? suspend employee

	//? get locations json
	//? add location
	//? edit location
	//? suspend record
}
