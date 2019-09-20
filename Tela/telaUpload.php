<?php
if (!isset($_SESSION)) {
    session_start();
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
                    <div class="card center z-depth-4" style="margin-top: 30px;">
                        <div class="card-content">
                            <span class="card-title">Envio de Arquivos</span>
                            <br>
                            <form method="POST" action="../Controle/upload.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="input-field col l6">
                                        <input type="file" name="arquivo" required="true">
                                        <label for="arquivo">Arquivo</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="text" name="nome" required="true">
                                        <label for="nome">Nome do Trabalho</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <textarea id="textarea" class="materialize-textarea"></textarea>
                                        <label for="textarea">Resumo</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <select name = "categoria" required="true">
                                            <option value="0">TCC</option>
                                            <option value="1">Pesquisa</option>
                                        </select>
                                        <label for="categoria">Categoria</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="password" name="senha" required="true">
                                        <label for="senha">Senha</label>
                                    </div>
                                    <button class="btn waves-effect waves-light corpadrao" type="submit" name="botao">
                                        Submeter
                                    </button>
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