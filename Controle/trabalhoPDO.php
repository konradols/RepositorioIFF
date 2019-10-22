<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Trabalho.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Trabalho.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Trabalho.php';
        }
    }
}


class TrabalhoPDO{
    
             /*inserir*/
    function inserirTrabalho() {
        $trabalho = new trabalho($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Trabalho values(default , :id_usuario, :nome , :resumo , :categotia , :data_submissao , :caminho , :id_curso , :numero_acessos , :numero_downloads);' );

            $stmt->bindValue(':id_usuario', $trabalho->getId_usuario());    
        
            $stmt->bindValue(':nome', $trabalho->getNome());    
        
            $stmt->bindValue(':resumo', $trabalho->getResumo());    
        
            $stmt->bindValue(':categotia', $trabalho->getCategotia());    
        
            $stmt->bindValue(':data_submissao', $trabalho->getData_submissao());    
        
            $stmt->bindValue(':caminho', $trabalho->getCaminho());    
        
            $stmt->bindValue(':id_curso', $trabalho->getId_curso());    
        
            $stmt->bindValue(':numero_acessos', $trabalho->getNumero_acessos());    
        
            $stmt->bindValue(':numero_downloads', $trabalho->getNumero_downloads());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=trabalhoInserido');
            }else{
                header('location: ../index.php?msg=trabalhoErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectTrabalho(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoId_trabalho($id_trabalho){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where id_trabalho = :id_trabalho;');
        $stmt->bindValue(':id_trabalho', $id_trabalho);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoId_usuario($id_usuario){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoNome($nome){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where nome = :nome;');
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoResumo($resumo){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where resumo = :resumo;');
        $stmt->bindValue(':resumo', $resumo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoCategotia($categotia){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where categotia = :categotia;');
        $stmt->bindValue(':categotia', $categotia);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoData_submissao($data_submissao){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where data_submissao = :data_submissao;');
        $stmt->bindValue(':data_submissao', $data_submissao);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoCaminho($caminho){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where caminho = :caminho;');
        $stmt->bindValue(':caminho', $caminho);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoId_curso($id_curso){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where id_curso = :id_curso;');
        $stmt->bindValue(':id_curso', $id_curso);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoNumero_acessos($numero_acessos){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where numero_acessos = :numero_acessos;');
        $stmt->bindValue(':numero_acessos', $numero_acessos);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTrabalhoNumero_downloads($numero_downloads){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where numero_downloads = :numero_downloads;');
        $stmt->bindValue(':numero_downloads', $numero_downloads);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateTrabalho(Trabalho $trabalho){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update trabalho set id_usuario = :id_usuario , nome = :nome , resumo = :resumo , categotia = :categotia , data_submissao = :data_submissao , caminho = :caminho , id_curso = :id_curso , numero_acessos = :numero_acessos , numero_downloads = :numero_downloads where id_trabalho = :id_trabalho;');
        $stmt->bindValue(':id_usuario', $trabalho->getId_usuario());
        
        $stmt->bindValue(':nome', $trabalho->getNome());
        
        $stmt->bindValue(':resumo', $trabalho->getResumo());
        
        $stmt->bindValue(':categotia', $trabalho->getCategotia());
        
        $stmt->bindValue(':data_submissao', $trabalho->getData_submissao());
        
        $stmt->bindValue(':caminho', $trabalho->getCaminho());
        
        $stmt->bindValue(':id_curso', $trabalho->getId_curso());
        
        $stmt->bindValue(':numero_acessos', $trabalho->getNumero_acessos());
        
        $stmt->bindValue(':numero_downloads', $trabalho->getNumero_downloads());
        
        $stmt->bindValue(':id_trabalho', $trabalho->getId_trabalho());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteTrabalho($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from trabalho where id_trabalho = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteTrabalho($_GET['id']);
        header('location: ../Tela/listarTrabalho.php');
    }



            /*editar*/
            function editar() {
                $trabalho = new Trabalho($_POST);
                    if($this->updateTrabalho($trabalho) > 0){
                        header('location: ../index.php?msg=trabalhoAlterado');
                    } else {
                        header('location: ../index.php?msg=trabalhoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                