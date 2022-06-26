<?php
session_start();

// conexão com o banco de dados
include_once("../conexao.php");

    $id = $_POST['id'];
    $nome_telefone = $_POST['nome_telefone'];
    $telefone = $_POST['telefone'];
    $operadora = $_POST['operadora'];
    $nome_email = $_POST['nome_email'];
    $email = $_POST['email'];

    $sqlUpdate = "UPDATE telefone SET nome_telefone='$nome_telefone', telefone='$telefone', operadora='$operadora' WHERE id='$id'";
    
    $result = $conn->query($sqlUpdate);

    $sqlUpdate = "UPDATE email SET nome_email='$nome_email', email='$email' WHERE id='$id'";
    $result = $conn->query($sqlUpdate);

header('Location: tabelaContato.php');

?>
