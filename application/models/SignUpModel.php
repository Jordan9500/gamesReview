<?php
class SignUpModel extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    //Get for all games
    public function setuser() {
        //Insert into the users table
        $username = $this->input->post('username');
        $password = $this->input->post('password'); 
        $sql = "insert into users (UserName, UserPassword)
        values ('$username', '$password')";
        if ($this->db->query($sql) == 1)  {  
            return true;  
        } else {  
            return false;  
        }   
    }

}