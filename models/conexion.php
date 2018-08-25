<?php

class Conexion
{

    public function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=progresol v1.2", "root", "");
        return $link;

    }

}
