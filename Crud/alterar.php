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
            <a href="index.php">Inserir</a>
            <a href="exibir.php">Exibir</a>
            <a href="alterar.php">Alterar</a> 
            <a href="excluir.php">Excluir</a>  
        </li>
    </ul>

    <form action="alterar.php" method="POST">
        Digite a matricula do cadastro a ser alterado:<br>
        <input type="number" name="matricula_a_alterar"><br><br>
        
        Oque deseja alterar:<br>

        Nome:<br>
        <input type="text" name="nomeAlterar"><br>
        CPF:<br>
        <input type="number" name="cpfAlterar"><br>
        matricula:<br>
        <input type="number" name="matriculaAlterar"><br>
        Data de ingresso:<br>
        <input type="date" name="dataAlterar"><br>

        <input type="submit" value="alterar">
    </form>
</body>
</html>

<?php
$nome ="";
$cpf ="";
$matriculaAlterar="";
$data = "";
$valor="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $arquivoAluno = fopen("disciplinas.txt", "r") or die("Erro na abertura");

    if ($_POST["nomeAlterar"] != ""){
        $nome=$_POST["nomeAlterar"];
        $valor= 1;
    }else if ($_POST["cpfAlterar"] != ""){
        $cpf = $_POST["cpfAlterar"];
        $valor= 2;
    }else if ($_POST["matriculaAlterar"] != ""){
        $matriculaAlterar = $_POST["matriculaAlterar"];
        $valor= 3;
    }else if ($_POST["dataAlterar"] != ""){
        $data = $_POST["dataAlterar"];
        $valor= 4;
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

        if ($_POST["matricula_a_alterar"] != $coluna[2])
        {
            $novoArquivo = fopen("Alterar.txt", "a") or die("Erro na abertura");
            fwrite($novoArquivo, $linha);
            fclose($novoArquivo);
        }
        else{
          
            $novoArquivo = fopen("Alterar.txt", "a") or die("Erro na abertura");
           switch($valor)
           {
            case 1: $linha = $nome . ";". $coluna[1]. ";". $coluna[2]. ";" .$coluna[3];
            break;
            case 2: $linha = $coluna[0] . ";". $cpf. ";". $coluna[2]. ";" .$coluna[3] ;
            break;
            case 3: $linha = $coluna[0] . ";". $coluna[1]. ";". $matriculaAlterar. ";" .$coluna[3];
            break;
            case 4: $linha = $coluna[0] . ";". $coluna[1]. ";". $coluna[2]. ";" .$data;
            break;
            
           }
           fwrite($novoArquivo, $linha);
           fclose($novoArquivo);
           echo "Alteração realizada com sucesso!";        
        }
    }
    $origem = "Alterar.txt";
    $destino = "disciplinas.txt";

    fclose($arquivoAluno);
    copy($origem, $destino);
}

?>