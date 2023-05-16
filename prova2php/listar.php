<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li>
        <a href="index.php">Inicio</a>
            <a href="inserir.php">Inserir</a>
            <a href="perguntaMultipla.php">ExibirMutipla</a>
            <a href="perguntaTexto.php">ExibirTexto</a>
            <a href="listar.php">Listar</a>
            <a href="alterar.php">Alterar</a>
            <a href="excluir.php">Excluir</a>
        </li>
    </ul>
</body>

</html>

<?php

$arquivoAluno = fopen("perguntas.txt", "r") or die("Erro na abertura");

$coluna = "";
$linha = "";

echo "<table>";
echo "<tr>
            <th>Pergunta</th>
            <th>Opcao 1</th>
            <th>Opcao 2</th>
            <th>Opcao 3</th>
            <th>Resposta</th>
    </tr>";

while (!feof($arquivoAluno)) {
    $linha = fgets($arquivoAluno);
    $coluna = explode(";", $linha);


    if (count($coluna) >= 5) {
        echo "<tr><td>" . $coluna[0] . "</td>";
        echo "<td>" . $coluna[1] . "</td>";
        echo "<td>" . $coluna[2] . "</td>";
        echo "<td>" . $coluna[3] . "</td>";
        echo "<td>" . $coluna[4] . "</td></tr>";
        
    }
}
fclose($arquivoAluno);
echo "</table>";



?>