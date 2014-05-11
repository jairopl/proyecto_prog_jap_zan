<?php
/**
 * Access from index.php:
 */
if(!defined("ACCESS")) {
  die("Error: You don't have permission to access here...");
}

class Rol_Model extends ZP_Load {
  
  public function __construct() {
    $this->Db = $this->db();
    
    // $this->helpers();
  
    $this->table = "tipo_visitante";
  }

  public function getAll($limit = 10) {
    $data = $this->Db->findAll($this->table);
    return $data;
  }
  
  public function getDataForSelect($selected = NULL) {
    $tiposDocumentos = $this->getAll();
    $tipos = array();

    foreach ($tiposDocumentos as $val) {
      $temp = array(
        'value' => $val['idtipo_visitante'],
        'option' => $val['tipo_visitante'],
        );
      if ($temp['value'] == $selected)
        $temp['selected'] = 'selected';
      $tipos[] = $temp;
    }
    return $tipos;
  }
}