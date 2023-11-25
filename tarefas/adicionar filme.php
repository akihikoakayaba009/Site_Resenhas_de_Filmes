
<!DOCTYPE html>
<html>
<head>
<title>Adicionar</title>
<link rel="stylesheet" type="text/css" href="../css/estilo2.css">
</head>

<body> 
    <div class="login">
        <h1> Adicionar filme</h1>
        <form method="post" action="adicionar_filme.php">
            <div class="campos"></div> nome: <input type="text" name="titulo"><br>
            <div class="campos"></div> descriçõa do filme: <input type="text" name="descricao"><br>
            <div class="campos" min="0" max="10"></div> nota: <input type="range" name="nota"><br>

            <div class="botao_enviar">
                <input type="submit" value="Adicionar" id="botao_enviar">
            </div>
            </div>
        </form>
    </div>
</body

<?php
   include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['titulo'];
        $descricao = $_POST['descricao'];
      
        $nota = $_POST['nota'];

        $sql = 
        "INSERT INTO 
            filmes (titulo, descricao,  nota ) 
        VALUES 
            ('$nome')";
        if ($conexao->query($sql) === TRUE) {
            header("Location: ../centro/pagina.html");
        } else {
            echo "Erro: " . $conexao->error;
        }
    }

    $conexao->close();
?>

</html>
