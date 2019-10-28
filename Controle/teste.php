<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../Modelo/Trabalho.php';
include_once '../Modelo/Usuario.php';
//$trabalho = new Trabalho($_POST);

$usuario = new Usuario(unserialize($_SESSION['usuario']));
$trabalho = new Trabalho($_POST);

if (isset($_FILES['arquivo'])) {
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "upload/";
    echo "<span>" . $usuario->getId() . "</span><br>";
    echo "<span>" . $trabalho->getNome() . "</span><br>";
    echo "<span>" . $trabalho->getResumo() . "</span><br>";
    echo "<span>" . $trabalho->getCategoria() . "</span><br>";
    echo "<span>" . $diretorio . $novo_nome . "</span><br>";

    echo var_dump($_POST);
}
?>

