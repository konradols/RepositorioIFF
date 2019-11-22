<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Aluno.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Aluno.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Aluno.php';
        }
    }
}


class AlunoPDO{
    
             /*inserir*/
    function inserirAluno() {
        $aluno = new aluno($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into aluno values(default , :id_turma , :matricula);' );

            $stmt->bindValue(':id_turma', $aluno->getId_turma());    
        
            $stmt->bindValue(':matricula', $aluno->getMatricula());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=alunoInserido');
            }else{
                header('location: ../index.php?msg=alunoErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectAluno(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectAlunoId_usuario($id_usuario){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectAlunoId_turma($id_turma){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno where id_turma = :id_turma;');
        $stmt->bindValue(':id_turma', $id_turma);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectAlunoMatricula($matricula){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno where matricula = :matricula;');
        $stmt->bindValue(':matricula', $matricula);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateAluno(Aluno $aluno){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update aluno set id_turma = :id_turma , matricula = :matricula where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_turma', $aluno->getId_turma());
        
        $stmt->bindValue(':matricula', $aluno->getMatricula());
        
        $stmt->bindValue(':id_usuario', $aluno->getId_usuario());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteAluno($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from aluno where id_usuario = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteAluno($_GET['id']);
        header('location: ../Tela/listarAluno.php');
    }



            /*editar*/
            function editar() {
                $aluno = new Aluno($_POST);
                    if($this->updateAluno($aluno) > 0){
                        header('location: ../index.php?msg=alunoAlterado');
                    } else {
                        header('location: ../index.php?msg=alunoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                