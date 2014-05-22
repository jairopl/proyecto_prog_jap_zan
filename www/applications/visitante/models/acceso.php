<?php
/**
 * Access from index.php:
 */
if(!defined("ACCESS")) {
  die("Error: You don't have permission to access here...");
}

class Acceso_Model extends ZP_Load {
  
  public function __construct() {
    $this->Db = $this->db();
    
    // $this->helpers();
  
    $this->table = "acceso";
  }

  public function getAll() {
    $data = $this->Db->findAll($this->table);
    return $data;
  }
  
  public function getHistoryByCC($cc) {
    $this->Db->select("idacceso, te.tipoequipo, m.marca, serie, fecha, hora_entra, hora_sale");
    $this->Db->join('(tipoequipo te JOIN (equipo e JOIN marca m ON e.marca=m.idmarca) ON te.idtipoequipo=e.tipoequipo)', 'acceso.idequipo = e.idequipo');
    $this->Db->where("acceso.idvisitante=$cc ORDER BY fecha DESC , hora_entra DESC");
    $data = $this->Db->get($this->table);

    //$data = $this->Db->findBy('idvisitante', $cc, $this->table);
    return $data;
  }

  public function getById($id) {
    $data = $this->Db->find($id, $this->table);
    return $data;
  }
}