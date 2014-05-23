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
    $data = $this->Db->findAll($this->table, '*', NULL, 'fecha DESC, hora_entra DESC');
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
    return $data[0];
  }

  public function saveInput() {
    $this->helper('alerts');
    if (!POST("identificacion")) {
      showAlert("No escribió el visitante que ingresa.", 'acceso/ingreso');
    } elseif (!POST("equipo")) {
      showAlert("No seleccionó el equipo que ingresa.", 'acceso/ingreso');
    }
    // TODO: validar que el equipo no este adentro
    $consultar = $this->getOpenAccess(POST('equipo'));
    if (!empty($consultar)) {
      showAlert("El equipo ya se encuentra ingresado", 'acceso/ingreso');
    }

    $data = array(
      "idvisitante"   => POST("identificacion"),
      "idequipo"      => POST("equipo"),
      "fecha"         => date('Y-m-d'),
      "hora_entra"    => date('H:i:s'),
      "observaciones" => POST("observaciones"),
    );
    
    $ejecutado = $this->Db->insert($this->table, $data);

    if ($ejecutado !== false) {
      showAlert("El registro satisfactoriamente el ingreso del equipo.", 'acceso');
    } else {
      showAlert("Se presentó un problema al guardar el registro.", 'acceso');
    }
  }

  public function saveOutput() {
    $this->helper('alerts');
    if (!POST("idacceso")) {
      redirect('acceso');
    }
    $data = array(
      "hora_sale" => date('H:i:s'),
    );
    
    $ejecutado = $this->Db->update($this->table, $data, POST("idacceso"), 'idacceso');

    if ($ejecutado !== false) {
      redirect('acceso');
    } else {
      showAlert("Se presentó un problema al guardar el registro.", 'acceso');
    }
  }

  public function getOpenAccess($equipo) {
    $data = $this->Db->findBySQL("idequipo = $equipo AND hora_sale IS NULL", $this->table);
    return $data[0];
  }
}