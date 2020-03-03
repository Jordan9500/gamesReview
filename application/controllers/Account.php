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
    }
  
}