<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Custom_Setting_model', 'custom');
	}
	public function index() {
		$data['bootstap_theme'] = $this->custom->get_custom_values('bootstrap_theme');
		$this->load->view('hotel/layout/header');
		$this->load->view('hotel/layout/header_script', $data);
		$this->load->view('hotel/home/index');
		$this->load->view('hotel/layout/footer');
		$this->load->view('hotel/layout/footer_script');
	}
}