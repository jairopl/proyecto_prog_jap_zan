<?php
if (!function_exists("makeTable")) {
  function makeTable($data, $headers, $editar = TRUE, $eliminar = TRUE, $key = 'identificacion', $show_key = TRUE, $use_jquery = TRUE, $class = 'table table-striped') {
    if (empty($data) || !is_array($headers) || !is_array($data)) {
      return '<p class="well well-large">No hay datos que mostrar.</p>';
    }
    $output = "<table class='$class'><thead><tr>";
    foreach ($headers as $h) {
      $output .= "<th>$h</th>";
    }
    if ($editar || $eliminar) {$output .= "<th></th>";}
    $output .= '</tr></thead><tbody>';
    $icons_dir = _get("webURL") . '/www/lib/images/icons/';
    if (isset($data) && is_array($data)) {
      foreach ($data as $fila) {
        $output .= "<tr>";
        foreach ($fila as $k => $celda) {
          if ($k != $key || $show_key) {
            $output .= "<td>$celda</td>";
          }
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
    $output .= "</tbody></table>";
    $class = '.' . str_replace(' ', '.', $class);
    if ($use_jquery) {
      $output .= "
<script src=" . path("vendors/js/jquery/jquery.dataTables.js", "zan") . " type='text/javascript'></script>
      <script type='text/javascript' charset='utf-8'>
        $(document).ready(function() {
          $('$class').dataTable( {
          'aaSorting': [[ 1, 'asc' ]],
        } );
        });
      </script>";
      
    }

    return $output;
  }
}

if (!function_exists("addLinksColumn")) {
  function addLinksColumn($data, $columns, $column_key, $url = '') {
    if (!is_array($data) || !is_array($columns) || !is_string($column_key)) {
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
