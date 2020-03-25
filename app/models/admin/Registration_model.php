<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 15-Aug-19
 * Time: 12:51 PM
 */

class Registration_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPlayersById($id)
    {
        $q = $this->db->get_where('players', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function registrationBatch($data)
    {

        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        if(!empty($data)) $this->db->insert_batch('registration',$data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    public function getRegistrationInfoById($id)
    {
        $this->db->select($this->db->dbprefix('players') . '.*, ' . $this->db->dbprefix('registration') . '.reference_no as r_ref,'. $this->db->dbprefix('warehouses') . '.name as s_name,'. $this->db->dbprefix('categories') . '.name as d_name')
            ->join('registration', 'registration.player_id=players.id', 'inner')
            ->join('warehouses', 'warehouses.id=players.school_id', 'left')
            ->join('categories', 'players.division=categories.id', 'left')
            ->where('registration.reference_no',$id);
        $q = $this->db->get('players');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function delete($id)
    {
        if ($this->db->delete('registration', array('reference_no' => $id))) return true;
        else return FALSE;
    }

}