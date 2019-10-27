<?php

$pontos = "";
if (realpath("./index.php")) {
    $pontos = './';
} else {
    if (realpath("../index.php")) {
        $pontos = '../';
    }
}

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Controle/usuarioControle.php';
    include_once './Modelo/Usuario.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Usuario.php';
        include_once '../Controle/usuarioControle.php';
    }
}

if (isset($_SESSION['usuario'])) {
    include_once $pontos . 'Modelo/usuario.php';
    $usuario = new usuario();
    $usuario = unserialize($_SESSION['usuario']);
    if ($usuario->getAdministrador() == 'true') {
        include_once $pontos . 'Base/navAdm.php';
    } else {
        include_once $pontos . 'Base/navPadrao.php';
    }
} else {
    include_once $pontos . 'Base/navBar.php';
}