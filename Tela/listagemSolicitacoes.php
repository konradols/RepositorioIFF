<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../Base/header.php';
include_once '../Base/nav.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            table{border: none;}
            table tr td{border: none;}
        </style>
    </head>
    <body>
        <div class="row">
            <?php
            include_once '../Modelo/Usuario.php';
            if (isset($_SESSION['usuario'])) {
                $logado = new usuario(unserialize($_SESSION['usuario']));
            }
            ?>


            <br><br><br>

            <div class="row">
                <!--                <div class="col s4 m4 l10 offset-l2">
                                    <div class="col l3 card">
                                        <a href="./Tela/solicitacoesCadastro.php" style="color: green;"><i class="large material-icons">person</i></a>
                                    </div>-->
            </div>

            <div class="row">
                <div class="col s12 m5 l6 offset-l3">
                    <div class="card-panel green lighten-3">
                        <div class="col s8 m3 l10"><br>
                            <span class="black-text">Listagem de Solicitações de Cadastros de Usuários</span>
                        </div>
                        <div>
                            <a href="./Tela/solicitacoesCadastro.php" style="color: green;"><i class="medium material-icons">person</i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12 m5 l6 offset-l3">
                    <div class="card-panel green lighten-3">
                        <div class="col s8 m3 l10"><br>
                            <span class="black-text">Listagem de Solicitações de Submissão de Trabalhos</span>
                        </div>
                        <div>
                            <a href="./Tela/solicitacoesCadastro.php" style="color: green;"><i class="medium material-icons">library_books</i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>
