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
                if(isset($_GET['id_usuario'])){
                    $usuarioPDO = new UsuarioPDO();
                    $logado = $usuarioPDO->selectUsuarioId($_GET['id_usuario']);
                    $logado = new usuario($logado->fetch());
                }else {
                    $logado = new usuario(unserialize($_SESSION['usuario']));
                }
                ?>
                            <!--<span style="margin-left: -600px;"><?php // echo $logado->getEmail();     ?></span>-->
                <?php
            }
            if (isset($_SESSION['usuarioPerfil'])) {
                
            }
?>
            <br>
            <div class="row">
                <div class="col l12 z-depth-5">
                    <div class="col l4">
                        <div class="card">
                            <div class="card-image">
                                <img class="z-depth-1" src="../<?php echo $logado->getFoto(); ?>" alt="">
                            </div>
                        </div>
                        <div class="row col offset-s2">
                            <a href="alteraFotoPerfil.php?id_usuario=<?php echo $logado->getIdUsuario(); ?>" class="btn "><i class="material-icons left">edit</i>Alterar Foto</a>
                        </div>
                    </div>

                    <div class="col l8">
                        <div class="card">
                            <div class="card-content black-text">
                                <span class="card-title">Usuário</span>
                                <p>Nome: <?php echo $logado->getNome(); ?></p>
                                <p>Tipo de Usuário: <?php
                                    switch ($logado->getCategoria()) {
                                        case 'aluno':
                                            echo "Aluno";
                                            break;
                                        case 'orienteador':
                                            echo "Orientador";
                                            break;
                                        case 'coordenador':
                                            echo "Coordenador";
                                            break;
                                        default: echo "erro";
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
                                $sql = $trabalhoListar->selectTrabalhoId_usuario($logado->getIdUsuario());
//                        }
                                if ($sql != false) {
                                    while ($resultado = $sql->fetch()) {
                                        $tr = new trabalho($resultado);
                                        ?>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons">library_books</i><?php echo $tr->getNome(); ?></div>
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
                                }else{
                                    echo "<h5>Nada Encontrado nas submições</h5>";
                                }
                                ?>



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
