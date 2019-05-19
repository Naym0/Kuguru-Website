<?php defined('BASEPATH') or die('No direct script access allowed');

class Tokens_model extends CI_Model
{
	function get_all_valid()
	{
		$this->db->where('valid', TRUE);
		return $this->db->get('tokens')->result_array();
	}

	function add_token($data)
	{
		$inserted = $this->db->insert('tokens', $data);
		return $inserted ? $this->db->insert_id() : fale;
	}

	function get_token($token_id)
	{ 
		$this->db->where('token_id',$token_id);
		return $this->db->get('tokens')->row_array();
	}

	function invalidate_token($token_id)
	{
		$this->db->where('token_id', $token_id);
		return $this->db->update('tokens', array('valid' => false));
	}

	function invalidate_expired_tokens()
	{
		$update_batch = [];
		$tokens = $this->get_all_valid();
		foreach ($tokens as $token) {
			$expired = $this->check_if_expired($token['created_at'], $token['token_expiry']);
			if ($expired) {
				$update_batch[] = array(
					'token_id' => $token['token_id'],
					'valid' => FALSE
				);
			}
		}
		if(!empty($update_batch)) $this->db->update_batch('tokens', $update_batch, 'token_id');
	}

	function check_if_expired($created_at, $token_expiry)
	{
		$now = $this->time->get_now();
		$diff = $this->time->time_diff($now, $created_at);
		return $diff > $token_expiry;
	}
}
