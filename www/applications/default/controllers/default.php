<?php
/**
 * Access from index.php:
 */


class Default_Controller extends ZP_Load {
	
	public function __construct() {
		$this->app("default");
		
		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

    $this->helper(array('debugging'));

		$this->Login_Model = $this->model("Login_Model");
	}
	
	public function index() {
    $this->helper(array("html", "forms"));
    if (POST("buscar")) {
      $by = POST("by_visitant");
      $by = str_replace(' ', '-', $by);
      redirect("visitante/buscar/" . $by);
    } elseif (POST("login")) {
      $this->Login_Model->checkUserCredentials();
    } else {
      $this->helper(array('forms', 'html'));
      if (isConnected()) {
        $vars["view"]  = $this->view("inicio", TRUE);
      } else {
        $vars["view"]	 = $this->view("login", TRUE);
      }
			
			$this->render("content", $vars);
		}
	}

	public function show($message) {
		$vars["message"] = $message;
		$vars["view"]	 = $this->view("show", TRUE);
		
		$this->render("content", $vars);
		#$this->view("show", $vars);
	}

	public function exportar($tipo) {
		$args = func_get_args();
		____($args);
    $path = str_replace(_get("webURL"), "", getURL());
    $segmentos = explode('/', $path);
    if (empty($segmentos)) {
      return '';
    }
    $app = $segmentos[0];
    $metod = isset($segmentos[1]) ? $segmentos[1] : '';
    if (isset($segmentos[1])) {unset($segmentos[1]);}
    unset($segmentos[0]);
    $args = $segmentos;
	}

  public function logout() {
    unsetSessions();
  }
}
