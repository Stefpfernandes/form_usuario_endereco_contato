<?php
session_start();

// conexão com o banco de dados
include_once("../conexao.php");

//ID USUARIO 

    $id = $_POST['id'];

// DADOS DO TELEFONE
    
    $nome_telefone = $_POST['nome_telefone'];
    $telefone = $_POST['telefone'];
    $operadora = $_POST['operadora'];

// DADOS DO EMAIL  

    $nome_email = $_POST['nome_email'];
    $email = $_POST['email'];

// INSERIR NO BANCO DE DADOS - telefone

    $sqlUpdate = "INSERT INTO telefone SET nome_telefone='$nome_telefone', telefone='$telefone', operadora='$operadora', usuario_id='$id'";
    $resultado_telefone = $conn->query($sqlUpdate);

// INSERIR NO BANCO DE DADOS - email

    $sqlUpdate = "INSERT INTO email SET nome_email='$nome_email', email='$email', usuario_id='$id'";
    $resultado_email = $conn->query($sqlUpdate);

// VERIFICAR SE SALVOU COM SUCESSO

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;' 'text-aling: center;'> Usuário cadastrado com sucesso</p>";
    header("Location: formularioContato.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;' 'text-aling: center;'> Usuário cadastrado incorretamente, tente novamente!</p>";
    header("Location: formularioContato.php");
}

