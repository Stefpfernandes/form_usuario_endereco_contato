<?php
session_start();
include_once("../conexao.php");

// Mostrar os Dados
$sql = "SELECT * FROM enderecos ORDER BY id DESC";
$resultado = $conn->query($sql);

// Verificar se possui o ID
if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM enderecos WHERE id=$id";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0){

        while($endereco_data = mysqli_fetch_assoc($result)){
            $titulo = $endereco_data['titulo'];
            $logradouro = $endereco_data['logradouro'];
            $numero = $endereco_data['numero'];
            $complemento = $endereco_data['complemento'];
            $bairro = $endereco_data['bairro'];
            $cidade = $endereco_data['cidade']; 
            $estado = $endereco_data['estado']; 
            $cep = $endereco_data['cep']; 
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
        <h1>Editar o Endereço</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            };
        ?>
        <section id = "formulario">
            <form method="POST" action="saveEdit.php">                
                <fieldset>
                    <legend>Endereço do usuário</legend>

                    <div class="inputBox">
                        <label>Título: </label> <!-- O QUE SERIA TITULO? -->
                        <input class="form" type="text" name="titulo" value="<?php echo $titulo; ?>" placeholder="Digite o titular"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Logradouro: </label>
                        <input class="form" type="text" name="logradouro" value="<?php echo $logradouro; ?>" placeholder="Digite o seu endereço"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Número: </label>
                        <input class="form" type="text" name="numero" value="<?php echo $numero; ?>" placeholder="Digite o número do endereço"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Complemento: </label>
                        <input class="form" type="text" name="complemento" value="<?php echo $complemento; ?>" placeholder="Caso tenha um complemento"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Bairro: </label>
                        <input class="form" type="text" name="bairro" value="<?php echo $bairro; ?>" placeholder="Digite o seu bairro"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Cidade: </label>
                        <input class="form" type="text" name="cidade" value="<?php echo $cidade; ?>" placeholder="Digite a cidade"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>Estado: </label>
                        <input class="form" type="text" name="estado" value="<?php echo $estado; ?>" placeholder="Digite o estado"> <br/><br/>
                    </div>

                    <div class="inputBox">
                        <label>CEP: </label>
                        <input class="form" type="text" name="cep" value="<?php echo $cep; ?>" placeholder="Digite o CEP"> <br/><br/>
                    </div>
                    
                </fieldset>

                <div id="divright">
                    <input class="btn submit" id="submit" type="submit" value="editar" name="Editar">
                </div>
                
                <input type="hidden" name="id" value="<?php echo $id?>">
            </form> 
            
            <a class="visualizar" href="tabelaEndereco.php">Visualizar os dados</a>
        </section>            
    
    </body>
</html>