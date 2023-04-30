<?php
$arquivoAluno = fopen("disciplinas.txt", "r") or die("Erro na abertura");

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
</head>

<body>
    <ul>
        <li>
            <a href="index.php">Inicio</a>
            <a href="index.php">Inserir</a>
            <a href="exibir.php">Exibir</a>
            <a href="alterar.php">Alterar</a>
            <a href="excluir.php">Excluir</a>
        </li>
    </ul>

    <form action="exibir.php" method="POST">
        Matricula do aluno a ser exibido:<br>
        <input type="number" name="matriculaExibir"><br>
        <input type="submit" value="Exibir"><br><br>
    </form>

    <?php 
        echo "<table>";
        echo "<tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Matricula</th>
                <th>Data de ingresso</th>
              </tr>";

        while (!feof($arquivoAluno))
        {
            $linha = fgets($arquivoAluno);
            $coluna = explode(";", $linha);

            
            if (count($coluna) >= 4) 
            {
                echo "<tr><td>" . $coluna[0] . "</td>" ;
                echo "<td>" . $coluna[1] . "</td>";
                echo "<td>" . $coluna[2] . "</td>";
                echo "<td>" . $coluna[3] . "</td></tr>";
            }
            
        }
        fclose($arquivoAluno);
        echo "</table>";
        
    ?>

    <?php 

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $matriculaExibir = $_POST["matriculaExibir"];
            $arquivoAluno = fopen("disciplinas.txt", "r") or die("Erro na abertura");

            while (!feof($arquivoAluno))
            {
                $linha = fgets($arquivoAluno);
                $coluna = explode(";", $linha);
                if (count($coluna) >= 4 && $matriculaExibir == $coluna[2]) 
                {
                    echo "<br><br>". "Dados do aluno: <br>";
                    echo $coluna[0]. " | ";
                    echo $coluna[1] . " | ";
                    echo $coluna[2] . " | ";
                    echo $coluna[3];
                }
            }
            fclose($arquivoAluno);
        }
        
    ?>

</body>

</html>