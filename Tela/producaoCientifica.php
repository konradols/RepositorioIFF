<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
$pontos = "";
if (realpath("./index.php")) {
    $pontos = './';
} else {
    if (realpath("../index.php")) {
        $pontos = '../';
    }
}

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Controle/trabalhoPDO.php';
    include_once './Modelo/Usuario.php';
    include_once './Modelo/Trabalho.php';
} else {
    realpath('../index.php');
    include_once '../Controle/conexao.php';
    include_once '../Controle/trabalhoPDO.php';
    include_once '../Modelo/Usuario.php';
    include_once '../Modelo/Trabalho.php';
}
include_once '../Base/header.php';
include_once '../Base/nav.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Protótipo Home Page</title>
    </head>
    <body>

        <?php
        if (isset($_SESSION['usuario'])) {
            $logado = new usuario(unserialize($_SESSION['usuario']));
        }
        ?>

        <div class="container">

            <div class="row">
                <div class="col l12 card">
                    <ul class="collapsible">
                        <?php
                        $trabalhoListar = new trabalhoPDO();
//                        if (isset($_POST['pesquisar'])) {
//                            $pesquisa = $_POST['pesquisar'];
//                            $metodo = $_POST['select'];
//                            $sql = $trabalhoListar->$metodo($pesquisa);
//                        } else {
                        $sql = $trabalhoListar->selectTrabalhoCategoria('producaocientifica');
//                        }
                        if ($sql != false) {
                            while ($resultado = $sql->fetch()) {
                                $tr = new trabalho($resultado);
                                ?>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">library_books</i><?php echo $tr->getNome(); ?></div>
                                    <div class="collapsible-body">
                                        <div class="col s6 m6 l2 push-l1 center">
                                            <a id="modal-autores" class="modal-trigger" href="#modal1">Autores(as)</a>
                                        </div>

                                        <div id="modal1" class="modal">
                                            <div class="modal-content">
                                                <h4>Autores(as)</h4>
                                                <p><?php echo $tr->getAutores(); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                                            </div>
                                        </div>

                                        <div class="col s6 m6 l2 push-l1">
                                            <a id="modal-orientadores" class="modal-trigger" href="#modal2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orientadores(as)</a>
                                        </div>
                                        <div id="modal2" class="modal">
                                            <div class="modal-content">
                                                <h4>Orientadores(as)</h4>
                                                <p><?php echo $tr->getOrientadores(); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                                            </div>
                                        </div>

                                        <div class="col s6 m6 l2 push-l2">
                                            <a href="../Controle/<?php echo $tr->getCaminho(); ?>" target="_blank">Arquivo PDF</a>
                                        </div>

                                        <div class="col s6 m6 l3 push-l2">
                                            <p style="margin-top: -2px;">Submetido em: <?php echo $tr->getData_submissao(); ?></p>
                                        </div>
                                        <br><br>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var elems = document.querySelectorAll('.collapsible');
                var instances = M.Collapsible.init(elems, options);
            });

            // Or with jQuery

            $(document).ready(function () {
                $('.collapsible').collapsible();
            });
        </script>

        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>
