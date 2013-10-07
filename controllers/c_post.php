<?php
class post_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "post_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function search() {
        echo "This is the signup page";
    }

    public function add() {
        echo "This is the signup page";
    }

    public function edit() {
        echo "This is the signup page";
    }

    public function like() {
        echo "This is the signup page";
    }

    public function follow() {
        echo "This is the signup page";
    }

    public function viewStream() {
        echo "This is the signup page";
    }

} # end of the class