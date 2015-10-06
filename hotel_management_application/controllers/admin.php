<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    private $data;
    function __construct()
    {
        parent::__construct();
        $this->lang->load('auth');
        $this->load->model('Custom_Setting_model', 'custom');
        if($this->ion_auth->logged_in()){
            redirect('/', 'refresh');
        }
        $this->data['bootstap_theme'] = $this->custom->get_custom_values('bootstrap_theme');
    }
    function login()
    {

        $this->data['title'] = "Login";

        //validate form input
        $this->form_validation->set_rules('email_id', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true)
        {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('/', 'refresh');
            }
            else
            {

                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                $this->load->view('hotel/layout/header');
                $this->load->view('hotel/layout/header_script', $this->data);
                $this->load->view('hotel/auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
                $this->load->view('hotel/layout/footer');
                $this->load->view('hotel/layout/footer_script');
            }
        }
        else
        {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['email_id'] = array('name' => 'email_id',
                                            'id'    => 'email_id',
                                            'type'  => 'text',
                                            'value' => $this->form_validation->set_value('email_id'),
            );
            $this->data['password'] = array('name' => 'password',
                                            'id'   => 'password',
                                            'type' => 'password',
            );
            $this->load->view('hotel/layout/header');
            $this->load->view('hotel/layout/header_script', $this->data);
            $this->_render_page('hotel/auth/login', $this->data); // use redirects instead of loading views for compatibility with MY_Controller libraries
            $this->load->view('hotel/layout/footer');
            $this->load->view('hotel/layout/footer_script');
        }


    }

    function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
    }
}