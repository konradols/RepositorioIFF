<!DOCTYPE html>
<?php
include_once '../Base/header.php';
include_once '../Base/nav.php';
include_once '../Controle/conexao.php';
include_once '../Controle/trabalhoPDO.php';
include_once '../Controle/cursoPDO.php';
include_once '../Controle/turmaPDO.php';
include_once '../Modelo/Usuario.php';
include_once '../Modelo/Trabalho.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Protótipo Home Page</title>
</head>
<body>

<div class="row">
    <form action="pesquisa.php" method="post">
        <div class="col s12 m10 l8 offset-l2 offset-m1 card">

            <div class="row center">
                <div class="row"></div>
                <h5>Pesquisar Trabalhos</h5>

                <div class="input-field col s12 l4">
                    <select name="categoria">
                        <option value="%%">Todos</option>
                        <option value="%tcc%">TCC</option>
                        <option value="%relatorio%">Relatórios</option>
                        <option value="%producaocientifica%">Produções científicas</option>
                    </select>
                </div>
                <div class="input-field col s12 l4">
                    <select name="campo">
                        <option value="">Qualquer</option>
                        <option value="nome">Nome Trabalho</option>
                        <option value="autores">Autor</option>
                        <option value="orientadores">Orientador</option>
                        <option value="resumo">Resumo</option>
                        <option value="palavras_chave">Palavra Chave</option>
                    </select>
                </div>
                <div class="input-field col s12 l4">
                    <input type="text" name="valor" id="valor">
                    <label for="valor">Pesquisa</label>
                </div>


            </div>

            <div class="row center">
                <button type="submit" class="btn">Pesquisar</button>
                <a class="btn" href="guiaTurma.php">Guia por Turmas</a>
            </div>
        </div>
    </form>
</div>

<?php
if (isset($_POST['valor'])) {
    ?>
    <br>
    <div class="row">
        <div class="col s12 m10 l8 offset-l2 offset-m1">
            <div class="row card center">
                <ul class="collapsible">
                    <?php
                    $trabalhoListar = new trabalhoPDO();
                    $sql = $trabalhoListar->pesquisaTrabalhos($_POST);
                    if ($sql != false) {
                        while ($resultado = $sql->fetch()) {
                            $tr = new trabalho($resultado);
                            ?>
                            <li>
                                <div class="collapsible-header"><i
                                            class="material-icons">description</i><?php echo $tr->getNome(); ?></div>
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
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <?php
}
?>

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


<script>


    $(document).ready(function () {
        $('.collapsible').collapsible();
    });
</script>
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>

<?php
include_once '../Base/footer.php';
?>
</body>
</html>
