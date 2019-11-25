<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/coordenadorcursoPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/coordenadorcursoPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/coordenadorcursoPDO.php';
        }
    }
}

$classe = new coordenadorcursoPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

