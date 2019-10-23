<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Coordenador.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Coordenador.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Coordenador.php';
        }
    }
}


class CoordenadorPDO{
    
             /*inserir*/
    function inserirCoordenador() {
        $coordenador = new coordenador($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Coordenador values(default , :matricula , :telefone);' );

            $stmt->bindValue(':matricula', $coordenador->getMatricula());    
        
            $stmt->bindValue(':telefone', $coordenador->getTelefone());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=coordenadorInserido');
            }else{
                header('location: ../index.php?msg=coordenadorErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectCoordenador(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenador ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCoordenadorId_usuario($id_usuario){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenador where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCoordenadorMatricula($matricula){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenador where matricula = :matricula;');
        $stmt->bindValue(':matricula', $matricula);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCoordenadorTelefone($telefone){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from coordenador where telefone = :telefone;');
        $stmt->bindValue(':telefone', $telefone);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateCoordenador(Coordenador $coordenador){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update coordenador set matricula = :matricula , telefone = :telefone where id_usuario = :id_usuario;');
        $stmt->bindValue(':matricula', $coordenador->getMatricula());
        
        $stmt->bindValue(':telefone', $coordenador->getTelefone());
        
        $stmt->bindValue(':id_usuario', $coordenador->getId_usuario());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteCoordenador($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from coordenador where id_usuario = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteCoordenador($_GET['id']);
        header('location: ../Tela/listarCoordenador.php');
    }



            /*editar*/
            function editar() {
                $coordenador = new Coordenador($_POST);
                    if($this->updateCoordenador($coordenador) > 0){
                        header('location: ../index.php?msg=coordenadorAlterado');
                    } else {
                        header('location: ../index.php?msg=coordenadorErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                