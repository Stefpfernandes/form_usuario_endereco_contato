<?php
session_start();
include_once("../conexao.php");

// Mostrar os Dados


// Verificar se possui o ID
if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM usuarios, telefone, email";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0){

        while($user_data = mysqli_fetch_assoc($result)){
            $nome_telefone = $user_data['nome_telefone'];
            $telefone = $user_data['telefone'];
            $operadora = $user_data['operadora'];
            $nome_email = $user_data['nome_email'];
            $email = $user_data['email'];
        } 
    }   
} else {
    header('Location: tabelaContato.php');
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
        <h1>Editar Contato</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            };
        ?>
        <section id = "formulario">
            <form method="POST" action="saveEdit.php">
                <label>Nome Telefone: </label>
                <input class="form" type="text" name="nome_telefone" value="<?php echo $nome_telefone; ?>" placeholder="Digite o seu nome completo"> <br/><br/>

                <label>N° Telefone: </label>
                <input class="form" type="text" name="telefone" value="<?php echo $telefone; ?>" placeholder="Digite o Telefone"> <br/><br/>

                <label>Operadora: </label>
                <input class="form" type="text" name="operadora" value="<?php echo $operadora; ?>" placeholder="Digite a Operadora do telefone"> <br/><br/>

                <label>Nome Email: </label>
                <input class="form" type="text" name="nome_email" value="<?php echo $nome_email; ?>" placeholder="Digite o seu Nome"> <br/><br/>

                <label>E-mail: </label>
                <input class="form" type="text" name="email" value="<?php echo $email; ?>" placeholder="Digite o seu melhor E-mail"> <br/><br/>
                
                <div id="divright">
                    <input class="btn submit" id="editar" type="submit" value="Editar">
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
            </form>
            
            <a class="visualizar" href="tabelaContato.php">Visualizar os dados</a>
        </section>            
    
    </body>
</html>