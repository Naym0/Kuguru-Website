<?php defined('BASEPATH') or die('No direct script access allowed');

class Auth extends CI_Controller
{
	var $layout = 'template/template';
	function login()
	{
		if ($this->form_validation->run('login') == FALSE) {
			$data = array(
				'cb' => new Template('KFCL', '1.0', base_url('assets')),
				// 'page_config' => true,
				'js_plugins' => ['js/plugins/jquery-validation/jquery.validate.min.js'],
				'page_js' => '',
				'content' => 'auth/login'
			);
			$this->load->view($this->layout, $data);
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			try {
				$user = $this->users_model->get_user_by_email($email);
				if (empty($user)) throw new \Exception("Incorrect creditials");
				if (!$user['verified']) redirect(base_url('auth/login'));

				$valid_password = password_verify($password, $user['password']);
				if (!$valid_password) throw new \Exception("Incorrect creditials");
				
				//? Update last access
				$this->users_model->update_user(array('last_access' => $this->time->get_now()), $user['user_id']);
				
				$user['logged_in'] = TRUE;
				$this->session->set_userdata($user);

				switch ($user['user_type']) {
					case 'admin':
					case 'employee':
						redirect(base_url('dashboard/index'));
						break;
					case 'customer':
						redirect(base_url('customer'));
						break;
				}
			} catch (\Throwable $th) {
				$this->session->set_flashdata('msg', ['type' => 'danger', 'content' => $th->getMessage()]);
				redirect(base_url('auth/login'));
			}
		}
	}

	function create_account($user_data)
	{
		try {
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
				'name' =>  $user_data['name'],
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

			return $user_id;
		} catch (\Throwable $th) {
			$this->db->trans_rollback();
			throw new \Exception($th->getMessage());
		}
	}

	function reset_password($token_id = null, $verification = false)
	{
		try {
			if (empty($token_id)) redirect(base_url('auth/login'), 'location');

			$this->tokens_model->invalidate_expired_tokens();
			$token = $this->tokens_model->get_token($token_id);
			if (empty($token)) throw new \Exception("Invalid token provided");
			if (!$token['valid']) throw new \Exception("Expired token provided");

			if ($this->form_validation->run('reset_password') == FALSE) {
				//? show form
				$data = array(
					'cb' => new Template('KFCL', '1.0', base_url('assets')),
					'page_config' => false,
					'js_plugins' => ['js/plugins/jquery-validation/jquery.validate.min.js'],
					'page_js' => 'js/pages/op_auth_signin.min.js',
					'content' => 'auth/reset_password',
					'token_id' => $token_id,
					'reset_password_url' => $verification === 'verify' ?
						base_url('auth/reset_password/'.$token_id.'/verify') : 
						base_url('auth/reset_password/'.$token_id) 
				);
				$this->load->view($this->layout, $data);
			} else {
				$update_data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				);
				if ($verification === 'verify') $update_data['verified'] = TRUE;
				$updated = $this->users_model->update_user($update_data, $token['user_id']);
				if (!$updated) throw new \Exception("Could not update password");
				$this->tokens_model->invalidate_token($token['token_id']);
				$this->session->set_flashdata('msg', ['type' => 'success', 'content' => 'Password update successfully']);
				redirect(base_url('auth/login'), 'location');
			}
		} catch (\Throwable $th) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'content' => $th->getMessage()]);
			redirect(base_url('auth/login'), 'location');
		}
	}

	function forgot_password()
	{
		if ($this->form_validation->run('forgot_password') == FALSE) {
			$data = array(
				'cb' => new Template('KFCL', '1.0', base_url('assets')),
				'page_config' => false,
				'js_plugins' => ['js/plugins/jquery-validation/jquery.validate.min.js'],
				'page_js' => 'js/pages/op_auth_signin.min.js',
				'content' => 'auth/forgot_password'
			);
			$this->load->view($this->layout, $data);
		} else {
			$email = $this->input->post('email');
			try {
				$user = $this->users_model->get_user_by_email($email);
				if (empty($user)) throw new \Exception("Email is not registered to any account");

				$token = get_crypto_safe_token(random_int(25, 30));
				$token_data = array(
					'token' => $token,
					'token_expiry' => 7200,
					'user_id' => $user['user_id']
				);
				$token_id = $this->tokens_model->add_token($token_data);
				if (!$token_id) throw new \Exception("Could not process request");

				//? send email
				$to = array(
					'name' => $user['first_name'] . ' ' . $user['last_name'],
					'email' => $user['email']
				);
				$subject = 'Password reset';
				$email_data = array(
					'subject' => $subject,
					'reset_url' => base_url('auth/reset_password/' . $token_id),
					'name' => $to['name']
				);
				$body = $this->load->view('emails/forgot_password', $email_data, true);
				$response_code = $this->email->send_email($to, $subject, $body);
				if ($response_code !== 202) throw new \Exception("Could not process request");

				$this->session->set_flashdata('msg', ['type' => 'success', 'content' => 'A reset password token has been sent to your email address']);
				redirect(base_url('auth/forgot_password'));
			} catch (\Throwable $th) {
				$this->session->set_flashdata('msg', ['type' => 'danger', 'content' => $th->getMessage()]);
				redirect(base_url('auth/forgot_password'));
			}
		}
	}

	function logout()
	{
		session_destroy();
		redirect(base_url('auth/login'));
	}
}
