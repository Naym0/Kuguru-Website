<?php defined('BASEPATH') or die('No direct script access allowed');

class Orders_model extends CI_Model
{
	//? create
	function create($data)
	{
		$inserted = $this->db->insert('tbl_orders', $data);
		return $inserted ? $this->db->insert_id() : false;
	}
	//? get all
	function get_all()
	{
		$this->joins_aliases();
		return $this->db->get('tbl_orders')->result_array();
	}
	//? get by id
	function get_by_id($order_id)
	{
		$this->joins_aliases();
		$this->db->where('tbl_orders.order_id', $order_id);
		return $this->db->get('tbl_orders')->row_array();
	}
	//? get by customer_id ($user_id)
	function get_by_customer_id($customer_id)
	{
		$this->joins_aliases();
		$this->db->where('tbl_orders.customer_id', $customer_id);
		return $this->db->get('tbl_orders')->result_array();
	}
	//? get by location
	function get_by_pickup_location($location_id)
	{
		$this->joins_aliases();
		$this->db->where('tbl_orders.pickup_location', $location_id);
		return $this->db->get('tbl_orders')->result_array();
	}
	//? get by employee processor
	function get_by_employee_processor($employee_id)
	{
		$this->joins_aliases();
		$this->db->where('tbl_orders.processed_by', $employee_id);
		return $this->db->get('tbl_orders')->result_array();
	}
	//? update
	function update($data, $order_id)
	{
		$this->db->where('order_id', $order_id);
		return $this->db->update('tbl_orders', $data);
	}
	//? Joins and aliases
	function joins_aliases()
	{
		//? employees
		$employee_aliases = array(
			'tbl_employees.last_name as employee_last_name',
			'CONCAT(tbl_employees.first_name, " ", tbl_employees.last_name ) as employee_fullname'
		);
		//? locations
		$location_aliases = array(
			'tbl_locations.location_name',
			'tbl_locations.phone_number AS location_phone_number',
			'tbl_locations.email AS location_email'
		);
		//? users
		$users_aliases = array(
			'users.email as customer_email',
		);

		$this->db->select("tbl_orders.*, CONCAT('ORDER-',tbl_orders.order_id) AS order_id_title, " .
			implode(", ", $employee_aliases) . ", " .
			implode(", ", $location_aliases) . ", " .
			implode(", ", $users_aliases));
		$this->db->join('tbl_employees', 'tbl_employees.employee_id = tbl_orders.processed_by', 'left');
		$this->db->join('tbl_locations', 'tbl_locations.location_id = tbl_orders.pickup_location');
		$this->db->join('users', 'users.user_id = tbl_orders.customer_id');
	}

	//? stats
	function orders_stats()
	{ 
		$location_id = $this->session->userdata('employee_details')['location_id'];
		return [
			'orders_summary' => $this->orders_summary($location_id),
			'orders_today' => $this->orders_today($location_id),
			'orders_this_week' => $this->orders_this_week($location_id)
		];
	}

	//? orders summary
	function orders_summary($location_id)
	{ 
		$this->db->select('count(*) as total_orders, status');
		$this->db->where('pickup_location', $location_id);
		$this->db->group_by('status');
		$result = $this->db->get('tbl_orders')->result_array();
		$response = ['all' => 0];
		foreach ($result as $row) {
			$response['all'] += $row['total_orders'];
			$response[$row['status']] = $row['total_orders'];
		}
		$response['failed'] = with_default($response, 'rejected', 0) + with_default($response, 'user cancelled', 0);
		return $response;
	}

	//? orders created today
	function orders_today($location_id)
	{ 
		$this->db->select('count(*) as total_orders, status');
		$this->db->where('pickup_location', $location_id);
		$this->db->where('DATE(`created_at`)', 'CURDATE()',false);
		$this->db->group_by('status');
		$result = $this->db->get('tbl_orders')->result_array();
		$response = ['all' => 0];
		foreach ($result as $row) {
			$response['all'] += $row['total_orders'];
			$response[$row['status']] = $row['total_orders'];
		}
		$response['failed'] = with_default($response, 'rejected', 0) + with_default($response, 'user cancelled', 0);
		return $response;
	}

	//? orders this weeek
	function orders_this_week($location_id)
	{ 
		$this->db->select('DAYOFWEEK(`created_at`) as dayofweek, count(*) as total_orders',false);
		$this->db->where('pickup_location', $location_id);
		$this->db->where('WEEK(`created_at`)', 'WEEK(DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY))',false);
		$this->db->group_by('dayofweek');
		$this->db->order_by('dayofweek', 'ASC');
		$result = $this->db->get('tbl_orders')->result_array();
		$response = [];
		foreach ($result as $row) {
			$day = get_day_of_week($row['dayofweek']-1);
			$response[$day] = $row['total_orders'];
		}
		return $response;
	}
}
