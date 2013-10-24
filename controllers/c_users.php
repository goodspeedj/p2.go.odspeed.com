<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        //echo "users_controller construct called<br><br>";
    } 


    /**
     * Main index page - lists all users
     */
    public function index() {

        // Setup the view
        $this->template->content = View::instance('v_users_index');
        $this->template->title = "User list";

        // Get a list of the users
        $sql = "SELECT first_name, last_name, email 
                FROM users";

        $user_list = DB::instance(DB_NAME)->select_rows($sql);

        // Pass the user array to the view
        $this->template->content->user_list = $user_list;
        
        // Display the view
        echo $this->template;
    }


    /**
     * Display the user sign up form
     */
    public function signup() {

        $this->template->content = View::instance('v_users_signup');
        $this->template->title = "Sign up";

        echo $this->template;

    }


    /**
     * Process the user sign up form
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


    /**
     * Display the login form
     */
    public function login() {

        // Don't display the navigation bar on the login page
        //$this->template->hide_navbar = TRUE;

        if (isset($_COOKIE['token'])) {
            Router::redirect('/post/index');
        }
        else {
            // Setup the view
            $this->template->content = View::instance('v_users_login');
            $this->template->title = "Login";

            // Display the view
            echo $this->template;
        }

    }


    /**
     * Process the login page
     */
    public function p_login() {

        // Get the encrypted value of the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        // Get the token
        $sql = 'SELECT token 
                FROM users
                WHERE email = "'.$_POST['email'].'"
                AND password = "'.$_POST['password'].'"';

        $token = DB::instance(DB_NAME)->select_field($sql);

        if($token) {
            setcookie('token', $token, strtotime('+1 year'), '/');
            Router::redirect('/post/index');
        }
        else {
            echo "Login incorrect.  Please try again.";
        }

    }


    /**
     * Log the user out
     */
    public function logout() {

        // remove cookie
        if(isset($_COOKIE)) {
            unset($_COOKIE['token']);
            setcookie('token', '', time() - 3600);
        }
        

        // Send user back to login page
        Router::redirect('/users/login');
    }


    /**
     * Edit the user profile
     */
    public function edit($user_name = NULL) {

        // Setup the view
        $this->template->content = View::instance('v_users_edit');
        $this->template->title = "Edit Profile";

        // pass the user name parameter
        $this->template->content->user_name = $user_name;

        $sql = "SELECT first_name, last_name, email, password
                FROM users 
                WHERE email = '".$user_name."'";

        $user_details = DB::instance(DB_NAME)->select_row($sql);

        // Pass the current user details to the view
        $this->template->content->user_details = $user_details;

        // Display the view
        echo $this->template;
    }


    public function p_edit() {
        // Add created time to $_POST data
        $_POST['modified'] = Time::now();

        // Add the token record
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        // Encrypt the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        // Insert the user information
        DB::instance(DB_NAME)->insert_row('users', $_POST);

        // Redirect after signup to login
        Router::redirect('/users/login');
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
    }

} # end of the class