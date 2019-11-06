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
            include_once '../Controle/usuarioPDO.php';
            $usuarioListar = new usuarioPDO();
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
                    <!--<span><?php // echo var_dump($_SESSION['logado']);    ?></span>-->
                    <div class="card center z-depth-4" style="margin-left: 200px; margin-right: 200px; margin-top: 50px;">
                        <div class="card-content">
                            <span class="card-title">Insira sua senha para concluir a ação</span>
                            <form name="verificaSenha" method="post" action="../Controle/usuarioControle.php?function=verificaSenha">
                                <div class="row">
                                    <div class="input-field">
                                        <input type="password" name="senha" id="senha">
                                        <label for="senha">Senha</label>
                                    </div>
                                    <div class="row center">
                                        <a href="./Tela/telaUpload.php" class="grey btn">Voltar</a>
                                        <input type="submit" class="btn corpadrao" value="voltar">
                                        <div class='row'>
                                            <?php
                                            $sql = $usuarioListar->verificaSenha($_POST['senha']);
                                            if ($sql = true) {
//                                                header("Location: ../Controle/usuarioControle.php?function=verificaSenha(" . md5($_POST['senha']) . ")");
                                                ?>
                                            <span><?php echo var_dump($_POST); ?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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