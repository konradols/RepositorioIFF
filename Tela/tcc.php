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

        <div class="container">

            <div class="row">
                <div class="col l12 card">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">library_books</i>Usabilidade nos repositórios digitais de monografias das instituições públicas de ensino superior brasileiras</div>
                            <div class="collapsible-body">
                                <a href="#">Autores</a>
                                <a style="margin-left: 100px;" href="#">Orientadores</a>
                                <a style="margin-left: 100px;" href="../Jovana Lopes.pdf" target="_blank">Arquivo PDF</a>
                                <span style="margin-left: 200px;">Publicado em:</span>
                                <span style="margin-left: 633px;">Submetido em:</span>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">library_books</i>Arquitetura da informação para biblioteca digital personalizável</div>
                            <div class="collapsible-body">
                                <a href="#">Autores</a>
                                <a style="margin-left: 100px;" href="#">Orientadores</a>
                                <a style="margin-left: 100px; "href="../Liriane Soares.pdf" target="_blank">Arquivo PDF</a>
                                <span style="margin-left: 200px;">Publicado em:</span>
                                <span style="margin-left: 633px;">Submetido em:</span>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">library_books</i>Organização da informação em repositórios digitais: implicações do auto-arquivamento na representação da informação</div>
                            <div class="collapsible-body">
                                <a href="#">Autores</a>
                                <a style="margin-left: 100px;" href="#">Orientadores</a>
                                <a style="margin-left: 100px;" href="../Graziela Martins.pdf" target="_blank">Arquivo PDF</a>
                                <span style="margin-left: 200px;">Publicado em:</span>
                                <span style="margin-left: 633px;">Submetido em:</span>
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
