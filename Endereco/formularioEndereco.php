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
    header('Location: tabelaEndereco.php');
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
        <h1>Cadastrar Endereço</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            };
            
        ?>
        <section id = "formulario">
            <form method="POST" action="processaEndereco.php">                
                <fieldset>
                    <legend>Endereço do usuário</legend>

                    <div class="inputBox">
                        <label>Título: </label> 
                        <input class="form" type="text" name="titulo" placeholder="Digite o titulo"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Logradouro: </label>
                        <input class="form" type="text" name="logradouro" placeholder="Digite a rua"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Número: </label>
                        <input class="form" type="text" name="numero" placeholder="Digite o número do endereço"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Complemento: </label>
                        <input class="form" type="text" name="complemento" placeholder="Caso tenha um complemento"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Bairro: </label>
                        <input class="form" type="text" name="bairro" placeholder="Digite o seu bairro"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Cidade: </label>
                        <input class="form" type="text" name="cidade" placeholder="Digite a cidade"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Estado: </label>
                        <input class="form" type="text" name="estado" placeholder="Digite o estado"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>CEP: </label>
                        <input class="form" type="text" name="cep" placeholder="Digite o CEP - EX xxxxx-xxx"> <br/><br/>
                    </div>
                    
                </fieldset>

                <div id="divright">
                    <input class="btn submit" id="submit" type="submit" value="Cadastrar" name="cadastrar">
                </div>
                
                <a class="visualizar" href="tabelaEndereco.php">Visualizar os dados</a> 
                <input type="hidden" name="id" value="<?php echo $id?>">
            </form>          
            
        </section>                  
    
    </body>
</html>
