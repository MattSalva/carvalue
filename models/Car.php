<?php


require_once 'Connection.php';




class Car
{

    static public function addCar($table, $data){
        $stmt = Connection::connect()
            ->prepare(
                "INSERT INTO $table(brand, model, manufacture_year, price, owner_name, owner_mail) VALUES (:brand, :model, :manufacture_year, :price, :owner_name, :owner_mail)");

        $stmt->bindParam(":brand", $data['brand'], PDO::PARAM_STR);
        $stmt->bindParam(":model", $data['model'], PDO::PARAM_STR);
        $stmt->bindParam(":manufacture_year", $data['manufacture_year'], PDO::PARAM_INT);
        $stmt->bindParam(":price", $data['price'], PDO::PARAM_INT);
        $stmt->bindParam(":owner_name", $data['owner_name'], PDO::PARAM_STR);
        $stmt->bindParam(":owner_mail", $data['owner_mail'], PDO::PARAM_STR);


        if ($stmt->execute()){
            return 'ok';
        } else {
            print_r(Connection::connect()->errorInfo());
        }

        $stmt->closeCursor();
        $stmt=null;
    }


    static public function showCars($table, $item, $val){
        if ($item == null & $val == null){
            $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id DESC");

            $stmt->execute();


            return $stmt->fetch();
            $stmt->closeCursor();


        }


        $stmt = null;

    }

    static public function updateCar($table, $data, $id){
        $stmt = Connection::connect()
            ->prepare(
                "UPDATE $table 
                       SET brand=:brand, model=:model, manufacture_year=:manufacture_year, price=:price, owner_name = :owner_name, owner_mail=:owner_mail
                       WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":brand", $data['brand'], PDO::PARAM_STR);
        $stmt->bindParam(":model", $data['model'], PDO::PARAM_STR);
        $stmt->bindParam(":manufacture_year", $data['year'], PDO::PARAM_INT);
        $stmt->bindParam(":price", $data['price'], PDO::PARAM_INT);
        $stmt->bindParam(":owner_name", $data['owner'], PDO::PARAM_STR);
        $stmt->bindParam(":owner_mail", $data['contact'], PDO::PARAM_STR);



        if ($stmt->execute()){
            return 'ok';
        } else {
            print_r(Connection::connect()->errorInfo());
        }

        $stmt->closeCursor();
        $stmt=null;

    }


    static public function deleteCar($table, $val){

        $stmt = Connection::connect()
            ->prepare("DELETE FROM $table WHERE id = :id");

        $stmt->bindParam(":id", $val, PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Connection::connect()->errorInfo());

        }

        $stmt->closeCursor();

        $stmt = null;

    }

    static public function sellCar($table, $id){
        $stmt = Connection::connect()->prepare("UPDATE $table SET sold=1 WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }


}