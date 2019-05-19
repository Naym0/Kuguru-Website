<?php defined('BASEPATH') or die('No direct script access allowed');

class Auth extends CI_Controller
{
	var $layout = 'template/template';
	function login()
	{
		if ($this->form_validation->run('login') == FALSE) {
			$data = array(
				'content' => 'auth/login'
			);
			$this->load->view($this->layout, $data);
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			try {
				$user = $this->users_model->get_user_by_email($email);
				if (empty($user)) throw new \Exception("Incorrect creditials");
				$valid_password = password_verify($password, $user['password']);
				if (!$valid_password) throw new \Exception("Incorrect creditials");
				redirect(base_url('dashboard/'));
			} catch (\Throwable $th) {
				$this->session->set_flashdata('msg', ['type' => 'danger', 'content' => $th->getMessage()]);
				redirect(base_url('auth/login'));
			}
		}
	}

	function create_account()
	{
		if ($this->form_validation->run('register') == FALSE) {
			$data = array(
				'content' => 'dashboard/add_users'
			);
			$this->load->view($this->layout, $data);
		} else {
			$user_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => null,
				'user_type' => $this->input->post('user_type'),
			);

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
					'name' => $user_data['first_name'] . ' ' . $user_data['last_name'],
					'email' => $user_data['email']
				);
				$subject = 'Account registration';
				$email_data = array(
					'subject' => $subject,
					'reset_url' => base_url('auth/reset_password/' . $token_id),
					'name' => $to['name']
				);
				$body = $this->load->view('emails/registration', $email_data, true);
				$response_code = $this->email->send_email($to, $subject, $body);
				if ($response_code !== 202) throw new \Exception("Could not add user");

				if ($this->db->trans_status() === FALSE) throw new \Exception("Could not add user");
				$this->db->trans_commit();
				$this->session->set_flashdata('msg', ['type' => 'success', 'content' => 'New user added']);
				redirect(base_url('dashboard/add_users'));
			} catch (\Throwable $th) {
				$this->db->trans_rollback();
				$this->session->set_flashdata('msg', ['type' => 'danger', 'content' => $th->getMessage()]);
				redirect(base_url('dashboard/add_users'));
			}
		}
	}

	function reset_password($token_id=null)
	{
		try {
			if(empty($token)) redirect(base_url('auth/login'), 'location');
			
			$this->tokens_model->invalidate_expired_tokens();
			$token = $this->tokens_model->get_token($token_id);
			if (empty($token)) throw new \Exception("Invalid token provided");
			if (!$token['valid']) throw new \Exception("Expired token provided");

			if ($this->form_validation->run('reset_password') == FALSE) {
				//? show form
				$data = array(
					'content' => 'auth/reset_password'
				);
				$this->load->view($this->layout, $data);
			} else {
				$update_data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				);
				$updated = $this->users_model->update_user($update_data, $token['user_id']);
				if (!$updated) throw new \Exception("Could not update password");
				$this->tokens_model->invalidate_token($token['token_id']);
				$this->session->set_flashdata('msg', ['type' => 'success', 'content' => 'Password update successfully']);
				redirect(base_url('auth/login'));
			}
		} catch (\Throwable $th) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'content' => $th->getMessage()]);
			redirect(base_url('auth/login'));
		}
	}

	function forgot_password()
	{
		if ($this->form_validation->run('forgot_password') == FALSE) {
			$data = array(
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
}
