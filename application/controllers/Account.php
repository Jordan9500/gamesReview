<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Consider if it would be best to autoload some of the helpers from here.
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->helper('html');
        $this->load->helper('cookie');

        // Load in your Models below.
        $this->load->model('SQLModel');
        $this->load->model('UserModel');
        $this->load->model('SignUpModel');

        // Consider creating new Models for different functionality.
    }

    public function index() {
        //Load data required for web page in array.
        // Change this to whatever title you wish.
        $data['title'] = 'Games Reviews';

        // Condition checking if the user exists.
        if (!($this->UserModel->checkCookie())) {
            //The user doesn't exist so change your page accordigly.
            $data['userExists'] = False;
        }
        else {
            //The user does exist so change your page accordigly.
            //Load the view and send the data accross.
            $data['userExists'] = True;
        }
        $data['userDetails'] = $this->SQLModel->getuserbycookie();
        $this->load->view('templateHead', $data);
        $this->load->view('account', $data);
        $this->load->view('templateFooter', $data);

    }

    public function editUser() {
        if (!($this->UserModel->checkCookie())) {
            //The user doesn't exist so change your page accordigly.
            redirect('http://localhost/gamesReview/index.php/login');
        }
        else {
            // The user exists provide access to changing their details
            $data['userExists'] = 'False';
            $data['userDetails'] = $this->SQLModel->getuserbycookie();
            $this->load->view('templateHead', $data);
            $this->load->view('accountEdit', $data);
            $this->load->view('templateFooter', $data);
        }
    }

    public function updateUser() {
        //get the altered username
        $username = $this->input->post('username');
        // Condition checking if the user exists.
        if (!($this->UserModel->checkCookie())) {
            //The user doesn't exist so change your page accordigly.
            redirect('http://localhost/gamesReview/index.php/login');
        }
        $data['userDetails'] = $this->SQLModel->getuserbycookie();
        //Check if the user name exists in the database
        if($this->SQLModel->ifusername()) {
            if($this->SQLModel->updateUserDetails()) {
                $data['userExists'] = 'False';
                set_cookie('active_user', $username, 10000);
                redirect('http://localhost/gamesReview/index.php/account');
            }
        }
        else {
            //If it does then tell them its invalid
            $data['userExists'] = 'True';
            //Load the view and send the data accross.
            $this->load->view('templateHead', $data);
            $this->load->view('accountEdit', $data);
            $this->load->view('templateFooter', $data);
        }
    }
  
}