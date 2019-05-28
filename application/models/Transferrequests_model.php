<?php defined('BASEPATH') or die('No direct script access allowed');

class Transferrequests_model extends CI_Model {
	//?create
	function create($data) {
		$inserted = $this->db->insert('tbl_transferrequests', $data);
		return $inserted ? $this->db->insert_id() : false;
	}
	//? get by location
	function get_all_by_location($location_id) {
		$this->join_aliases();
		$this->db->where('tbl_transferrequests.to_location', $location_id);
		return $this->db->get('tbl_transferrequests')->result_array();
	}
	//?update
	function update($data, $transferrequest_id) {
		$this->db->where('transferrequest_id', $transferrequest_id);
		return $this->db->update('tbl_transferrequests', $data);
	}
	//? join aliases
	function join_aliases() {
		$this->db->select('tbl_transaferrequests.*, tbl_employees.*, from_locations.location_name as from_location_name, to_locations.location_name as to_location_name');
		$this->db->join('tbl_employees', 'tbl_employees.employee_id = tbl_transferrequests.employee_id');
		$this->db->join('tbl_locations as from_locations', 'from_locations.location_id = tbl_transferrequests.from_location');
		$this->db->join('tbl_locations as to_locations', 'to_locations.location_id = tbl_transferrequests.to_location');
	}
}
