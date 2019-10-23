<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Autores.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Autores.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Autores.php';
        }
    }
}


class AutoresPDO{
    
             /*inserir*/
    function inserirAutores() {
        $autores = new autores($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Autores values(default , :id_usuario , :id_trabalho);' );

            $stmt->bindValue(':id_usuario', $autores->getId_usuario());    
        
            $stmt->bindValue(':id_trabalho', $autores->getId_trabalho());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=autoresInserido');
            }else{
                header('location: ../index.php?msg=autoresErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectAutores(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from autores ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectAutoresId_autores($id_autores){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from autores where id_autores = :id_autores;');
        $stmt->bindValue(':id_autores', $id_autores);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectAutoresId_usuario($id_usuario){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from autores where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectAutoresId_trabalho($id_trabalho){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from autores where id_trabalho = :id_trabalho;');
        $stmt->bindValue(':id_trabalho', $id_trabalho);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateAutores(Autores $autores){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update autores set id_usuario = :id_usuario , id_trabalho = :id_trabalho where id_autores = :id_autores;');
        $stmt->bindValue(':id_usuario', $autores->getId_usuario());
        
        $stmt->bindValue(':id_trabalho', $autores->getId_trabalho());
        
        $stmt->bindValue(':id_autores', $autores->getId_autores());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteAutores($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from autores where id_autores = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteAutores($_GET['id']);
        header('location: ../Tela/listarAutores.php');
    }



            /*editar*/
            function editar() {
                $autores = new Autores($_POST);
                    if($this->updateAutores($autores) > 0){
                        header('location: ../index.php?msg=autoresAlterado');
                    } else {
                        header('location: ../index.php?msg=autoresErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                