<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        //echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {

        $this->template->hide_navbar = TRUE;

        // Setup the view
        $this->template->content = View::instance('v_users_login');
        $this->template->title = "Login";

        // Display the view
        echo $this->template;
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function edit($user_name = NULL) {

        // Setup the view
        $this->template->content = View::instance('v_users_edit');
        $this->template->title = "Edit Profile";

        // pass the user name parameter
        $this->template->content->user_name = $user_name;

        // Display the view
        echo $this->template;
    }

    public function remove() {
        echo "This is the signup page";
    }

    public function search() {
        echo "This is the signup page";
    }

    public function view() {
        echo "This is the signup page";
    }

    /* 
     * URL structure for parameter is http://host/controler/method/paramter
     */
    public function profile($user_name = NULL) {

        // Setup the view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile";

        // pass the user name parameter
        $this->template->content->user_name = $user_name;

        // Display the view
        echo $this->template;

        /* insert content into head
        $client_files_head = Array(
            '/css/profile.css', 
            '/css/master.css');

        $client_files_body = Array(
            '/js/profile.js');

        $this->template->client_files_head = Utils::load_client_files($client_files_head);
        $this->template->client_files_body = Utils::load_client_files($client_files_body);

        

        $view = View::instance('v_users_profile');
        $view->user_name = $user_name;
        $view->color = "red";

        echo $view;
        
        if($user_name == NULL) {
            echo "No user specified";
        }
        else {
            echo "This is the profile for ".$user_name;
        }
        */
    }

} # end of the class