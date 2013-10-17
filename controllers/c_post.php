<?php
class post_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {

        // Setup the view
        $this->template->content = View::instance('v_post_index');
        $this->template->title = "Post";


        // Display the view
        echo $this->template;
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