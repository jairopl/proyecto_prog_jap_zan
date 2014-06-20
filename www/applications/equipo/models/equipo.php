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
    
    $this->table = "equipo e";

  }

  public function getTableData() {
    $this->Db->join('tipoequipo te', 'te.idtipoequipo = e.tipoequipo');
    $this->Db->join('marca m', 'm.idmarca = e.marca');
    $this->Db->join('visitante v', 'v.identificacion = e.idvisitante');
    $this->Db->select("e.idequipo, te.tipoequipo, m.marca, e.serie, e.cod_barras, CONCAT(nombres, ' ', apellido1)");
    $data = $this->Db->get($this->table);
    return $data;
  }
  
  public function getById($id) {
    // TODO: buscar equipo por Id. Tomar como referencia la consulta getHistoryByCC de acceso.
    $this->Db->join('tipoequipo te', 'te.idtipoequipo = e.tipoequipo');
    $this->Db->join('marca m', 'm.idmarca = e.marca');
    $this->Db->select("e.idequipo, idvisitante, te.tipoequipo, m.marca, e.serie, e.cod_barras, m.idmarca, te.idtipoequipo");
    $this->Db->where("idequipo=$id");
    $data = $this->Db->get($this->table);
    return $data[0];
  }

  public function getAllAutocomplete() {
    //$data = $this->Db->findAll($this->table);

    // idequipo   idvisitante   tipoequipo  marca   serie   cod_barras 
    $this->Db->join('tipoequipo te', 'te.idtipoequipo = e.tipoequipo');
    $this->Db->join('marca m', 'm.idmarca = e.marca');
    // $this->Db->select("idequipo, te.tipoequipo, m.marca");
    $this->Db->select("idequipo AS value, CONCAT(te.tipoequipo, ' ', m.marca, ' ', serie) AS label");
    $data = $this->Db->get($this->table);
    return $data;
  }

  public function save() {
    # code...
  }
}