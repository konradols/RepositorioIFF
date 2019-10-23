<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/autoresPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/autoresPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/autoresPDO.php';
        }
    }
}

$classe = new autoresPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

