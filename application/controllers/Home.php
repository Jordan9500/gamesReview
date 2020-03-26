<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Consider if it would be best to autoload some of the helpers from here.
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->helper('html');
        $this->load->helper('cookie');

        // Load in your Models below.
        $this->load->model('HomeModel');
        $this->load->model('UserModel');
        $this->load->model('SQLModel');

        // Consider creating new Models for different functionality.
    }

    public function index() {
        //Load data required for web page in array.
        // Change this to whatever title you wish.
        $data['title'] = 'Games Reviews';

        // Condition checking if the user exists.
        if (!($this->UserModel->checkCookie())) {
            //The user doesn't exist so change your page accordigly.
            $data['userExists'] = false;
        }
        else {
            //The user does exist so change your page accordigly.
            $data['userExists'] = true;    
        }

        
        // Get the data from our Home Model.
        $data['result'] = $this->HomeModel->getGame();
        
        //Load the view and send the data accross.
        $this->load->view('templateHead', $data);
        $this->load->view('home', $data);
        $this->load->view('templateFooter', $data);
    }

    public function Logout() {
        // Condition checking if the user exists.
        if ($this->UserModel->checkCookie()) {
            //The user does exist so change your page accordigly.
            delete_cookie('active_user');
        }
        redirect('http://localhost/gamesReview/index.php/Home');
    }

    public function review($slug = NULL) {
        //Get the data from the model based on the slug we have.
        //Slugs match on to the knowledge around wildcard routes.
        //More information on slugs can be found here: https://codeigniter.com/user_guide/tutorial/news_section.html

        // Change this to whatever title you wish.
        $data['title'] = 'Games Reviews';

        // Condition checking if the user exists.
        if (!($this->UserModel->checkCookie())) {
            //The user doesn't exist so change your page accordigly.
            $data['userExists'] = false;
        }
        else {
            //The user does exist so change your page accordigly.
            $data['userExists'] = true;    
        }
        $slug = urldecode($slug);

        $data['result'] = $this->HomeModel->getReview($slug);
        $data['commentResult'] = $this->HomeModel->getReviewComments($slug);

        $this->load->view('templateHead', $data);    
        $this->load->view('review', $data);  
        $this->load->view('templateFooter', $data);  

    }
  
}