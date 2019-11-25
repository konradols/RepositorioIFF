<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once '../Base/header.php';
    include_once '../Base/nav.php';
    ?>
</head>
<main>
<div class="">
    <?php
    include_once '../Modelo/Usuario.php';
    include_once '../Modelo/Curso.php';
    include_once '../Controle/cursoPDO.php';
    $logado = new usuario(unserialize($_SESSION['usuario']));
    ?>
    <div class="row">
        <div class="">

            <div class="card center z-depth-4 col s12 l8 m10 offset-l2 offset-m1">
                <div class="card-content">
                    <span class="card-title">Envio de Arquivos</span>
                    <!--action="../Controle/trabalhoControle.php?function=inserirTrabalho"-->
                    <!--action="../Controle/teste.php"-->
                    <form method="POST" action="../Controle/trabalhoControle.php?function=inserirTrabalho"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col l6 s12">
                                <textarea name="nome" required="true" class="materialize-textarea"></textarea>
                                <label for="nome">Nome do Trabalho</label>
                            </div>
                            <div class="input-field col l6 s12">
                                <select name="categoria" required="true">
                                    <option value="tcc">TCC</option>
                                    <option value="relatorio">Relatório</option>
                                    <option value="producaocientifica">Produção Científica</option>
                                </select>
                                <label for="categoria">Categoria</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l6 s12">
                                <input type="text" name="autores" required="true" placeholder="Autor1, Autor2, [...]">
                                <label for="autores">Autores</label>
                            </div>
                            <div class="input-field col l6 s12">
                                <input type="text" name="orientadores" required="true"
                                       placeholder="Orientador1, Orientador2, [...]">
                                <label for="orientadores">Orientadores(as)</label>
                            </div>
                            <div class="input-field col l6 s12">
                                <input type="text" name="coorientadores"
                                       placeholder="Coorientador1, Coorientador2, [...]">
                                <label for="coorientadores">Coorientadores(as)</label>
                            </div>
                            <div class="input-field col l6 s12">
                                <input type="text" name="palavras_chave"
                                       placeholder="palavra1. palavra2. palavra3. [...]">
                                <label for="palavras_chave">Palavras-Chave</label>
                            </div>
                            <div class="input-field col l12 s12">
                                <textarea id="textarea" class="materialize-textarea" name="resumo"
                                          required="true"></textarea>
                                <label for="textarea">Resumo</label>
                            </div>
                            <div class="input-field col l6 s12">
                                <select id="curso" name="curso" required>
                                    <option value='' disabled selected>Selecione o curso</option>
                                    <?php
                                    $cursoPDO = new CursoPDO();
                                    $cursos = $cursoPDO->selectCurso();
                                    if ($cursos) {
                                        while ($linha = $cursos->fetch()) {
                                            $curso = new curso($linha);
                                            echo "<option value='" . $curso->getIdCurso() ."'>".$curso->getNome()."</option>";
                                        }
                                    }else{
                                        echo "<option value='' disabled selected>Nenhum curso selecionado</option>";
                                    }
                                    ?>
                                </select>
                                <label for="curso">Selecionar curso</label>
                            </div>
                            <div class="input-field col l6 s12">
                                <select name="id_turma" id="id_turma">
                                    <option value='' disabled selected>Nenhum curso selecionado</option>
                                </select>
                                <label for="id_turma">Selecione a Turma</label>
                            </div>
                            <div class="file-field input-field col s12 l12">
                                <h5>Selecione o arquivo a ser submetido</h5>
                                <button class="btn corpadrao">
                                    <div>Upload</div>
                                </button>
                                <input type="file" class="file-chos" name="arquivo" required="true"
                                       accept="application/pdf">
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="row center">
                                <div class="col l6 offset-l3 col s12">
                                    <input type="password" name="senha" id="senha" required="true">
                                    <label for="senha">Senha</label>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn corpadrao col s4 offset-s4" name="SendCadImg"
                                        value="true">Submeter
                                </button>
                                <?php $_SESSION['usuario'] = serialize($logado); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
    $("#curso").change(function () {
        $("#id_turma").load("../Controle/turmaControle.php?function=getSelectId&id_curso="+$(this).val(), function () {
            $('select').formSelect();
        });
    });
</script>
</main>
<?php
include_once '../Base/footer.php';
?>
</body>
</html>