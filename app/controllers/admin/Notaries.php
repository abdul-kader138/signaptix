<?php
/**
 * Created by a.kader
 * Email: codelover138@gmail.com
 * Date: 30-Mar-20
 * Time: 10:51 AM
 */

class Notaries extends MY_Controller
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
        $this->load->admin_model('notaries_model');
        $this->load->admin_model('auth_model');
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif';
        $this->digital_file_types_commission = 'zip|pdf';
        $this->allowed_file_size = '5048';
    }

    function index()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Notaries')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/index', $meta, $this->data);
    }

    function getNotaries()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-index'])) {
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
            ->select($this->db->dbprefix('notaries') . ".id as ids," . $this->db->dbprefix('users') . ".avatar," . $this->db->dbprefix('notaries') . ".ref_no as ref, concat(" . $this->db->dbprefix('users') . ".first_name,' '," . $this->db->dbprefix('users') . ".last_name) as u_name,"  . $this->db->dbprefix('notaries') . ".notary_email," . $this->db->dbprefix('notaries') . ".notary_phone," . $this->db->dbprefix('notaries') . ".address," . $this->db->dbprefix('notaries') . ".created_date")
            ->from("users");
        $this->datatables->join('notaries', 'users.id=notaries.user_id', 'inner');

        if ($user_id) $this->datatables->where('users.id', $user_id);
        $this->datatables->group_by('users.id');

        $this->datatables->edit_column('active', '$1', 'ids')
            ->add_column("Actions", "<div class=\"text-center\"><a href='" . admin_url('notaries/edit/$1') . "' class='tip' title='" . lang("Edit") . "'><i class=\"fa fa-edit\"></i></a>&nbsp;<a href='#' class='po' title='<b>" . lang("Delete") . "</b>' data-content=\"<p>"
                . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . admin_url('notaries/delete/$1') . "'>"
                . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i></a></div>", "ids");
        echo $this->datatables->generate();
    }

    function add()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-add'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Client";
        $this->load->helper('security');
        $this->form_validation->set_rules('username', lang("username"), 'xss_clean|trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('notary_email', lang("Email"), 'xss_clean|trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('contact_email', lang("contact_email"), 'xss_clean|trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('note', lang("note"), 'xss_clean|trim');
        $this->form_validation->set_rules('notary_phone', lang("Phone"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('notary_mobile', lang("Mobile_No"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('contact_phone', lang("contact_phone"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('notary_fax', lang("Fax"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('notary_office_phone', lang("Office_Phone"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('address', lang("Address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('mailing_address', lang("mailing_address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('first_name', lang("first_name"), 'trim|required');
        $this->form_validation->set_rules('last_name', lang("last_name"), 'trim|required');
        $this->form_validation->set_rules('about_yourself', lang("About_Yourself"), 'trim|required');
        $this->form_validation->set_rules('password', lang('password'), 'required|min_length[8]|max_length[25]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'required');
        $this->form_validation->set_rules('avatar', lang("avatar"), 'trim');

        $image = null;
        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('username'));
            $email = $this->input->post('notary_email');
            $password = $this->auth_model->hash_password($this->input->post('password'));
            $notify = $this->input->post('notify');
            $ip_address = $this->input->ip_address();
            if ($_FILES['avatar']['size'] > 0) $image = $this->image_upload();
            else $this->form_validation->set_rules('avatar', lang("avatar"), 'required');
            $user_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('notary_phone'),
                'group_id' => '3',
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
            $notary_data = array(
                'notary_email' => $this->input->post('notary_email'),
                'contact_email' => $this->input->post('contact_email'),
                'notary_phone' => $this->input->post('notary_phone'),
                'notary_mobile' => $this->input->post('notary_mobile'),
                'contact_phone' => $this->input->post('contact_phone'),
                'notary_fax' => $this->input->post('notary_fax'),
                'notary_office_phone' => $this->input->post('notary_office_phone'),
                'created_date' => date('Y-m-d h:i:s'),
                'created_by' => $this->session->userdata('user_id'),
                'address' => $this->input->post('address'),
                'mailing_address' => $this->input->post('mailing_address'),
                'about_yourself' => $this->input->post('about_yourself'),
                'note' => $this->input->post('note')
            );

        }
        if ($this->form_validation->run() == true && $this->notaries_model->addNotary($notary_data, $user_data)) {
//            if ($notify) $msg = $this->sendEmail(($this->input->post('first_name') . ' ' . $this->input->post('last_name')), $email, $this->input->post('password'));
            $this->session->set_flashdata('message', 'information successfully updated.');
            admin_redirect("notaries");

        } else {
            $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            if ($image) {
                unlink('assets/uploads/avatars/' . $image);
                unlink('assets/uploads/avatars/thumbs/' . $image);
            }
            $bc = array(array('link' => admin_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Add_Notary')));
            $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
            $this->page_construct('notaries/add_notary', $meta, $this->data);
        }
    }

    function edit($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);


        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('notary_email', lang("Email"), 'xss_clean|trim|required|valid_email');
        $this->form_validation->set_rules('contact_email', lang("contact_email"), 'xss_clean|trim|required|valid_email');
        $this->form_validation->set_rules('note', lang("note"), 'xss_clean|trim');
        $this->form_validation->set_rules('notary_phone', lang("Phone"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('notary_mobile', lang("Mobile_No"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('contact_phone', lang("contact_phone"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('notary_fax', lang("Fax"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('notary_office_phone', lang("Office_Phone"), 'xss_clean|trim|required|regex_match[/^\+?[0-9-()]+$/]');
        $this->form_validation->set_rules('address', lang("Address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('mailing_address', lang("mailing_address"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('first_name', lang("first_name"), 'trim|required');
        $this->form_validation->set_rules('last_name', lang("last_name"), 'trim|required');
        $this->form_validation->set_rules('about_yourself', lang("About_Yourself"), 'trim|required');
        $this->form_validation->set_rules('avatar', lang("avatar"), 'trim');

        if ($usr_details->email != $this->input->post('notary_email')) {
            $this->form_validation->set_rules('notary_email', lang("Email"), 'xss_clean|trim|valid_email|required|is_unique[users.email]');

        }

        if ($this->form_validation->run() == true) {
            $image = $usr_details->avatar;
            if ($_FILES['avatar']['size'] > 0) {
                $image = $this->image_upload();
//                unlink('assets/uploads/avatars/' . $usr_details->avatar);
//                unlink('assets/uploads/avatars/thumbs/' . $usr_details->avatar);
//                $image = $image_new;
            }

            $user_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => strtolower($this->input->post('email')),
                'phone' => $this->input->post('notary_phone'),
                'avatar' => $image,
            );
            $notary_data = array(
                'notary_email' => $this->input->post('notary_email'),
                'contact_email' => $this->input->post('contact_email'),
                'notary_phone' => $this->input->post('notary_phone'),
                'notary_mobile' => $this->input->post('notary_mobile'),
                'contact_phone' => $this->input->post('contact_phone'),
                'notary_fax' => $this->input->post('notary_fax'),
                'notary_office_phone' => $this->input->post('notary_office_phone'),
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'address' => $this->input->post('address'),
                'mailing_address' => $this->input->post('mailing_address'),
                'about_yourself' => $this->input->post('about_yourself'),
                'note' => $this->input->post('note')
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->updateNotary($pr_details->id, $notary_data, $usr_details->id, $user_data)) {
            $this->session->set_flashdata('message', lang("Information_Updated_Successfully."));
            admin_redirect("notaries/edit/" . $id);
        } else {
            $this->data['notary'] = $pr_details;
            $this->data['notary_commission'] = $pr_commission_details;
            $this->data['e_notary_commission'] = $pr_e_commission_details;
            $this->data['producer_license'] = $producer_license;
            $this->data['bar_license'] = $bar_license;
            $this->data['background_check'] = $background_check;
            $this->data['insurance'] = $insurance;
            $this->data['training'] = $training;
            $this->data['user'] = $usr_details;
            $this->data['payment'] = $payment;
            $this->data['nav'] = 'general_information';
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//            $this->data['csrf'] = $this->_get_csrf_nonce();
            $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
            $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
            $this->page_construct('notaries/edit_notary', $meta, $this->data);
        }
    }

    function edit_commission($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);

        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('commission_state', lang("Commission State"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('commission_number', lang("Commission Number"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('expiration_date', lang("Expiration Date"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('certificate_attachment', lang("Certificate Attachment"),  'xss_clean|trim');

        if (!isset($pr_commission_details->certificate_attachment) && empty($_FILES['certificate_attachment']['name'])) {
            $this->form_validation->set_rules('certificate_attachment', lang("Certificate Attachment"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $pr_commission_details->certificate_attachment;
            if ($_FILES['certificate_attachment']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/notary_commission', 'certificate_attachment');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'commission_state' => $this->input->post('commission_state'),
                'commission_number' => $this->input->post('commission_number'),
                'expiration_date' => $this->sma->fsd($this->input->post('expiration_date')),
                'certificate_attachment' => $file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryCommission($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['training'] = $training;
        $this->data['user'] = $usr_details;
        $this->data['payment'] = $payment;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'commission';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

    }

    function edit_electronic_commission($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);

        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('e_commission_state', lang("Commission State"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('e_commission_number', lang("Commission Number"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('e_expiration_date', lang("Expiration Date"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('e_certificate_attachment', lang("Certificate Attachment"),  'xss_clean|trim');

        if (!$pr_e_commission_details->e_certificate_attachment && empty($_FILES['e_certificate_attachment']['name'])) {
            $this->form_validation->set_rules('e_certificate_attachment', lang("Certificate Attachment"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $pr_e_commission_details->e_certificate_attachment;
            if ($_FILES['e_certificate_attachment']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/electronic_notary_commission', 'e_certificate_attachment');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'e_commission_state' => $this->input->post('e_commission_state'),
                'e_commission_number' => $this->input->post('e_commission_number'),
                'e_expiration_date' => $this->sma->fsd($this->input->post('e_expiration_date')),
                'e_certificate_attachment' => $file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryECommission($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['training'] = $training;
        $this->data['user'] = $usr_details;
        $this->data['payment'] = $payment;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'electronic_commission';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

    }

    function edit_producer_license($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);

        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('state', lang("State"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('license_number', lang("License Number"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('p_expiration_date', lang("Expiration Date"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('p_certificate_attachment', lang("Certificate Attachment"),  'xss_clean|trim');

        if (!$producer_license->p_certificate_attachment && empty($_FILES['p_certificate_attachment']['name'])) {
            $this->form_validation->set_rules('p_certificate_attachment', lang("Certificate Attachment"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $producer_license->p_certificate_attachment;
            if ($_FILES['p_certificate_attachment']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/notary_producer_license', 'p_certificate_attachment');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'state' => $this->input->post('state'),
                'license_number' => $this->input->post('license_number'),
                'p_expiration_date' => $this->sma->fsd($this->input->post('p_expiration_date')),
                'p_certificate_attachment' => $file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryProducerLicense($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['user'] = $usr_details;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'producer_license';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

    }

    function edit_bar_license($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);

        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('b_state', lang("State"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('b_license_number', lang("License Number"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('b_expiration_date', lang("Expiration Date"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('b_certificate_attachment', lang("Certificate Attachment"),  'xss_clean|trim');

        if (!$bar_license->b_certificate_attachment && empty($_FILES['b_certificate_attachment']['name'])) {
            $this->form_validation->set_rules('b_certificate_attachment', lang("Certificate Attachment"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $bar_license->b_certificate_attachment;
            if ($_FILES['b_certificate_attachment']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/notary_bar_license', 'b_certificate_attachment');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'b_state' => $this->input->post('b_state'),
                'b_license_number' => $this->input->post('b_license_number'),
                'b_expiration_date' => $this->sma->fsd($this->input->post('b_expiration_date')),
                'b_certificate_attachment' => $file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryBarLicense($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['training'] = $training;
        $this->data['user'] = $usr_details;
        $this->data['payment'] = $payment;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'bar_license';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

    }

    function edit_background_check($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);


        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('company', lang("Company"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('url', lang("URL"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('issue_date', lang("Issue Date"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('background_check', lang("Background Check"),  'xss_clean|trim');

        if (!$background_check->background_check && empty($_FILES['background_check']['name'])) {
            $this->form_validation->set_rules('background_check', lang("Background Check"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $background_check->background_check;
            if ($_FILES['background_check']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/notary_background_check', 'background_check');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'company' => $this->input->post('company'),
                'url' => $this->input->post('url'),
                'issue_date' => $this->sma->fsd($this->input->post('issue_date')),
                'background_check' => $file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryBackGroundCheck($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['training'] = $training;
        $this->data['user'] = $usr_details;
        $this->data['payment'] = $payment;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'background_check';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

    }


    function edit_insurance($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);

        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('i_company', lang("Company"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('i_policy_number', lang("Policy Number"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('i_amount', lang("Amount"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('i_expiration_date', lang("Expiration Date"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('i_background_check', lang("Background Check Attachment"),  'xss_clean|trim');

        if (!$insurance->i_background_check && empty($_FILES['i_background_check']['name'])) {
            $this->form_validation->set_rules('i_background_check', lang("Background Check Attachment"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $insurance->i_background_check;
            if ($_FILES['i_background_check']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/notary_insurance', 'i_background_check');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'i_company' => $this->input->post('i_company'),
                'i_policy_number' => $this->input->post('i_policy_number'),
                'i_amount' => $this->input->post('i_amount'),
                'i_expiration_date' => $this->sma->fsd($this->input->post('i_expiration_date')),
                'i_background_check' => $file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryInsurance($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['training'] = $training;
        $this->data['user'] = $usr_details;
        $this->data['payment'] = $payment;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'insurance';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

    }

    function edit_training($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);

        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('training', lang("Training Certification"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('training_certificate', lang("Training Certification Attachment"), 'xss_clean|trim');

        if (!$training->training_certificate && empty($_FILES['training_certificate']['name'])) {
            $this->form_validation->set_rules('training_certificate', lang("Training Certification Attachment"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $training->training_certificate;
            if ($_FILES['training_certificate']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/notary_training', 'training_certificate');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'training' => $this->input->post('training'),
                'training_certificate' =>$file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryTraining($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['training'] = $training;
        $this->data['user'] = $usr_details;
        $this->data['payment'] = $payment;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'training';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

    }

    function edit_payment($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $pr_commission_details = $this->notaries_model->getNotaryCommissionByID($id);
        $pr_e_commission_details = $this->notaries_model->getNotaryECommissionByID($id);
        $usr_details = $this->notaries_model->getUsersByID($pr_details->user_id);
        $producer_license = $this->notaries_model->getProducerLicenseByID($id);
        $bar_license = $this->notaries_model->getBarLicenseByID($id);
        $background_check = $this->notaries_model->getBackgroundCheckByID($id);
        $insurance = $this->notaries_model->getInsuranceByID($id);
        $training = $this->notaries_model->getTrainingByID($id);
        $payment = $this->notaries_model->getPaymentByID($id);

        if (!$this->Owner && !$this->Admin) {
            if ($this->session->userdata('user_id') != $pr_details->user_id) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('cheque_payable', lang("Cheque Payable"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('eni', lang("SSN/ENI"), 'xss_clean|trim|required');
        $this->form_validation->set_rules('w_9', lang("W-9"), 'xss_clean|trim');

        if (!$payment->w_9 && empty($_FILES['w_9']['name'])) {
            $this->form_validation->set_rules('w_9', lang("W-9 Attachment"),  'required');
        }
        if ($this->form_validation->run() == true) {
            $file_path = $payment->w_9;
            if ($_FILES['w_9']['size'] > 0) {
                $file_path = $this->file_upload('assets/uploads/notary_payment', 'w_9');
//                unlink('assets/uploads/notary_commission/' . $file_path);
//                $file_path = $file_path_new;
            }

            $notary_data = array(
                'cheque_payable' => $this->input->post('cheque_payable'),
                'eni' => $this->input->post('eni'),
                'w_9' =>$file_path,
                'updated_date' => date('Y-m-d h:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'notary_id' => $id
            );
        }

        if ($this->form_validation->run() == true && $this->notaries_model->addNotaryPayment($notary_data, $id)) {
            $this->session->set_flashdata('message', 'information successfully updated.');
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $pr_commission_details;
        $this->data['e_notary_commission'] = $pr_e_commission_details;
        $this->data['producer_license'] = $producer_license;
        $this->data['bar_license'] = $bar_license;
        $this->data['background_check'] = $background_check;
        $this->data['insurance'] = $insurance;
        $this->data['training'] = $training;
        $this->data['user'] = $usr_details;
        $this->data['payment'] = $payment;
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
//        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['nav'] = 'payment';
        $bc = array(array('link' => base_url('home'), 'page' => lang('home')), array('link' => admin_url('notaries'), 'page' => lang('Notaries')), array('link' => '#', 'page' => lang('Edit_Notary')));
        $meta = array('page_title' => lang('Notaries'), 'bc' => $bc);
        $this->page_construct('notaries/edit_notary', $meta, $this->data);

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
            if ((!$get_permission['notaries-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $pr_details = $this->notaries_model->getNotaryByID($id);

        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('Notary_Not_Found'));
            $this->sma->md();
        }
        $this->data['notary'] = $pr_details;
        $this->data['notary_commission'] = $this->notaries_model->getNotaryCommissionByID($pr_details->id);
        $this->data['e_notary_commission'] = $this->notaries_model->getNotaryECommissionByID($pr_details->id);
        $this->data['producer_license'] =  $this->notaries_model->getProducerLicenseByID($pr_details->id);
        $this->data['bar_license'] = $this->notaries_model->getBarLicenseByID($pr_details->id);
        $this->data['background_check'] = $this->notaries_model->getBackgroundCheckByID($pr_details->id);
        $this->data['insurance'] = $this->notaries_model->getInsuranceByID($pr_details->id);
        $this->data['training'] = $this->notaries_model->getTrainingByID($pr_details->id);
        $this->data['user'] = $this->site->getUsersByID($pr_details->user_id);
        $this->data['payment'] = $this->notaries_model->getPaymentByID($pr_details->id);
        $this->load->view($this->theme . 'notaries/modal_view', $this->data);
    }


    function delete($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['notaries-delete'])) {
                $this->sma->send_json(array('error' => 1, 'msg' => lang("access_denied")));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

//        @todo
//        need to check when player implemented

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->notaries_model->getNotaryByID($id);
        $usr_details = $this->site->getUsersByID($pr_details->user_id);
        if ($this->notaries_model->deleteNotary($id, $usr_details->id)) {
//            unlink('assets/uploads/avatars/' . $usr_details->avatar);
//            unlink('assets/uploads/avatars/thumbs/' . $usr_details->avatar);
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

    function file_upload($path, $name)
    {
        $this->load->library('upload');
//        $config['upload_path'] = 'assets/uploads/avatars';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf';
        //$config['max_size'] = '500';
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;
        $config['max_filename'] = 25;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($name)) {

            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $file_name = $this->upload->file_name;
        return $file_name;
    }

    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

}