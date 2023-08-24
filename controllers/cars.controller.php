<?php


$modelsPath = __DIR__ . '/../models/';

require_once $modelsPath . 'Car.php';

class CarController {
    static public function ctrAdd(){
        if  (isset($_POST['brand'])){
            $table = "cars";
            $data = array(
                "brand" => $_POST['brand'],
                "model" => $_POST['model'],
                "manufacture_year" => $_POST['year'],
                "price" => $_POST['price'],
                "owner_name" => $_POST['name'],
                "owner_mail" => $_POST['email'],
            );

            $response = Car::addCar($table, $data);

            return $response;
        }



    }

    static public function ctrShow($item=null, $val=null){

        $table = "cars";
        $response = Car::showCars($table,$item,$val);
        return $response;
    }

    static public function ctrUpdate($carId, $editedData){
            $table = "cars";
            return Car::updateCar($table, $editedData, $carId);
    }

    static public function ctrDelete($item) {
            $table = "cars";
            $val = $item;
        return Car::deleteCar($table, $val);
        }

    static public function ctrSell($item){
        $table = "cars";
        $id = $item;
        return Car::sellCar($table, $id);
    }
}