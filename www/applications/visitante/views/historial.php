<h2>Historial de accesos de <?php print $visitante['nombres'] . ' ' . $visitante['apellido1']; ?></h2>
<div>
<?php 
print makeTable($data, $headers, FALSE, FALSE, 'idacceso', FALSE);
?>
</div>
<div class="btn"><a href="<?php print _get("webBase"); ?>">Nueva búsqueda</a></div>