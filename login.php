<!DOCTYPE html>
<?php
include_once './Base/header.php';
include_once './Base/nav.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Protótipo Home Page</title>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col l12">
                    <div class="card center z-depth-4" style="margin-left: 300px; margin-right: 300px; margin-top: 200px;">
                        <div class="card-content">
                            <span class="card-title">Login</span>
                            <br>
                            <form name="login" method="post" action="#">
                                <div class="row">
                                    <div class="input-field">
                                        <input type="text" id="usuario">
                                        <label for="usuario">Usuário</label>
                                    </div>
                                    <div class="input-field">
                                        <input type="text" id="senha">
                                        <label for="senha">Senha</label>
                                    </div>
                                    <a class="waves-effect waves-light btn">Voltar</a>
                                    <a class="waves-effect waves-light btn">Entrar</a>
                                    <a class="waves-effect waves-light btn">Cadastre-se</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once './Base/footer.php';
        ?>
    </body>
</html>
