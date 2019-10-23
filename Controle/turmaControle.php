<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/turmaPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/turmaPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/turmaPDO.php';
        }
    }
}

$classe = new turmaPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

