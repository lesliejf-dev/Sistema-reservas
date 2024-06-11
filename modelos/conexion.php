<?php

Class Conexion{
    static public function conectar(){
        $link = new  PDO("mysql:host=ams.domcloud.co;dbname=infinite_sistema_gestion_db", "infinite-sistema-gestion","aJq1xG1q8R_Jb2+8_R");
        $link->exec("set name utf8");

        return $link;
    }
}
