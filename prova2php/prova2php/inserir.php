<?php
$pergunta = "";
$opcao1 = "";
$opcao2 = "";
$opcao3 = "";
$resposta ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $pergunta = ucfirst($_POST["pergunta"]);
    $opcao1 = ucfirst($_POST["opcao1"]);
    $opcao2 = ucfirst($_POST["opcao2"]);
    $opcao3 = ucfirst($_POST["opcao3"]);
    $resposta = ucfirst($_POST["resposta"]);
    $linha = "";
    
    if (!file_exists("perguntas.txt")) 
    {
        $arqDisc = fopen("perguntas.txt","w") or die("erro ao criar arquivo");
        $linha = "pergunta;opcao1;opcao2;opcao3;resposta\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
    }
    if ($pergunta != "" && $opcao1 != "" && $opcao2 != "" && $opcao3 != "")
    {
        $arqDisc = fopen("perguntas.txt","a") or die("erro ao criar arquivo");
        $linha = $pergunta . ";" . $opcao1 . ";" . $opcao2 . ";" . $opcao3 . ";" . $resposta. "\n";
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

    <form action="inserir.php" method="POST">
        Pergunta:<br>
        <input type="text" name="pergunta"><br>
        Opção 1:<br>
        <input type="text" name="opcao1"><br>
        Opção 2:<br>
        <input type="text" name="opcao2"><br>
        Opção 3:<br>
        <input type="text" name="opcao3"><br>

        Resposta correta:<br>
        <input type="text" name="resposta"><br>
        <input type="submit" value="Enviar">
    </form>    
</body>
</html>