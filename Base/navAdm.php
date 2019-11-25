<?php

if (!isset($_SESSION)) {
    session_start();
}

$pontos = "";
if (realpath("./index.php")) {
    $pontos = './';
} else {
    if (realpath("../index.php")) {
        $pontos = '../';
    }
}

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
?>

<div class="navbar-fixed">
    <?php
    include_once $pontos . "Modelo/Usuario.php";
    if (isset($_SESSION['usuario'])) {
        $logado = new usuario(unserialize($_SESSION['usuario']));
    }
    ?>
    <nav class="nav-extended corpadrao">
        <div class="nav-wrapper">
            <a href="<?php echo $pontos; ?>index.php" class="brand-logo center">Repositório Digital IFFar SVS</a>
            <?php
            include_once $pontos . "Modelo/Usuario.php";
            if (isset($_SESSION['usuario'])) {
                $logado = new usuario(unserialize($_SESSION['usuario']));
                ?>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li>Olá <?php echo $logado->getNome(); ?></li>
                    <li><a class='dropdown-trigger' data-target='dropdown1'>Administração</a></li>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href = "<?php echo $pontos; ?>Tela/listagemUsuario.php">Usuários</a></li>
                        <li><a href = "<?php echo $pontos; ?>Tela/listagemTrabalho.php">Trabalhos</a></li>
                        <li><a href = "<?php echo $pontos; ?>Tela/listagemCurso.php">Cursos</a></li>
                        <li><a href = "<?php echo $pontos; ?>Tela/listagemTurma.php">Turmas</a></li>
                        <li><a href = "<?php echo $pontos; ?>Tela/cadastrosPendentes.php">Cadastros Pendentes</a></li>
                        <li><a href = "<?php echo $pontos; ?>Tela/trabalhosPendentes.php">Trabalhos Pendentes</a></li>
                    </ul>
                </ul>
                <?php
            }
            ?>

            <ul id="nav-mobile" class="right hide-on-med-and-down">


                <li><a href="<?php echo $pontos; ?>Tela/pesquisa.php" style="color: white;"><i class="small material-icons">search</i></a></li>
                <li><a href="<?php echo $pontos; ?>Tela/perfil.php" style="color: white;"><i class="small material-icons">person</i></a></li>


                <li><a href="<?php echo $pontos; ?>Controle/usuarioControle.php?function=logout">Sair</a></li>
            </ul>
        </div>
    </nav>
</div>

<script>
    $('.dropdown-trigger').dropdown({
        hover: false,
        coverTrigger: false,
        constrainWidth: false
    });
</script>

<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
