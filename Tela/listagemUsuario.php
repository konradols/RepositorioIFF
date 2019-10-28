<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../Base/header.php';
include_once '../Base/nav.php';
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
            include_once '../Modelo/Usuario.php';
            if (isset($_SESSION['usuario'])) {
                $logado = new usuario(unserialize($_SESSION['usuario']));
            }
            ?>
            
            <div class="row">
            <div class="col s3 m3 l10" style="margin-left: 300px; margin-right: 300px;">
                <div class="col l8 card">
                    <h5 class="center">Pesquisa de Trabalhos</h5>
                    <div class="col l12" style="margin-left: 15px;">
                        <table>
                            <tr>
                                <td>
                                    <label for="categoria">Filtrar por</label>
                                    <div class="input-field col s12 center" style="margin-top: -4px;">
                                        <select name="categoria">
                                            <option value="id">Id</option>
                                            <option value="nome">Nome</option>
                                            <option value="email">E-mail</option>
                                            <option value="usuario">Usuário</option>
                                            <option value="categoria">Categoria</option>
                                            <option value="administrador">Administradores</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="pesquisa" placeholder="Pesquise">
                                </td>
                                <td>
                                    <input type="submit" id="btn-pesquisar" class="btn corpadrao inline" value="Pesquisar">
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div id="tabela" class="loader">

                        <table class="striped">
                            <tr>
                                <td>Id</td>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Usuário</td>
                                <td>Categoria</td>
                                <td>Administrador</td>
                            </tr>
                            <?php
                            include_once '../Controle/usuarioPDO.php';
                            include_once '../Modelo/usuario.php';
                            $usuarioListar = new usuarioPDO();
                            if (isset($_POST['pesquisar'])) {
                                $pesquisa = $_POST['pesquisar'];
                                $metodo = $_POST['select'];
                                $sql = $usuarioListar->$metodo($pesquisa);
                            } else {
                                $sql = $usuarioListar->selectUsuario();
                            }
                            if ($sql != false) {

                                while ($resultado = $sql->fetch()) {
                                    $us = new usuario($resultado);
                                    echo "<tr>";
                                    echo "<td>" . $us->getId() . "</td>";
                                    echo "<td>" . $us->getNome() . "</td>";
                                    echo "<td>" . $us->getEmail() . "</td>";
                                    echo "<td>" . $us->getUsuario() . "</td>";
                                    echo "<td>" . $us->getCategoria() . "</td>";
                                    echo "<td>" . $us->getAdministrador() . "</td>";

//                        -----------------------------------------------------------
                                    if (($us->getAdministrador() == 'true')) {
                                        echo "<td>";
                                        ?><input type="button" class="btn corpadrao ativoInativo" caminho="../Controle/usuarioControle.php?function=tornarUsuarioNaoAdm&id=
                                               <?php echo $us->getId(); ?>" value="Ativo">
                                               <?php
                                               echo "</td>";
                                           } else {
                                               echo "<td>";
                                               ?>
                                        <input type="button" class="btn red darken-2 ativoInativo" caminho="../Controle/usuarioControle.php?function=tornarUsuarioAdm&id=
                                               <?php echo $us->getId(); ?>" value="Inativo"><?php
                                               echo "</td>";
                                           }
//                        -----------------------------------------------------------


                                           echo "<td>";
                                           ?><a class="btn corpadrao" href="./verMais.php?id=<?php echo $us->getId(); ?>">Ver mais</a><?php
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td><h6>Nenhum resultado econtrado</h6></td></tr>";
                            }
                            ?>
                        </table>
                    </div>

                    <br/><br/><br/><br/>
                    
                    
                    
                </div>
            </div>
        </div>
            
        </div>

        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>