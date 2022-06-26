<?php
session_start();
require_once("../conexao.php");

    if($_GET['excluir']){
        $excluirSQL = "DELETE FROM telefone WHERE id = ?";
        $resultado = $conn->prepare($excluirSQL);
        $resultado->bind_param("i", $_GET['excluir']);
        $resultado->execute();
    } 

    if($_GET['excluir']){
        $excluirSQL = "DELETE FROM email WHERE id = ?";
        $resultado = $conn->prepare($excluirSQL);
        $resultado->bind_param("i", $_GET['excluir']);
        $resultado->execute();
    }


    $sql = "SELECT * FROM telefone, email";
    $resultado = $conn->query($sql);   

    header('Location: tabelaContato.php');

?>
