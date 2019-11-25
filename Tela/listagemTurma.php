<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once '../Base/header.php';
    include_once '../Base/nav.php';
    include_once '../Controle/turmaPDO.php';
    include_once '../Controle/cursoPDO.php';
    include_once '../Modelo/Curso.php';
    include_once '../Modelo/Turma.php';
    $turmaPDO = new TurmaPDO();
    $cursoPDO = new CursoPDO();
    $stmtCurso = $cursoPDO->selectCursoId_curso($_GET['id_curso']);
    $curso = new curso($stmtCurso->fetch());
    $stmtTurma = $turmaPDO->selectTurmaId_curso($_GET['id_curso']);
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="row">
    <div class="card z-depth-3 col s12 m12 l10 offset-l1">
        <div class="row">
            <h5 class="center">Turmas do curso <?php echo $curso->getNome() ?></h5>
        </div>
        <div class="row">
            <?php
                if ($stmtTurma) {
                    $turmas = $stmtTurma->fetchAll();?>
                    <table class="col s10 offset-s1 hide-on-small-only hide-on-med-only">
                        <thead>
                        <tr>
                            <th class="center">Nome</th>
                            <th class="center">Ano inicial</th>
                            <th class="center">Ano Término</th>
                            <th class="center">Deletar</th>
                        </tr>
                        <?php
                            foreach ($turmas as $linha) {
                                $turma = new turma($linha);
                                ?>
                                <tr>
                                    <td class="center"><?php echo $turma->getNome(); ?></td>
                                    <td class="center"><?php echo $turma->getAno_inicio(); ?></td>
                                    <td class="center"><?php echo $turma->getAno_fim(); ?></td>
                                    <td class="center"><a
                                                href="../Controle/turmaControle.php?function=deletar&id_turma=<?php echo $turma->getId(); ?>&id_curso=<?php echo $_GET['id_curso'] ?>" class="btn red darken-3">Deletar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                        </thead>
                    </table>
                    <?php
                } else {
                    echo "<h5 class='center'>Nenhuma turma encontrado</h5>";
                }
            ?>
        </div>
        <div class="row center">
            <a href="./listagemCurso.php" class="btn">Voltar</a>
        </div>
    </div>
</div>
<?php
    include_once '../Base/footer.php';
?>
</body>
</html>
