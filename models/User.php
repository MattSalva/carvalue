<?php

require_once 'Connection.php';

class User
{
    private $id;
    private $username;
    private $password;

    /**
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }


    public function login(){

        $stmt = Connection::connect()
            ->prepare("SELECT * FROM users WHERE username = :username AND password = :password;");


        $stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $this->password, PDO::PARAM_STR);

        if ($stmt->execute()){
            return $stmt->fetch();
        } else {
            print_r(Connection::connect()->errorInfo());
        }

        $stmt->closeCursor();
        $stmt=null;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }





}