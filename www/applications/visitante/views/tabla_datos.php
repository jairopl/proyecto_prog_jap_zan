<?php 
$edit = isset($editar) ? $editar : TRUE;
$delete = isset($eliminar) ? $eliminar : TRUE;
print makeTable($data, $headers, $edit, $delete);
?>