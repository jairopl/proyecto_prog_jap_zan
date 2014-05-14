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
		if (!POST("identificacion")) {
			redirect('visitante/agregar');
		} elseif (POST("telefono") && !isNumber(POST("telefono"))) {
			showAlert("El teléfono debe ser un numero.", 'agregar');
		}
    $data = array(
			"identificacion" => POST("identificacion"),
			"tipo_doc"       => POST("tipo_documento"),
			"nombres"        => POST("nombres"),
			"apellido1"      => POST("apellido1"),
			"apellido2"      => POST("apellido2"),
			"tipo_user"      => POST("rol_usuario"),
			"telefono"       => POST("telefono"),
		);
		
		$ejecutado = 1;
		if (POST("editar")) {
			// Hacer que se actualice
			$ejecutado = $this->Db->update($this->table, $data, POST("identificacion"), 'identificacion');
		} else {
			$ejecutado = $this->Db->insert($this->table, $data);
		}

		if ($ejecutado !== false) {
			showAlert("El registro se guardó satisfactoriamente.", 'index');
		} else {
			showAlert("Se presentó un problema al guardar el registro.", 'index');
		}
	}

	public function delete($id) {
		$this->helper('alerts');
		$r = $this->Db->delete($id, $this->table);
		redirect('visitante/index');
	}

	public function getByCC($cc) {
		$data = $this->Db->find($cc, $this->table);
		return $data[0];
	}
}