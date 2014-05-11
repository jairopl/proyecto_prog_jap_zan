<?php
/**
 * Access from index.php:
 */

class Visitante_Controller extends ZP_Load {
  
  public function __construct() {
    $this->app("visitante");

    $this->helper('debugging');

    $this->Templates = $this->core("Templates");

    $this->Templates->theme();

    $this->Visitante_Model = $this->model("Visitante_Model");

    $this->TipoDoc_Model = $this->model("TipoDoc_Model");
    $this->Rol_Model = $this->model("Rol_Model");
  }

  public function index() {
    $this->lista();
  }
  
  public function lista() {
    $vars["headers"] = array('Documento', 'Tipo documento', 'Nombres', 'Apellidos', 'Rol', 'Teléfono');
    $datos = $this->Visitante_Model->getAll();
    $vars["data"] = $datos;

    $vars["view"] = $this->view("tabla_datos", TRUE);

    $this->render("content", $vars);
  }
  
  public function agregar() {
    $this->helper(array('forms', 'html'));

    $vars["tipo_doc"] = $this->TipoDoc_Model->getDataForSelect('CC');

    $vars["roles"] = $this->Rol_Model->getDataForSelect(1);

    $vars["view"]  = $this->view("editar", TRUE);
    
    $this->render("content", $vars);
  }

  public function guardar() {
    if (POST('guardar')) {
      //guardar registro
      $this->Visitante_Model->save();
    } elseif (POST('cancel')) {
      redirect('visitante');
    } else {
      redirect('visitante/agregar');
    }
    // showAlert("El registro se guardó satisfactoriamente.", 'index');
  }

  public function editar($cc = NULL) {
    if (empty($cc)) redirect('visitante/lista');

    $this->helper(array('forms', 'html'));
    $datos = $this->Visitante_Model->getByCC($cc);

    $vars["datos"] = $datos;
    $vars['editar'] = TRUE;

    $vars["tipo_doc"] = $this->TipoDoc_Model->getDataForSelect($datos['tipo_documento']);

    $vars["roles"] = $this->Rol_Model->getDataForSelect($datos['rol']);

    $vars["view"]  = $this->view("editar", TRUE);

    $vars["view"]  = $this->view("editar", TRUE);
    
    $this->render("content", $vars);
  }
}
?>