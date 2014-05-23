    <?php
    print formOpen("visitante/guardar");
    
    if (!empty($editar)) {
        $output = formInput(array(
            'name'  => 'editar',
            'type'  => 'hidden',
            'value' => '1',
            ));
        print $output;
    }

    $output = formLabel('identificacion', 'Número identificación', FALSE); 
    $doc_input = array(
        'class'     => 'form-control',
        'id'        => 'identificacion',
        'maxlength' => '15',
        'name'      => 'identificacion',
        'required'  => 'required',
        'type'      => 'text',
        'value'     => isset($datos['identificacion']) ? $datos['identificacion'] : '',
        );
    if (!empty($editar)) { $doc_input['readonly'] = 'readonly'; }
    $output .= formInput($doc_input);
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    // tipo_documento
    $output = formLabel('tipo_documento', 'Tipo documento', FALSE); 
    $output .= formSelect(array('id' => 'tipo_documento', 'name' => 'tipo_documento'),
        $tipo_doc);
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('nombres', 'Nombres', FALSE); 
    $output .= formInput(array(
        'class'    => 'form-control',
        'id'       => 'nombres',
        'name'     => 'nombres',
        'required' => 'required',
        'type'     => 'text',
        'value'    => isset($datos['nombres']) ? $datos['nombres'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('apellido1', 'Apellido 1', FALSE); 
    $output .= formInput(array(
        'class'    => 'form-control',
        'id'       => 'apellido1',
        'name'     => 'apellido1',
        'required' => 'required',
        'type'     => 'text',
        'value'    => isset($datos['apellido1']) ? $datos['apellido1'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('apellido2', 'Apellido 2', FALSE); 
    $output .= formInput(array(
        'class'    => 'form-control',
        'id'       => 'apellido2',
        'name'     => 'apellido2',
        'required' => 'required',
        'type'     => 'text',
        'value'    => isset($datos['apellido2']) ? $datos['apellido2'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('telefono', 'Teléfono', FALSE); 
    $output .= formInput(array(
        'class' => 'form-control',
        'id'    => 'telefono',
        'name'  => 'telefono',
        'type'  => 'text',
        'value' => isset($datos['telefono']) ? $datos['telefono'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    // Rol
    // tipo_documento
    $output = formLabel('rol_usuario', 'Rol', FALSE); 
    $output .= formSelect(array('id' => 'rol_usuario', 'name' => 'rol_usuario'),
        $roles);
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    print formAction("guardar");

    print formClose();
?>
