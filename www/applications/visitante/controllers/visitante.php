<?php
/**
 * Access from index.php:
 */

class Visitante_Controller extends ZP_Controller {
  
  public function __construct() {
    $this->app("visitante");

    $this->Templates = $this->core("Templates");

    $this->Templates->theme();

    $this->Visitante_Model = $this->model("Visitante_Model");

    $this->TipoDoc_Model = $this->model("TipoDoc_Model");
    $this->Rol_Model = $this->model("Rol_Model");
  }

  public function index() {
    $vars["message"] = "Mensaje temporal 2";
    $vars["view"]  = $this->view("show", TRUE);
    
    $this->render("content", $vars);
  }
  
  public function lista() {
    $vars["headers"] = array('Documento', 'Tipo documento', 'Nombres', 'Apellidos', 'Rol', 'Teléfono');
    $datos = $this->Visitante_Model->getAll();
    $vars["data"] = $datos;

    $vars["view"] = $this->view("tabla_datos", TRUE);


    $this->render("content", $vars);
  }
  
  public function agregar() {
    $this->helpers('forms');
    $datos = array(
      'documento' => '1.210.211.123',
      'nombre' => 'Jairo',
      'apellido' => 'Prieto',
      'telefono' => '313 234',
    );
    $vars["datos"] = $datos;

    $vars["tipo_doc"] = $this->TipoDoc_Model->getDataForSelect('TI');

    $vars["roles"] = $this->Rol_Model->getDataForSelect(2);

    $vars["view"]  = $this->view("editar", TRUE);
    
    $this->render("content", $vars);
  }
}
?>