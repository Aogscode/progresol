<?php

class Conexion
{

    public function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=progresol", "root", "");
        $link->query("SET NAMES 'UTF8' ");
        return $link;

    }

}
