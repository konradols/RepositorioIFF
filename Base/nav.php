<?php
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
    <nav class="nav-extended corpadrao">
        <div class="nav-wrapper">
            <a href="<?php echo $pontos; ?>index.php" class="brand-logo center">Repositório Digital IFFar SVS</a>
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


                <?php
                if (isset($_SESSION['usuario'])) {
                    ?>
                    <li><a class='dropdown-trigger' data-target='dropdown1'>
                            <i class="small material-icons">language</i></a></li>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href = "#">Notificações</a></li>
                        <li><a href = "#">Meus Dados</a></li>
                    </ul>
                    <?php
                }
                ?>


                <li><a href="<?php echo $pontos; ?>Controle/usuarioCOntrole.php?function=logout">Sair</a></li>
            </ul>
        </div>
    </nav>
</div>

<script>

    $('.dropdown-trigger').dropdown({
        hover: false
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
