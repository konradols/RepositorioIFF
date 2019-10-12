<?php
$pontos = "";
if (realpath("./index.php")) {
    $pontos = './';
} else {
    if (realpath("../index.php")) {
        $pontos = '../';
    }
}
?>

<div class="navbar-fixed">
    <nav class="nav-extended corpadrao">
        <div class="nav-wrapper">
            <a href="<?php echo $pontos; ?>index.php" class="brand-logo center">Repositório Digital IFFar SVS</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <!-- Dropdown Trigger -->
                <li><a href="<?php echo $pontos;?>Tela/pesquisa.php" style="color: white;"><i class="small material-icons">search</i></a></li>
                <li><a href="<?php echo $pontos;?>Tela/perfil.php" style="color: white;"><i class="small material-icons">person</i></a></li>
                <li><a href="#">Sair</a></li>
            </ul>
        </div>
    </nav>
</div>

<script>

    $('.dropdown-trigger').dropdown({
        hover: false
    });

</script>
