<?php defined('BASEPATH') or die('No direct script access allowed');

class Users_model extends CI_Model
{
	function get_all()
	{
		return $this->db->get('users')->result_array();
	}

	function get_all_by_type($usertype, $active_only=false)
	{ 
		if($active_only) {
			$this->db->where('suspended', false);
			$this->db->where('verified', true);
		}
		$this->db->where('user_type',$usertype);
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
		return $inserted ? $this->db->insert_id() : false;
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

	//? stats
	function user_stats() {
		$customers = count($this->get_all_by_type('customer'));
		$active_customers = count($this->get_all_by_type('customer', true));
		$active_customers_percentage = floor($active_customers/$customers * 100);

		$employees = count($this->get_all_by_type('employee'));
		$active_employees = count($this->get_all_by_type('employee', true));
		$active_employees_percentage = floor($active_employees/$employees * 100);

		$admins = count($this->get_all_by_type('admin'));
		$active_admins = count($this->get_all_by_type('admin', true));
		$active_admins_percentage = floor($active_admins/$admins * 100);
		return [
			'all_customers' => $customers,
			'active_customers_percentage' => $active_customers_percentage,
			'all_employees' => $employees,
			'active_employees_percentage' =>  $active_employees_percentage,
			'all_admins' => $admins,
			'active_admins_percentage' => $active_admins_percentage
		];
	}
}
