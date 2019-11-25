<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Coordenadorcurso.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Coordenadorcurso.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Coordenadorcurso.php';
        }
    }
}


class CoordenadorcursoPDO{
    /*inserir*/
    function inserirCoordenadorcurso() {
        $coordenadorcurso = new coordenadorcurso($_POST);
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('insert into coordenadorcurso values(:id_coordenadorcurso , :id_usuario , :id_curso);' );

        $stmt->bindValue(':id_coordenadorcurso', $coordenadorcurso->getId_coordenadorcurso());    
        
        $stmt->bindValue(':id_usuario', $coordenadorcurso->getId_usuario());    
        
        $stmt->bindValue(':id_curso', $coordenadorcurso->getId_curso());    
        
        if($stmt->execute()){ 
            header('location: ../index.php?msg=coordenadorcursoInserido');
        }else{
            header('location: ../index.php?msg=coordenadorcursoErroInsert');
        }
    }
    /*inserir*/
    

            

    public function selectCoordenadorcurso(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenadorcurso ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCoordenadorcursoId_coordenadorcurso($id_coordenadorcurso){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenadorcurso where id_coordenadorcurso = :id_coordenadorcurso;');
        $stmt->bindValue(':id_coordenadorcurso', $id_coordenadorcurso);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCoordenadorcursoId_usuario($id_usuario){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenadorcurso where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCoordenadorcursoId_curso($id_curso){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenadorcurso where id_curso = :id_curso;');
        $stmt->bindValue(':id_curso', $id_curso);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateCoordenadorcurso(Coordenadorcurso $coordenadorcurso){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update coordenadorcurso set id_usuario = :id_usuario , id_curso = :id_curso where id_coordenadorcurso = :id_coordenadorcurso;');
        $stmt->bindValue(':id_usuario', $coordenadorcurso->getId_usuario());
        
        $stmt->bindValue(':id_curso', $coordenadorcurso->getId_curso());
        
        $stmt->bindValue(':id_coordenadorcurso', $coordenadorcurso->getId_coordenadorcurso());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteCoordenadorcurso($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from coordenadorcurso where id_coordenadorcurso = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteCoordenadorcurso($_GET['id']);
        header('location: ../Tela/listarCoordenadorcurso.php');
    }


/*chave*/}
