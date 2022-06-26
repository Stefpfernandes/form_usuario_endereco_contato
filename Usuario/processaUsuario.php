<?php
session_start();

// conexão com o banco de dados
include_once("../conexao.php");

    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $nomedamae = $_POST['nomedamae'];

// INSERIR NO BANCO DE DADOS - usuario

    $sqlUpdate = "INSERT INTO usuarios SET nome='$nome', rg='$rg', cpf='$cpf', nome_mae='$nomedamae', created=NOW()";
    $resultado_usuario = $conn->query($sqlUpdate);

// VERIFICAR SE SALVOU COM SUCESSO

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;' 'text-aling: center;'> Usuário cadastrado com sucesso</p>";
    header("Location: formularioUsuario.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;' 'text-aling: center;'> Usuário cadastrado incorretamente, tente novamente!</p>";
    header("Location: formularioUsuario.php");
}

