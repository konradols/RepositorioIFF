<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Curso.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Curso.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Curso.php';
        }
    }
}


class CursoPDO{
    
             /*inserir*/
    function inserirCurso() {
        $curso = new curso($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into curso values(default , :nome, :matricula_coordenador);' );

            $stmt->bindValue(':nome', $curso->getNome());    
            $stmt->bindValue(':matricula_coordenador', $curso->getMatricula_coordenador());    
        
            if($stmt->execute()){
                $_SESSION['toast'][] = 'Curso inserido';
                header('location: ../index.php?msg=cursoInserido');
            }else{
                $_SESSION['toast'][] = 'Erro ao cadastrar o curso';
                header('location: ../index.php?msg=cursoErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectCurso(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from curso ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCursoId_curso($id_curso){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from curso where id_curso = :id_curso;');
        $stmt->bindValue(':id_curso', $id_curso);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCursoNome($nome){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from curso where nome = :nome;');
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateCurso(Curso $curso){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update curso set nome = :nome where id_curso = :id_curso;');
        $stmt->bindValue(':nome', $curso->getNome());
        
        $stmt->bindValue(':id_curso', $curso->getId_curso());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteCurso($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from curso where id_curso = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteCurso($_GET['id']);
        header('location: ../Tela/listarCurso.php');
    }



            /*editar*/
            function editar() {
                $curso = new Curso($_POST);
                    if($this->updateCurso($curso) > 0){
                        header('location: ../index.php?msg=cursoAlterado');
                    } else {
                        header('location: ../index.php?msg=cursoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                