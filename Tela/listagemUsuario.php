<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once '../Base/header.php';
    include_once '../Base/nav.php';
    include_once '../Controle/usuarioPDO.php';
    include_once '../Modelo/Usuario.php';
    $usuarioPDO = new UsuarioPDO();
    $stmtUsuarios = $usuarioPDO->selectUsuario();
    $usuarios = $stmtUsuarios->fetchAll();
?>
<html>
<body>
<main>
<?php
    include_once '../Modelo/Usuario.php';
    if (isset($_SESSION['usuario'])) {
        $logado = new usuario(unserialize($_SESSION['usuario']));
    }
?>
<main>
    <div class="row center">
        <div class="card z-depth-3 col s12 m12 l10 offset-l1">
            <div class="row">
                <h5 class="center">Listagem Usuários</h5>
            </div>
            <div class="row">
                <?php
                    if ($usuarios) { ?>
                        <table class="col s10 offset-s1 hide-on-small-only hide-on-med-only">
                            <thead>
                            <tr>
                                <th class="center">Foto</th>
                                <th class="center">Nome</th>
                                <th class="center">Email</th>
                                <th class="center">Categoria</th>
                                <th class="center">Administrador</th>
                                <th class="center">Perfil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($usuarios as $linha) {
                                    $usuario = new usuario($linha);
                                    ?>
                                    <tr>
                                        <td><img src="../<?php echo $usuario->getFoto(); ?>" width="80" height="80">
                                        </td>
                                        <td class="center"><?php echo $usuario->getNome(); ?></td>
                                        <td class="center"><?php echo $usuario->getEmail(); ?></td>
                                        <td class="center"><?php echo $usuario->getCategoria(); ?></td>
                                        <td class="center">
                                            <?php
                                                if($usuario->getAdministrador() == 1) {
                                                    ?>
                                                    <a href="../Controle/usuarioControle.php?function=removeAdm&id_usuario=<?php echo $usuario->getIdUsuario() ?>" class="btn red darken-3">Remover</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="../Controle/usuarioControle.php?function=addAdm&id_usuario=<?php echo $usuario->getIdUsuario() ?>" class="btn green darken-2">Adicionar</a>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <a href="./perfil.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>"
                                               class="btn waves-effect">Ver perfil</a></td>
                                    </tr>
                                    <?php
                                } ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo "<h5 class='hide-on-small-and-down'>Nenhum cadastro pendente!</h5>";
                    }
                ?>
            </div>
            <div class="row">
                <?php if ($usuarios) { ?>
                    <ul class="collapsible hide-on-large-only">
                        <?php
                            foreach ($usuarios as $linha) {
                                $usuario = new usuario($linha);
                                ?>
                                <li>
                                    <div class="collapsible-header"><b><?php echo $usuario->getNome() ?></b></div>
                                    <div class="collapsible-body">
                                        <p class="center">
                                            <img src="../<?php echo $usuario->getFoto() ?>" width="80" height="80">
                                        </p>
                                        <p class="left-align">
                                            <b>Nome:</b> <?php echo $usuario->getNome() ?>
                                        </p>
                                        <p class="left-align">
                                            <b>Email:</b> <?php echo $usuario->getEmail() ?>
                                        </p>
                                        <p class="left-align">
                                            <b>Categoria:</b> <?php echo $usuario->getCategoria() ?>
                                        </p>
                                        <p>
                                            <?php
                                                if($usuario->getAdministrador() == 1) {
                                                    ?>
                                                    <a href="../Controle/usuarioControle.php?function=removeAdm&id_usuario=<?php echo $usuario->getIdUsuario() ?>" class="btn red darken-3">Remover Adiministrador</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="../Controle/usuarioControle.php?function=addAdm&id_usuario=<?php echo $usuario->getIdUsuario() ?>" class="btn green darken-2">Tornar Adiministrador</a>
                                                    <?php
                                                }
                                            ?>
                                        </p>
                                        <p>
                                            <a href="./perfil.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>"
                                               class="btn waves-effect">Ver perfil</a></td>
                                        </p>
                                    </div>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                    <?php
                } else {
                    echo "<h5 class='hide-on-large-only'>Nenhum cadastro pendente!</h5>";
                }
                ?>
            </div>
            <div class="row">
                <a href="../index.php" class="btn waves-effect">Voltar</a>
            </div>
        </div>
    </div>
</main>
<script>
    $('.collapsible').collapsible();
</script>
</main>
<?php
    include_once '../Base/footer.php';
?>
</body>
</html>
