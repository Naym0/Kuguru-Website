<?php defined('BASEPATH') or die('No direct script access allowed');

class Locationemployees_model extends CI_Model {
	//?create
	function create($data) {
		$inserted = $this->db->insert('tbl_locationemployees',$data);
		return $inserted ? $this->db->insert_id() : false;
	}
	//?update
	function update($data, $locationemployee_id) {
		$this->db->where('locationemployees_id', $locationemployee_id);
		return $this->db->update('tbl_locationemployees',$data);
	}
}
