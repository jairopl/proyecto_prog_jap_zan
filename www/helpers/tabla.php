<?php
if (!function_exists("makeTable")) {
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

if (!function_exists("addLinksColumn")) {
  function addLinksColumn($data, $columns, $column_key, $url = '') {
    if (!is_array($columns) || !is_string($column_key)) {
      return $data;
    }
    $new_data = $data;
    foreach ($data as $r => $row) {
      foreach ($row as $field => $value) {
        if (in_array($field, $columns)) {
          $new_url = _get("webBase") . '/' . $url . $row[$column_key];
          $link = "<a href='$new_url'>$value</a>";
          $new_data[$r][$field] = $link;
        }
      }
    }
    return $new_data;
  }
}
?>
