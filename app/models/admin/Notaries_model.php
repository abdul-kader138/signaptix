<?php
/**
 * Created by PhpStorm.
 * User: kk
 * Date: 4/11/2019
 * Time: 9:28 PM
 */

class Notaries_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function addNotary($data = array(),$user_data=array())
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->insert('users', $user_data);
        $data['user_id']=$this->db->insert_id();
        $this->db->insert('notaries', $data);
        $last_client_id = $this->db->insert_id();
        $ref = date("Y") . sprintf("%05d", $last_client_id);
        $this->db->where('id',$last_client_id);
        $this->db->update('notaries', array('ref_no'=>$ref));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    public function addNotaryCommission($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_commission');
        $this->db->insert('notary_commission', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    public function addNotaryECommission($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_electronic_commission');
        $this->db->insert('notary_electronic_commission', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
    public function addNotaryProducerLicense($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_producer_license');
        $this->db->insert('notary_producer_license', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
    public function addNotaryBarLicense($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_bar_license');
        $this->db->insert('notary_bar_license', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
    public function addNotaryBackGroundCheck($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_background_check');
        $this->db->insert('notary_background_check', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    public function addNotaryInsurance($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_insurance');
        $this->db->insert('notary_insurance', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
    public function addNotaryTraining($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_training');
        $this->db->insert('notary_training', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
    public function addNotaryPayment($data = array(),$notary_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('notary_id',$notary_id);
        $this->db->delete('notary_payments');
        $this->db->insert('notary_payments', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
    public function getNotaryByID($id)
    {
        $q = $this->db->get_where('notaries', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getNotaryCommissionByID($id)
    {
        $q = $this->db->get_where('notary_commission', array('notary_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getNotaryECommissionByID($id)
    {
        $q = $this->db->get_where('notary_electronic_commission', array('notary_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    public function getProducerLicenseByID($id)
    {
        $q = $this->db->get_where('notary_producer_license', array('notary_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    public function getBarLicenseByID($id)
    {
        $q = $this->db->get_where('notary_bar_license', array('notary_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    public function getBackgroundCheckByID($id)
    {
        $q = $this->db->get_where('notary_background_check', array('notary_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    public function getInsuranceByID($id)
{
    $q = $this->db->get_where('notary_insurance', array('notary_id' => $id), 1);
    if ($q->num_rows() > 0) {
        return $q->row();
    }
    return FALSE;
}

    public function getTrainingByID($id)
    {
        $q = $this->db->get_where('notary_training', array('notary_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    public function getPaymentByID($id)
    {
        $q = $this->db->get_where('notary_payments', array('notary_id' => $id), 1);
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

    public function updateNotary($player_id, $notary_data = array(),$user_id,$user_data = array())
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('id',$player_id);
        $this->db->update('notaries', $notary_data);
        $this->db->where('id',$user_id);
        $this->db->update('users', $user_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        else return true;
    }


    public function deleteNotary($notary_id,$user_id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('id',$notary_id);
        $this->db->delete('notaries');
        $this->db->where('id',$user_id);
        $this->db->delete('users');
//        $this->db->where('notary_id',$notary_id);
//        $this->db->delete('notary_commission');
//        $this->db->where('notary_id',$notary_id);
//        $this->db->delete('notary_electronic_commission');
//        $this->db->where('notary_id',$notary_id);
//        $this->db->delete('notary_producer_license');
//        $this->db->where('notary_id',$notary_id);
//        $this->db->delete('notary_bar_license');
//        $this->db->where('notary_id',$notary_id);
//        $this->db->delete('notary_background_check');
//        $this->db->where('notary_id',$notary_id);
//        $this->db->delete('notary_insurance');
//        $this->db->where('notary_id',$notary_id);
//        $this->db->delete('notary_training');

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        else return true;
    }
}