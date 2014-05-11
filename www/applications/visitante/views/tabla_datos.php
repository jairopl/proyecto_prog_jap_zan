<table class="table table-striped">
<tr>
<?php 
foreach ($headers as $h) {
  echo "<th>$h</th>";
}
?>
</tr>
<?php 
if (isset($data) && is_array($data)) {
  foreach ($data as $fila) {
    echo "<tr>";
    foreach ($fila as $celda) {
      echo "<td>$celda</td>";
    }
    echo "</tr>";
  }
}
?>
</table>