<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/trabalhoPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/trabalhoPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/trabalhoPDO.php';
        }
    }
}

$classe = new trabalhoPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

