<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Route_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->Settings = $this->site->get_setting();
        $this->m = strtolower($this->router->fetch_class());
        $this->v = strtolower($this->router->fetch_method());
        $this->data['m']= $this->m;
        $this->data['v'] = $this->v;

    }

    function page_construct($page, $data = array()) {
            $data['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
            $data['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
            $data['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
            $data['reminder'] = isset($data['reminder']) ? $data['reminder'] : $this->session->flashdata('reminder');

            $data['Settings'] = $this->Settings;
            $data['pages'] = $this->shop_model->getAllPages();

            if (!$this->loggedIn && $this->Settings->captcha) {
                $this->load->helper('captcha');
                $vals = array(
                    'img_path' => './assets/captcha/',
                    'img_url' => base_url('assets/captcha/'),
                    'img_width' => 210,
                    'img_height' => 34,
                    'word_length' => 5,
                    'colors' => array('background' => array(255, 255, 255), 'border' => array(204, 204, 204), 'text' => array(102, 102, 102), 'grid' => array(204, 204, 204))
                    );
                $cap = create_captcha($vals);
                $capdata = array(
                    'captcha_time' => $cap['time'],
                    'ip_address' => $this->input->ip_address(),
                    'word' => $cap['word']
                    );

                $query = $this->db->insert_string('captcha', $capdata);
                $this->db->query($query);
                $data['image'] = $cap['image'];
                $data['captcha'] = array('name' => 'captcha',
                    'id' => 'captcha',
                    'type' => 'text',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => lang('type_captcha')
                    );
            }

            $data['ip_address'] = $this->input->ip_address();
            $data['page_desc'] = isset($data['page_desc']) && !empty($data['page_desc']) ? $data['page_desc'] : $this->shop_settings->description;
            $this->load->view($this->theme . 'header', $data);
            $this->load->view($this->theme . $page, $data);
            $this->load->view($this->theme . 'footer');
    }

}
