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
        <h1>Cadastrar Usuário</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            };
            
        ?>
        <section id = "formulario">
            <form method="POST" action="processaUsuario.php">
                <fieldset>
                    <legend>Dados Básicos</legend>

                    <div class="inputBox">
                        <label>Nome: </label>
                        <input class="form" type="text" name="nome" placeholder="Digite o seu nome completo"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>RG: </label>
                        <input class="form" type="text" name="rg" placeholder="Digite o seu RG - EX xx.xxx.xxx-xx"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>CPF: </label>
                        <input class="form" type="text" name="cpf" placeholder="Digite o seu CPF - EX xxx.xxx.xxx-xx"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Nome da Mãe: </label>
                        <input class="form" type="text" name="nomedamae" placeholder="Digite o nome da sua mãe"> <br/><br/>
                    </div>
                </fieldset>                

                <div id="divright">
                    <input class="btn submit" id="submit" type="submit" value="Cadastrar" name="cadastrar">
                </div>
                
                <a class="visualizar" href="tabelaUsuario.php">Visualizar os dados</a> 
                <input type="hidden" name="usuario_id" value="<?php $usuario['id']; ?>">
                <input type="hidden" name="endereco_id" value="<?php $enderecos['id']; ?>">
            </form>          
            
        </section>                  
    
    </body>
</html>