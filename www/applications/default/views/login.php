<?php
print formOpen("");

$output = formLabel('user', 'Usuario', FALSE); 
$output .= formInput(array(
    'class' => 'form-control',
    'id'    => 'user',
    'name'  => 'user',
    'required' => 'required',
    'type'  => 'text',
    ));
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

$output = formLabel('pass', 'Contraseña', FALSE); 
$output .= formInput(array(
    'class'    => 'form-control',
    'id'       => 'pass',
    'name'     => 'pass',
    'required' => 'required',
    'type'     => 'password',
    ));
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

$output = formInput(array(
    'class'    => 'btn btn-success',
    'name'     => 'login',
    'type'     => 'submit',
    'value'    => 'Entrar',
    ));
$field_div = div('form-group', NULL, NULL, $output);
print $field_div;

print formClose();
?>
