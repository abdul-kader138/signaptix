<?php
/**
 * Created by PhpStorm.
 * User: kk
 * Date: 4/11/2019
 * Time: 9:26 PM
 */

class Clients extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->permission_details = $this->site->checkPermissions();
        $this->lang->admin_load('customers', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('clients_model');
        $this->load->admin_model('auth_model');
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif';
        $this->allowed_file_size = '5048';
    }

    function index()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['clients-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Clients')));
        $meta = array('page_title' => lang('Clients'), 'bc' => $bc);
        $this->page_construct('clients/index', $meta, $this->data);
    }

    function getClients()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['clients-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $user_id = null;
        if (!$this->Owner && !$this->Admin && !$this->session->userdata('view_right')) {
            $user_id = $this->session->userdata('user_id');
        }
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('clients') . ".id as ids," . $this->db->dbprefix('users') . ".avatar," . $this->db->dbprefix('clients') . ".ref_no as ref," . $this->db->dbprefix('clients') . ".company_name," . $this->db->dbprefix('clients') . ".company_type," . $this->db->dbprefix('clients') . ".tin," . $this->db->dbprefix('clients') . ".company_email," . $this->db->dbprefix('clients') . ".company_phone, concat(" . $this->db->dbprefix('users') . ".first_name,' ', " . $this->db->dbprefix('users') . ".last_name) as u_name")
            ->from("users");
        $this->datatables->join('clients', 'users.id=clients.user_id', 'inner');

        if ($user_id) $this->datatables->where('users.id', $user_id);
        $this->datatables->group_by('users.id');

        $this->datatables->edit_column('active', '$1', 'ids')
            ->add_column("Actions", "<div class=\"text-center\"><a href='" . admin_url('clients/edit/$1') . "' class='tip' title='" . lang("Edit") . "'><i class=\"fa fa-edit\"></i></a>&nbsp;<a href='#' class='po' title='<b>" . lang("Delete") . "</b>' data-content=\"<p>"
                . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . admin_url('clients/delete/$1') . "'>"
                . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i></a></div>", "ids");
        echo $this->datatables->generate();
    }

    function add()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['clients-add'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Client";
        $this->load->helper('security');
        $this->form_validation->set_rules('username', lang("username"), 'xss_clean|trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('company_email', lang("company_email"), 'xss_clean|trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('contact_email', lang("contact_email"), 'xss_clean|trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('company_name', lang("company_name"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('tin', lang("tin"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('note', lang("note"), 'xss_clean|trim');
        $this->form_validation->set_rules('company_phone', lang("company_phone"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('contact_phone', lang("contact_phone"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('company_fax', lang("company_fax"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('company_type', lang("company_type"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('receive_invoices', lang("receive_invoices"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('company_address', lang("company_address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('mailing_address', lang("mailing_address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('first_name', lang("first_name"), 'trim|required');
        $this->form_validation->set_rules('last_name', lang("last_name"), 'trim|required');
        $this->form_validation->set_rules('password', lang('password'), 'required|min_length[8]|max_length[25]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'required');
        $this->form_validation->set_rules('avatar', lang("avatar"), 'trim');

        $image = null;
        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('username'));
            $email = $this->input->post('company_email');
            $password = $this->auth_model->hash_password($this->input->post('password'));
            $notify = $this->input->post('notify');
            $ip_address = $this->input->ip_address();
            if ($_FILES['avatar']['size'] > 0) $image = $this->image_upload();
            else $this->form_validation->set_rules('avatar', lang("avatar"), 'required');
            $user_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company_name'),
                'phone' => $this->input->post('company_phone'),
                'group_id' => '2',
                'view_right' => 0,
                'edit_right' => 0,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'ip_address' => $ip_address,
                'created_on' => time(),
                'last_login' => time(),
                'avatar' => $image,
                'active' => 1
            );
            $client_data = array(
                'company_name' => $this->input->post('company_name'),
                'tin' => $this->input->post('tin'),
                'company_phone' => $this->input->post('company_phone'),
                'contact_phone' => $this->input->post('contact_phone'),
                'company_fax' => $this->input->post('company_fax'),
                'contact_email' => $this->input->post('contact_email'),
                'company_email' => $this->input->post('company_email'),
                'company_type' => $this->input->post('company_type'),
                'receive_invoices' => $this->input->post('receive_invoices'),
                'created_date' => date('Y-m-d h:i:s'),
                'created_by' => $this->session->userdata('user_id'),
                'company_address' => $this->input->post('company_address'),
                'mailing_address' => $this->input->post('mailing_address'),
                'note' => $this->input->post('note')
            );

        }
        if ($this->form_validation->run() == true && $this->clients_model->addClient($client_data, $user_data)) {
            if ($notify) $msg = $this->sendEmail(($this->input->post('first_name') . ' ' . $this->input->post('last_name')), $email, $this->input->post('password'));
            $this->session->set_flashdata('message', 'information successfully updated.');
            admin_redirect("clients");

        } else {
            $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            if ($image) {
                unlink('assets/uploads/avatars/' . $image);
                unlink('assets/uploads/avatars/thumbs/' . $image);
            }
            $bc = array(array('link' => admin_url('home'), 'page' => lang('home')), array('link' => admin_url('clients'), 'page' => lang('Clients')), array('link' => '#', 'page' => lang('Add_Client')));
            $meta = array('page_title' => lang('Clients'), 'bc' => $bc);
            $this->page_construct('clients/add_client', $meta, $this->data);
        }
    }

    function edit($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['clients-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->clients_model->getClientByID($id);
        $usr_details = $this->clients_model->getUsersByID($pr_details->user_id);


        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('company_name', lang("company_name"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('tin', lang("tin"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('note', lang("note"), 'xss_clean|trim');
        $this->form_validation->set_rules('company_phone', lang("company_phone"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('contact_phone', lang("contact_phone"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('company_fax', lang("company_fax"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('company_type', lang("company_type"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('receive_invoices', lang("receive_invoices"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('company_address', lang("company_address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('mailing_address', lang("mailing_address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('first_name', lang("first_name"), 'trim|required');
        $this->form_validation->set_rules('last_name', lang("last_name"), 'trim|required');
        if ($usr_details->email != $this->input->post('company_email')) {
            $this->form_validation->set_rules('company_email', lang("company_email"), 'trim|required|is_unique[users.email]');
        }

        if ($this->form_validation->run() == true) {
            $image = $usr_details->avatar;
            if ($_FILES['avatar']['size'] > 0) {
                $image_new = $this->image_upload();
                unlink('assets/uploads/avatars/' . $usr_details->avatar);
                unlink('assets/uploads/avatars/thumbs/' . $usr_details->avatar);
                $image = $image_new;
            }

            $user_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => strtolower($this->input->post('company_email')),
                'phone' => $this->input->post('company_phone'),
                'avatar' => $image,
            );
            $client_data = array(
                'company_name' => $this->input->post('company_name'),
                'tin' => $this->input->post('tin'),
                'company_phone' => $this->input->post('company_phone'),
                'contact_phone' => $this->input->post('contact_phone'),
                'company_fax' => $this->input->post('company_fax'),
                'contact_email' => $this->input->post('contact_email'),
                'company_email' => $this->input->post('company_email'),
                'company_type' => $this->input->post('company_type'),
                'receive_invoices' => $this->input->post('receive_invoices'),
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'company_address' => $this->input->post('company_address'),
                'mailing_address' => $this->input->post('mailing_address'),
                'note' => $this->input->post('note')
            );
        }

        if ($this->form_validation->run() == true && $this->clients_model->updateClient($pr_details->id, $client_data, $usr_details->id, $user_data)) {
            $this->session->set_flashdata('message', lang("Information_Updated_Successfully."));
            admin_redirect("clients");
        } else {
            $this->data['client'] = $pr_details;
            $this->data['user'] = $usr_details;
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $bc = array(array('link' => admin_url('home'), 'page' => lang('home')), array('link' => admin_url('clients'), 'page' => lang('Clients')), array('link' => '#', 'page' => lang('Edit_Client')));
            $meta = array('page_title' => lang('Clients'), 'bc' => $bc);
            $this->page_construct('clients/edit_client', $meta, $this->data);
        }
    }


    function sendEmail($name, $email, $password)
    {
        $message = "";
        $this->load->library('parser');
        $parse_data = array(
            'client_name' => $name,
            'site_link' => site_url(),
            'site_name' => $this->Settings->site_name,
            'email' => $email,
            'password' => $password,
            'logo' => '<img src="' . base_url() . 'assets/uploads/logos/' . $this->Settings->logo . '" alt="' . $this->Settings->site_name . '"/>'
        );

        $msg = file_get_contents('./themes/' . $this->Settings->theme . '/admin/views/email_templates/credentials.html');
        $message = $this->parser->parse_string($msg, $parse_data);
        $subject = $this->lang->line('New_User_Created') . ' - ' . $this->Settings->site_name;
        try {
            $this->sma->send_email($email, $subject, $message);
            $message = "And user login credentials sent to email,please check and login";
        } catch (Exception $e) {
            $message = "But email sent time get exception," . $e->getMessage();
        }
        return $message;
    }


    function modal_view($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['clients-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $pr_details = $this->clients_model->getClientByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('Client_Not_Found'));
            $this->sma->md();
        }
        $updated_by = null;
        $this->data['client'] = $pr_details;
        $this->data['user'] = $this->site->getUsersByID($pr_details->user_id);
        $this->data['updated_by'] = $updated_by;
        $this->load->view($this->theme . 'clients/modal_view', $this->data);
    }


    function delete($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['clients-delete'])) {
                $this->sma->send_json(array('error' => 1, 'msg' => lang("access_denied")));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

//        @todo
//        need to check when player implemented

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->clients_model->getClientByID($id);
        $usr_details = $this->site->getUsersByID($pr_details->user_id);
        if ($this->clients_model->deleteClient($id, $usr_details->id)) {
            unlink('assets/uploads/avatars/' . $usr_details->avatar);
            unlink('assets/uploads/avatars/thumbs/' . $usr_details->avatar);
            $this->sma->send_json(array('error' => 0, 'msg' => lang("Information_Deleted_Successfully.")));
        } else {
            $this->sma->send_json(array('error' => 1, 'msg' => lang("Operation_Not_Success")));
        }
    }

    function image_upload()
    {
        $this->load->library('upload');
        $config['upload_path'] = 'assets/uploads/avatars';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size'] = '500';
        $config['max_width'] = $this->Settings->iwidth;
        $config['max_height'] = $this->Settings->iheight;
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;
        $config['max_filename'] = 25;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('avatar')) {

            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $photo = $this->upload->file_name;

        $this->load->helper('file');
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/uploads/avatars/' . $photo;
        $config['new_image'] = 'assets/uploads/avatars/thumbs/' . $photo;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        $config['height'] = 200;

        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        return $photo;
    }

}