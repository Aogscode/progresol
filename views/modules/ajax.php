<?php

require_once "../../controllers/controller.php";
require_once "../../models/conexion.php";
require_once "../../models/crud.php";

class Ajax
{
    //Variables para ingreso al sistema
    public $usuario;
    public $clave;

    public function validarIngresoAjax()
    {

        $user = $this->usuario;
        $pass = $this->clave;

        $respuesta = MvcController::validarIngresoController($user, $pass);

        echo $respuesta;
    }

    public function consultarLuckyAjax($codLucky)
    {
        $lucky = $codLucky;

        $respuesta = MvcController::consultarLuckyController($lucky);

        echo $respuesta;
    }

    public function consultarDniAjax($numdoc)
    {

        $docide = $numdoc;

        $respuesta = MvcController::consultarDniController($docide);

        echo $respuesta;
    }

    public function llenarZonasAjax()
    {

        $respuesta = MvcController::llenarZonasController();

        echo $respuesta;
    }

    public function llenarProductosAjax()
    {

        $respuesta = MvcController::llenarProductosController();

        echo $respuesta;
    }

    public function buscarMaestroAjax($numdoc)
    {

        $jsondata = array();

        $docide = $numdoc;

        $respuesta = MvcController::buscarMaestroController($docide);

        if ($respuesta["id"] > 0) {
            $jsondata["correcto"]   = true;
            $jsondata["codMaestro"] = $respuesta["id"];
            $jsondata["dni"]        = $respuesta["dni"];
            $jsondata["nombres"]    = $respuesta["name"];
            $jsondata["apepat"]     = $respuesta["lastname1"];
            $jsondata["apemat"]     = $respuesta["lastname2"];
            $jsondata["ptosVal"]    = "0";
            $jsondata["ptosPend"]   = "0";

        } else {
            $jsondata["correcto"] = false;
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
        //echo $respuesta["name"];
    }
}

/* ---------------------------
VALIDA EL INGRESO AL SISTEMA
------------------------------*/
if (isset($_POST["validarUsuario"]) && isset($_POST["validarClave"])) {
    $a          = new Ajax();
    $a->usuario = $_POST["validarUsuario"];
    $a->clave   = $_POST["validarClave"];
    $a->validarIngresoAjax();
}

/* -------------------------------
CONSULTA SI EXISTE LA FERRETERIA
----------------------------------*/
if (isset($_POST["codLucky"])) {
    $codLucky = $_POST["codLucky"];
    $a        = new Ajax();
    $a->consultarLuckyAjax($codLucky);
}

/* ---------------------------------------
LLENADO DE COMBOBOX ZONA
------------------------------------------*/
if (isset($_POST["lista"]) && $_POST["lista"] == "zonas") {
    $a = new Ajax();
    $a->llenarZonasAjax();
}

/* ---------------------------------------
LLENADO DE COMBOBOX PRODUCTOS
------------------------------------------*/
if (isset($_POST["lista"]) && $_POST["lista"] == "productos") {
    $a = new Ajax();
    $a->llenarProductosAjax();
}

/* ---------------------------------------
CONSULTA SI EXISTE EL MAESTRO EN LA BBDD
------------------------------------------*/
if (isset($_POST["dni"])) {
    $dni = $_POST["dni"];
    $a   = new Ajax();
    $a->consultarDniAjax($dni);
}

/* ---------------------------------------
BUSCA EL MAESTRO Y TRAE SUS DATOS
------------------------------------------*/
if (isset($_POST["buscaDni"])) {
    $dni = $_POST["buscaDni"];
    $a   = new Ajax();
    $a->buscarMaestroAjax($dni);
}
