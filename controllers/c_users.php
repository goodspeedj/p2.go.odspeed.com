<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function add() {
        echo "This is the logout page";
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

        if($user_name == NULL) {
            echo "No user specified";
        }
        else {
            echo "This is the profile for ".$user_name;
        }
    }

} # end of the class