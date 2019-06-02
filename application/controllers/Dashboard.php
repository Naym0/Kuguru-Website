<?php defined('BASEPATH') or die('No direct script access allowed');

class Dashboard extends CI_Controller
{
	var $layout = 'template/template';

	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['logged_in'])) redirect(base_url('auth/logout'));
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
				'js/plugins/sweetalert2/sweetalert2.min.js',
				'js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
			],
			'js_plugins_css' => [
				'js/plugins/datatables/dataTables.bootstrap4.css',
				'js/plugins/sweetalert2/sweetalert2.min.css',
				'js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'
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
			if ($this->form_validation->run('register_employee') == FALSE) throw new \Exception(validation_errors(), 1);
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
				'from_date' => date_format(date_create($this->input->post('from_date')), "Y-m-d"),
				'end_date' => date_format(date_create($this->input->post('end_date')), "Y-m-d"),
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
				'reset_url' => base_url('auth/reset_password/' . $token_id . '/verify'),
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
			if ($th->getCode() == 1) {
				$res = array('ok' => false, 'msg' => $th->getMessage());
			} else {
				$res = array('ok' => false, 'msg' => 'Could not add employee');
			}
		}
		echo json_encode($res);
	}

	//? edit employee
	function edit_employee()
	{
		$res = array();
		$user_id = $this->input->post('user_id');
		$employee_id = $this->input->post('employee_id');
		$location_emp_id = $this->input->post('locationemployees_id');
		try {
			$this->db->trans_begin();
			// ? user record
			$user_data = array(
				'email' => $this->input->post('email')
			);
			$fetched_user = $this->users_model->get_user_by_email($user_data['email']);
			if (!empty($fetched_user) && $fetched_user['user_id'] !== $user_id) throw new \Exception("Email is already registered");
			if (!$this->users_model->update_user($user_data, $user_id)) throw new \Exception("Could not update record");

			// ?  employee record
			$emp_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name')
			);
			if (!$this->employees_model->update($emp_data, $employee_id)) throw new \Exception("Could not update record");

			// ? location employee record
			$loc_emp_data = array(
				'location_id' => $this->input->post('location_id'),
				'from_date' => date_format(date_create($this->input->post('from_date')), "Y-m-d"),
				'end_date' => date_format(date_create($this->input->post('end_date')), "Y-m-d"),
				'role' => $this->input->post('role')
			);
			if (!$this->locationemployees_model->update($loc_emp_data, $location_emp_id)) throw new \Exception("Could not update record");
			$this->db->trans_commit();
			$res = array('ok' => true, 'msg' => 'Employee record updated successfully');
		} catch (\Throwable $th) {
			$this->db->trans_rollback();
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	//TODO: suspend employee

	//? view locations
	function locations()
	{
		$data = array(
			'cb' => new Template('KFCL', '1.0', base_url('assets')),
			'page_config' => true,
			'js_plugins' => [
				'js/plugins/datatables/jquery.dataTables.min.js',
				'js/plugins/datatables/dataTables.bootstrap4.min.js',
				'js/plugins/jquery-validation/jquery.validate.min.js',
				'js/plugins/sweetalert2/sweetalert2.min.js',
				'js/plugins/masked-inputs/jquery.maskedinput.min.js'
			],
			'js_plugins_css' => [
				'js/plugins/datatables/dataTables.bootstrap4.css',
				'js/plugins/sweetalert2/sweetalert2.min.css'
			],
			'page_js' => 'js/pages/locations.js',
			'content' => 'dashboard/locations',
			'locations' => $this->locations_model->get_all(),
		);
		$this->load->view($this->layout, $data);
	}

	//? get locations json
	function get_locations_json()
	{
		$locations = $this->locations_model->get_all();
		foreach ($locations as $key => $location) {
			$locations[$key]['actions'] = $location['suspended'] ? get_action_unsuspend_html() : get_action_suspend_html();
			$locations[$key]['status'] = $location['suspended'] ? 'Suspended' : 'Active';
		}
		echo json_encode($locations);
	}

	//? add location
	function add_location()
	{
		$res = array();
		try {
			if ($this->form_validation->run('add_location') == FALSE) throw new \Exception(validation_errors());
			$location_data = array(
				'location_name' => $this->input->post('location_name'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email')
			);
			$location_id = $this->locations_model->create($location_data);
			if (!$location_id) throw new \Exception("Could not add record");
			$res = array('ok' => true, 'msg' => 'New location added');
		} catch (\Throwable $th) {
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	//? edit location
	function edit_location()
	{
		$res = array();
		try {
			if ($this->form_validation->run('edit_location') == FALSE) throw new \Exception(validation_errors());
			$location_id = $this->input->post('location_id');
			$location_data = array(
				'location_name' => $this->input->post('location_name'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email')
			);
			$fetched_location_by_name = $this->locations_model->get_by_name($location_data['location_name']);
			if (!empty($fetched_location_by_name) && $fetched_location_by_name['location_id'] !== $location_id) throw new \Exception("Location name is already registered");
			$fetched_location_by_email = $this->locations_model->get_by_email($location_data['email']);
			if (!empty($fetched_location_by_email) && $fetched_location_by_email['location_id'] !== $location_id) throw new \Exception("Email is already registered");
			$fetched_location_by_cell = $this->locations_model->get_by_phone_number($location_data['phone_number']);
			if (!empty($fetched_location_by_cell) && $fetched_location_by_cell['location_id'] !== $location_id) throw new \Exception("Phone number is already registered");

			if (!$this->locations_model->update($location_data, $location_id));
			$res = array('ok' => true, 'msg' => 'Location record edited');
		} catch (\Throwable $th) {
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	//? suspend location
	function suspend_location()
	{
		$res = array();
		try {
			$location_id =  $this->input->post('location_id');
			if (!$this->locations_model->update(array('suspended' => true), $location_id)) throw new \Exception("Could not suspend location");
			$res = array('ok' => true, 'msg' => 'Location suspended');
		} catch (\Throwable $th) {
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	//? unsuspend location
	function unsuspend_location()
	{
		$res = array();
		try {
			$location_id =  $this->input->post('location_id');
			if (!$this->locations_model->update(array('suspended' => false), $location_id)) throw new \Exception("Could not unsuspend location");
			$res = array('ok' => true, 'msg' => 'Location unsuspended');
		} catch (\Throwable $th) {
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}
}
