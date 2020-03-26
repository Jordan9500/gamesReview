<?php
class SQLModel extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    //Get Users Using the username and password when posted
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

    //Check the database if the username has been used when posted
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

    //Update the current users infomation
    public function updateUserDetails() {
        $username = $this->input->post('username');
        $oldUsername = $_COOKIE["active_user"];
        $password = $this->input->post('password'); 
        $darkMode = $this->input->post('darkmode'); 

        if(empty($_POST["darkMode"])) { 
            $darkMode = 0; 
        }
        else { 
            $darkMode = 1; 
        }

        $sql = "update users 
                Set UserName='$username', UserPassword='$password', DarkMode='$darkMode'
                where UserName=$oldUsername";
        if ($this->db->query($sql) == 1)  {  
            return true;  
        } 
        else {  
            return false;  
        }  
    }
}