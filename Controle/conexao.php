<?php

class conexao {

    public function getConexao() {
        $con = new PDO("mysql:host=localhost;dbname=repositorio","root","");
        return $con;
    }

}
?>