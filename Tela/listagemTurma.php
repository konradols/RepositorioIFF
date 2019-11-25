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
            <div class="col s3 m3 l10" style="margin-left: 300px; margin-right: 300px;">
                <div class="col l8 card">
                    <h5 class="center">Pesquisa de Turmas</h5>
                    <div class="col l12">
                        <table>
                            <tr>
                                <td>
                                    <label for="categoria">Filtrar por</label>
                                    <div class="input-field col s12 center" style="margin-top: -4px;">
                                        <select name="categoria">
                                            <option value="id">Id da Turma</option>
                                            <option value="id_curso">Id do Curso</option>
                                            <option value="nome">Nome</option>
                                            <option value="ano_inicio">Ano Início</option>
                                            <option value="ano_fim">Ano Fim</option>
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
                                <td>Id da Turma</td>
                                <td>Id do Curso</td>
                                <td>Nome</td>
                                <td>Ano Início</td>
                                <td>Ano Fim</td>
                            </tr>
                            <?php
                            include_once '../Controle/turmaPDO.php';
                            include_once '../Modelo/turma.php';
                            $turmaListar = new turmaPDO();
                            if (isset($_POST['pesquisar'])) {
                                $pesquisa = $_POST['pesquisar'];
                                $metodo = $_POST['select'];
                                $sql = $turmaListar->$metodo($pesquisa);
                            } else {
                                $sql = $turmaListar->selectTurma();
                            }
                            if ($sql != false) {

                                while ($resultado = $sql->fetch()) {
                                    $tr = new turma($resultado);
                                    echo "<tr>";
                                    echo "<td>" . $tr->getIdTurma() . "</td>";
                                    echo "<td>" . $tr->getId_curso() . "</td>";
                                    echo "<td>" . $tr->getNome() . "</td>";
                                    echo "<td>" . $tr->getAno_inicio() . "</td>";
                                    echo "<td>" . $tr->getAno_fim() . "</td>";

//                        -----------------------------------------------------------

//                                           echo "<td>";
//                                           ?><!--<a class="btn corpadrao" href="./verMais.php?id=<?php // echo $tr->getId_turma(); ?>">Ver mais</a>--><?php
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
