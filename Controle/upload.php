<?php

include_once './conexao.php';
echo var_dump($_POST);

$conexao = new conexao();
$PDO = $conexao->getConexao();
$msg = false;

if (isset($_FILES['arquivo'])) {
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "upload/";
    $nome = $_POST['nome'];
    $resumo = $_POST['resumo'];
    $categoria = $_POST['categoria'];

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

    $sql_code = $PDO->prepare("INSERT INTO trabalho VALUES (default, null, '$nome', '$resumo', '$categoria', NOW(), Controle/upload/" . "'$novo_nome', null, null, null)");
    if($sql_code->execute()) {
        $msg = "Arquivo enviado com sucesso!";
        header('Location: ../Tela/telaUpload.php?msg=sucesso');
    }else{
        $msg = "Falha ao enviar!";
        header('Location: ../Tela/telaUpload.php?msg=falha');
    }
}
?>


<!--<h1>Upload de Arquivos</h1>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" required name="arquivo">
    <input type="submit" value="Salvar">
</form>-->

