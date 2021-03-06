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
    include_once './Controle/cursoPDO.php';
    include_once './Controle/turmaPDO.php';
    include_once './Modelo/Usuario.php';
    include_once './Modelo/Trabalho.php';
} else {
    realpath('../index.php');
    include_once '../Controle/conexao.php';
    include_once '../Controle/trabalhoPDO.php';
    include_once '../Controle/cursoPDO.php';
    include_once '../Controle/turmaPDO.php';
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
    <main>
        <?php
        if (isset($_SESSION['usuario'])) {
            $logado = new usuario(unserialize($_SESSION['usuario']));
        }
        ?>

        <div class="container">

            <div class="row">
                <div class="col s12 l12 card">
                    <ul class="collapsible">
                        <?php
                        $trabalhoListar = new trabalhoPDO();
                        $usuarioListar = new usuarioPDO();
                        $cursoListar = new cursoPDO();
                        $turmaListar = new turmaPDO();
//                        if (isset($_POST['pesquisar'])) {
//                            $pesquisa = $_POST['pesquisar'];
//                            $metodo = $_POST['select'];
//                            $sql = $trabalhoListar->$metodo($pesquisa);
//                        } else {
                        if ($_GET['c'] != null) {
                            switch ($_GET['msg']) {
                                case "Trabalho":
                                    $sql = $trabalhoListar->selectTrabalho();
                                    break;
                                case "TrabalhoCategoria":
                                    $sql = $trabalhoListar->selectTrabalhoCategoria($_GET['c']);
                                    break;
                                case "TrabalhoNome":
                                    $sql = $trabalhoListar->selectTrabalhoNome($_GET['c']);
                                    break;
                                case "TrabalhoData_submissao":
                                    $sql = $trabalhoListar->selectTrabalhoData_submissao($_GET['c']);
                                    break;
                                case "UsuarioNome":
                                    $sqlUsuario = $usuarioListar->selectUsuarioNome($_GET['c']);
                                    $user = new usuario($sqlUsuario);
                                    $idUsuario = $user->getId();
                                    header("Location: ?=" . $idUsuario);
                                    $sql = $trabalhoListar->selectTrabalhoId_usuario($idUsuario);
                                    break;
                                case "Curso":
                                    $sql = $cursoListar->selectCursoNome($_GET['c']);
                                    break;
                                case "Turma":
                                    $sql = $turmaListar->selectTurmaNome($_GET['c']);
                                    break;
                            }
                        } else {
                            $sql = $trabalhoListar->selectTrabalho();
                        }
//                        }
                        if ($sql != false) {
                            while ($resultado = $sql->fetch()) {
                                $tr = new trabalho($resultado);
                                $sqlUsuario = $usuarioListar->selectUsuarioId($tr->getId_usuario());
//                                echo var_dump($sqlUsuario);
                                $u = new usuario($sqlUsuario);
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
                        } else {
//                            header("Location: ./nada.php");
                            header("msg=falha");
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
    </main>
        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>
