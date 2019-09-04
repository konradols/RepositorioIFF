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
                    <div class="card center z-depth-4">
                        <div class="card-content">
                            <span class="card-title">Cadastro</span>
                            <br>
                            <form name="cadastroUsuario" method="post" action="#">
                                <div class="row">
                                    <div class="input-field col l6">
                                        <input type="text" name="nome" required="true">
                                        <label for="nome">Nome</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="text" name="usuario" required="true">
                                        <label for="usuario">Usuario</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="text" name="matricula" required="true">
                                        <label for="matricula">Nº da Matrícula</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="text" name="turma" required="true">
                                        <label for="turma">Turma</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="text" name="email" required="true">
                                        <label for="email">E-mail</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="text" name="telefone" required="true">
                                        <label for="telefone">Telefone</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="password" name="senha" required="true">
                                        <label for="senha">Senha</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="password" name="senhaconf" required="true">
                                        <label for="senhaconf">Confirme sua senha</label>
                                    </div>
                                    <a class="waves-effect waves-light btn">Cadastrar</a>
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