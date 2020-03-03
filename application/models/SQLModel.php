<?php
class SQLModel extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    //Get Users Using the username and password
    public function getuserbypost() {
        // You can use the select, from, and where functions to simplify this as seen in Week 13.
        $this->db->select('UserName, UserPassword');
        $this->db->from('users');
        $this->db->where('UserName', $this->input->post('username'));  
        $this->db->where('UserPassword', $this->input->post('password'));  
        $query = $this->db->get();  
  
        if ($query->num_rows() == 1)  {  
            return true;  
        } else {  
            return false;  
        }  
    }

    //Check the database if the username has been used
    public function ifusername() {
        // Select statements.
        $this->db->select('UserName');
        $this->db->from('users');
        $this->db->where('UserName', $this->input->post('username'));  
        $query = $this->db->get();  
  
        if ($query->num_rows() == 0)  {  
            return true;  
        } else {  
            return false;  
        }  
    }

    //check the database using the current cookie
    public function getuserbycookie() {
        // Select statements.
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('UserName', $_COOKIE["active_user"]);  
        $query = $this->db->get();  
        return $query->result(); 
    }


    

}