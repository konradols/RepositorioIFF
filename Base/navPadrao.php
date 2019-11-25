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
            <a href="<?php echo $pontos; ?>index.php" class="brand-logo center">Repositório Digital IFFar SVS</a>
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

            <ul id="nav-mobile" class="right hide-on-med-and-down">


                <!--Terminar esse-->

                <!--                <li><a class="dropdown-trigger" data-target='dropdown-menu' href="#"></a>
                                    Contatos <i class="material-icons right">arrow-drop-down</i>
                                </li>-->

                <!-- Dropdown Trigger -->

                <!--                <li><a href="#" id="btn-dropdown-perfil" data-activates='dropdown-perfil'>
                                        <span>Irineu</span>
                                    </a>
                                    <ul id='dropdown-perfil' class='dropdown-content'>
                                        <li><a href="#!">Perfil</a></li>
                                        <li><a href="#!">Configurações</a></li>
                                        <li><a href="#!">Logout</a></li>
                                    </ul>
                                </li>-->
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
        coverTrigger: false
    });
</script>

<script>
//    $(document).ready(function () {
//        $('#btn-dropdown-perfil'.dropdown();
//    });

//    const elemsDropdown = document.querySelectorAll(".dropdown-trigger");
//    const instancesDropdown = M.Dropdown.init(elemsDropdown, {coverTrigger })

</script>

<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
