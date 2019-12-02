<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Controle/usuarioPDO.php';
    include_once './Modelo/Trabalho.php';
    include_once './Modelo/Usuario.php';
    include_once './Modelo/Email.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Controle/usuarioPDO.php';
        include_once '../Modelo/Trabalho.php';
        include_once '../Modelo/Usuario.php';
        include_once '../Modelo/Email.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Controle/usuarioPDO.php';
            include_once '../../Modelo/Trabalho.php';
            include_once '../../Modelo/Usuario.php';
            include_once '../../Modelo/Email.php';
        }
    }
}

class TrabalhoPDO
{
    /* inserir */

    function inserirTrabalho()
    {

        if (isset($_FILES['arquivo'])) {
            $ext = explode('.', $_FILES['arquivo']['name']);
            $extensao = "." . $ext[(count($ext) - 1)];
            $extensao = strtolower($extensao);
            $novo_nome = hash_file('md5', $_FILES['arquivo']['tmp_name']) . $extensao;
            $diretorio = "./upload/";

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

            $trabalho = new trabalho($_POST);
            $trabalho->setCaminho($diretorio . $novo_nome);
            $usuario = new usuario(unserialize($_SESSION['usuario']));
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into trabalho values(default , :id_usuario, :nome , :resumo , :categoria , :autores, :orientadores, :coorientadores, :palavras_chave, curdate() , :caminho , :id_curso , default , default , 0);');

            $stmt->bindValue(':id_usuario', $usuario->getIdUsuario());

            $stmt->bindValue(':nome', $trabalho->getNome());

            $stmt->bindValue(':resumo', $trabalho->getResumo());

            $stmt->bindValue(':categoria', $trabalho->getCategoria());

            $stmt->bindValue(':autores', $trabalho->getAutores());

            $stmt->bindValue(':orientadores', $trabalho->getOrientadores());

            $stmt->bindValue(':coorientadores', $trabalho->getCoorientadores());

            $stmt->bindValue(':palavras_chave', $trabalho->getPalavras_chave());

            $stmt->bindValue(':caminho', $trabalho->getCaminho());

            $stmt->bindValue(':id_curso', $trabalho->getId_turma());

            $logado = new usuario(unserialize($_SESSION['usuario']));

            if (md5($_POST['senha']) == $logado->getSenha()) {
                if ($stmt->execute()) {
                    $email = new Email();
                    $stmt = $pdo->prepare("select * from usuario where administrador = 1");
                    $stmt->execute();
                    while ($linha = $stmt->fetch()) {
                        $usuario = new usuario($linha);
                        $email->addDestinatario($usuario->getEmail());
                        $email->setAssunto("Nova submissao");
                        $email->setTituloModeP("Nova submissao");
                        $email->setMensagemModeP("Nova submição no repositório, por favor avalie par que seja feita a publicação.");
                        $email->enviar();
                    }
                    $_SESSION['toast'][] = 'Trabalho inserido com sucesso!';
                    header('location: ../Tela/telaUpload.php?msg=trabalhoInserido');
                } else {
                    $_SESSION['toast'][] = 'Erro ao adicionar trabalho';
                    header('location: ../Tela/telaUpload.php?msg=trabalhoErroInsert');
                }
            } else {
                $_SESSION['toast'][] = 'Sua senha está incorreta';
                header('location: ../Tela/telaUpload.php?msg=senhaIncorreta');
            }
        }
    }

    /* inserir */

    public function selectTrabalho()
    {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho ORDER BY id_trabalho desc;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }


    public function selectTrabalhoPendente()
    {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where publicado = 0 ORDER BY id_trabalho desc;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    function pesquisaTrabalhos($post)
    {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare("select * from trabalho where categoria like :categoria and publicado = 1 " . ($post['campo'] != '' ? "and " . $post['campo'] . " like :valor" : ""));
        $stmt->bindValue(":categoria", $post['categoria']);
        if ($post['campo'] != "") {
            $stmt->bindValue(":valor", "%" . $post['valor'] . "%");
        }
        $stmt->execute();
        return $stmt;
    }


    public function selectTrabalhoId_trabalho($id_trabalho)
    {

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

    public function selectTrabalhoId_usuario($id_usuario)
    {

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

    public function selectTrabalhoNome($nome)
    {

        $con = new conexao();
        $pdo = $con->getConexao();
        $nome = "%" . $nome . "%";
        $stmt = $pdo->prepare('select * from trabalho where nome like :nome;');
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectTrabalhoNomePorId_Usuario($id_usuario)
    {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select nome from trabalho where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectTrabalhoResumo($resumo)
    {

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

    public function selectTrabalhoCategoria($categoria)
    {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where categoria = :categoria and publicado = 1;');
        $stmt->bindValue(':categoria', $categoria);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectTrabalhoData_submissao($data_submissao)
    {

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

    public function selectTrabalhoCaminho($caminho)
    {

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

    public function selectTrabalhoIdTurma($id_curso)
    {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where id_turma = :id_curso;');
        $stmt->bindValue(':id_curso', $id_curso);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectTrabalhoNumero_acessos($numero_acessos)
    {

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

    public function selectTrabalhoNumero_downloads($numero_downloads)
    {

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

//    public function selectUltimoTrabalho($id_usuario) {
//
//    }

    public function updateTrabalho(Trabalho $trabalho)
    {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update trabalho set id_usuario = :id_usuario , nome = :nome , resumo = :resumo , categoria = :categoria , data_submissao = :data_submissao , caminho = :caminho , id_curso = :id_curso , numero_acessos = :numero_acessos , numero_downloads = :numero_downloads where id_trabalho = :id_trabalho;');
        $stmt->bindValue(':id_usuario', $trabalho->getId_usuario());

        $stmt->bindValue(':nome', $trabalho->getNome());

        $stmt->bindValue(':resumo', $trabalho->getResumo());

        $stmt->bindValue(':categoria', $trabalho->getCategoria());

        $stmt->bindValue(':data_submissao', $trabalho->getData_submissao());

        $stmt->bindValue(':caminho', $trabalho->getCaminho());

        $stmt->bindValue(':id_curso', $trabalho->getId_turma());

        $stmt->bindValue(':numero_acessos', $trabalho->getNumero_acessos());

        $stmt->bindValue(':numero_downloads', $trabalho->getNumero_downloads());

        $stmt->bindValue(':id_trabalho', $trabalho->getId_trabalho());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteTrabalho($definir)
    {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from trabalho where id_trabalho = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function excluir()
    {
        $this->deleteTrabalho($_GET['id_trabalho']);
        header('location: ../Tela/perfil.php');
    }

    /* editar */

    function editar()
    {
        $trabalho = new Trabalho($_POST);
        if ($this->updateTrabalho($trabalho) > 0) {
            header('location: ../index.php?msg=trabalhoAlterado');
        } else {
            header('location: ../index.php?msg=trabalhoErroAlterar');
        }
    }

    /* editar */
    /* chave */

    function aceitar()
    {
        $id_trabalho = $_GET['id_trabalho'];
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update trabalho set publicado = 1 where id_trabalho = :id_trabalho');
        $stmt->bindValue(':id_trabalho', $id_trabalho);
        if ($stmt->execute()) {
            $_SESSION['toast'][] = 'Trabalho aceito';
            $stmt = $pdo->prepare("select * from usuario where id_usuario in (select id_usuario from trabalho where id_trabalho = :id_trabalho)");
            $stmt->bindValue(':id_trabalho', $id_trabalho);
            $stmt->execute();
            $usuario = new usuario($stmt->fetch());
            $email = new Email();
            $email->addDestinatario($usuario->getEmail());
            $email->setAssunto("Trabalho aceito");
            $email->setTituloModeP("Trabalho aceito");
            $email->setMensagemModeP("Nova submição no repositório, por favor avalie par que seja feita a publicação.");
            $email->enviar();
            header("Location: ../Tela/trabalhosPendentes.php");
        } else {
            $_SESSION['toast'][] = 'Erro ao aceitar trabalho';
            header("Location: ../Tela/trabalhosPendentes.php");
        }
    }

    function rejeitar()
    {
        $id_trabalho = $_GET['id_trabalho'];
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from trabalho where id_trabalho = :id_trabalho');
        $stmt->bindValue(':id_trabalho', $id_trabalho);
        $trabalho = new trabalho($stmt->fetch());
        unlink($trabalho->getCaminho());
        $stmt = $pdo->prepare("select * from usuario where id_usuario in (select id_usuario from trabalho where id_trabalho = :id_trabalho)");
        $stmt->bindValue(':id_trabalho', $id_trabalho);
        $stmt->execute();
        $usuario = new usuario($stmt->fetch());
        $stmt = $pdo->prepare('delete from trabalho where id_trabalho = :id_trabalho');
        $stmt->bindValue(':id_trabalho', $id_trabalho);
        if ($stmt->execute()) {
            $_SESSION['toast'][] = 'Trabalho Rejeitado';
            $email = new Email();
            $email->addDestinatario($usuario->getEmail());
            $email->setAssunto("Trabalho Rejeitado");
            $email->setTituloModeP("Trabalho Rejeitado");
            $email->setMensagemModeP("Seu trabalho foi rejeitado, faça uma nova submição ou entre em contato para entender o porque.");
            $email->enviar();
            header("Location: ../Tela/trabalhosPendentes.php");
        } else {
            $_SESSION['toast'][] = 'Erro ao rejeitar trabalho';
            header("Location: ../Tela/trabalhosPendentes.php");
        }
    }
}
