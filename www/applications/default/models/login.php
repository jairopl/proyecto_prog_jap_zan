<?php
/**
 * Access from index.php:
 */
if(!defined("ACCESS")) {
  die("Error: You don't have permission to access here...");
}

class Login_Model extends ZP_Load {
  
  public function __construct() {
    $this->Db = $this->db();
    
    $this->table = "usuario";
  }

  public function checkUserCredentials() {
    $this->helper(array('alerts', 'sessions'));
    if (!POST('user') || !POST('pass')) {
      showAlert("Falta el usuario o contraseña", '');
    }

    $user = POST('user');
    $pass = POST('pass');

    // Validar si es el usuario y contraseña

    createLoginSessions(array(
      'Username' => $user,
      ));
    ____($user);
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