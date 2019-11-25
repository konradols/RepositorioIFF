<!DOCTYPE html>
<?php
include_once '../Base/header.php';
include_once '../Base/nav.php';
include_once '../Controle/conexao.php';
include_once '../Controle/trabalhoPDO.php';
include_once '../Controle/cursoPDO.php';
include_once '../Controle/turmaPDO.php';
include_once '../Modelo/Usuario.php';
include_once '../Modelo/Trabalho.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Protótipo Home Page</title>
</head>
<body>
<br><br><br>
<div class="row">
    <div>
        <div class="col l8 offset-l2 card">
            <h5 class="center">Pesquisa de Trabalhos</h5>
            <div class="col l12" style="margin-left: 15px;">
                <form name="pesquisaTrabalhos" action="./pesquisa.php" method="POST">
                    <table>
                        <tr>
                            <td>
                                <label for="select">Filtrar por</label>
                                <div class="input-field col s12 center" style="margin-top: 3px;">
                                    <select class="browser-default" name="select" required="true">
                                        <option value="Trabalho">Todos</option>
                                        <option value="TrabalhoCategoria">Categoria</option>
                                        <option value="UsuarioNome">Autor</option>
                                        <option value="OrientadorNome">Orientador</option>
                                        <option value="TrabalhoNome">Título</option>
                                        <option value="CursoNome">Curso</option>
                                        <option value="TurmaNome">Turma</option>
                                        <option value="TrabalhoData_submissao">Ano de publicação</option>
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
                </form>
            </div>

            <br/><br/><br/><br/>
            <!--                    <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">library_books</i>Usabilidade nos repositórios digitais de monografias das instituições públicas de ensino superior brasileiras</div>
                                        <div class="collapsible-body">
                                            <a href="#">Autores</a>
                                            <a style="margin-left: 225px;" href="#">Orientadores</a>
                                            <a style="margin-left: 190px;" href="Jovana Lopes.pdf">Arquivo PDF</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">library_books</i>Arquitetura da informação para biblioteca digital personalizável</div>
                                        <div class="collapsible-body">
                                            <a href="#">Autores</a>
                                            <a style="margin-left: 225px;" href="#">Orientadores</a>
                                            <a style="margin-left: 190px; "href="Liriane Soares.pdf">Arquivo PDF</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">library_books</i>Organinzação da informação em repositórios digitais: implicações do auto-arquivamento na representação da informação</div>
                                        <div class="collapsible-body">
                                            <a href="#">Autores</a>
                                            <a style="margin-left: 225px;" href="#">Orientadores</a>
                                            <a style="margin-left: 190px;" href="Graziela Martins.pdf">Arquivo PDF</a>
                                        </div>
                                    </li>
                                </ul>-->
        </div>
    </div>
</div>
<?php if (isset($_POST['pesquisa'])) { ?>
    <div class="container">

        <div class="row">
            <div class="col s12 l12 card">
                <ul class="collapsible">
                    <?php
                    switch ($_POST['select']) {
                        case "Trabalho":
                            $_GET['msg'] = "Trabalho";
                            break;
                        case "TrabalhoCategoria":
                            $_GET['msg'] = "TrabalhoCategoria";
                            break;
                        case "TrabalhoNome":
                            $_GET['msg'] = "TrabalhoNome";
                            break;
                        case "TrabalhoData_submissao":
                            $_GET['msg'] = "TrabalhoData_submissao";
                            break;
                        case "UsuarioNome":
                            $_GET['msg'] = "UsuarioNome";
                            break;
                        case "CursoNome":
                        case "TurmaNome":
                            $_GET['msg'] = "TurmaNome";
                            break;
                        default:
                            $_GET['msg'] = "todos";
                            break;
                    }
                    $_GET['c'] = $_POST['pesquisa'];
                    if ($_GET['msg'] == "todos") {
                        $_GET = null;
                    }
                    $trabalhoListar = new trabalhoPDO();
                    $usuarioListar = new usuarioPDO();
                    $cursoListar = new cursoPDO();
                    $turmaListar = new turmaPDO();
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
                                $idUsuario = $user->getIdUsuario();
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
                                <div class="collapsible-header"><i
                                            class="material-icons">library_books</i><?php echo $tr->getNome(); ?></div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col l3 s12">
                                            <p>Autores:</p>
                                            <?php
                                            $autores  = explode(",",$tr->getAutores());
                                            foreach ($autores as $atutor){
                                                echo "<p>".$atutor."</p>";
                                            }
                                            ?>
                                        </div>
                                        <div class="col l3 s12">
                                            <p>Orientadores:</p>
                                            <?php
                                            $orientadores  = explode(",",$tr->getOrientadores());
                                            foreach ($orientadores as $orientador){
                                                echo "<p>".$orientador."</p>";
                                            }
                                            ?>
                                        </div>
                                        <div class="col s12 l3">
                                            <a style="margin-left: 100px;"
                                               href="../Controle/<?php echo $tr->getCaminho(); ?>" target="_blank">Arquivo
                                                PDF</a>
                                        </div>
                                        <div class="col s12 l3">
                                            <p class="right" style="margin-top: -3px; margin-right: 110px;">Submetido
                                                em: <?php echo $tr->getData_submissao(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    } else {
                        echo "<h5>Nenhum resultado!</h5>";
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
    <?php
}
?>

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


<script>
    //            document.addEventListener('DOMContentLoaded', function () {
    //                var elems = document.querySelectorAll('.collapsible');
    //                var instances = M.Collapsible.init(elems, options);
    //            });
    //
    //            // Or with jQuery

    $(document).ready(function () {
        $('.collapsible').collapsible();
    });
</script>
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>

<?php
include_once '../Base/footer.php';
?>
</body>
</html>
