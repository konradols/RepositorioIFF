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
        <title>Protótipo Home Page</title>
    </head>
    <body>

        <div class="container">

            <?php
            include_once '../Modelo/Usuario.php';
            if (isset($_SESSION['usuario'])) {
                $logado = new usuario(unserialize($_SESSION['usuario']));
                ?>
                            <!--<span style="margin-left: -600px;"><?php // echo $logado->getEmail();     ?></span>-->
                <?php
            }
            if (isset($_SESSION['usuarioPerfil'])) {
                
            }
?>

            <div class="row">
                <div class="col l12 z-depth-5">
                    <div class="col l4">
                        <div class="card">
                            <div class="card-image">
                                <img class="z-depth-1" src="../Img/trabalhoDigital.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!--                    <a href="../Update/alterarFotoPerfil.php">
                                            <div  class="fotoPerfil" style='background-image: url("../Img/trabalhoDigital.jpg");
                                                  background-size: cover;
                                                  background-position: center;
                                                  background-repeat: no-repeat;'>
                                                <div class="linkfoto white-text">Alterar Foto</div>            
                                            </div>
                                        </a>-->
                    <div class="col l7">
                        <div class="card">
                            <div class="card-content black-text">
                                <span class="card-title">Usuário</span>
                                <p>Nome: <?php echo $logado->getNome(); ?></p>
                                <p>Tipo de Usuário: <?php
                                    switch ($logado->getCategoria()) {
                                        case 'aluno':
                                            echo "Aluno";
                                            break;
                                        case 'orientador':
                                            echo "Orientador";
                                            break;
                                        case 'coordenador':
                                            echo "Coordenador";
                                            break;
                                    }
                                    ?></p>
                                <p>E-mail: <?php echo $logado->getEmail(); ?></p>
                            </div>
                            <!--                            <div class="card-action">
                                                            <a href="#">Editar</a>
                                                        </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l12">
                            <div class="card">
                                <div class="card-content black-text">
                                    <span class="card-title">Última divulgação</span>
                                    <p>Front-end do Repositório Digital do IFFar SVS</p>
                                    <?php
//                                        include_once '../Controle/trabalhoPDO.php';
//                                        $trPDO = new TrabalhoPDO();
//                                    $nomeDoTrabalho = $trPDO->selectTrabalhoNomePorId_Usuario($logado->getId());
//                                    echo $nomeDoTrabalho . "";
//                                    
                                    ?>
                                </div>
                                <div class="card-action">
                                    <a href="#">Acessar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l12 card">
                            <ul class="collapsible">
                                <?php
                                include_once '../Controle/trabalhoPDO.php';
                                $trabalhoListar = new trabalhoPDO();
//                        if (isset($_POST['pesquisar'])) {
//                            $pesquisa = $_POST['pesquisar'];
//                            $metodo = $_POST['select'];
//                            $sql = $trabalhoListar->$metodo($pesquisa);
//                        } else {
                                $sql = $trabalhoListar->selectTrabalhoId_usuario($logado->getId());
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
                                                <span style="margin-left: 200px;">Publicado em:</span>
                                                <span style="margin-left: 633px;">Submetido em: <?php echo $tr->getData_submissao(); ?></span>
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
