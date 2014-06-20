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

    $this->helper(array('debugging', 'forms', 'html'));

		$this->Acceso_Model = $this->model("Visitante_Acceso_Model");
		$this->Visitante_Model = $this->model("Visitante_Visitante_Model");
		$this->Equipo_Model = $this->model("Equipo_Equipo_Model");
	}
	
	public function index() {
    isConnected('');
		$this->title('Accesos de equipos');
		$this->helper('tabla');
		$vars["headers"] = array('Identificacion', 'Equipo', 'Fecha', 'Hora llegada', 'Hora salida', 'Observaciones');
    $datos = $this->Acceso_Model->getAll();
    $datos = addLinksColumn($datos,
      array('fecha', 'hora_entra', 'hora_sale'),
      'idacceso', 'acceso/ver/');
		$vars["data"] = $datos;
		
		$vars["view"]	 = $this->view("inicio", TRUE);
		$this->render("content", $vars);
	}

	public function ver($acceso, $render = TRUE) {
    isConnected('');
		$datos = $this->Acceso_Model->getById($acceso);

		$visitante = $this->Visitante_Model->getByCC($datos['idvisitante']);
		
		// TODO: cargar datos del equipo
		$vars['nombre_visitante'] = "{$visitante['nombres']} {$visitante['apellido1']} {$visitante['apellido2']}";
		$vars['fecha'] = $datos['fecha'];
		$vars['hora_entrada'] = $datos['hora_entra'];
		$vars['hora_salida'] = empty($datos['hora_sale']) ? 'No se ha registrado la salida' : $datos['hora_sale'];
		$vars['observaciones'] = $datos['observaciones'];
		$vars['idacceso'] = $acceso;
		$vars['equipo'] = 'Descripcion del equipo';
		$vars['cerrar'] = empty($datos['hora_sale']);

		$vars["view"]	 = $this->view("vista", TRUE);
		
		if ($render) {
			$this->title("Acceso de " . $vars['nombre_visitante']);
			$this->render("content", $vars);
		} else {
			return $vars;
		}
	}

	public function ingreso($tipo = NULL, $id = NULL) {
    isConnected('');
		$this->title("Ingreso de equipo");
		$this->helper(array('html', 'forms'));

		$visitantes = $this->Visitante_Model->getAllAutocomplete();
		$script = 'listaVisitantes = ' . json_encode($visitantes) . 
		';
$( "#identificacion" ).autocomplete({
source: listaVisitantes,
appendTo: "#autocomplete_identificacion"
});';

		$equipos = $this->Equipo_Model->getAllAutocomplete();
		$script .= 'listaEquipos = ' . json_encode($equipos) . 
		';
$( "#equipo" ).autocomplete({
source: listaEquipos,
appendTo: "#autocomplete_equipo"
});';

	$vars['script'] = '$(function() {' . $script . '});';

		if ($tipo == 'visitante') {
			$vars['visitante'] = $id;
		} elseif ($tipo == 'equipo') {
			$vars['equipo'] = $id;
		}

		$vars["view"]	 = $this->view("ingreso", TRUE);
		
		$this->render("content", $vars);
	}

	public function salida($idacceso) {
    isConnected('');
		$this->title("Confirmar salida de equipo");
		$vars = $this->ver($idacceso, FALSE);
		$vars["view"]	 = $this->view("salida", TRUE);
		
		$this->render("content", $vars);
	}

  public function guardar() {
    isConnected('');
  	if (POST('guardar')) {
      //guardar registro
      $this->Acceso_Model->saveInput();
    } elseif (POST('salida')) {
    	$this->Acceso_Model->saveOutput();
    } elseif (POST('cancel')) {
      redirect('acceso');
    } else {
      redirect('acceso/agregar');
    }
    // showAlert("El registro se guardó satisfactoriamente.", 'index');
  }	
}
