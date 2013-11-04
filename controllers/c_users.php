<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        //echo "users_controller construct called<br><br>";
    } 


    /**
     * Main index page - direct them to login
     */
    public function index() {

        Router::redirect('/users/login');
    }


    /**
     * Display the user sign up form
     */
    public function signup($errors = NULL, $source = NULL) {

        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign up";

        $this->template->content->errors = $errors;
        $this->template->content->source = $source;

        echo $this->template;
    }


    /**
     * Process the user sign up form
     */
    public function p_signup() {

        // directory to store image files
        $dir = "img/user_pics";

        // Run if picture uploaded
        if (isset($_FILES['picture'])) {

            // Picture file name
            $_POST['picture'] = $_FILES['picture']['name'];

            // Picture file size & type
            $pic_size = $_POST['picture'] = $_FILES['picture']['size'];
            $pic_type = $_POST['picture'] = $_FILES['picture']['type'];

            $ok_type = array(
                'image/jpeg',
                'image/jpg',
                'image/png',
                'image/gif'
                );

            if ($pic_size > 1048576) {
                Router::redirect("/users/signup/errors/size");
            }
            if (!in_array($pic_type, $ok_type)) {
                Router::redirect("/users/signup/errors/type");
            }
        }
        

        // Add created time to $_POST data
        $_POST['created'] = Time::now();

        // Add the token record
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        // Encrypt the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);


        // Prevent duplicate email addresses
        $sql = "SELECT count(*)
                FROM users
                WHERE email = '". $_POST['email']."'"; 

        $result = DB::instance(DB_NAME)->select_row($sql);

        // If the email address is already registered throw an error
        if ($result['count(*)'] > 0) {
            Router::redirect("/users/signup/errors/email");
        }

        else {
           // Insert the user information
            DB::instance(DB_NAME)->insert_row('users', $_POST);

            // Get the information on the user we just created
            $sql = "SELECT *
                    FROM users 
                    WHERE token = '".$_POST['token']."'
                    AND created = ". $_POST['created'];

            $user_data = DB::instance(DB_NAME)->select_row($sql);

            // Move the pictures to the right location on disk and prepend the user_id to the file name
            move_uploaded_file($_FILES["picture"]["tmp_name"],
                "img/user_pics/" .$user_data['user_id'].'-'.$_FILES["picture"]["name"]);

            // Update the picture name - append the user_id.  Prevents duplicate file names
            $pic_data = Array("picture" => $user_data['user_id'].'-'.$_FILES["picture"]["name"]);
        
            DB::instance(DB_NAME)->update("users", $pic_data, "WHERE user_id = ". $user_data['user_id']);

            // Make the user follow themselves
            $data = Array(
                "created"          => Time::now(),
                "user_id"          => $user_data['user_id'],
                "user_id_followed" => $user_data['user_id']
                );
            
            # Do the insert so they follow themselves
            DB::instance(DB_NAME)->insert('users_users', $data);

            // Redirect after signup to login
            Router::redirect('/users/login'); 
        }        
    }


    /**
     * Display the login form
     */
    public function login($err= NULL) {

        // Bypass the login if the user has a cookie
        if (isset($_COOKIE['token'])) {
            Router::redirect('/posts/index');
        }

        // Otherwise display the login form
        else {
            // Setup the view
            $this->template->content = View::instance('v_users_login');
            $this->template->title   = "Login";

            $this->template->content->err = $err;

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
        $sql = 'SELECT token, email
                FROM users
                WHERE email  = "'.$_POST['email'].'"
                AND password = "'.$_POST['password'].'"';

        $data = DB::instance(DB_NAME)->select_row($sql);

        $token = $data['token'];
        $email = $data['email'];


        if ($token) {
            setcookie('token', $token, strtotime('+1 year'), '/');
            Router::redirect('/posts/index');
        }
        else {
            Router::redirect("/users/login/err");
        }
    }


    /**
     * Log the user out
     */
    public function logout() {

        // Create a new dummy token 
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        $data = Array('token' => $new_token);

        DB::instance(DB_NAME)->update('users', $data, 'WHERE user_id ='. $this->user->user_id);


        // Delete the cookie
        setcookie('token', '', strtotime('-1 year'), '/');
        
        // Send user back to login page
        Router::redirect('/users/login');
    }


    /**
     * Edit the user profile
     */
    public function edit($user_id = NULL) {

        // Setup the view
        $this->template->content = View::instance('v_users_edit');
        $this->template->title = "Edit Profile";


        // Only query if we have a user id
        if ($user_id == $this->user->user_id) {

            $sql = "SELECT * 
                    FROM users
                    WHERE user_id = ".$user_id." 
                    AND user_id = ". $this->user->user_id;    // user_id must match logged in user

            $user_details = DB::instance(DB_NAME)->select_row($sql);

            // pass the user name parameter
            $this->template->content->user_details = $user_details;

            // Display the view
            echo $this->template;
        }

        // If the user_id does not match the logged in user send them back to their own
        // profile - prevents URL manipulation
        else {
            Router::redirect('/users/edit/'.$this->user->user_id);
        }
    }


    /*
     * Process the user profile edit page
     */
    public function p_edit() {

        // Add created time to $_POST data
        $_POST['modified'] = Time::now();

        // Encrypt the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        // Update the user information
        $data = Array(
            "first_name" => $_POST['first_name'],
            "last_name"  => $_POST['last_name'],
            "email"      => $_POST['email'],
            "location"   => $_POST['location'],
            "bio"        => $_POST['bio'],
            "password"   => $_POST['password'] 
            );

        DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$_POST['user_id']);

        // Redirect after signup to login
        Router::redirect('/users/profile/'.$_POST['user_id']);
    }


    /* 
     * Display the profile page
     */
    public function profile($user_id = NULL) {

        // If they are not logged in send them back to the login page
        if (!$this->user) {
            Router::redirect('/users/login');
        }

        // If the user_id does not match that of the user logged in send 
        // them back to their own profile
        if ($this->user->user_id != $user_id) {
            Router::redirect('/users/profile/'.$this->user->user_id);
        }

        // Setup the view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile";

        // Only query if we have a user id
        if ($user_id) {

            $sql = "SELECT * 
                    FROM users
                    WHERE user_id = ".$user_id;

            $user_details = DB::instance(DB_NAME)->select_row($sql);

            // pass the user name parameter
            $this->template->content->user_details = $user_details;
        }

        // Display the view
        echo $this->template;
    }

} # end of the class