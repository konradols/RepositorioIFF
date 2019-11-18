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

switch ($_POST['select']) {
    case "Trabalho":
        header("Location: ./listagemPesquisa.php?msg=Trabalho");
        break;
    case "TrabalhoCategoria":
        header("Location: ./listagemPesquisa.php?msg=TrabalhoCategoria");
        break;
    case "TrabalhoNome":
        header("Location: ./listagemPesquisa.php?msg=TrabalhoNome");
        break;
    case "TrabalhoData_submissao":
        header("Location: ./listagemPesquisa.php?msg=TrabalhoData_submissao");
        break;
    case "UsuarioNome":
        header("Location: ./listagemPesquisa.php?msg=UsuarioNome");
        break;
    case "TurmaNome":
        header("Location: ./listagemPesquisa.php?msg=TurmaNome");
        break;
    case "CursoNome":
        header("Location: ./listagemPesquisa.php?msg=TurmaNome");
        break;
}
?>
