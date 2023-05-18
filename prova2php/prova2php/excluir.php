<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <form action="excluir.php" method="POST">
        Digite a pergunta do item que deseja excluir:<br>
        <input type="text" name="excluir"><br>
        <input type="submit" value="Exluir">
    </form>
</body>
</html>

<?php 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $arquivoAluno = fopen("perguntas.txt", "r") or die("Erro ao abrir o arquivo");
        $perguntaExcluir = $_POST["excluir"];

        if (file_exists("Alterar.txt"))
        {
            $arquivoNovo = fopen("Alterar.txt", "w") or die ("erro ao abrir");
            fclose($arquivoNovo);
        }

        while(!feof($arquivoAluno))
        {
            $linha = fgets($arquivoAluno);
            $coluna = explode(";", $linha);
      
            if ($perguntaExcluir != $coluna[0])
            {
                $arquivoNovo = fopen("Alterar.txt", "a") or die("Erro ao abrir arquivo");
                fwrite($arquivoNovo, $linha);
                fclose($arquivoNovo);
                
            }
        }
        $origem = "Alterar.txt";
        $destino = "perguntas.txt";

    fclose($arquivoAluno);
    
    copy($origem, $destino);
    
    }
    

?>