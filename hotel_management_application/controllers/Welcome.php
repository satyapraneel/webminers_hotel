<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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
