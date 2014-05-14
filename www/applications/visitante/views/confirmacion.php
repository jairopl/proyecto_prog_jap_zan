<p>¿Está seguro que desea <?php print $action; ?>?</p>
<?php
  print formOpen($url);
  
  print formAction("eliminar");

  print formClose();
?>
