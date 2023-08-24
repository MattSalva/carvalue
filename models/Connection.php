<?php

class Connection
{
    static public function connect(){
        $link = new PDO("mysql:host=localhost;port=3307;dbname=carvalue", 'root', '');
        $link->exec("set names utf8");

        return $link;
    }

}