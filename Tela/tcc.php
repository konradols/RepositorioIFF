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
                        $sql = $trabalhoListar->selectTrabalho();
//                        }
                        if ($sql != false) {
                            while ($resultado = $sql->fetch()) {
                                $tr = new trabalho($resultado);
                                ?>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">library_books</i><?php echo $tr->getNome(); ?></div>
                                    <div class="collapsible-body">
                                        <a href="#">Autores<?php
//                                        $trabalhoListar->selectTrabalhoId_usuario($id_usuario);
                                            ?></a>
                                        <a style="margin-left: 100px;" href="#">Orientadores</a>
                                        <a style="margin-left: 100px;" href="../Controle/<?php echo $tr->getCaminho(); ?>" target="_blank">Arquivo PDF</a>
                                        <!--<span style="margin-left: 200px;">Publicado em:</span>-->
                                        <p class="right" style="margin-top: -3px; margin-right: 110px;">Submetido em: <?php echo $tr->getData_submissao(); ?></p>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">library_books</i>Usabilidade nos repositórios digitais de monografias das instituições públicas de ensino superior brasileiras</div>
                            <div class="collapsible-body">
                                <a href="#">Autores</a>
                                <a style="margin-left: 100px;" href="#">Orientadores</a>
                                <a style="margin-left: 100px;" href="../Jovana Lopes.pdf" target="_blank">Arquivo PDF</a>
                                <!--<span style="margin-left: 200px;">Publicado em:</span>-->
                                <p class="right" style="margin-top: -3px; margin-right: 110px;">Submetido em:</p>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">library_books</i>Arquitetura da informação para biblioteca digital personalizável</div>
                            <div class="collapsible-body">
                                <a href="#">Autores</a>
                                <a style="margin-left: 100px;" href="#">Orientadores</a>
                                <a style="margin-left: 100px; "href="../Liriane Soares.pdf" target="_blank">Arquivo PDF</a>
                                <!--<span style="margin-left: 200px;">Publicado em:</span>-->
                                <p class="right" style="margin-top: -3px; margin-right: 110px;">Submetido em:</p>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">library_books</i>Organização da informação em repositórios digitais: implicações do auto-arquivamento na representação da informação</div>
                            <div class="collapsible-body">
                                <a href="#">Autores</a>
                                <a style="margin-left: 100px;" href="#">Orientadores</a>
                                <a style="margin-left: 100px;" href="../Graziela Martins.pdf" target="_blank">Arquivo PDF</a>
                                <!--<span style="margin-left: 200px;">Publicado em:</span>-->
                                <p class="right" style="margin-top: -3px; margin-right: 110px;">Submetido em:</p>
                            </div>
                        </li>
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
