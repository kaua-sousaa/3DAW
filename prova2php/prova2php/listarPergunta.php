<?php
$arquivoAluno = fopen("perguntas.txt", "r") or die("Erro na abertura");

$coluna = "";
$linha = "";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <ul>
        <li>
            <a href="index.php">Inicio</a>
            <a href="inserir.php">Inserir</a>
            <a href="perguntaMultipla.php">Perguntas multiplas</a>
            <a href="perguntaTexto.php">Perguntas discursivas</a>
            <a href="listar.php">Listar</a>
            <a href="alterar.php">Alterar</a>
            <a href="excluir.php">Excluir</a>
            <a href="listarPergunta.php">Listar pergunta</a>
        </li>
    </ul>

    <form action="listarPergunta.php" method="POST">
        Pergunta a ser listada:<br>
        <input type="text" name="pergunta"><br>
        <input type="submit" value="Exibir"><br><br>
    </form>

    <?php 

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $matriculaExibir = $_POST["pergunta"];
            $arquivoAluno = fopen("perguntas.txt", "r") or die("Erro na abertura");

            while (!feof($arquivoAluno))
            {
                $linha = fgets($arquivoAluno);
                $coluna = explode(";", $linha);
                if (count($coluna) >= 5 && $matriculaExibir == $coluna[0]) 
                {
                    echo "<br><br>". "Dados da pergunta: <br><br>";
                    echo "Pergunta: ". $coluna[0];
                    echo "<br>Opcão 1: ". $coluna[1];
                    echo "<br>Opcão 2: ". $coluna[2];
                    echo "<br>Opção 3: ". $coluna[3];
                    echo "<br>Resposta: ". $coluna[4];
                }
            }
            fclose($arquivoAluno);
        }
        
    ?>

</body>

</html>