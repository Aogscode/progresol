<?php
require_once "models/enlaces.php";
require_once "models/conexion.php";
require_once "controllers/controller.php";
require_once "models/crud.php";

session_start();
//session_destroy();
if (isset($_SESSION["validar"])) {
    $mvc = new MvcController();
    $mvc->pagina();
} else {
    header("location:login.php");
}

/*
if (!isset($_SESSION["validar"])) {
include "views/login.php";
exit();
}
 */
