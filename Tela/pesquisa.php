<!DOCTYPE html>
<?php
include_once '../Base/header.php';
include_once '../Base/nav.php';
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
                        <form name="pesquisaTrabalhos" action="./listagem.php" method="POST">
                            <table>
                                <tr>
                                    <td>
                                        <label for="select">Filtrar por</label>
                                        <div class="input-field col s12 center" style="margin-top: 3px;">
                                            <select class="browser-default" name="select" required="true">
                                                <option value="Trabalho">Todos</option>
                                                <option value="TrabalhoCategoria">Categoria</option>
                                                <option value="naoImplementadoNoMomento">Área</option>
                                                <option value="naoImplementadoNoMomento">Palavra-Chave</option>
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
