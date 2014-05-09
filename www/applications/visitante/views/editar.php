    <?php
    print formOpen();
    
    $output = formLabel('documento', 'Número documento', FALSE); 
    $output .= formInput(array(
        'class' => 'form-control',
        'id' => 'documento',
        'maxlength' => '15',
        'name' => 'documento',
        'required' => 'required',
        'type' => 'text',
        'value' => isset($datos['documento']) ? $datos['documento'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    // tipo_documento
    $output = formLabel('tipo_documento', 'Tipo documento', FALSE); 
    $output .= formSelect(array('id' => 'tipo_documento', 'name' => 'tipo_documento'),
        $tipo_doc);
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('nombre', 'Nombres', FALSE); 
    $output .= formInput(array(
        'class' => 'form-control',
        'id' => 'nombre',
        'name' => 'nombre',
        'required' => 'required',
        'type' => 'text',
        'value' => isset($datos['nombre']) ? $datos['nombre'] : '',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formLabel('apellido', 'Apellidos', FALSE); 
    $output .= formInput(array(
        'class' => 'form-control',
        'id' => 'apellido',
        'name' => 'apellido',
        'required' => 'required',
        'type' => 'text',
        'value' => isset($datos['apellido']) ? $datos['apellido'] : '',
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

    print formSave("guardar");

    ?>
    <?php print formClose(); ?>
