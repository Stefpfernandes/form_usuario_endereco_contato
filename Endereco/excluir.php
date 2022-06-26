<?php
session_start();
require_once("../conexao.php");

    if($_GET['excluir']){
        $excluirSQL = "DELETE FROM enderecos WHERE id = ?";
        $resultado = $conn->prepare($excluirSQL);
        $resultado->bind_param("i", $_GET['excluir']);
        $resultado->execute();
    }


    $sql = "SELECT * FROM enderecos ORDER BY id DESC";
    $resultado = $conn->query($sql);   

    header('Location: tabelaEndereco.php');

?>
