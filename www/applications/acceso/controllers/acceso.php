<?php
/**
 * Access from index.php:
 */


class Acceso_Controller extends ZP_Load {
	
	public function __construct() {
		$this->app("acceso");
		
		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

    $this->helper('debugging');

		$this->Acceso_Model = $this->model("Visitante_Acceso_Model");
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

	public function ver($acceso) {
		$datos = $this->Acceso_Model->getById($acceso);
		
		// TODO: cargar datos necesarios para la vista
		$vars['nombre_visitante'] = 'Jairo Alberto Prieto';
		$vars['fecha'] = '22/05/2014 (Hoy)';
		$vars['hora_entrada'] = '14:02:09';
		$vars['hora_salida'] = 'No ha salido';

		$vars["view"]	 = $this->view("vista", TRUE);
		
		$this->render("content", $vars);
	}
}
