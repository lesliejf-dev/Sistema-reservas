<?php

Class Conexion{
    static public function conectar(){
        $link = new  PDO("mysql:host=localhost;dbname=centro_infinite", "root","");
        $link->exec("set name utf8");

        return $link;
    }
}