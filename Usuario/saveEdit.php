<?php
session_start();

// conexão com o banco de dados
include_once("../conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $nomedamae = $_POST['nomedamae'];

    $sqlUpdate = "UPDATE usuarios SET nome='$nome', rg='$rg', cpf='$cpf', nome_mae='$nomedamae', modified=NOW() WHERE id='$id'";

    $result = $conn->query($sqlUpdate);

header('Location: tabelaUsuario.php');

?>
