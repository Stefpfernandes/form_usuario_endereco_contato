<?php
session_start();

// conexão com o banco de dados
include_once("../conexao.php");


// receber os dados do endereço
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];


// INSERIR NO BANCO DE DADOS - endereco

    $sqlUpdate = "INSERT INTO enderecos SET titulo='$titulo', logradouro='$logradouro', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep', usuario_id='$id'";
    $resultado_endereco = $conn->query($sqlUpdate);

// VERIFICAR SE SALVOU COM SUCESSO

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;' 'text-aling: center;'> Usuário cadastrado com sucesso</p>";
    header("Location: formularioEndereco.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;' 'text-aling: center;'> Usuário cadastrado incorretamente, tente novamente!</p>";
    header("Location: formularioEndereco.php");
}

