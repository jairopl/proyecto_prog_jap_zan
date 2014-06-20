<?php
/**
 * Access from index.php:
 */
if(!defined("ACCESS")) {
  die("Error: You don't have permission to access here...");
}

class Equipo_Controller extends ZP_Load {
  
  public function __construct() {
    $this->app("equipo");

    $this->helper(array('debugging', 'router'));

    $this->Templates = $this->core("Templates");

    $this->Templates->theme();

    $this->Equipo_Model = $this->model("Equipo_Model");
    $this->Visitante_Model = $this->model("Visitante_Model");

    $this->Marca_Model = $this->model("Marca_Model");
    $this->Tipoequipo_Model = $this->model("Tipoequipo_Model");

    // Por borrar
    $this->Acceso_Model = $this->model("Acceso_Model");
  }

  public function index($export = FALSE) {
    isConnected('');
    $this->lista($export);
  }
  
  public function lista($export = FALSE) {
    isConnected('');
    $this->helper('tabla');
    $vars["headers"] = array('Tipo equipo', 'Marca', 'Serie', 'Codigo barras', 'Registrado por');
    $datos = $this->Equipo_Model->getTableData();
    $vars["data"] = $datos;
    
    if (!empty($export)) {
      exportToFile('xls', $datos, $vars['headers']);
    } else {
      $vars["view"] = $this->view("tabla_datos", TRUE);

      $this->title("Lista de equipos");
      $this->render("content", $vars);
    }
  }
  
  public function agregar() {
    isConnected('');
    $this->helper(array('forms', 'html'));

    // Datos de los SELECT (html)
    $vars["marcas"] = $this->Marca_Model->getDataForSelect();
    $vars["tipos_equipos"] = $this->Tipoequipo_Model->getDataForSelect();

    $visitantes = $this->Visitante_Model->getAllAutocomplete();
    $script = 'listaVisitantes = ' . json_encode($visitantes) . 
    ';
$( "#visitante" ).autocomplete({
source: listaVisitantes,
appendTo: "#autocomplete_visitante"
});';

    $vars['script'] = '$(function() {' . $script . '});';

    $vars["view"]  = $this->view("editar", TRUE);
    
    $this->render("content", $vars);
  }

  public function guardar() {
    isConnected('');
    if (POST('guardar')) {
      //guardar registro
      $this->Equipo_Model->save();
    } elseif (POST('cancel')) {
      redirect('equipo');
    } else {
      redirect('equipo/agregar');
    }
    // showAlert("El registro se guardó satisfactoriamente.", 'index');
  }

  public function editar($id = NULL) {
    isConnected('');
    if (empty($id)) redirect('visitante/lista');

    $this->helper(array('forms', 'html'));
    $datos = $this->Equipo_Model->getById($id);
    $vars["datos"] = $datos;
    $vars['editar'] = TRUE;

    // Datos de los SELECT (html)
    $vars["marcas"] = $this->Marca_Model->getDataForSelect($datos['idmarca']);
    $vars["tipos_equipos"] = $this->Tipoequipo_Model->getDataForSelect($datos['idtipoequipo']);

    $visitantes = $this->Visitante_Model->getAllAutocomplete();
    $script = 'listaVisitantes = ' . json_encode($visitantes) . 
    ';
$( "#visitante" ).autocomplete({
source: listaVisitantes,
appendTo: "#autocomplete_visitante"
});';

    $vars['script'] = '$(function() {' . $script . '});';

    $vars["view"]  = $this->view("editar", TRUE);
    
    $this->render("content", $vars);
  }

  public function historial($cc) {
    isConnected('');
    $this->helper(array('tabla', 'html'));
    $visitante = $this->Visitante_Model->getByCC($cc);
    $vars["visitante"] = $visitante;

    $historial = $this->Acceso_Model->getHistoryByCC($cc);
    $vars['headers'] = array('Tipo equipo', 'Marca', 'Serie', 'Fecha', 'Hora ingreso', 'Hora salida');
    
    $historial = addLinksColumn($historial,
      array('fecha', 'hora_entra', 'hora_sale'),
      'idacceso', 'acceso/ver/');
    $vars["data"] = $historial;
    
    $vars["view"] = $this->view("historial", TRUE);

    $this->render("content", $vars);
  }
}
?>