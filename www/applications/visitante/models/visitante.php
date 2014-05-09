<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Visitante_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		
		$this->helpers();
	
		$this->table = "visitante";
	}

	public function getAll($limit = 10) {
		$data = $this->Db->findAll($this->table);
		return $data;
	}
	
}