<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
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
        
        // Consider creating new Models for different functionality.
    }

    public function index() {
        $data['failed'] = False;
        $data['userExists'] = False;
        if ($this->UserModel->checkCookie()) {
            //Cookie detected redirect them to the account page intead
            redirect('http://localhost/gamesReview/index.php/account');
        } 
        
        //Load the view and send the data accross.
        $this->load->view('templateHead', $data);
        $this->load->view('login', $data);
    }

    public function GetUser() {
        //Get the user name 
        if($this->SQLModel->getuserbypost()) {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['failed'] = False;
            $data['userExists'] = False;
            //Check if the cookie already exists
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
        else {
            //The username doesnt exist
            $data['failed'] = True;
            $data['userExists'] = False;
            //Load the view and send the data accross.
            $this->load->view('templateHead', $data);
            $this->load->view('login', $data);
        }
    }
}