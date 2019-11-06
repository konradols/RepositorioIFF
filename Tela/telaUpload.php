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
                    <div class="card center z-depth-4" style="margin-top: 30px;">
                        <div class="card-content">
                            <span class="card-title">Envio de Arquivos</span>
                            <br>
                            <!--action="../Controle/trabalhoControle.php?function=inserirTrabalho"-->
                            <!--action="../Controle/teste.php"-->
                            <form method="POST" action="../Controle/trabalhoControle.php?function=inserirTrabalho" enctype="multipart/form-data">
                                <div class="row">
                                    <!--                                    <div class="file-field input-field col l6">
                                                                            <input type="file" name="arquivo" required="true">
                                                                            <label for="arquivo">Arquivo</label>
                                                                        </div>-->
                                    <div class="input-field col l6">
                                        <input type="text" name="nome" required="true">
                                        <label for="nome">Nome do Trabalho</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <select name = "categoria" required="true">
                                            <option value="tcc">TCC</option>
                                            <option value="relatorio">Relatório</option>
                                            <option value="producaocientifica">Produção Científica</option>
                                        </select>
                                        <label for="categoria">Categoria</label>
                                    </div>
                                    <div class="input-field col l12">
                                        <textarea id="textarea" class="materialize-textarea" name="resumo"></textarea>
                                        <label for="textarea">Resumo</label>
                                    </div>
                                    <h5>Selecione o arquivo a ser submetido</h5>
                                    <div class="file-field input-field">
                                        <button class="btn corpadrao">
                                            <div>Upload</div>
                                        </button>
                                        <input type="file" class="file-chos" name="arquivo">
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn corpadrao col s4 offset-s4" name="SendCadImg" value="true">Submeter</button>
                                        <?php $_SESSION['usuario'] = serialize($logado); ?>
                                    </div>
                                    <!--                                    <div class="input-field col l6">
                                                                            <input type="password" name="senha" required="true">
                                                                            <label for="senha">Senha</label>
                                                                        </div>-->
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