<h2>Buscador por visitante</h2>
<?php 
    print formOpen("");

    $output = formInput(array(
        'class'       => 'form-control input-xxlarge',
        'id'          => 'by_visitant',
        'name'        => 'by_visitant',
        'placeholder' => 'Buscar por nombre o documento del visitante',
        'type'        => 'text',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    $output = formInput(array(
        'class' => 'btn btn-primary btn-large',
        'name'  => 'buscar',
        'type'  => 'submit',
        'value' => 'Buscar',
        ));
    $field_div = div('form-group', NULL, NULL, $output);
    print $field_div;

    print formClose();
?>