<?php
/**
 * Access from index.php:
 */

class Visitante_Controller extends ZP_Controller {
  
  public function __construct() {
    $this->app("visitante");

    $this->Templates = $this->core("Templates");

    $this->Templates->theme();
  }
  
  public function index() {
    $vars["message"] = "Hola Jairo. Bien hecho";
    $vars["view"] = $this->view("show", TRUE);

    $this->render("content", $vars);
  }
  
}
?>