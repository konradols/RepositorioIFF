<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Turma.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Turma.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Turma.php';
        }
    }
}


class TurmaPDO{
    
             /*inserir*/
    function inserirTurma() {
        $turma = new turma($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into turma values(default , :id_curso , :nome , :ano_inicio , :ano_fim);' );

            $stmt->bindValue(':id_curso', $turma->getId_curso());    
            
            $stmt->bindValue(':nome', $turma->getNome());    
        
            $stmt->bindValue(':ano_inicio', $turma->getAno_inicio());    
        
            $stmt->bindValue(':ano_fim', $turma->getAno_fim());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=turmaInserido');
            }else{
                header('location: ../index.php?msg=turmaErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectTurma(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from turma ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTurmaId_turma($id_turma){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from turma where id_turma = :id_turma;');
        $stmt->bindValue(':id_turma', $id_turma);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTurmaId_curso($id_curso){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from turma where id_curso = :id_curso;');
        $stmt->bindValue(':id_curso', $id_curso);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTurmaAno_inicio($ano_inicio){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from turma where ano_inicio = :ano_inicio;');
        $stmt->bindValue(':ano_inicio', $ano_inicio);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTurmaAno_fim($ano_fim){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from turma where ano_fim = :ano_fim;');
        $stmt->bindValue(':ano_fim', $ano_fim);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
    public function selectTurmaNome($nome){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from turma where nome = :nome;');
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateTurma(Turma $turma){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update turma set id_curso = :id_curso , ano_inicio = :ano_inicio , ano_fim = :ano_fim where id_turma = :id_turma;');
        $stmt->bindValue(':id_curso', $turma->getId_curso());
        
        $stmt->bindValue(':ano_inicio', $turma->getAno_inicio());
        
        $stmt->bindValue(':ano_fim', $turma->getAno_fim());
        
        $stmt->bindValue(':id_turma', $turma->getId_turma());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteTurma($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from turma where id_turma = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteTurma($_GET['id']);
        header('location: ../Tela/listarTurma.php');
    }



            /*editar*/
            function editar() {
                $turma = new Turma($_POST);
                    if($this->updateTurma($turma) > 0){
                        header('location: ../index.php?msg=turmaAlterado');
                    } else {
                        header('location: ../index.php?msg=turmaErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                