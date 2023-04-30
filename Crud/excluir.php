<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Opções</h2>
    <ul>
        <li>
            <a href="index.php">Inicio</a>
            <a href="inserir.php">Inserir</a>
            <a href="exibir.php">Exibir</a>
            <a href="alterar.php">Alterar</a>
            <a href="excluir.php">Excluir</a>
        </li>
    </ul>

    <form action="excluir.php" method="POST">
        Matricula a ser excluida:<br>
        <input type="number" name="matriculaExcluir"><br>
        <input type="submit" value="Exluir">
    </form>
</body>
</html>

<?php 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $arquivoAluno = fopen("disciplinas.txt", "r") or die("Erro ao abrir o arquivo");
        $matriculaExcluir = $_POST["matriculaExcluir"];

        if (file_exists("Alterar.txt"))
        {
            $arquivoNovo = fopen("Alterar.txt", "w") or die ("erro ao abrir");
            fclose($arquivoNovo);
        }

        while(!feof($arquivoAluno))
        {
            $linha = fgets($arquivoAluno);
            $coluna = explode(";", $linha);

            
            if ($matriculaExcluir != $coluna[2])
            {
                $arquivoNovo = fopen("Alterar.txt", "a") or die("Erro ao abrir arquivo");
                fwrite($arquivoNovo, $linha);
                fclose($arquivoNovo);
                
            }
        }
        $origem = "Alterar.txt";
        $destino = "disciplinas.txt";

    fclose($arquivoAluno);
    
    copy($origem, $destino);
    
    }
    

?>