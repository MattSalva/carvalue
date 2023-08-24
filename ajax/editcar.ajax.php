<?php
$controllersPath = __DIR__ . '/../controllers/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['carId']) && isset($_POST['editedData'])) {
        $carId = $_POST['carId'];
        $editedData = $_POST['editedData'];

        require_once $controllersPath . 'cars.controller.php';

        $edited = CarController::ctrUpdate($carId, $editedData);

        if ($edited) {
            echo json_encode(array('status' => 'success', 'message' => 'Car information edited successfully.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to edit car information.'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid data provided.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
