<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Usuario.php';
    include_once './Modelo/Email.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Usuario.php';
        include_once '../Modelo/Email.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Usuario.php';
            include_once '../../Modelo/Email.php';
        }
    }
}

class UsuarioPDO {
    /* inserir */

    function inserirUsuario() {
        $usuario = new usuario($_POST);
//        if($usuario->getFoto() = 'NULL'){
//            $usuario->setFoto('../Img/trabalhoDigital.png');
//        }
        if ($_POST['senha1'] == $_POST['senha2']) {
            $senhamd5 = md5($_POST['senha1']);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into usuario values(default , :nome , :email , :usuario, :categoria , :senha , :foto, default , 0);');

            $stmt->bindValue(':nome', $usuario->getNome());

            $stmt->bindValue(':email', $usuario->getEmail());

            $stmt->bindValue(':usuario', $usuario->getUsuario());

            $stmt->bindValue(':categoria', $usuario->getCategoria());

            $stmt->bindValue(':senha', $senhamd5);

            $stmt->bindValue(':foto', $usuario->getFoto());
            $nome_imagem = hash_file('md5', $_FILES['arquivo']['tmp_name']);
            $ext = explode('.', $_FILES['arquivo']['name']);
            $extensao = "." . $ext[(count($ext) - 1)];
            $extensao = strtolower($extensao);
            $nome_imagem = $nome_imagem.$extensao;
            file_put_contents('./logodotipodafoto', $extensao);
            move_uploaded_file($_FILES['arquivo']['tmp_name'], __DIR__ . '/../Img/Perfil/' . $nome_imagem);
            $stmt->bindValue(':foto', 'Img/Perfil/' . $nome_imagem);

            if ($stmt->execute()) {
                $email = new Email();
                $email->addDestinatario($usuario->getEmail());
                $email->setAssunto("Solicitacao de usuário");
                $email->setTituloModeP("Novo usuário!");
                $email->setMensagemModeP("O usuário ".$usuario->getNome(). " solicitou o acesso e está aguardando aprovação.");
                $email->enviar();
                $_SESSION['toast'][] = "Usuário inserido!";
                $_SESSION['toast'][] = "Agaurde a aprovação de algum administrador para poder Entrar";
                $_SESSION['toast'][] = "Enviaremos notificação via E-mail";
                header('location: ../Tela/login.php?msg=usuarioInserido');

            } else {
                $_SESSION['toast'][] = 'Erro ao cadastrar usuário';
                header('location: ../index.php?msg=usuarioErroInsert');
            }
        } else {
            $_SESSION['toast'][] = 'As senhas não coincidem';
            header('location: ../Tela/registroUsuario.php?msg=senhaerrada');
        }
    }

    /* inserir */

    function validasenha(){

        if($this->verificaSenha(md5($_POST['senha']))){
            echo "true";
        }else{
            echo "false";
        }
    }

    function updateFotoPerfil() {
        $id_usuario = $_GET['id_usuario'];
        $nome_imagem = hash_file('md5', $_FILES['arquivo']['tmp_name']);
        $ext = explode('.', $_FILES['arquivo']['name']);
        $extensao = "." . $ext[(count($ext) - 1)];
        $extensao = strtolower($extensao);
        file_put_contents('./logodotipodafoto', $extensao);
        $nome_imagem = $nome_imagem.$extensao;
        file_put_contents('./logodotipodafoto', $extensao);
        move_uploaded_file($_FILES['arquivo']['tmp_name'], __DIR__ . '/../Img/Perfil/' . $nome_imagem);
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update usuario set foto = :foto where id_usuario = :id_usuario');
        $stmt->bindValue(":id_usuario", $id_usuario);
        $stmt->bindValue(":foto", 'Img/Perfil/' . $nome_imagem);
        if($stmt->execute()) {
            $usuario = new usuario(unserialize($_SESSION['usuario']));
            unlink("../".$usuario->getFoto());
            $usuario->setFoto('Img/Perfil/' . $nome_imagem);
            $_SESSION['usuario'] = serialize($usuario);
            $_SESSION['toast'][] = 'Foto atualizada';
            header("Location: ../Tela/perfil.php");
        } else {
            $_SESSION['toast'][] = 'Erro ao atualizar a foto';
            header("Location: ../Tela/perfil.php");
        }
    }

    public function selectUsuario() {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectUsuarioId($id) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where id_usuario = :id ;');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectUsuarioNome($nome) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where nome like :nome;');
        $stmt->bindValue(':nome', "%" . $nome . "%");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectUsuarioEmail($email) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where email = :email;');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectUsuarioUsuario($usuario) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where usuario = :usuario;');
        $stmt->bindValue(':usuario', $usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectUsuarioSenha($senha) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where senha = :senha;');
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
    public function verificaSenha($senha) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where senha = :senha;');
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function selectUsuarioFoto($foto) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where foto = :foto;');
        $stmt->bindValue(':foto', $foto);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectUsuarioAdministrador($administrador) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where administrador = "true";');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
    public function selectNomeId($id) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select nome from usuario where id = :id;');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectUsuarioNaoAdministrador($administrador) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from usuario where administrador = "false";');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function updateUsuario(Usuario $usuario) {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update usuario set nome = :nome , email = :email , usuario = :usuario , senha = :senha , foto = :foto where id_usuario = :id_usuario;');
        $stmt->bindValue(':nome', $usuario->getNome());

        $stmt->bindValue(':email', $usuario->getEmail());

        $stmt->bindValue(':usuario', $usuario->getUsuario());

        $stmt->bindValue(':senha', $usuario->getSenha());

        $stmt->bindValue(':foto', $usuario->getFoto());

        $stmt->bindValue(':id_usuario', $usuario->getId_usuario());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function tornarUsuarioAdm() {
        $id = $_GET['id'];
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update usuario set administrador = "true" where id = :id;');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function tornarUsuarioNaoAdm() {
        $id = $_GET['id'];
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update usuario set administrador = "false" where id = :id;');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteUsuario($definir) {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from usuario where id_usuario = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletar() {
        $this->deleteUsuario($_GET['id']);
        header('location: ../Tela/listarUsuario.php');
    }

    /* login */

    public function login() {
        $con = new conexao();
        $pdo = $con->getConexao();
        $senha = md5($_POST['senha']);
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE usuario LIKE :usuario AND senha LIKE :senha and ativo = 1");
        $stmt->bindValue(":usuario", $_POST['usuario']);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $us = new usuario($linha);
            $_SESSION['usuario'] = serialize($us);
//            $_SESSION['logado'] = serialize($us);
            header("Location: ../index.php");
        } else {
            header("Location: ../Tela/login.php?msg=erro");
        }
    }


    function logout() {
        session_destroy();
        header('location: ../index.php');
    }

    /* login */


    /* editar */

    function editar() {
        $usuario = new Usuario($_POST);
        if ($this->updateUsuario($usuario) > 0) {
            header('location: ../index.php?msg=usuarioAlterado');
        } else {
            header('location: ../index.php?msg=usuarioErroAlterar');
        }
    }

    /* editar */
    /* chave */

    function selectUsuariosPendentes() {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare("select * from usuario where ativo = 0");
        $stmt->execute();
        return $stmt;
    }

    function ativar() {
        $id_usuario = $_GET['id_usuario'];
        $usuario = $this->selectUsuarioId($id_usuario);
        $usuario = new usuario($usuario->fetch());
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare("update usuario set ativo = 1 where id_usuario = :id_usuario");
        $stmt->bindValue(":id_usuario", $id_usuario);
        if($stmt->execute()) {
            $email = new Email();
            $email->setAssunto("Usuario Aceito");
            $email->setTituloModeP("Seu usuário foi aceito!");
            $email->setMensagemModeP("Seja bem vindo ao repositório digital do iffar!");
            $email->addDestinatario($usuario->getEmail());
            $email->enviar();
            $_SESSION['toast'][]='Usuário ativado';
            header("Location: ../Tela/cadastrosPendentes.php");
        } else {
            $_SESSION['toast'][]='Erro ao ativar usuário';
            header("Location: ../Tela/cadastrosPendentes.php");
        }
    }

function rejeitar(){
    $id_usuario = $_GET['id_usuario'];
    $usuario = $this->selectUsuarioId($id_usuario);
    $usuario = new usuario($usuario->fetch());
    $con = new conexao();
    $pdo = $con->getConexao();
    $stmt = $pdo->prepare("delete from usuario where id_usuario = :id_usuario");
    $stmt->bindValue(":id_usuario", $id_usuario);
    if($stmt->execute()) {
        $email = new Email();
        $email->setAssunto("Usuario Rejeitado");
        $email->setTituloModeP("Usuário Rejeitado");
        $email->setMensagemModeP("Seu usuário foi rejeitado, se acha que isto foi um erro por favor entre em contato.");
        $email->addDestinatario($usuario->getEmail());
        $email->enviar();
        $_SESSION['toast'][]='Usuário Deletado';
        header("Location: ../Tela/cadastrosPendentes.php");
    } else {
        $_SESSION['toast'][]='Erro ao deletar usuário';
        header("Location: ../Tela/cadastrosPendentes.php");
    }
}

    function addAdm() {
        $id_usuario = $_GET['id_usuario'];
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare("update usuario set administrador = true where id_usuario = :id_usuario");
        $stmt->bindValue(":id_usuario", $id_usuario);
        if($stmt->execute()) {
            $_SESSION['toast'][]='Administrador adicionado';
            header("Location: ../Tela/listagemUsuario.php");
        } else {
            $_SESSION['toast'][]='Erro ao adicionar administrador';
            header("Location: ../Tela/listagemUsuario.php");
        }
    }

    function removeAdm(){
        $id_usuario = $_GET['id_usuario'];
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare("update usuario set administrador = false where id_usuario = :id_usuario");
        $stmt->bindValue(":id_usuario", $id_usuario);
        if($stmt->execute()) {
            $_SESSION['toast'][]='Administrador removido';
            header("Location: ../Tela/listagemUsuario.php");
        } else {
            $_SESSION['toast'][]='Erro ao remover administrador';
            header("Location: ../Tela/listagemUsuario.php");
        }
    }
}
