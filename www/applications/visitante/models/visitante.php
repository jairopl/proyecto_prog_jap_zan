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

	public function getTableData() {
		//$data = $this->Db->findAll($this->table);

    $this->Db->select("identificacion, descripcion, nombres, CONCAT(apellido1, ' ', apellido2), tipo_usuario, telefono");
    $this->Db->join('tipo_doc', 'tipo_doc = idtipo_doc');
    $this->Db->join('tipo_usuario', 'tipo_user = idtipo_usuario');
    $data = $this->Db->get($this->table);
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