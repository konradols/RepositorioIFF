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
        <div class="row">
            <div class="col s3 m3 l10" style="margin-left: 300px; margin-right: auto;">
                <div class="col l8 card">
                    <h5 class="center">Pesquisa de Trabalhos</h5>
                    <div class="col l12" style="margin-left: 100px;">
                        <table>
                            <td>
                                <input type="text" name="pesquisa" placeholder="Pesquise">
                            </td>
                            <td>
                                <input type="submit" id="btn-pesquisar" class="btn corpadrao inline" value="Pesquisar">
                            </td>
                        </table>
                    </div>

                    <br/><br/><br/><br/>
                    <ul class="collapsible">
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
