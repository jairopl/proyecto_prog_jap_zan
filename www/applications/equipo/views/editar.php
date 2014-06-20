<?php
print "<script type='text/javascript'>$script</script>";
print formOpen("equipo/guardar");

if (!empty($editar)) {
    $output = formInput(array(
        'name'  => 'editar',
        'type'  => 'hidden',
        'value' => '1',
        ));
    $output .= formInput(array(
        'name'  => 'idequipo',
        'type'  => 'hidden',
        'value' => $datos['idequipo'],
        ));
    print $output;
}

$output = formLabel('visitante', 'Visitante', FALSE); 
$output .= formInput(array(
    'class'   => 'form-control',
    'id'      => 'visitante',
    'name'    => 'visitante',
    // 'type' => 'text',
    'value'   => isset($datos['idvisitante']) ? $datos['idvisitante'] : '',
    ));
$output .= "<div id='autocomplete_visitante' style='position: relative;'></div>";
$field_div = div('form-group ui-widget', NULL, NULL, $output);
print $field_div;


// Tipo equipos
$output = formLabel('tipoequipo', 'Tipo de equipo', FALSE); 
$output .= formSelect(array('id' => 'tipoequipo', 'name' => 'tipoequipo'),
    $tipos_equipos);
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

// Marcas
$output = formLabel('marca', 'Marcas', FALSE); 
$output .= formSelect(array('id' => 'marca', 'name' => 'marca'),
    $marcas);
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

$output = formLabel('serie', 'Serie', FALSE); 
$output .= formInput(array(
    'class'    => 'form-control',
    'id'       => 'serie',
    'name'     => 'serie',
    'type'     => 'text',
    'value'    => isset($datos['serie']) ? $datos['serie'] : '',
    ));
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

$output = formLabel('cod_barras', 'Codigo de barras', FALSE); 
$output .= formInput(array(
    'class'    => 'form-control',
    'id'       => 'cod_barras',
    'name'     => 'cod_barras',
    'type'     => 'text',
    'value'    => isset($datos['cod_barras']) ? $datos['cod_barras'] : '',
    ));
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

print formAction("guardar");

print formClose();
?>
