<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../Base/navBar.php';
include_once '../Modelo/usuario.php';
if (isset($_SESSION['usuario'])) {
    $logado = new usuario(unserialize($_SESSION['usuario']));
}
?>
<html>
    <?php include_once '../Base/header.php'; ?>
    <body>
<main>
        <div class="">
            <div class="row" >
                <div class="col l4 m8 s12 offset-l4 offset-m2">
                    <div class="card center z-depth-4" >
                        <div class="card-content">
                            <span class="card-title">Login</span>
                            <br>
                            <form name="login" method="post" action="../Controle/usuarioControle.php?function=login">
                                <div class="row">
                                    <div class="input-field">
                                        <input type="text" name="usuario" id="usuario">
                                        <label for="usuario">Usuário</label>
                                    </div>
                                    <div class="input-field">
                                        <input type="password" name="senha" id="senha">
                                        <label for="senha">Senha</label>
                                    </div>
                                    <!--<a class="waves-effect waves-light btn corpadrao">Entrar</a>-->
                                    <div class="row center">
                                        <a href="../index.php" class="grey btn">Voltar</a>
                                        <input type="submit" class="btn corpadrao" value="Login">
                                        <div class='row'>
                                            <?php
                                            if (isset($_GET['msg'])) {
                                                if ($_GET['msg'] == "erro") {
                                                    echo "LOGIN OU SENHA INCORRETOS!";
                                                }
                                            }
                                            ?>
                                        </div>
                                        <a href="cadastroUsuario.php">Não possui login? Clique aqui e cadastre-se</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>