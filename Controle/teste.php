<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../Modelo/Trabalho.php';
include_once '../Modelo/Usuario.php';
//$trabalho = new Trabalho($_POST);

$usuario = new Usuario(unserialize($_SESSION['usuario']));
echo $usuario->getId();

echo var_dump($_POST);
?>

