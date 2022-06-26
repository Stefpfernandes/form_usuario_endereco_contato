<?php
session_start();
include_once("../conexao.php");

// Mostrar os Dados

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
        <h1>Cadastrar Contato</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            };
            
        ?>
        <section id = "formulario">
            <form method="POST" action="processaContato.php">
                <fieldset>
                    <legend>Telefone</legend>

                    <div class="inputBox">
                        <label>Nome: </label>
                        <input class="form" type="text" name="nome_telefone" placeholder="Digite o seu nome completo"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>N° Telefone: </label>
                        <input class="form" type="text" name="telefone" placeholder="Exemplo (DD) xxxxx-xxxx"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Operadora: </label>
                        <input class="form" type="text" name="operadora" placeholder="Digite a Operadora do Telefone"> <br/><br/>
                    </div>
                </fieldset>  

                <section><legend></legend></section>

                <fieldset>
                    <legend>E-mail</legend>

                    <div class="inputBox">
                        <label>Nome: </label>
                        <input class="form" type="text" name="nome_email" placeholder="Digite o seu nome completo"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>E-mail: </label>
                        <input class="form" type="text" name="email" placeholder="Digite o seu melhor Email"> <br/><br/>
                    </div>
                </fieldset>  

                <div id="divright">
                    <input class="btn submit" id="submit" type="submit" value="Cadastrar" name="cadastrar">
                </div>
                
                <a class="visualizar" href="../Contato/tabelaContato.php">Visualizar os dados</a> 
                <input type="hidden" name="id" value="<?php echo $id?>">             
            </form>          
            
        </section>                  
    
    </body>
</html>