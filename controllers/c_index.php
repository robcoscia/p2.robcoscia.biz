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
		    
		    $this->template->title   = "Shout Out";
						
			# Render the View
		    echo $this->template;

		}
	} # End of method
	
	
} # End of class
