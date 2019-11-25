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
    $stmtUsuarios = $usuarioPDO->selectUsuariosPendentes();
    $usuarios = $stmtUsuarios->fetchAll();
?>
<html>
<body>
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
                <h5 class="center">Usuários pendentes</h5>
            </div>
            <div class="row">
                <?php
                    if ($usuarios) { ?>
                        <table class="col s10 offset-s1 hide-on-small-only hide-on-med-only">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ativar</th>
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
                                        <td><?php echo $usuario->getNome(); ?></td>
                                        <td><?php echo $usuario->getEmail(); ?></td>
                                        <td>
                                            <a href="../Controle/usuarioControle.php?function=ativar&id_usuario=<?php echo $usuario->getIdUsuario(); ?>"
                                               class="btn waves-effect green">Ativar</a></td>
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
                                        <p>
                                            <a href="../Controle/usuarioControle.php?function=ativar&id_usuario=<?php echo $usuario->getIdUsuario(); ?>"
                                               class="btn waves-effect green">Ativar</a>
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
<?php
    include_once '../Base/footer.php';
?>
</body>
</html>
