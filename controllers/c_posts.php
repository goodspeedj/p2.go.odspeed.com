<?php
class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->user) {
            die("Members only");
        }
    } 


    /**
     * Post index page of all posts.  Also has new post form
     */
    public function index() {

        // Setup the view
        $this->template->content = View::instance('v_posts_index');
        $this->template->title   = "Post";

        // Get the posts
        $sql = "SELECT 
                    posts.content,
                    posts.created,
                    posts.user_id AS post_user_id,                       
                    users_users.user_id AS follower_id,
                    users.first_name,
                    users.last_name,
                    users.picture
                FROM posts
                INNER JOIN users_users                         
                    ON posts.user_id = users_users.user_id_followed
                INNER JOIN users 
                    ON posts.user_id = users.user_id
                WHERE users_users.user_id = ".$this->user->user_id."
                ORDER BY posts.created DESC";


        $posts = DB::instance(DB_NAME)->select_rows($sql);

        $this->template->content->posts = $posts;

        // Display the view
        echo $this->template;
    }


    /*
     * Add new posts - keep them on the same page
     */
    public function p_add() {
        $_POST['user_id']  = $this->user->user_id;
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        DB::instance(DB_NAME)->insert('posts', $_POST);

        Router::redirect('/posts/index');
    }


    /*
     * Get a list of all users and allow them to follow different users
     */
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


    /*
     * Follow users by adding connections to the users_users table
     */
    public function follow($user_id_followed) {
        
        # Prepare the data array to be inserted
        $data = Array(
            "created"          => Time::now(),
            "user_id"          => $this->user->user_id,
            "user_id_followed" => $user_id_followed
            );
        
        # Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);
        
        # Send them back
        Router::redirect("/posts/users");
    }


    /*
     * Unfollow users by deleting connections from the users_users table
     */
    public function unfollow($user_id_followed) {
        
        # Set up the where condition
        $where_condition = 'WHERE user_id = '.$this->user->user_id.' 
                            AND user_id_followed = '.$user_id_followed;
            
        # Run the delete
        DB::instance(DB_NAME)->delete('users_users', $where_condition);
        
        # Send them back
        Router::redirect("/posts/users");
    }

} # end of the class