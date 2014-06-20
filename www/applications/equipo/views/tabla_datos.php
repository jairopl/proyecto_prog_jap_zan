<div><a href='<?php print _get("webBase"); ?>/equipo/agregar' class="btn btn-primary">Agregar nuevo</a></div>
<?php 
$edit = isset($editar) ? $editar : TRUE;
print makeTable($data, $headers, $edit, FALSE, 'idequipo', FALSE, 'equipo');
?>
<?php makeExportLinks(); ?>
