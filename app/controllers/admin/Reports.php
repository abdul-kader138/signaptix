<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->lang->admin_load('reports', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('reports_model');

    }

    function index()
    {

    }
	
	 function players_registration($players_id = NULL)
    {
        $this->sma->checkPermissions('players_registration');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || !$this->session->userdata('players_id')) {
            $this->data['players_id'] = $players_id ? $this->site->getPlayersByID($players_id) : NULL;
        }

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('reports'), 'page' => lang('reports')), array('link' => '#', 'page' => lang('players_registration')));
        $meta = array('page_title' => lang('players_registration'), 'bc' => $bc);
        $this->page_construct('reports/players_registration', $meta, $this->data);
    }

	 function getPlayersRegistration($players_id = NULL, $pdf = NULL, $xls = NULL)
    {
        $this->sma->checkPermissions('players_registration', TRUE);
        if (!$this->Owner && !$warehouse_id) {
            $user = $this->site->getUser();
            
        }

        if ($pdf || $xls) {

           

    }


}
