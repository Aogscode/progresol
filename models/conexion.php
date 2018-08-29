<?php

class Conexion
{

    public function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=progresol", "root", "willito");
        return $link;

    }

}
