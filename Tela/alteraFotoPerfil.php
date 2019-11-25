<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once '../Base/header.php';
    include_once '../Base/nav.php';
    include_once '../Controle/usuarioPDO.php';
    include_once '../Modelo/Usuario.php';
    $usuarioPDO = new UsuarioPDO();
    $stmtUsuarios = $usuarioPDO->selectUsuario();
    $usuarios = $stmtUsuarios->fetchAll();
?>
<html>
<body>
<main>
<?php
    include_once '../Modelo/Usuario.php';
    if (isset($_SESSION['usuario'])) {
        $logado = new usuario(unserialize($_SESSION['usuario']));
    }
    if($logado->getIdUsuario() == $_GET['id_usuario']) {
        ?>
        <main>
            <div class="row center">
                <div class="card z-depth-3 col s12 m12 l10 offset-l1">
                    <div class="row">
                        <h5 class="center">Alterar foto perfil</h5>
                    </div>
                    <form class="col s12"
                          action="../Controle/usuarioControle.php?function=updateFotoPerfil&id_usuario=<?php echo $_GET['id_usuario'] ?>"
                          method="post" enctype="multipart/form-data">
                        <input type="file" class="file-chos" id="btnFile" name="arquivo"
                               accept=".jpg,.jpeg,.bmp,.png,.jfif,.svg,.webp" hidden required="true">
                        <input class="file-path validate" type="text" hidden="true">
                        <div class="row center" style="margin-top: 1vh;">
                            <h5>Pré Visualização</h5>
                            <img class="prev-img" style="
                              max-height: 200px;
                              width: auto;
                              background-size: cover;
                              background-position: center;
                              background-repeat: no-repeat;
                              ">
                        </div>
                        <div class="row center">
                            <a id="selecionaFoto" href="#!" class="btn waves-effect  corPadrao2">Selecionar</a>
                            <script>
                                $("#selecionaFoto").click(function () {
                                    $("#btnFile").click();
                                });
                            </script>
                        </div>
                        <div class="row center">
                            <a href="./perfil.php" class="btn waves-effect">Voltar</a>
                            <button type="submit" name="SendCadImg" value="true" class="btn waves-effect corPadrao2">
                                Confirmar
                            </button>
                        </div>
                    </form>
                </div>
                <script>
                    const $ = document.querySelector.bind(document);
                    const previewImg = $('.prev-img');
                    const fileChooser = $('.file-chos');

                    fileChooser.onchange = e => {
                        const fileToUpload = e.target.files.item(0);
                        const reader = new FileReader();

                        // evento disparado quando o reader terminar de ler
                        reader.onload = e => previewImg.src = e.target.result;

                        // solicita ao reader que leia o arquivo
                        // transformando-o para DataURL.
                        // Isso disparará o evento reader.onload.
                        reader.readAsDataURL(fileToUpload);
                    };
                </script>
            </div>
            </div>
        </main>
        <?php
    } else {
        $_SESSION['toast'][]= 'Você não tem permissão para acessar essa página';
        header("Location: ../index.php");
    }
?>
<script>
    $('.collapsible').collapsible();
</script>
</main>
<?php
    include_once '../Base/footer.php';
?>
</body>
</html>
