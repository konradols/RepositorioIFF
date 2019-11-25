<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Usuario.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Usuario.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Usuario.php';
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
            file_put_contents('./logodotipodafoto', $extensao);
            switch ($extensao) {
                case '.jfif':
                case '.jpeg':
                case '.jpg':
                    imagewebp(imagecreatefromjpeg($_FILES['arquivo']['tmp_name']), __DIR__ . '/../Img/Perfil/' . $nome_imagem . '.webp', 45);
                    break;
                case '.svg':
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], __DIR__ . '/../Img/Perfil/' . $nome_imagem . '.svg');
                    break;
                case '.png':
                    $img = imagecreatefrompng($_FILES['arquivo']['tmp_name']);
                    imagepalettetotruecolor($img);
                    imagewebp($img, __DIR__ . '/../Img/Perfil/' . $nome_imagem . '.webp', 45);
                    break;
                case '.webp':
                    imagewebp(imagecreatefromwebp($_FILES['arquivo']['tmp_name']), __DIR__ . '/../Img/Perfil/' . $nome_imagem . '.webp', 45);
                    break;
                case '.bmp':
                    imagewebp(imagecreatefromwbmp($_FILES['arquivo']['tmp_name']), __DIR__ . '/../Img/Perfil/' . $nome_imagem . '.webp', 45);
                    imagewebp(imagecreatefromwbmp($_FILES['arquivo']['tmp_name']), __DIR__ . '/../Img/Perfil/' . $nome_imagem . '.webp', 45);
                    break;
            }
            $stmt->bindValue(':foto', 'Img/Perfil/' . $nome_imagem . ($extensao == '.svg' ? ".svg" : ".webp"));

            if ($stmt->execute()) {
                $_SESSION['toast'][] = "Usuário inserido!";
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
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare("update usuario set ativo = 1 where id_usuario = :id_usuario");
        $stmt->bindValue(":id_usuario", $id_usuario);
        if($stmt->execute()) {
            $_SESSION['toast'][]='Usuário ativado';
            header("Location: ../Tela/cadastrosPendentes.php");
        } else {
            $_SESSION['toast'][]='Erro ao ativar usuário';
            header("Location: ../Tela/cadastrosPendentes.php");
        }
    }
}
