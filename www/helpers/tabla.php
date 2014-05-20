<?php
if (!function_exists("getAlert")) {
  function makeTable($data, $headers, $editar = TRUE, $eliminar = TRUE, $key = 'identificacion', $class = 'table table-striped') {
    if (empty($data) || !is_array($headers) || !is_array($data)) {
      return '<p class="well well-large">No hay datos que mostrar.</p>';
    }
    $output = "<table class='$class'><tr>";
    foreach ($headers as $h) {
      $output .= "<th>$h</th>";
    }
    if ($editar || $eliminar) {$output .= "<th></th>";}
    $output .= '</tr>';
    $icons_dir = _get("webURL") . '/www/lib/images/icons/';
    if (isset($data) && is_array($data)) {
      foreach ($data as $fila) {
        $output .= "<tr>";
        foreach ($fila as $celda) {
          $output .= "<td>$celda</td>";
        }
        if ($editar || $eliminar) {
          $output .= '<td valign="top" align="center">';
          if ($editar) {
            $output .= '<a href="' . _get("webBase") . '/visitante/editar/' . $fila[$key] . '" title="Modificar"><img src="' . $icons_dir . 'edit.png" border="0"></a>';
          }
          if ($eliminar) {
            $output .= '<a href="' . _get("webBase") . '/visitante/eliminar/' . $fila[$key] . '" title="Eliminar"><img src="' . $icons_dir . 'delete.png" border="0"></a>';
          }
          $output .= '</td>';
        }
        $output .= "</tr>";
      }
    }
    $output .= "</table>";
    return $output;
  }
}
?>
