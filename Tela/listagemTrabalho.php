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
    <main>
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
                    <div id="tabela" class="loader">

                        <table class="striped">
                            <tr>
                                <td>Nome</td>
                                <td>Resumo</td>
                                <td>Categoria</td>
                                <td>Data de Submissão</td>
                                <td>Arquivo</td>
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
                                    echo "<td>" . $tr->getNome() . "</td>";
                                    echo "<td>" . $tr->getResumo() . "</td>";
                                    echo "<td>" . $tr->getCategoria() . "</td>";
                                    echo "<td>" . $tr->getData_submissao() . "</td>";
                                    echo "<td><a href='../Controle/" . $tr->getCaminho() . "'>Download</a></td>";

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
    </main>
        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>
