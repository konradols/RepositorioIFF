<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include_once '../Base/header.php';
        include_once '../Base/nav.php';
        ?>
    </head>
    <body>

        <div class="container">
            <?php
            include_once '../Modelo/Usuario.php';
            $logado = new usuario(unserialize($_SESSION['usuario']));
            ?>
            <!--            <div class="row">
                            <div class="col l12">
                                <div class="card center z-depth-4">
                                    <div class="card-content">
                                        <span class="card-title">Envio de Arquivos</span>
                                        <br>
                                        <form action="../Controle/upload.php" method="POST" enctype="multipart/form-data">
                                            Arquivo: <input type="file" required name="arquivo">
                                            <input type="submit" value="Enviar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>-->

            <div class="row">
                <div class="col l12">
                    <!--<span><?php // echo var_dump($_SESSION['logado']);  ?></span>-->
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('select').formSelect();
            });
        </script>

        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>