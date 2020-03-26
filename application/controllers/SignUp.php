<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SignUp extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Consider if it would be best to autoload some of the helpers from here.
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->helper('html');
        $this->load->helper('cookie');

        // Load in your Models below.
        $this->load->model('SignUpModel');
        $this->load->model('SQLModel');
        $this->load->model('UserModel');

        // Consider creating new Models for different functionality.
    }

    public function index() {
        $data['userExists'] = 'False';
    
        //Check if the cookie already exists
        if ($this->UserModel->checkCookie()) {
            //Cookie detected.
            redirect('http://localhost/gamesReview/index.php/account');
        } 
        
        //Load the view and send the data accross.
        $this->load->view('templateHead', $data);
        $this->load->view('signup', $data);
    }

    public function SetUser() {
        //Check if the username is existent in the database
        if($this->SQLModel->ifusername()) {
            // If it isnt set the user 
            if($this->SignUpModel->setuser()) {
                $data['username'] = $this->input->post('username');
                $data['password'] = $this->input->post('password');
                $data['userExists'] = 'False';

                // Check if the user exists
                if (!($this->UserModel->checkCookie())) {
                    //No cookie detected. Store a cookie with the value as the value from our form
                    set_cookie('active_user',$data['username'],10000);
                    
                    redirect('http://localhost/gamesReview/index.php/account');
                }
                else {
                    //Cookie detected. Delete the cookie.
                    delete_cookie('active_user');
                    redirect('http://localhost/gamesReview/index.php/login');
                }           
            }
        }
        else {
            // If it does exist inform the user that its invalid
            $data['userExists'] = 'True';
            //Load the view and send the data accross.
            $this->load->view('templateHead', $data);
            $this->load->view('signup', $data);
        }
    }
}