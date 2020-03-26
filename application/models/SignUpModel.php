<?php
class SignUpModel extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    //Insert the User details once signed up
    public function setuser() {
        //Insert into the users table
        $username = $this->input->post('username');
        $password = $this->input->post('password'); 
        $darkMode = $this->input->post('darkmode'); 

        if(empty($_POST["darkMode"])) { 
            $darkMode = 0; 
        }
        else { 
            $darkMode = 1; 
        }

        $sql = "insert into users (UserName, UserPassword, DarkMode)
        values ($username, $password, $darkMode)";
        if ($this->db->query($sql) == 1)  {  
            return true;  
        } else {  
            return false;  
        }  
    }

}