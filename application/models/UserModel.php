<?php
class UserModel extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    public function checkCookie() {
        //Check if the cookie already exists
        $is_user = get_cookie('active_user',TRUE);

        if ($is_user) {
            //Cookie detected.
            return true;
        } 
        else {
            return false;
        }
    }


}