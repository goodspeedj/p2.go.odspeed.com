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

        // Get the posts
        $sql = 'SELECT 
                    posts.*,
                    users.first_name,
                    users.last_name
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.user_id';

        $posts = DB::instance(DB_NAME)->select_rows($sql);

        $this->template->content->posts = $posts;

        // Display the view
        echo $this->template;
    }


    public function p_add() {
        $_POST['user_id'] = $this->user->user_id;
        $_POST['created'] = Time::now();
        $_POST['modified'] = Time::now();

        DB::instance(DB_NAME)->insert('posts', $_POST);

        Router::redirect('/posts/index');
    }


    public function users() {

        // Setup the view
        $this->template->content = View::instance('v_posts_users');
        $this->template->title = "User list";

        // Get a list of users
        $sql = "SELECT * FROM users";

        $users = DB::instance(DB_NAME)->select_rows($sql);

        // Get a list of the connections
        $sql = "SELECT *
                FROM users_users
                WHERE user_id = ".$this->user->user_id;

        $connections = DB::instance(DB_NAME)->select_array($sql, 'user_id_followed');

        // Pass the user and connections array to the view
        $this->template->content->users = $users;
        $this->template->content->connections = $connections;
        
        // Display the view
        echo $this->template;
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