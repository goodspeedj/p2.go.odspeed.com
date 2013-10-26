<?php
class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 


    /**
     * Post index page of all posts.  Also has new post form
     */
    public function index() {

        // Setup the view
        $this->template->content = View::instance('v_posts_index');
        $this->template->title = "Post";

        // Display the view
        echo $this->template;
    }

    public function add() {
        echo "This is the signup page";
    }

    public function p_add() {
        $_POST['user_id'] = $this->user->user_id;
        $_POST['created'] = Time::now();
        $_POST['modified'] = Time::now();

        DB::instance(DB_NAME)->insert('posts', $_POST);

        Router::redirect('/posts/index');
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