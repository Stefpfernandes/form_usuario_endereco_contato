<?php
session_start();
include_once("../conexao.php");

// Mostrar os Dados
$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$resultado = $conn->query($sql);

// Verificar se possui o ID
if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0){

        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $rg = $user_data['rg'];
            $cpf = $user_data['cpf'];
            $nome_mae = $user_data['nome_mae'];
        } 
    }   
} else {
    header('Location: tabelaUsuario.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilo.css">
        <title>CRUD - Formulário</title>        
    </head>
    <body>
        <h1>Editar Usuário</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            };
        ?>
        <section id = "formulario">
            <form method="POST" action="saveEdit.php">
                <label>Nome: </label>
                <input class="form" type="text" name="nome" value="<?php echo $nome; ?>" placeholder="Digite o seu nome completo"> <br/><br/>

                <label>RG: </label>
                <input class="form" type="text" name="rg" value="<?php echo $rg; ?>" placeholder="Digite o seu RG"> <br/><br/>

                <label>CPF: </label>
                <input class="form" type="text" name="cpf" value="<?php echo $cpf; ?>" placeholder="Digite o seu CPF"> <br/><br/>

                <label>Nome da Mãe: </label>
                <input class="form" type="text" name="nomedamae" value="<?php echo $nome_mae; ?>" placeholder="Digite o nome da sua mãe"> <br/><br/>

                <div id="divright">
                    <input class="btn submit" id="editar" type="submit" value="Editar">
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
            </form>
            
            <a class="visualizar" href="tabelaUsuario.php">Visualizar os dados</a>
        </section>            
    
    </body>
</html>