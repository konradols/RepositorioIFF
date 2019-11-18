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
                        $usuarioListar = new usuarioPDO();
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
                                $sqlUsuario = $usuarioListar->selectUsuarioId($tr->getId_usuario());
//                                echo var_dump($sqlUsuario);
                                $u = new usuario($sqlUsuario);
                                ?>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">library_books</i><?php echo $tr->getNome(); ?></div>
                                    <div class="collapsible-body">
                                        <p class="left-align">Autor: <?php echo $u->getNome(); ?></p>
                                        <p class="left-align">Categoria: <?php
                                            switch ($tr->getCategoria()){
                                                case "tcc":
                                                    echo "TCC";
                                                    break;
                                                case "relatorio":
                                                    echo "Relatório";
                                                    break;
                                                case "producaocientifica":
                                                    echo "Produção Científica";
                                                    break;
                                            }
                                            ?></p>
                                        <p class="left-align">Resumo: <?php echo $tr->getResumo(); ?></p>
                                        <p class="left-align">Submetido em: <?php echo $tr->getData_submissao(); ?></p>
                                        <a class="left-align" href="<?php echo "../Controle/" . $tr->getCaminho(); ?>" target="_blank">Arquivo</a>
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
