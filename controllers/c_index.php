<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		if($this->user)
		{
			Router::redirect("/posts/index");
		}
		else
		{
		
			# Set up the View
		    $this->template->content = View::instance('v_index_index');
		    
			$client_files_head = array("/css/index_index.css");
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
			
		    $this->template->title   = "Shout Out";
						
			# Render the View
		    echo $this->template;

		}
	} # End of method

	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/unauthorized/
	-------------------------------------------------------------------------------------------------*/
	public function unauthorized() {

		# Set up the View
	    $this->template->content = View::instance('v_index_unauthorized');
	    
	    $this->template->title   = "Access Denied";
					
		# Render the View
	    echo $this->template;
	}	
	
} # End of class
