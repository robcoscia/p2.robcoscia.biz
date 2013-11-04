<?php

class users_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	}

	/*-------------------------------------------------------------------------------------------------
	 Allows user to sign up for an account on Shout Out
	-------------------------------------------------------------------------------------------------*/
	public function signup() {

		# First, set the content of the template with a view file
		$this->template->content = View::instance('v_users_signup');

		$client_files_head = array("/css/users_signup.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		$client_files_body = array("/js/ElementValidation.js", "/js/signup.js");
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		$this->template->title = "Sign Up";

		# Render the view
		echo $this->template;

	} # End of method


	/*-------------------------------------------------------------------------------------------------
	 Process a post from signup page
	-------------------------------------------------------------------------------------------------*/
	public function p_signup() {
		# Validation
		
		# check to see if email address is in use
		$q = "SELECT token
	        FROM users
	        WHERE email = '".$_POST['email']."'";

		$token = DB::instance(DB_NAME)->select_field($q);

		if(isset($token))
		{
			Router::redirect('/users/login/2');
		}

		# More data we want stored with the user
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Remove verifypassword from post array
		unset($_POST['verifypassword']);

		# Encrypt the password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Create an encrypted token via their email address and a random string
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

		# Insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

		Router::redirect('/users/login');

	} # End of method


	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function login($error = NULL) {

		# First, set the content of the template with a view file
		$this->template->content = View::instance('v_users_login');
		
		$client_files_head = array("/css/users_login.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		$client_files_body = array("/js/ElementValidation.js", "/js/login.js");
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Now set the <title> tag
		$this->template->title = "Login";

		# Pass data to the view
		$this->template->content->error = $error;

		# Render the view
		echo $this->template;

	} # End of method


	/*-------------------------------------------------------------------------------------------------
	 Process a post from login page
	-------------------------------------------------------------------------------------------------*/
	public function p_login() {

		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token
	        FROM users
	        WHERE email = '".$_POST['email']."'
	        AND password = '".$_POST['password']."'";

		$token = DB::instance(DB_NAME)->select_field($q);

		# If we didn't find a matching token in the database, it means login failed
		if(!$token) {
			# Send them back to the login page
			Router::redirect("/users/login/1");

			# But if we did, login succeeded!
		} else {
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+1 year'), '/');

			# Send them to the main page
			Router::redirect("/");
		}

	} # End of method


	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function logout() {
		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = array("token" => $new_token);

		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		# Delete their token cookie by setting it to a date in the past - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');


		# Send them to the main page
		Router::redirect("/");

	} # End of method


	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function profile($error = NULL) {

		# First, set the content of the template with a view file
		$this->template->content = View::instance('v_users_profile');
		
		$client_files_head = array("/css/users_profile.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		$client_files_body = array("/js/ElementValidation.js", "/js/profile.js");
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Now set the <title> tag
		$this->template->title = "Profile";
		
		if(!isset($this->user->location))
		{
			$geo = Geolocate::locate();
			if(isset($geo))
			{
				$this->user->location = $geo['city'].", ".$geo['state'];
			}
		}
		
		# Pass data to the view
		$this->template->content->error = $error;

		# Render the view
		echo $this->template;

	} # End of method

	/*-------------------------------------------------------------------------------------------------
	 Process a post from signup page
	-------------------------------------------------------------------------------------------------*/
	public function p_profile() {
		# Validation

		# More data we want stored with the user
		$_POST['modified'] = Time::now();
		
		if($_FILES['avatar_file']['size'] > 0)
		{
			$_POST['avatar']="avatar".$this->user->user_id.".jpg";
			if($_POST['avatar']!= Upload::upload($_FILES, "/uploads/avatars/", array("jpg", "jpeg", "gif", "png"),
					"avatar".$this->user->user_id))
			{
				Router::redirect('/users/profile/error');
			}
		}

		unset($_POST['avatar_file']);
		unset($_POST['MAX_FILE_SIZE']);
		# Insert this user into the database
		if(DB::instance(DB_NAME)->update('users', $_POST, "Where user_id = ".$this->user->user_id) == 0)
		{
			Router::redirect('/users/profile/error');
		}
		Router::redirect('/');

	} # End of method

	public function bio($userid) {
	
	    # Set up the View
	    $this->template->content = View::instance("v_users_bio");
	    
	    $this->template->title   = "Biography";
	
		$client_files_head = array("/css/users_bio.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

	    # Build the query to get all the users
	    $q = "SELECT * FROM users where user_id = ".$userid;
	
	    # Execute the query to get all the users. 
	    # Store the result array in the variable $bioUser
	    $users = DB::instance(DB_NAME)->select_rows($q);
		
	    # Pass data (bioUser) to the view
	    $this->template->content->users = $users;
	
	    # Render the view
	    echo $this->template;
	}


} # End of class
