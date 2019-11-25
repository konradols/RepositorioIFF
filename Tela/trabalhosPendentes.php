<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once '../Base/header.php';
    include_once '../Base/nav.php';
    include_once '../Controle/trabalhoPDO.php';
    include_once '../Modelo/Trabalho.php';
    $trabalhoPDP = new TrabalhoPDO();
    $trabalhoListar = new trabalhoPDO();
    $sql = $trabalhoListar->selectTrabalhoPendente();
?>
<html>
<body>
<main>
    <div class="row center">
        <div class="card z-depth-3 col s12 m12 l10 offset-l1">
            <div class="row">
                <h5 class="center">Listagem Trabalhos pendentes</h5>
            </div>
            <div class="row">
                <?php
                    if ($sql) {
                ?>
                <div class="col l12">
                    <ul class="collapsible">
                        <?php
                            while ($resultado = $sql->fetch()) {
                                $tr = new trabalho($resultado);
                                ?>
                                <li>
                                    <div class="collapsible-header"><i
                                                class="material-icons">library_books</i><?php echo $tr->getNome(); ?>
                                    </div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col l3 s12">
                                                <p>Autores:</p>
                                                <?php
                                                    $autores = explode(",", $tr->getAutores());
                                                    foreach ($autores as $atutor) {
                                                        echo "<p>".$atutor."</p>";
                                                    }
                                                ?>
                                            </div>
                                            <div class="col l3 s12">
                                                <p>Orientadores:</p>
                                                <?php
                                                    $orientadores = explode(",", $tr->getOrientadores());
                                                    foreach ($orientadores as $orientador) {
                                                        echo "<p>".$orientador."</p>";
                                                    }
                                                ?>
                                            </div>
                                            <div class="col s12 l3">
                                                <a style="margin-left: 100px;"
                                                   href="../Controle/<?php echo $tr->getCaminho(); ?>"
                                                   target="_blank">Arquivo
                                                    PDF</a>
                                            </div>
                                            <div class="col s12 l3">
                                                <p class="right" style="margin-top: -3px; margin-right: 110px;">
                                                    Submetido
                                                    em: <?php echo $tr->getData_submissao(); ?></p>
                                            </div>
                                        </div>
                                        <div class="row center">
                                            <a href="../Controle/trabalhoControle.php?function=aceitar&id_trabalho=<?php echo $tr->getId_trabalho() ?>"
                                               class="btn green darken-3">Aceitar Publicação</a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            <?php
                } else {
                echo "<h5>Nada Encontrado nas submições</h5>";
            }
            ?>
            </div>
            <div class="row">
                <a href="../index.php" class="btn waves-effect">Voltar</a>
            </div>
        </div>
    </div>
</main>
<script>
    $('.collapsible').collapsible();
</script>
<?php
    include_once '../Base/footer.php';
?>
</body>
</html>
