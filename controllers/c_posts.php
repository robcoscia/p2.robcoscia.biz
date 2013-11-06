<?php
class posts_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			Router::redirect("/index/unauthorized");
		}
	}

	/*-------------------------------------------------------------------------------------------------
	 Allows user to add a post
	-------------------------------------------------------------------------------------------------*/
	public function add() {

		# Setup view
		$this->template->content = View::instance('v_posts_add');

		$this->template->title   = "New Shout";

		$client_files_head = array("/css/shouts.css", "/css/posts_add.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		$client_files_body = array("/js/ElementValidation.js", "/js/shout_out_utils.js");
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Build the query
		$q = 'SELECT
	    		posts.post_id,
	            posts.content,
	            posts.created,
	            posts.user_id AS post_user_id,
	            users.first_name,
	            users.last_name,
	            users.avatar
	        FROM posts
	        INNER JOIN users
	            ON posts.user_id = users.user_id
	        WHERE posts.user_id = '.$this->user->user_id.' ORDER BY posts.created DESC LIMIT '.MAX_POSTS_PER_PAGE;


		# Run the query
		$posts = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->posts = $posts;

		# Render template
		echo $this->template;

	} # End of method


	/*-------------------------------------------------------------------------------------------------
	 processes an add post
	-------------------------------------------------------------------------------------------------*/
	public function p_add() {
		#Validation
		if(!isset($_POST['content']))
		{
			Router::redirect("/posts/add");
		}

		# Associate this post with this user
		$_POST['user_id']  = $this->user->user_id;

		# Unix timestamp of when this post was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Insert
		# Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('posts', $_POST);

		# Send them back
		Router::redirect("/posts/add");

	} # End of method


	/*-------------------------------------------------------------------------------------------------
	 Displys posts from the followers of the user
	-------------------------------------------------------------------------------------------------*/
	public function index() {

		# Set up the View
		$this->template->content = View::instance('v_posts_index');
		$this->template->title   = "Posts";

		$client_files_head = array("/css/shouts.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		$client_files_body = array("/js/shout_out_utils.js");
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Build the query
		$q = 'SELECT
	    		posts.post_id,
	            posts.content,
	            posts.created,
	            posts.user_id AS post_user_id,
	            users_users.user_id AS follower_id,
	            users.first_name,
	            users.last_name,
	            users.avatar
	        FROM posts
	        INNER JOIN users_users
	            ON posts.user_id = users_users.user_id_followed
	        INNER JOIN users
	            ON posts.user_id = users.user_id
	        WHERE users_users.user_id = '.$this->user->user_id.' ORDER BY posts.created DESC LIMIT '.MAX_POSTS_PER_PAGE;


		# Run the query
		$posts = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->posts = $posts;

		# Render the View
		echo $this->template;

	}

	/*-------------------------------------------------------------------------------------------------
	 Displys a list of users that thelogged in user can either follow or unfollow
	-------------------------------------------------------------------------------------------------*/
	public function users() {

		# Set up the View
		$this->template->content = View::instance("v_posts_users");

		$this->template->title   = "Users";

		$client_files_head = array("/css/posts_users.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		# Build the query to get all the users
		$q = "SELECT *
	        FROM users ORDER BY last_name, first_name";

		# Execute the query to get all the users.
		# Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);

		# Build the query to figure out what connections does this user already have?
		# I.e. who are they following
		$q = "SELECT *
	        FROM users_users
	        WHERE user_id = ".$this->user->user_id;

		# Execute this query with the select_array method
		# select_array will return our results in an array and use the "users_id_followed" field as the index.
		# This will come in handy when we get to the view
		# Store our results (an array) in the variable $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

		# Pass data (users and connections) to the view
		$this->template->content->users       = $users;
		$this->template->content->connections = $connections;

		# Render the view
		echo $this->template;
	}

	/*-------------------------------------------------------------------------------------------------
	 Allows the logged in user to follow the specified user
	-------------------------------------------------------------------------------------------------*/
	public function follow($user_id_followed) {

		# Prepare the data array to be inserted
		$data = array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
		);

		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);

		# Send them back
		Router::redirect("/posts/users");

	}

	/*-------------------------------------------------------------------------------------------------
	 Allows the logged in user to unfollow the specified user
	-------------------------------------------------------------------------------------------------*/
	public function unfollow($user_id_followed) {

		# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);

		# Send them back
		Router::redirect("/posts/users");

	}


	/*-------------------------------------------------------------------------------------------------
	 Allows the logged in user to delete one of his/hers posts
	-------------------------------------------------------------------------------------------------*/
	public function delete($postId) {
		# Delete this post
		$where_condition = 'WHERE post_id = '.DB::instance(DB_NAME)->sanitize($postId);
		DB::instance(DB_NAME)->delete('posts', $where_condition);

		# Send them back
		Router::redirect("/posts/add");
	}

}
?>