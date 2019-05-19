<?php defined('BASEPATH') or die('No direct script access allowed');

class Users_model extends CI_Model
{
	function get_all()
	{
		return $this->db->get('users')->result_array();
	}

	function get_user_by_id($user_id)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->get('users')->row_array();
	}

	function get_user_by_email($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('users')->row_array();
	}

	function add_user($data)
	{
		$inserted = $this->db->insert('users', $data);
		return $inserted ? $this->db->insert_id() : fale;
	}

	function update_user($data, $user_id)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->update('users', $data);
	}

	function suspend_user($user_id)
	{
		return $this->update_user(['suspended' => TRUE], $user_id);
	}

	function delete_user($user_id)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->delete('users');
	}
}
