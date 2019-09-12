<!DOCTYPE html>
<?php
include_once '../Base/header.php';
include_once '../Base/nav.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Protótipo Upload</title>
    </head>
    <body>

        <div class="container">
            <div class="row">
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
            </div>
        </div>

        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>