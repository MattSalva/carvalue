<?php

$controllersPath = __DIR__ . '/../controllers/';


if (isset($_GET['car'])) {
    $carId = $_GET['car'];

    require_once $controllersPath . 'cars.controller.php';

    $deleted = CarController::ctrDelete($carId);

    if ($deleted) {
        echo "Car deleted successfully";
    } else {
        echo "Failed to delete car";
    }
} else {
    echo "Car ID not provided";
}