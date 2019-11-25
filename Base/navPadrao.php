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
        ?>
                                                        <!--<span style="margin-left: -600px;"><?php // echo $logado->getEmail();            ?></span>-->
        <?php
    }
    ?>
    <nav class="nav-extended corpadrao">
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger">
                <i class="material-icons black-text">menu</i>
            </a>
            <a href="<?php echo $pontos; ?>index.php" class="brand-logo center">RDl IFFar</a>
            <?php
            include_once $pontos . "Modelo/Usuario.php";
            if (isset($_SESSION['usuario'])) {
                $logado = new usuario(unserialize($_SESSION['usuario']));
                ?>
                                                        <!--<span style="margin-left: -600px;"><?php // echo $logado->getEmail();            ?></span>-->
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li>Olá <?php echo $logado->getNome(); ?></li>
                </ul>
                <?php
            }
            ?>
            <ul id="nav" class="right hide-on-large-only">
            <li><a href="<?php echo $pontos; ?>Tela/pesquisa.php" style="color: white;"><i class="small material-icons">search</i></a></li>
            </ul>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo $pontos; ?>Tela/pesquisa.php" style="color: white;"><i class="small material-icons">search</i></a></li>
                <li><a href="<?php echo $pontos; ?>Tela/perfil.php" style="color: white;"><i class="small material-icons">person</i></a></li>
                <li><a href="<?php echo $pontos; ?>Controle/usuarioControle.php?function=logout">Sair</a></li>
            </ul>
        </div>
    </nav>
</div>

<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
            <div class="background">
                <img src="<?php echo $pontos; ?>Img/banner.png">
            </div>
            <a href="#user"><div class="fotoPerfil left-align" style="background-image: url('<?php echo $pontos . $logado->getFoto(); ?>');background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        max-height: 20vh; max-width: 20vh;">
                </div>
            </a>
            <a href="#name"><span class="black-text name"><?php echo $logado->getNome(); ?></span></a>
            <a href="#email"><span class="white-text email"><?php echo $logado->getEmail(); ?></span></a>
        </div></li>
    <ul class="collapsible">
        <a href="<?php echo $pontos; ?>./index.php" class="black-text initLoader">
            <li>
                <div class="headerMeu" style="margin-left: 16px">
                    Início
                </div>
            </li>
        </a>
        <li class="active">
            <div class="collapsible-header anime" x="1">Meu Perfil<i class="large material-icons right animi">arrow_drop_down</i></div>
            <div class="collapsible-body">
                <ul class="grey lighten-2">
                    <li><a href="<?php echo $pontos ?>Tela/perfil.php" id="linkquarto" class="black-text modal-trigger initLoader">Ver Meu Perfil</a></li>
                </ul>
            </div>
        </li>

        <a class="btSair black-text modal-trigger" href="<?php echo $pontos; ?>Controle/usuarioControle.php?function=logout">
            <li>
                <div class="headerMeu black-text" style="margin-left: 16px">
                    Sair
                </div>
            </li>
        </a>
    </ul>
</ul>

<script>
    $('.dropdown-trigger').dropdown({
        hover: false, 
        coverTrigger: false
    });
    $(document).ready(function () {
        $('select').formSelect();
    });
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
