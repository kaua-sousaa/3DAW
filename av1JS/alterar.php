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
$hostname = "localhost";
$bancodedados = "perguntas";
$usuario = "root";
$senha = "";

$pergunta = "";
$opcao1 = "";
$opcao2 = "";
$opcao3 = "";
$resposta = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $perguntaAlterar = $_POST["perguntaAlterar"];
    $opcao1 = $_POST["opcao1"];
    $opcao2 = $_POST["opcao2"];
    $opcao3 = $_POST["opcao3"];
    $resposta = $_POST["resposta"];

    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$bancodedados;charset=utf8", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE tabela_perguntas SET pergunta = :pergunta, opcao1 = :opcao1, opcao2 = :opcao2, opcao3 = :opcao3, resposta = :resposta WHERE pergunta = :pergunta_busca");

        $stmt->bindParam(':pergunta', $perguntaAlterar);
        $stmt->bindParam(':opcao1', $opcao1);
        $stmt->bindParam(':opcao2', $opcao2);
        $stmt->bindParam(':opcao3', $opcao3);
        $stmt->bindParam(':resposta', $resposta);
        $stmt->bindParam(':pergunta_busca', $_POST['pergunta']);

        if ($stmt->execute()) {
            echo "Alteração realizada com sucesso!";
        } else {
            echo "Erro ao executar a consulta.";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
}
?>
