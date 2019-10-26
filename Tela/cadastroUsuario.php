<!DOCTYPE html>
<?php
include_once '../Base/header.php';
include_once '../Base/nav.php';
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
                            <form name="cadastroUsuario" method="post" action="../Controle/usuarioControle.php?function=inserirUsuario" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="input-field col l6">
                                        <input type="text" name="nome" required="true">
                                        <label for="nome">Nome</label>
                                    </div>
                                    <!--
                                                                        <div class="input-field col l6">
                                                                            <input type="text" name="matricula" required="true">
                                                                            <label for="matricula">Nº da Matrícula</label>
                                                                        </div>
                                                                        <div class="input-field col l6">
                                                                            <input type="text" name="turma" required="true">
                                                                            <label for="turma">Turma</label>
                                                                        </div>-->
                                    <div class="input-field col l6">
                                        <input type="text" name="email" required="true">
                                        <label for="email">E-mail</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="text" name="usuario" required="true">
                                        <label for="usuario">Usuario</label>
                                    </div>
                                    <!--                                    <div class="input-field col l6">
                                                                            <input type="text" name="telefone" required="true">
                                                                            <label for="telefone">Telefone</label>
                                                                        </div>-->
                                    <div class="input-field col l6">
                                        <select name="categoria" required="true">
                                                <option value="" disabled selected>Categoria</option>
                                                <option value="aluno">Aluno(a)</option>
                                                <option value="orienteador">Orientador(a)</option>
                                                <option value="coordenador">Coordenador(a)</option>
                                            </select>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="password" name="senha1" required="true">
                                        <label for="senha">Senha</label>
                                    </div>
                                    <div class="input-field col l6">
                                        <input type="password" name="senha2" required="true">
                                        <label for="senhaconf">Confirme sua senha</label>
                                    </div>
                                    <div class="file-field input-field col l12">
                                        <button class="btn corpadrao">
                                            <div>Upload</div>
                                        </button>
                                        <input type="file" class="file-chos" name="arquivo">
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Foto">
                                        </div>
                                    </div>
                                    <div>
                                        <!--<a style="margin-bottom: -50px;" class="waves-effect waves-light btn">Cadastrar</a>-->
                                        <a href="../Tela/telaUpload.php" class="grey btn">Voltar</a>
                                        <input type="submit" class="btn corpadrao" value="Cadastrar">
                                    </div>
                                    <br><br>
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