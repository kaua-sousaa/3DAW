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
</body>

</html>


<?php
$hostname = "localhost";
$bancodedados = "perguntas";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$bancodedados;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT pergunta FROM tabela_perguntas");

    $perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($perguntas) > 0) {
        echo '<form method="POST" action="">';

        foreach ($perguntas as $indice => $perguntaData) {
            $pergunta = $perguntaData['pergunta'];

            echo '<p>' . $pergunta . '</p>';

            echo '<label>';
            echo '<textarea name="respostas' . $indice . '"></textarea>';
            echo '</label><br>';

            echo '<br>';
        }

        echo '<input type="submit" value="Enviar">';
        echo '</form>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respostasUsuario = $_POST;

            $resultado = true;

            foreach ($perguntas as $indice => $perguntaData) {
                $respostaUsuario = $respostasUsuario['respostas' . $indice] ?? '';

                $stmt = $pdo->prepare("SELECT Resposta FROM tabela_perguntas WHERE pergunta = :pergunta");
                $stmt->bindParam(':pergunta', $perguntaData['pergunta']);
                $stmt->execute();
                $respostaCorreta = $stmt->fetch(PDO::FETCH_COLUMN);

                if ($respostaUsuario != $respostaCorreta) {
                    $resultado = false;
                    break;
                }
            }

            if ($resultado) {
                echo '<p>Todas as respostas estão corretas!</p>';
            } else {
                echo '<p>Alguma resposta está incorreta.</p>';
            }
        }
    } else {
        echo "Não foram encontradas perguntas na tabela.";
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>
