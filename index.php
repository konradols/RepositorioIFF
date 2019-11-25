<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once './Base/header.php';
include_once './Base/nav.php';
?>
<html>
<body style="background-image: url('./Img/back.jpg'); background-position: center;  background-size: cover; background-repeat: no-repeat ;">
<main>
<?php
include_once './Modelo/Usuario.php';
if (isset($_SESSION['usuario'])) {
    $logado = new usuario(unserialize($_SESSION['usuario']));
}
?>
    <br><br><br><br><br><br><br>
<div class="">

    <div class="row center" style="background-image: linear-gradient(to right , transparent, white ,white ,white ,white ,white , transparent);">
        <br>
        <div class="col s12 m12 l8 offset-l2">
            <div class="row">
                <div class="col s6 l3">
                    <div class="">
                        <a href="./Tela/tcc.php" style="color: green;"><i class="large material-icons">library_books</i></a>
                        <p><strong>&nbsp;TCCs</strong></p>
                    </div>
                </div>
                <div class="col s6 l3">
                    <div class="">
                        <a href="./Tela/relatorio.php" style="color: green;"><i
                                    class="large material-icons">description</i></a>
                        <p><strong>&nbsp;Relatórios</strong></p>
                    </div>
                </div>
                <div class="col s6 l3">
                    <div class="">
                        <a href="./Tela/producaoCientifica.php" style="color: green;"><i
                                    class="large material-icons">group</i></a>
                        <p><strong>Produção Científica</strong></p>
                    </div>
                </div>
                <div class="col s6 l3">
                    <div class="">
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            ?>
                            <a href="./Tela/telaUpload.php" style="color: green;"><i
                                        class="large material-icons">send</i></a>
                            <?php
                        } else {
                            ?>
                            <!--<i class="large material-icons disabled">send</i>-->
                            <a style="color: grey;" class="tooltipped" data-position="bottom" data-tooltip="Você precisa estar logado para acessar esta opção!"><i class="large material-icons">send</i></a>
                            <?php
                        }
                        ?>
                        <p><strong>Submissão de Trabalhos</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $('.tooltipped').tooltip();
    </script>
</main>
<?php
include_once './Base/footer.php';
?>
</body>
</html>
