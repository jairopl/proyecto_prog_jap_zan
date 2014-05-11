<?php
/**
 * Access from index.php:
 */
if(!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

class Visitante_Model extends ZP_Load {
	
	public function __construct() {
		$this->Db = $this->db();
		
		// $this->helpers();
	
		$this->table = "visitante";
	}

	public function getAll($limit = 10) {
		$data = $this->Db->findAll($this->table);
		return $data;
	}
	
	public function save() {
		$this->helper('alerts');
		if (!POST("documento")) {
			redirect('visitante/agregar');
		} elseif (!isNumber(POST("telefono"))) {
			showAlert("El teléfono debe ser un numero.", 'agregar');
		}
    $data = array(
			"documento"      => POST("documento"),
			"tipo_documento" => POST("tipo_documento"),
			"nombres"        => POST("nombre"),
			"apellidos"      => POST("apellido"),
			"rol"            => POST("rol_usuario"),
			"telefono"       => POST("telefono"),
		);
		if (POST("editar")) {
			// Hacer que se actualice
		} else {
			$this->Db->insert($this->table, $data);
		}

		showAlert("El registro se guardó satisfactoriamente.", 'index');
	}

	public function getByCC($cc) {
		$data = $this->Db->find($cc, $this->table);
		return $data[0];
	}
}