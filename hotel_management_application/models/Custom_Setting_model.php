<?php
class Custom_Setting_model extends CI_Model {

	public function __construct() {
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_custom_values($custom_name) {
		$this->db->where('custom_name', $custom_name);
		$query = $this->db->get('custom_settings');
		$result = $query->row();
		return $result->custom_value ?: '';
	}
}