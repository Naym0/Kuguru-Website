<?php defined('BASEPATH') or die('No direct script access allowed');

class Employees_model extends CI_Model {
	//?create
	function create($data) {
		$inserted = $this->db->insert('tbl_employees',$data);
		return $inserted ? $this->db->insert_id() : false;
	}
	//?get_all
	function get_all() {
		$this->join_aliases();		
		$this->db->where('tbl_locationemployees.active', TRUE);
		return $this->db->get('tbl_employees')->result_array();
	}
	//? get_all by location
	function get_all_by_location($location_id) {
		$this->join_aliases();
		$this->db->where('tbl_locationemployees.location_id', $location_id);
		$this->db->where('tbl_locationemployees.active', TRUE);
		return $this->db->get('tbl_employees')->result_array();
	}
	//?get_by_employee_id
	function get_by_employee_id($employee_id) {
		$this->join_aliases();
		$this->db->where('employee_id', $employee_id);
		$this->db->where('tbl_locationemployees.active', TRUE);
		return $this->db->get('tbl_employees')->row_array();
	}
	//?get_by_user_id
	function get_by_user_id($user_id) {
		$this->join_aliases();
		$this->db->where('tbl_employees.user_id', $user_id);
		$this->db->where('tbl_locationemployees.active', TRUE);
		return $this->db->get('tbl_employees')->row_array();
	}
	//?update
	function update($data, $employee_id) {
		$this->db->where('employee_id', $employee_id);
		return $this->db->update('tbl_employees', $data);
	}
	//?suspend
	function suspend($employee_id) {
		return $this->update(array('suspended'=> true), $employee_id);
	}

	function join_aliases() {
		//? locations
		$location_aliases = array(
			'tbl_locations.location_name',
			'tbl_locations.phone_number AS location_phone_number',
			'tbl_location.email AS location_email'
		);
		$this->db->select('tbl_employees.*, users.email AS employee_email, tbl_locationemployees.*'.
		implode(", ", $location_aliases));
		$this->db->join('users','users.user_id = tbl_employees.user_id');
		$this->db->join('tbl_locationemployees', 'tbl_locationemployees.employee_id = tbl_employees.employee_id');
		$this->db->join('tbl_locations', 'tbl_locations.location_id = tbl_locationemployees.location_id');
	}
}
