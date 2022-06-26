<?php
session_start();
include_once("../conexao.php");

// Mostrar os Dados
$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">        
        <link rel="stylesheet" href="../estilo.css">
        <title>CRUD - Formulário</title>        
    </head>
    <body>
        <h1>Informações do Usuario</h1>
        
        <section>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">RG</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Nome Mãe</th>
                            <th scope="col">+ Infos</th>
                            <th scope="col">Alterar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($resultado)){
                                echo "<tr>";
                                    echo "<td>" . $user_data['id']. "</td>";
                                    echo "<td>" . $user_data['nome']. "</td>";
                                    echo "<td>" . $user_data['rg']. "</td>";
                                    echo "<td>" . $user_data['cpf']. "</td>";
                                    echo "<td>" . $user_data['nome_mae']. "</td>";

                                    echo "<td>
                                            <a class = 'icone' href = '../Endereco/formularioEndereco.php?id=$user_data[id]'>
                                                <img src='../icones/endereco2.png' height = '30' widht = '30'>
                                            </a>
                                            <a class = 'icone' href = '../Contato/formularioContato.php?id=$user_data[id]'>
                                                <img src='../icones/contato.png' height = '30' widht = '30'>
                                            </a>                                           
                                        </td>";
                                    
                                    echo "<td>
                                            <a class = 'icone' href = 'edit.php?id=$user_data[id]'>
                                                <img src='../icones/editar.png' height = '30' widht = '30'>
                                            </a>
                                            <a class = 'icone' href = 'excluir.php?excluir=$user_data[id]'>
                                                <img src='../icones/excluir.png' height = '30' widht = '30'>
                                            </a>
                                        </td>";
                                echo "</tr>";
                             }
                        ?>
                    </tbody>
                </table>
            </div>

            <a class="visualizar" href="../Usuario/formularioUsuario.php">Cadastrar novos Usuários</a>
        </section>
    </body>
</html>