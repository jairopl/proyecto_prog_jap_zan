<div><a href='<?php print _get("webBase"); ?>/equipo/agregar' class="btn btn-primary">Agregar nuevo</a></div>
<?php 
$edit = isset($editar) ? $editar : TRUE;
$delete = isset($eliminar) ? $eliminar : TRUE;
print makeTable($data, $headers, $edit, $delete, 'idequipo', FALSE, 'equipo');
?>
<?php makeExportLinks(); ?>
