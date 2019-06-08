<?php defined('BASEPATH') or die('No direct script access allowed');

class Locations_model extends CI_Model {
	//? create
	function create($data) {
		$inserted = $this->db->insert('tbl_locations', $data);
		return $inserted ? $this->db->insert_id() : false;
	}
	//? get_all
	function get_all($active_only = false) {
		if ($active_only) $this->db->where('suspended', false);
		return $this->db->get('tbl_locations')->result_array();
	}
	//? get by location id
	function get_by_id($location_id) {
		$this->db->where('location_id', $location_id);
		return $this->db->get('tbl_locations')->row_array();
	}
	//? get by location name
	function get_by_name($location_name) {
		$this->db->where('location_name', $location_name);
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
	//? delete
	function delete($location_id) {
		return $this->db->delete('tbl_locations',array('location_id'=> $location_id));
	}

	//? stats
	function location_stats() {
		return [
			'all' => count($this->get_all()),
			'active' =>count($this->get_all(true))
		];
	}
}
