<?php
/**
 * Access from index.php:
 */


class Default_Controller extends ZP_Load {
	
	public function __construct() {
		$this->app("default");
		
		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

    $this->helper('debugging');

		#$this->Default_Model = $this->model("Default_Model");
	}
	
	public function index() {	
		if (POST("buscar")) {
			$by = POST("by_visitant");
			$by = str_replace(' ', '-', $by);
			redirect("visitante/buscar/" . $by);
		} else {
			$this->helper(array('forms', 'html'));

			$vars["view"]	 = $this->view("inicio", TRUE);
			
			$this->render("content", $vars);
		}
	}

	public function test($param1 = "Hola", $param2 = "Adios") {
		print "New dispatcher it's works fine: $param1, $param2";
	}

	public function show($message) {
		$vars["message"] = $message;
		$vars["view"]	 = $this->view("show", TRUE);
		
		$this->render("content", $vars);
		#$this->view("show", $vars);
	}

}
