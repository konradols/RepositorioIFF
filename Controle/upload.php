<?php

include_once './conexao.php';

$conexao = new conexao();
$PDO = $conexao->getConexao();
$msg = false;

if (isset($_FILES['arquivo'])) {
    $extensao = strtolower(substr($_FILES['arquivo']['name'], $diretorio . $novo_nome));
    $NOvo_nome = md5(time() . $extensao);
    $diretorio = "upload/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

    $sql_code = "INSERT INTO arquivo VALUES (null, '$novo_nome', NOW())";
    if($PDO->query($sql_code)) {
        $msg = "Arquivo enviado com sucesso!";
    }else{
        $msg = "Falha ao enviar!";
    }
}
?>

<h1>Upload de Arquivos</h1>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" required name="arquivo">
    <input type="submit" value="Salvar">
</form>

