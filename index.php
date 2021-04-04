<?php

    require('model/db_connection.php');
    require('model/vehicles_db.php');
    require('model/types_db.php');
    require('model/classes_db.php');
    require('model/vehicle_make_db.php');


    $types = get_types();
    $classes = get_classes();
    $makes = get_make();

    // Get controller using get
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    if ($sort = false) $sort = 'price';

    if ($make_id) {
        $make_name = get_make($make_id);
        $vehicles = get_vehicles_by_make($make_id, $sort);
    } else if ($type_id) {
        $type_name = get_type_name($type_id);
        $vehicles = get_vehicles_by_type($type_id, $sort);
    } else if ($class_id) {
        $class_name = get_class_name($class_id);
        $vehicles = get_vehicles_by_class($class_id, $sort);
    } else {
        $vehicles = get_all_vehicle($sort);
    }




    include('view/vehicle.php');
    ?>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>