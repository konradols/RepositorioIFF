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
        header("Location: ./listagemPesquisa.php?msg=Trabalho&c=" . $_POST['pesquisa']);
        break;
    case "TrabalhoCategoria":
        header("Location: ./listagemPesquisa.php?msg=TrabalhoCategoria&c=" . $_POST['pesquisa']);
        break;
    case "TrabalhoNome":
        header("Location: ./listagemPesquisa.php?msg=TrabalhoNome&c=" . $_POST['pesquisa']);
        break;
    case "TrabalhoData_submissao":
        header("Location: ./listagemPesquisa.php?msg=TrabalhoData_submissao&c=" . $_POST['pesquisa']);
        break;
    case "UsuarioNome":
        header("Location: ./listagemPesquisa.php?msg=UsuarioNome&c=" . $_POST['pesquisa']);
        break;
    case "TurmaNome":
        header("Location: ./listagemPesquisa.php?msg=TurmaNome&c=" . $_POST['pesquisa']);
        break;
    case "CursoNome":
        header("Location: ./listagemPesquisa.php?msg=TurmaNome&c=" . $_POST['pesquisa']);
        break;
}
?>
