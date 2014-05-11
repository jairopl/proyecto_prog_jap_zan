    <?php
    print formOpen("visitante/guardar");
    
    if (!empty($editar)) {
        $output = formInput(array(
            'name' => 'editar',
            'type' => 'hidden',
            'value' => '1',
            ));
        print $output;
    }


    $output = formLabel('documento', 'Número documento', FALSE); 
    $doc_input = array(
        'class' => 'form-control',
        'id' => 'documento',
        'maxlength' => '15',
        'name' => 'documento',
        'required' => 'required',
        'type' => 'text',
        'value' => isset($datos['documento']) ? $datos['documento'] : '',
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
        'class' => 'form-control',
        'id' => 'nombres',
        'name' => 'nombres',
        'required' => 'required',
        'type' => 'text',
        'value' => isset($datos['nombres']) ? $datos['nombres'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('apellidos', 'Apellidos', FALSE); 
    $output .= formInput(array(
        'class' => 'form-control',
        'id' => 'apellidos',
        'name' => 'apellidos',
        'required' => 'required',
        'type' => 'text',
        'value' => isset($datos['apellidos']) ? $datos['apellidos'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('telefono', 'Teléfono', FALSE); 
    $output .= formInput(array(
        'class' => 'form-control',
        'id' => 'telefono',
        'name' => 'telefono',
        'type' => 'text',
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

    ?>
    <?php print formClose(); ?>
