<?php
/**
 * Created by PhpStorm.
 * User: kk
 * Date: 4/11/2019
 * Time: 9:28 PM
 */

class Clients_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function addClient($data = array(),$user_data=array())
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->insert('users', $user_data);
        $data['user_id']=$this->db->insert_id();
        $this->db->insert('clients', $data);
        $last_client_id = $this->db->insert_id();
        $ref = date("Y") . sprintf("%05d", $last_client_id);
        $this->db->where('id',$last_client_id);
        $this->db->update('clients', array('ref_no'=>$ref));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }


    public function getClientByID($id)
    {
        $q = $this->db->get_where('clients', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getUsersByID($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function updateClient($player_id, $client_data = array(),$user_id,$user_data = array())
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('id',$player_id);
        $this->db->update('clients', $client_data);
        $this->db->where('id',$user_id);
        $this->db->update('users', $user_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        else return true;
    }


    public function deleteClient($client_id,$user_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('id',$client_id);
        $this->db->delete('clients');
        $this->db->where('id',$user_id);
        $this->db->delete('users');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        else return true;
    }
}