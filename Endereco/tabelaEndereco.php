<?php
session_start();
include_once("../conexao.php");

// Mostrar os Dados
$sql = "SELECT * FROM usuarios, enderecos WHERE enderecos.usuario_id = usuarios.id;";
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
        <h1>Informações do Endereço</h1>
        
        <section>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Rua</th>
                            <th scope="col">Número</th>
                            <th scope="col">Detalhes</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Alterar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($resultado)){
                                echo "<tr>";
                                    echo "<td>" . $user_data['id']. "</td>";
                                    echo "<td>" . $user_data['nome']. "</td>";
                                    echo "<td>" . $user_data['titulo']. "</td>";
                                    echo "<td>" . $user_data['logradouro']. "</td>";
                                    echo "<td>" . $user_data['numero']. "</td>";
                                    echo "<td>" . $user_data['complemento']. "</td>";
                                    echo "<td>" . $user_data['bairro']. "</td>";
                                    echo "<td>" . $user_data['cidade']. "</td>";
                                    echo "<td>" . $user_data['estado']. "</td>";
                                    echo "<td>" . $user_data['cep']. "</td>";
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