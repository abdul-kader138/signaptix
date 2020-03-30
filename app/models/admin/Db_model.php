<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    //abdul Kader
    public function getTotalUsers()
    {
        $this->db->select('count(id) as total', FALSE);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getTotalClients()
    {


        $this->db->select('count(id) as total', FALSE);
        if (!$this->Owner && !$this->Admin) $this->db->where('users.id', $this->session->userdata('user_id'));
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getLatestUsers()
    {
        $this->db->select('*')
            ->from('users')
            ->limit(5);
        $this->db->order_by('users.id', 'desc');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function getLatestClients()
    {

        $warehouse_id = null;

//        $user_details=$this->getUserByID($this->session->userdata('user_id'));
        $this->db->select('clients.*,users.first_name as wname')
            ->from('clients')
            ->join('users', 'users.username = clients.user_id', 'inner')
            ->limit(5);
        $this->db->order_by('users.id', 'desc');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }


    public function getUserByID($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }



}
