<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        //echo "users_controller construct called<br><br>";
    } 

    public function test_db() {
        //$sql = "UPDATE users set email = 'albert@einstein.com where user_id = 2";
        //echo $sql;

        /*
        $new_user = Array (
            'first_name' => 'Jeff',
            'last_name' => 'Bezos',
            'email' => 'jeffb@amazon.com'
        );
        */

        //DB::instance(DB_NAME)->query($sql);
        //DB::instance(DB_NAME)->insert('users', $new_user);

        $_POST['first_name'] = 'Jeff';

        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        $sql = 'SELECT email FROM users WHERE first_name = "'.$_POST['first_name'].'"';
        //$sql = "SELECT email FROM users WHERE user_id = 3";
        echo DB::instance(DB_NAME)->select_field($sql);

    }

    public function index() {
        echo "This is the index page";
    }


    /**
     *
     */
    public function signup() {
        $this->template->content = View::instance('v_users_signup');
        echo $this->template;
    }


    /**
     * Process the sign up form
     */
    public function p_signup() {

        // Add created time to $_POST data
        $_POST['created'] = Time::now();

        // Add the token record
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        // Encrypt the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        // Insert the user information
        DB::instance(DB_NAME)->insert_row('users', $_POST);

        // Redirect after signup to login
        Router::redirect('/users/login');
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