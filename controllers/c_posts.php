class posts_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
		
		if(!this->user){
			Router::redirect('/users/login');
		}
	} 

    /*-------------------------------------------------------------------------------------------------
	 Allows user to add a post
	-------------------------------------------------------------------------------------------------*/
	public function add() {
            
        # Setup view
        $this->template->content = View::instance('v_posts_add');
        $this->template->title   = "New Post";

        # Render template
        echo $this->template;
		
	} # End of method
}