<?php

class conexao {

    public function getConexao() {
        $con = new PDO("mysql:host=localhost;dbname=repositorio","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $con;
    }
}
