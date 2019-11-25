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
<main>
<div class="row">
    <form action="pesquisa.php" method="post">
        <div class="col s12 m10 l8 offset-l2 offset-m1 card">

            <div class="row center">
                <div class="row"></div>
                <h5>Pesquisar Trabalhos</h5>

                <div class="input-field col s12 l4">
                    <select name="categoria">
                        <option value="%%">Todos</option>
                        <option value="%tcc%" <?php echo isset($_POST['categoria'])?$_POST['categoria']=="%tcc%"?"selected":"":""; ?>>TCC</option>
                        <option value="%relatorio%" <?php echo isset($_POST['categoria'])?$_POST['categoria']=="%relatorio%"?"selected":"":""; ?>>Relatórios</option>
                        <option value="%producaocientifica%" <?php echo isset($_POST['categoria'])?$_POST['categoria']=="%producaocientifica%"?"selected":"":""; ?>>Produções científicas</option>
                    </select>
                </div>
                <div class="input-field col s12 l4">
                    <select name="campo">
                        <option value="">Qualquer</option>
                        <option value="nome" <?php echo isset($_POST['campo'])?$_POST['campo']=="nome"?"selected":"":""; ?>>Nome Trabalho</option>
                        <option value="autores" <?php echo isset($_POST['campo'])?$_POST['campo']=="autores"?"selected":"":""; ?>>Autor</option>
                        <option value="orientadores" <?php echo isset($_POST['campo'])?$_POST['campo']=="orientadores"?"selected":"":""; ?>>Orientador</option>
                        <option value="resumo" <?php echo isset($_POST['campo'])?$_POST['campo']=="resumo"?"selected":"":""; ?>>Resumo</option>
                        <option value="palavras_chave" <?php echo isset($_POST['campo'])?$_POST['campo']=="palavras_chave"?"selected":"":""; ?>>Palavra Chave</option>
                    </select>
                </div>
                <div class="input-field col s12 l4">
                    <input type="text" name="valor" id="valor" value="<?php echo isset($_POST['valor'])?$_POST['valor']:""; ?>">
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
</main>
<?php
include_once '../Base/footer.php';
?>
</body>
</html>
