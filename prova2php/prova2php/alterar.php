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

    <form action="alterar.php" method="POST" >
        Digite a pergunta do item que deseja alterar:<br>
        <input type="text" name="pergunta" required><br><br>
        
        Oque deseja alterar:<br>

        Pergunta:<br>
        <input type="text" name="perguntaAlterar"><br>
        opcao 1:<br>
        <input type="text" name="opcao1"><br>
        opcao 2:<br>
        <input type="text" name="opcao2"><br>
        opcao 3:<br>
        <input type="text" name="opcao3"><br>
        Resposta:<br>
        <input type="text" name="resposta"><br>

        <input type="submit" value="alterar">
    </form>
</body>
</html>

<?php
$pergunta ="";
$opcao1 ="";
$opcao2="";
$opcao3 = "";
$resposta="";
$valor="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $arquivoAluno = fopen("perguntas.txt", "r") or die("Erro na abertura");

    if ($_POST["perguntaAlterar"] != ""){
        $pergunta= ucfirst($_POST["perguntaAlterar"]);
        $valor= 1;
    }else if ($_POST["opcao1"] != ""){
        $opcao1 = ucfirst($_POST["opcao1"]);
        $valor= 2;
    }else if ($_POST["opcao2"] != ""){
        $opcao2 = ucfirst($_POST["opcao2"]);
        $valor= 3;
    }else if ($_POST["opcao3"] != ""){
        $opcao3 = ucfirst($_POST["opcao3"]);
        $valor= 4;
    }else if ($_POST["resposta"] != ""){
        $resposta = ucfirst($_POST["resposta"]);
        $valor= 5;
    }

    if (file_exists("Alterar.txt"))
    {
        $novoArquivo = fopen("Alterar.txt", "w") or die("Erro na abertura");
        fclose($novoArquivo);
    }
    
    while (!feof($arquivoAluno)) 
    {
        $linha = fgets($arquivoAluno);
        $coluna = explode(";", $linha);

        if ($_POST["pergunta"] != $coluna[0])
        {
            $novoArquivo = fopen("Alterar.txt", "a") or die("Erro na abertura");
            fwrite($novoArquivo, $linha);
            fclose($novoArquivo);
        }
        else{
          
            $novoArquivo = fopen("Alterar.txt", "a") or die("Erro na abertura");
           switch($valor)
           {
            case 1: $linha = $pergunta . ";". $coluna[1]. ";". $coluna[2]. ";" .$coluna[3]. ";". $coluna[4];
            break;
            case 2: $linha = $coluna[0] . ";". $opcao1. ";". $coluna[2]. ";" .$coluna[3] . ";". $coluna[4];
            break;
            case 3: $linha = $coluna[0] . ";". $coluna[1]. ";". $opcao2. ";" .$coluna[3] . ";". $coluna[4];
            break;
            case 4: $linha = $coluna[0] . ";". $coluna[1]. ";". $coluna[2]. ";" .$opcao3. ";". $coluna[4];
            break;
            case 5: $linha = $coluna[0] . ";". $coluna[1]. ";". $coluna[2]. ";" .$coluna[3]. ";". $resposta . "\n";
            break;
            
           }
           fwrite($novoArquivo, $linha);
           fclose($novoArquivo);
           echo "Alteração realizada com sucesso!";        
        }
    }
    $origem = "Alterar.txt";
    $destino = "perguntas.txt";

    fclose($arquivoAluno);
    copy($origem, $destino);
}

?>