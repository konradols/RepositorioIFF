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
            <div class="col s3 m3 l12">
                <div class="col l12 card">
                    <h5 class="center">Pesquisa de Trabalhos</h5>
                    <div class="col l12">
                        <table>
                            <tr>
                                <td>
                                    <label for="categoria">Filtrar por</label>
                                    <div class="input-field col s12 center" style="margin-top: -4px;">
                                        <select name="categoria">
                                            <option value="id_trabalho">Id do Trabalho</option>
                                            <option value="id_usuario">Id do Usuário</option>
                                            <option value="nome">Nome</option>
                                            <option value="resumo">Resumo</option>
                                            <option value="categoria">Categoria</option>
                                            <option value="data_submissao">Data de Submissão</option>
                                            <option value="id_curso">Id do curso</option>
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
                                <td>Id do Trabalho</td>
                                <td>Id do Usuário</td>
                                <td>Nome</td>
                                <td>Resumo</td>
                                <td>Categoria</td>
                                <td>Data de Submissão</td>
                                <td>Caminho</td>
                                <td>Id do Curso</td>
                            </tr>
                            <?php
                            include_once '../Controle/trabalhoPDO.php';
                            include_once '../Modelo/trabalho.php';
                            $trabalhoListar = new trabalhoPDO();
                            if (isset($_POST['pesquisar'])) {
                                $pesquisa = $_POST['pesquisar'];
                                $metodo = $_POST['select'];
                                $sql = $trabalhoListar->$metodo($pesquisa);
                            } else {
                                $sql = $trabalhoListar->selectTrabalho();
                            }
                            if ($sql != false) {

                                while ($resultado = $sql->fetch()) {
                                    $tr = new trabalho($resultado);
                                    echo "<tr>";
                                    echo "<td>" . $tr->getId_trabalho() . "</td>";
                                    echo "<td>" . $tr->getId_usuario() . "</td>";
                                    echo "<td>" . $tr->getNome() . "</td>";
                                    echo "<td>" . $tr->getResumo() . "</td>";
                                    echo "<td>" . $tr->getCategoria() . "</td>";
                                    echo "<td>" . $tr->getData_submissao() . "</td>";
                                    echo "<td>" . $tr->getCaminho() . "</td>";
                                    echo "<td>" . $tr->getId_curso() . "</td>";

//                        -----------------------------------------------------------

//                                           echo "<td>";
//                                           ?><!--<a class="btn corpadrao" href="./verMais.php?id=<?php // echo $tr->getId_trabalho(); ?>">Ver mais</a>--><?php
//                                    echo "</td>";
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
