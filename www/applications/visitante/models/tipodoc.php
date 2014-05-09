<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
  die("Error: You don't have permission to access here...");
}

class TipoDoc_Model extends ZP_Model {
  
  public function __construct() {
    $this->Db = $this->db();
    
    $this->helpers();
  
    $this->table = "tipo_doc";
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
        'value' => $val['idtipo_doc'],
        'option' => $val['descripcion'],
        );
      if ($temp['value'] == $selected)
        $temp['selected'] = 'selected';
      $tipos[] = $temp;
    }
    return $tipos;
  }
}