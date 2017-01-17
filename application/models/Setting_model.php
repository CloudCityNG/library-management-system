<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 2/12/16
 * Time: 4:41 PM
 */

class setting_model extends CI_Model{
    public function __construct() {
        parent:: __construct();
        $this->load->helper('form');
    }

    public function view(){
        $data = $this->db->get('settings');
        if(count($data)>0){
            return $data;
        } else{
            return FALSE;
        }
    }

    public function edit($id, $value){
        $this->db->set('value',$value);
        $this->db->where('id',$id);
        $this->db->update('settings');
    }

    public function getFeeConstant(){
        $this->db->select('value');
        $this->db->from('settings');
        $this->db->where('name','FEE');
        $fee = $this->db->get();
        foreach($fee->result() as $row){
            $fees = $row->value;
        }
        return $fees;
    }

    public function getDepositConstant(){
        $this->db->select('value');
        $this->db->from('settings');
        $this->db->where('name','DEPOSIT');
        $fee = $this->db->get();
        foreach($fee->result() as $row){
            $deposit = $row->value;
        }
        return $deposit;
    }
}