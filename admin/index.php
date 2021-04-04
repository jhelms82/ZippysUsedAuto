<?php
    // Model 
    require('../model/db_connection.php');
    require('../model/vehicles_db.php');
    require('../model/types_db.php');
    require('../model/classes_db.php');
    require('../model/vehicle_make_db.php');



//Get Data
    $types = get_types();
    $classes = get_classes();
    $makes = get_make();

    // Get Parameter 
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    if ($sort = false) $sort = 'price';





    include('../admin/view/vehicle.php');
    ?>