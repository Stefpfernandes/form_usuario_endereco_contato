<?php
session_start();
include_once("../conexao.php");

// Mostrar os Dados
$sql = "SELECT * FROM usuarios, telefone, email WHERE telefone.usuario_id = usuarios.id AND email.usuario_id = usuarios.id";
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
        <h1>Informações do Contato</h1>
        
        <section>
            <div>
                <table>
                    <thead>
                        <tr>                            
                            <th scope="col">Usuario</th>  
                            <th scope="col">Nome Telef.</th>                           
                            <th scope="col">Telefone</th>
                            <th scope="col">Operadora</th>
                            <th scope="col">Nome Email</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alterar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($resultado)){
                                echo "<tr>";
                                    echo "<td>" . $user_data['nome']. "</td>";
                                    echo "<td>" . $user_data['nome_telefone']. "</td>";
                                    echo "<td>" . $user_data['telefone']. "</td>";
                                    echo "<td>" . $user_data['operadora']. "</td>";
                                    echo "<td>" . $user_data['nome_email']. "</td>";
                                    echo "<td>" . $user_data['email']. "</td>";
                                    
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

            <a class="visualizar" href="../Usuario/tabelaUsuario.php">Visualizar os dados</a>
        </section>
    </body>
</html>