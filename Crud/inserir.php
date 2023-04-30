<?php
$nome = "";
$cpf = "";
$matricula = "";
$data = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $matricula = $_POST["matricula"];
    $data = $_POST["ingresso"];
    $linha = "";
    
    if (!file_exists("disciplinas.txt")) 
    {
        $arqDisc = fopen("disciplinas.txt","w") or die("erro ao criar arquivo");
        $linha = "nome;cpf;matricula;data\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
    }
    if ($nome != "" && $cpf != "" && $matricula != "" && $data != "")
    {
        $arqDisc = fopen("disciplinas.txt","a") or die("erro ao criar arquivo");
        $linha = $nome . ";" . $cpf . ";" . $matricula . ";" . $data . "\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
        echo "Inserido com sucesso!";
    }    
}
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

    <form action="inserir.php" method="POST">
        Nome:<br>
        <input type="text" name="nome"><br>
        CPF:<br>
        <input type="number" name="cpf"><br>
        Matricula:<br>
        <input type="number" name="matricula"><br>
        Data de ingresso:<br>
        <input type="date" name="ingresso"><br>
        <input type="submit" value="Enviar">
    </form>    
</body>
</html>