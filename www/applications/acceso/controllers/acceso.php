<?php
/**
 * Access from index.php:
 */
if(!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

class Acceso_Controller extends ZP_Load {
	
	public function __construct() {
		$this->app("acceso");
		
		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

    $this->helper('debugging');

		$this->Acceso_Model = $this->model("Visitante_Acceso_Model");
		$this->Visitante_Model = $this->model("Visitante_Visitante_Model");
		//$this->Equipo_Model = $this->model("Equipo_Equipo_Model");
	}
	
	public function index() {	
		$this->helper('tabla');
		$vars["headers"] = array('Identificacion', 'Equipo', 'Fecha', 'Hora llegada', 'Hora salida');
    $datos = $this->Acceso_Model->getAll();
    $datos = addLinksColumn($datos,
      array('fecha', 'hora_entra', 'hora_sale'),
      'idacceso', 'acceso/ver/');
		$vars["data"] = $datos;
		
		$vars["view"]	 = $this->view("inicio", TRUE);
		$this->render("content", $vars);
	}

	public function ver($acceso) {
		$this->helper('time');
		$datos = $this->Acceso_Model->getById($acceso);

		$visitante = $this->Visitante_Model->getByCC($datos['idvisitante']);
		
		// TODO: cargar datos del equipo
		$vars['nombre_visitante'] = "{$visitante['nombres']} {$visitante['apellido1']} {$visitante['apellido2']}";
		$vars['fecha'] = $datos['fecha'];
		$vars['hora_entrada'] = $datos['hora_entra'];
		$vars['hora_salida'] = empty($datos['hora_sale']) ? 'No se ha registrado la salida' : $datos['hora_sale'];
		$vars['observaciones'] = $datos['observaciones'];
		$vars['cerrar'] = empty($datos['hora_sale']);

		$vars["view"]	 = $this->view("vista", TRUE);
		
		$this->render("content", $vars);
	}

	public function ingreso($tipo, $id) {
		
	}
}
