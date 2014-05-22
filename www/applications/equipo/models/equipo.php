<?php
/**
 * Access from index.php:
 */
if(!defined("ACCESS")) {
  die("Error: You don't have permission to access here...");
}

class Equipo_Model extends ZP_Load {
  
  public function __construct() {
    $this->Db = $this->db();
    
    $this->table = "equipo";
  }

  public function getAll() {
    $data = $this->Db->findAll($this->table);
    return $data;
  }
  
  public function getById($id) {
    // TODO: buscar equipo por Id. Tomar como referencia la consulta getHistoryByCC de acceso.
  }
}