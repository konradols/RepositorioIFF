<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once './Base/header.php';
include_once './Base/nav.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Protótipo Home Page</title>
        <style type="text/css">
            table{border: none;}
            table tr td{border: none;}
        </style>
    </head>
    <body>
        <div class="row">
            <?php
            if (isset($_SESSION['usuario'])) {
                ?>
                <span><?php echo var_dump($_SESSION['usuario']) ?></span>
                <?php
            }
            ?>

            <div class="col s3 m3 l2 pull-l1" style="margin-left: 470px;">
                <div class="row" style="margin-top: 100px; margin-left: auto; margin-right: 290px;">
                    <table class="">
                        <tr>
                            <td>
                                <div class="col s3 m3 l2 offset-l5">
                                    <a href="./Tela/tcc.php" style="color: green;"><i class="large material-icons">library_books</i></a>
                                    <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TCCs</strong></p>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <div class="col s3 m3 l2 offset-l5">
                                    <a href="#" style="color: green;"><i class="large material-icons">description</i></a>
                                    <p><strong>&nbsp;&nbsp;&nbsp;Relatórios</strong></p>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<!--                            <td>
                                <div class="col s3 m3 l2 offset-l5">
                                    <a href="./Tela/pesquisa.php" style="color: green;"><i class="large material-icons">search</i></a>
                                    <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Pesquisa</strong></p>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
<!--                            <td>
                                <div class="col s3 m3 l2 offset-l5">
                                    <a href="#" style="color: green;"><i class="large material-icons">folder_shared</i></a>
                                    <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Extensão</strong></p>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <td>
                                <div class="col s3 m3 l2 offset-l5">
                                    <a href="#" style="color: green;"><i class="large material-icons">group</i></a>
                                    <p><strong>&nbsp;&nbsp;Produção &nbsp;&nbsp;Científica</strong></p>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <div class="col s3 m3 l2 offset-l5">
                                    <a href="./Tela/telaUpload.php" style="color: green;"><i class="large material-icons">send</i></a>
                                    <p><strong>&nbsp;&nbsp;Submeter &nbsp;&nbsp;Trabalhos</strong></p>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <?php
        include_once './Base/footer.php';
        ?>
    </body>
</html>
