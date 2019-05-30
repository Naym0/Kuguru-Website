<?php defined('BASEPATH') or die('No direct script access allowed');

class Admin extends CI_Controller
{
	var $layout = 'template/template';

	function system_admins()
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
			'page_js' => 'js/pages/system_admin.js',
			'content' => 'admin/create'
		);
		$this->load->view($this->layout, $data);
	}

	function create_sys_admin()
	{
		$res = array();
		try {
			if ($this->form_validation->run('register_admin') == FALSE) throw new \Exception(validation_errors());

			$user_data = array(
				'email' => $this->input->post('email'),
				'password' => null,
				'user_type' => 'admin',
			);
			$this->db->trans_begin();
			$user_id = $this->users_model->add_user($user_data);
			if (!$user_id) throw new \Exception("Could not add user");

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
				'name' => 'Kuguru Employee',
				'email' => $user_data['email']
			);
			$subject = 'Account registration';
			$email_data = array(
				'subject' => $subject,
				'reset_url' => base_url('auth/reset_password/' . $token_id.'/verify'),
				'name' => $to['name']
			);
			$body = $this->load->view('emails/registration', $email_data, true);
			$response_code = $this->email->send_email($to, $subject, $body);
			if ($response_code !== 202) throw new \Exception("Could not add user");

			if ($this->db->trans_status() === FALSE) throw new \Exception("Could not add user");
			$this->db->trans_commit();
			$res = array('ok' => true, 'msg' => 'New system admin added');
		} catch (\Throwable $th) {
			$this->db->trans_rollback();
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	function suspend_sys_admin()
	{
		$res = array();
		try {
			$admin_id = $this->input->post('user_id');
			$update_data = array(
				'suspended' => true
			);
			$updated = $this->users_model->update_user($update_data, $admin_id);
			if (!$updated) throw new \Exception("Could not suspend user");
			$res = array('ok' => true, 'msg' => 'System admin suspended');
		} catch (\Throwable $th) {
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	function unsuspend_sys_admin()
	{
		$res = array();
		try {
			$admin_id = $this->input->post('user_id');
			$update_data = array(
				'suspended' => false
			);
			$updated = $this->users_model->update_user($update_data, $admin_id);
			if (!$updated) throw new \Exception("Could not restore user");
			$res = array('ok' => true, 'msg' => 'System admin restored');
		} catch (\Throwable $th) {
			$res = array('ok' => false, 'msg' => $th->getMessage());
		}
		echo json_encode($res);
	}

	function get_sys_admin_json()
	{
		$admins = $this->users_model->get_all_by_type('admin');
		foreach ($admins as $key => $admin) {
			$admins[$key]['actions'] = !$admin['suspended'] ?
				'<div class="btn-group" role="group" aria-label="Edit delete actions">
				<button type="button" class="btn btn-secondary btn-suspend" title="Suspend">
					<i class="si si-ban"></i> Suspend
				</button>
			</div>' : '<div class="btn-group" role="group" aria-label="Edit delete actions">
			<button type="button" class="btn btn-alt-success btn-unsuspend" title="Unsuspend">
				<i class="si si-magic-wand"></i> Unsuspend
			</button>
		</div>';
			$admins[$key]['status'] = $admin['suspended'] ? 'Suspended' : 'Active';
			$admins[$key]['verified'] = $admin['verified'] ? 'Yes' : 'No';
		}
		echo json_encode($admins);
	}
}
