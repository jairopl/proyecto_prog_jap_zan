<div>
<?php 
if (!empty($cerrar)) {
  $output = a('Registrar salida', _get("webBase") . '/acceso/salida/' . $idacceso, FALSE,
    array('class' => 'btn btn-warning btn-large'));
  print $output;
}
?>
<a href="<?php print _get("webBase"); ?>/acceso" class="btn btn-success btn-large">Atrás</a>
</div>
<div class="row-fluid">
<h4 class="span5">Visitante:</h4><span class="span7"><?php print $nombre_visitante; ?></span>
</div>
<div class="row-fluid">
<h4 class="span5">Equipo:</h4><span class="span7"><?php print $equipo; ?></span>
</div>
<div class="row-fluid">
<h4 class="span5">Fecha:</h4><span class="span7"><?php print $fecha; ?></span>
</div>
<div class="row-fluid">
<h4 class="span5">Hora entrada:</h4><span class="span7"><?php print $hora_entrada; ?></span>
</div>
<div class="row-fluid">
<h4 class="span5">Hora salida:</h4><span class="span7"><?php print $hora_salida; ?></span>
</div>
<div class="row-fluid">
<h4 class="span5">Observaciones:</h4><span class="span7"><?php print $observaciones; ?></span>
</div>
