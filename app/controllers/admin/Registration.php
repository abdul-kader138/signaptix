<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 15-Aug-19
 * Time: 12:50 PM
 */

class Registration extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->permission_details = $this->site->checkPermissions();
        $this->lang->admin_load('reports', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('registration_model');

    }


    function index()
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['registration-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                admin_redirect($_SERVER["HTTP_REFERER"]);
            }
        }


        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Registration')));
        $meta = array('page_title' => lang('Registration'), 'bc' => $bc);
        $this->page_construct('registration/index', $meta, $this->data);
    }

    function getRegistrationList()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['registration-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                admin_redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $user_details = $this->site->getUserByID($this->session->userdata('user_id'));

        $delete_link = "";
        $action = "";
        $pdf_link = anchor('admin/registration//pdf/$1', '<i class="fa fa-file-pdf-o"></i> ' . lang('Download_PDF'));
        if ($delete_link || $pdf_link) {
            if ($get_permission['registration-delete'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("Delete") . "</b>' data-content=\"<p>"
                . lang('r_u_sure') . "</p><a class='btn btn-danger' href='" . admin_url('registration/delete/$1') . "'>"
                . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
                . lang('Delete') . "</a>";
            $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . lang('actions') . ' <span class="caret"></span></button>

        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $delete_link . '</li>
            <li>' . $pdf_link . '</li>
        </ul>
    </div></div>';
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('registration') . ".reference_no as ids, " . $this->db->dbprefix('registration') . ".reference_no," . $this->db->dbprefix('warehouses') . ".name as sname,count(" . $this->db->dbprefix('registration') . ".id) as quantity," . $this->db->dbprefix('registration') . ".status,concat(" . $this->db->dbprefix('users') . ".last_name,' '," . $this->db->dbprefix('users') . ".first_name) as uname," . $this->db->dbprefix('registration') . ".created_date", false)
            ->from("registration")
            ->join('users', 'users.id=registration.created_by', 'left')
            ->join('warehouses', 'warehouses.id=registration.school_id', 'left')
            ->group_by('registration.reference_no');
        if (!$this->Owner && !$this->Admin && $user_details->view_right == '0') {
            $this->datatables->where('registration.created_by', $this->session->userdata('user_id'));
        }
        $this->datatables->add_column("Actions", $action, "ids");
        echo $this->datatables->generate();
    }


    function registration_group($id = NULL)
    {

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['id'] = $id;
        $this->data['schools'] = $this->site->getAllSchool();
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Registration')));
        $meta = array('page_title' => lang('Registration_Group'), 'bc' => $bc);
        $this->page_construct('registration/registration_group', $meta, $this->data);
    }


    function getRegistrationGroups($school_id)
    {
        $this->load->library('datatables');
        $school_id = $this->input->get('school_id') ? $this->input->get('school_id') : 0;
        $si = "";
//        $si = "( SELECT ut.id as u_id FROM " . $this->db->dbprefix('players') . " as ut WHERE ut.created_by=".$customer_id." and ut.reference_no NOT IN (select ui.doc_ref from " . $this->db->dbprefix('invoices') . " as ui ";
        $si = "( SELECT ut.id as u_id FROM " . $this->db->dbprefix('players') . " as ut WHERE  ut.school_id=" . $school_id . " and ut.id NOT IN (select ui.player_id from " . $this->db->dbprefix('registration') . " as ui ";
        $si .= ") group by  u_id ) POrder";
        $this->datatables
            ->select("{$this->db->dbprefix('players')}.id as ids, {$this->db->dbprefix('players')}.ssfl,concat( {$this->db->dbprefix('players')}.first_name,' ', {$this->db->dbprefix('players')}.last_name) names,{$this->db->dbprefix('players')}.zone as zname,{$this->db->dbprefix('categories')}.name as cname, {$this->db->dbprefix('players')}.trs,concat(if({$this->db->dbprefix('users')}.last_name is null ,'',{$this->db->dbprefix('users')}.last_name),' ',if({$this->db->dbprefix('users')}.first_name is null ,'',{$this->db->dbprefix('users')}.first_name)) as createdBy")
            ->from('players')
            ->join($si, 'POrder.u_id=players.id', 'inner')
            ->join('categories', 'players.division=categories.id', 'left')
            ->join('users', 'players.created_by=users.id', 'inner');
        echo $this->datatables->generate();

    }

    public function add()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['registration-registration_group'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                admin_redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');
        $this->form_validation->set_rules('school_id', lang("School_Name"), 'required');


        if ($this->form_validation->run() == true) {
            if (!empty($_POST['val'])) {

                // validate and sync order and menu


                $ref_no = date('Y') . date('m') . date('d') . rand(1, 99999);
                foreach ($_POST['val'] as $key => $value) {


                    $info = $this->registration_model->getPlayersById($value);
                    $user_info = $this->site->getUsersByUserName($info->username);

                    if ($_POST['school_id'] != $info->school_id) {
                        $this->session->set_flashdata('error', 'Please select School correctly before submitting');
                        admin_redirect($_SERVER["HTTP_REFERER"]);
                    }

                    $player = array(
                        'school_id' => $info->school_id,
                        'player_first_name' => $user_info->first_name,
                        'player_last_name' => $user_info->last_name,
                        'created_by' => $this->session->userdata('user_id'),
                        'created_date' => date("Y-m-d H:i:s"),
                        'reference_no' => $ref_no,
                        'player_ref' => $info->ssfl,
                        'player_id' => $info->id,
                        'status' => 'Applied'
                    );
                    $players[] = $player;
                }
                // array build done(For batch insertion)
            } else {
                $this->session->set_flashdata('error', lang("No_Item_Selected"));
                admin_redirect($_SERVER["HTTP_REFERER"]);
            }

            // Batch insertion
            if ($this->form_validation->run() == true && $this->registration_model->registrationBatch($players)) {
                $this->session->set_flashdata('message', lang('Info_Updated_Successfully'));
                admin_redirect('registration');
            } else {
                $this->session->set_flashdata('error', validation_errors());
                admin_redirect($_SERVER["HTTP_REFERER"]);
            }

        } else {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function delete($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['registration-delete'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                admin_redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->registration_model->delete($id)) {
            $this->session->set_flashdata('message', lang('Info_Deleted_Successfully'));
            admin_redirect('registration');
        } else {
            $this->session->set_flashdata('message', lang('Operation_Failed'));
            admin_redirect('registration'); }


    }


    function modal_view($id = NULL)
    {

        $pr_details = $this->registration_model->getRegistrationInfoById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('Registration_Info_Not_Found'));
            $this->sma->md();
        }
        $this->data['inv'] = $pr_details;
        $this->load->view($this->theme . 'registration/modal_view', $this->data);
    }

    public function pdf($id = null, $view = null, $save_bufffer = null)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['registration-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $footer = '<div class="clearfix"></div><div class="col-xs-3">
     <p style="height: 50px;">Principal</p>
    <span>------------------</span>
    <p>&nbsp;&nbsp;&nbsp;</p>
    </div>

    <div class="col-xs-4" style="text-align: center">
    <p style="height: 50px;">School Stamp</p>
     <span>--------------------</span>
    <p>&nbsp;&nbsp;&nbsp;</p>
    </div>

    <div class="col-xs-3 pull-right">
    <p style="height: 50px;">Received By</p>
    <span>--------------------</span>
    <p>&nbsp;&nbsp;&nbsp;</p>
    </div>
    <div class="clearfix"></div>
    <div class="clearfix"></div><div class="col-sm-12"><hr></div><div class="col-sm-6" style="text-align:left;font-size: 11px;">Printed Date & Time: ' . date("Y-m-d h:i:sa") . '</div><div class="col-sm-5 pull-right" style="text-align: right">{nbpg}</div>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $pr_details = $this->registration_model->getRegistrationInfoById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('Registration_Info_Not_Found'));
            $this->sma->md();
        }
        $this->data['inv'] = $pr_details;
        $this->load->view($this->theme . 'registration/pdf', $this->data);
        $name = "Registration_List" . "_" . str_replace('/', '_', $id) . ".pdf";
        $html = $this->load->view($this->theme . 'registration/pdf', $this->data, true);
        if ($view) {
            $this->load->view($this->theme . 'registration/pdf', $this->data);
        } elseif ($save_bufffer) {
            return $this->sma->generate_pdf($html, $name, $save_bufffer);
        } else {
            $this->sma->generate_pdf($html, $name, null, $footer);
        }
    }

    public function order_status($x = '')
    {
        if ($x == '') {
            return '';
        } else if ($x == 'Repeater') {
            return '<b>R</b>';
        } else if ($x == 'Transfer') {
            return '<b>T</b>';
        } else if ($x == 'Transfer Repeater') {
            return '<b>TR</b>';
        } else if ($x == 'N/A') {
            return '<b>N</b>';
        } else {
            return '';
        }
    }

}