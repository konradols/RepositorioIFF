<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once '../Base/header.php';
    include_once '../Base/nav.php';
    include_once '../Controle/cursoPDO.php';
    include_once '../Controle/turmaPDO.php';
    include_once '../Modelo/Curso.php';
    include_once '../Modelo/Turma.php';
    $cursoPDO = new CursoPDO();
    $turmaPDO = new TurmaPDO();
    $stmtCurso = $cursoPDO->selectCursoId_curso($_GET['id_curso']);
    $curso = new curso($stmtCurso->fetch());
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="row">
    <div class="card z-depth-3 col s12 m12 l10 offset-l1">
        <div class="row">
            <h5 class="center">Cadastrar turma para o curso <?php echo $curso->getNome() ?></h5>
            <form action="../Controle/turmaControle.php?function=inserirTurma" method="post">
                <input type="text" hidden name="id_curso" value="<?php echo $curso->getIdCurso() ?>">
                <div class="row">
                    <div class="input-field col l10 m10 s10 offset-l1 offset-m1 offset-s1">
                        <input id="nome" type="text" class="validate" required name="nome">
                        <label for="nome">Nome da turma</label>
                    </div>
                    <div class="input-field col l5 m5 s10 offset-l1 offset-m5 offset-s1">
                        <input id="ano_inicio" type="number" class="validate" required name="ano_inicio">
                        <label for="ano_inicio">Ano de inicio</label>
                    </div>
                    <div class="input-field col s5 m5 s10 offset-s1">
                        <input id="ano_fim" type="number" class="validate" required name="ano_fim">
                        <label for="ano_fim">Ano de término</label>
                    </div>
                </div>
                <div class="row center">
                    <a href="./listagemCurso.php" class="btn">Voltar</a>
                    <input type="submit" class="btn green darken-3" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include_once '../Base/footer.php';
?>
</body>
</html>
