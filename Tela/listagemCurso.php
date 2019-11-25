<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once '../Base/header.php';
    include_once '../Base/nav.php';
    include_once '../Controle/cursoPDO.php';
    include_once '../Modelo/Curso.php';
    $cursoPDO = new CursoPDO();
    $stmtCurso = $cursoPDO->selectCurso();
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<main>
<div class="row">
    <div class="card z-depth-3 col s12 m12 l10 offset-l1">
        <div class="row">

            <h5 class="center">Cadastrar curso</h5>
            <form action="../Controle/cursoControle.php?function=inserirCurso" method="post">
                <div class="input-field col s10 offset-l1">
                    <input id="nome" type="text" class="validate" name="nome">
                    <label for="nome">Nome do Curso</label>
                </div>
                <div class="row center">
                    <input type="submit" class="btn green darken-3" value="Cadastrar">

                </div>
            </form>
        </div>
        <div class="row">
            <?php
                if ($stmtCurso) {
                    $cursos = $stmtCurso->fetchAll();
                    ?>
                    <table class="col s10 offset-s1 hide-on-small-only hide-on-med-only">
                        <thead>
                        <tr>
                            <th class="center">Nome</th>
                            <th class="center">Ver Turmas</th>
                            <th class="center">Ação</th>
                        </tr>
                        <?php
                            foreach ($cursos as $linha) {
                                $curso = new curso($linha);
                                ?>
                                <tr>
                                    <td class="center"><?php echo $curso->getNome(); ?></td>
                                    <td class="center"><a href="./listagemTurma.php?id_curso=<?php echo $curso->getIdCurso()?>" class="btn">Ver turmas</a></td>
                                    <td class="center"><a href="./registroTurma.php?id_curso=<?php echo $curso->getIdCurso()?>" class="btn green darken-3">Adicionar Turma</a></td>
                                </tr>
                                <?php
                            }
                        ?>
                        </thead>
                    </table>
                    <?php
                } else {
                    echo "<h5 class='center'>Nenhum curso encontrado</h5>";
                }
            ?>
        </div>
    </div>
</div>
</main>
<?php
    include_once '../Base/footer.php';
?>
</body>
</html>
