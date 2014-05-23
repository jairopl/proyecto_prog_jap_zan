<?php
print "<script type='text/javascript'>$script</script>";
print formOpen("acceso/guardar");

$output = formLabel('identificacion', 'Visitante', FALSE); 
$output .= formInput(array(
    'class'   => 'form-control',
    'id'      => 'identificacion',
    'name'    => 'identificacion',
    // 'type' => 'text',
    'value'   => isset($visitante) ? $visitante : '',
    ));
$output .= "<div id='autocomplete_identificacion' style='position: relative;'></div>";
$field_div = div('form-group ui-widget', NULL, NULL, $output);
print $field_div;

$output = formLabel('equipo', 'Equipo', FALSE); 
$output .= formInput(array(
    'class'   => 'form-control',
    'id'      => 'equipo',
    'name'    => 'equipo',
    // 'type' => 'text',
    'value'   => isset($equipo) ? $equipo : '',
    ));
$output .= "<div id='autocomplete_equipo' style='position: relative;'></div>";
$field_div = div('form-group ui-widget', NULL, NULL, $output);
print $field_div;

$output = formLabel('observaciones', 'Observaciones', FALSE); 
$output .= formTextarea(array(
    'class'   => 'form-control',
    'id'      => 'observaciones',
    'name'    => 'observaciones',
    ));
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

print formAction("guardar");

print formClose();

?>
