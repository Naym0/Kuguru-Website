<?php defined('BASEPATH') or die('No direct script access allowed');

class Locations_model extends CI_Model {
	//? create
	function create($data) {
		$inserted = $this->db->insert('tbl_locations', $data);
		return $inserted ? $this->db->insert_id() : false;
	}
	//? get_all
	function get_all() {
		return $this->db->get('tbl_locations')->result_array();
	}
	//? get by location id
	function get_by_id($location_id) {
		$this->db->where('location_id', $location_id);
		return $this->db->get('tbl_locations')->row_array();
	}
	//? get by phone number
	function get_by_phone_number($phone_number) {
		$this->db->where('phone_number', $phone_number);
		return $this->db->get('tbl_locations')->row_array();
	}
	//? get by email
	function get_by_email($email) {
		$this->db->where('email', $email);
		return $this->db->get('tbl_locations')->row_array();
	}
	//? update
	function update($data, $location_id) {
		$this->db->where('location_id', $location_id);
		return $this->db->update('tbl_locations', $data);
	}
	//? delete (suspend)
	function delete($location_id) {
		return $this->update(array('suspended' => true), $location_id);
	}
}
