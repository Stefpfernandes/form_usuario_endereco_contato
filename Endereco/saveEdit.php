<?php
session_start();

// conexão com o banco de dados
include_once("../conexao.php");

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    $sqlUpdate = "UPDATE enderecos SET titulo='$titulo', logradouro='$logradouro', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' WHERE id='$id'";

    $result = $conn->query($sqlUpdate);

header('Location: tabelaEndereco.php');

?>
