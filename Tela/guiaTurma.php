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


include_once '../Controle/conexao.php';
include_once '../Controle/cursoPDO.php';
include_once '../Controle/turmaPDO.php';
include_once '../Controle/trabalhoPDO.php';
include_once '../Modelo/Usuario.php';
include_once '../Modelo/Trabalho.php';
include_once '../Modelo/Curso.php';
include_once '../Modelo/Turma.php';

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
                $cursoPDO = new CursoPDO();
                $turmaPDO = new TurmaPDO();
                $trabalhoPDO = new TrabalhoPDO();
                $stmtCurso = $cursoPDO->selectCurso();
                if ($stmtCurso != false) {
                    while ($resultadoCurso = $stmtCurso->fetch()) {
                        $curso = new curso($resultadoCurso);
                        ?>
                        <li>
                            <div class="collapsible-header"><?php echo $curso->getNome(); ?></div>
                            <div class="collapsible-body">
                                <ul class="collapsible">
                                    <?php
                                    $stmtTurma = $turmaPDO->selectTurmaId_curso($curso->getIdCurso());
                                    if ($stmtTurma) {
                                        while ($resultadoTurma = $stmtTurma->fetch()) {
                                            $turma = new turma($resultadoTurma);
                                            ?>
                                            <li>
                                                <div class="collapsible-header"><?php echo $turma->getNome(); ?></div>
                                                <div class="collapsible-body">
                                                    <ul class="collapsible">
                                                        <?php $stmtTrabalho = $trabalhoPDO->selectTrabalhoIdTurma($turma->getIdTurma());
                                                        if ($stmtTurma) {
                                                            while ($resultadoTrabalho = $stmtTrabalho->fetch()) {
                                                                $tr = new trabalho($resultadoTrabalho);
                                                                ?>
                                                                <li>
                                                                    <div class="collapsible-header"><i
                                                                                class="material-icons">description</i><?php echo $tr->getNome(); ?>
                                                                    </div>
                                                                    <div class="collapsible-body">
                                                                        <div class="row">
                                                                            <div class="col l3 s12">
                                                                                <p>Autores:</p>
                                                                                <?php
                                                                                $autores = explode(",", $tr->getAutores());
                                                                                foreach ($autores as $atutor) {
                                                                                    echo "<p>" . $atutor . "</p>";
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <div class="col l3 s12">
                                                                                <p>Orientadores:</p>
                                                                                <?php
                                                                                $orientadores = explode(",", $tr->getOrientadores());
                                                                                foreach ($orientadores as $orientador) {
                                                                                    echo "<p>" . $orientador . "</p>";
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
                                                                                <p class="right"
                                                                                   style="margin-top: -3px; margin-right: 110px;">
                                                                                    Submetido
                                                                                    em: <?php echo $tr->getData_submissao(); ?></p>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </li>

                                            <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                } else {
                    echo "<h5>Nenhum Resultado</h5>";
                }
                ?>
            </ul>
        </div>
    </div>

</div>

<script>

    $(document).ready(function () {
        $('.modal').modal();
    });

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
