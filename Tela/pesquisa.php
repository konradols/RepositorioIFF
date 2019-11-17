<!DOCTYPE html>
<?php
include_once '../Base/header.php';
include_once '../Base/nav.php';
$selectProAction = $_POST['filtro'] . $_POST['pesquisa'];
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
                        <form name="pesquisaTrabalhos" action="<?php $selectProAction; ?>" method="POST">
                            <table>
                                <tr>
                                    <td>
                                        <label for="categoria">Filtrar por</label>
                                        <div class="input-field col s12 center" style="margin-top: 3px;">
                                            <select class="browser-default" name="filtro" required="true">
                                                <option value="selectTrabalho">Todos</option>
                                                <option value="selectTrabalhoCategoria">Categoria</option>
                                                <option value="naoImplementadoNoMomento">Área</option>
                                                <option value="naoImplementadoNoMomento">Palavra-Chave</option>
                                                <option value="selectUsuarioNome">Autor</option>
                                                <option value="selectOrientadorNome">Orientador</option>
                                                <option value="selectTrabalhoNome">Título</option>
                                                <option value="selectCursoNome">Curso</option>
                                                <option value="selectTurmaNome">Turma</option>
                                                <option value="selectTrabalhoData_submissao">Ano de publicação</option>
                                            </select>
                                        </div>
                                    </td>
                                    <?php
                                    include_once '../Controle/usuarioPDO.php';
                                    include_once '../Controle/trabalhoPDO.php';
                                    include_once '../Controle/turmaPDO.php';
                                    include_once '../Controle/cursoPDO.php';
//                                include_once '../Controle/orientadorPDO.php';
                                    include_once '../Modelo/usuario.php';
                                    include_once '../Modelo/trabalho.php';
                                    include_once '../Modelo/turma.php';
                                    include_once '../Modelo/curso.php';
//                                include_once '../Modelo/orientador.php';
                                    $usuarioListar = new usuarioPDO();
                                    $trabalhoListar = new trabalhoPDO();
                                    $turmaListar = new turmaPDO();
                                    $cursoListar = new cursoPDO();
//                                $orientadorListar = new orientadorPDO();
                                    if (isset($_POST['pesquisar'])) {
                                        echo var_dump($_POST['pesquisar']);
                                        $pesquisa = $_POST['pesquisar'];
                                        $metodo = $_POST['select'];
                                        $sql = $usuarioListar->$metodo($pesquisa);
                                    } else {
                                        $sql = $usuarioListar->selectUsuario();
                                    }
                                    ?>
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
