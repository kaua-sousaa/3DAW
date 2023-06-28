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

    <?php
    $hostname = "localhost";
    $bancodedados = "perguntas";
    $usuario = "root";
    $senha = "";

    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$bancodedados;charset=utf8", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT pergunta, opcao1, opcao2, opcao3, Resposta FROM tabela_perguntas");

        $perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($perguntas) > 0) {
            echo '<form method="POST" action="">';

            foreach ($perguntas as $indice => $perguntaData) {
                $pergunta = $perguntaData['pergunta'];
                $opcao1 = $perguntaData['opcao1'];
                $opcao2 = $perguntaData['opcao2'];
                $opcao3 = $perguntaData['opcao3'];
                $resposta = $perguntaData['Resposta'];

                echo '<p>' . $pergunta . '</p>';
                echo '<label>';
                echo '<input type="radio" name="respostas' . $indice . '[]" value="' . $opcao1 . '"> ' . $opcao1;
                echo '</label><br>';
                echo '<label>';
                echo '<input type="radio" name="respostas' . $indice . '[]" value="' . $opcao2 . '"> ' . $opcao2;
                echo '</label><br>';
                echo '<label>';
                echo '<input type="radio" name="respostas' . $indice . '[]" value="' . $opcao3 . '"> ' . $opcao3;
                echo '</label><br><br>';
            }

            echo '<input type="submit" value="Enviar">';
            echo '</form>';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $respostasUsuario = $_POST;

                $resultado = true;

                foreach ($perguntas as $indice => $perguntaData) {
                    $respostasSelecionadas = $respostasUsuario['respostas' . $indice] ?? [];

                    if (count($respostasSelecionadas) != 1 || $respostasSelecionadas[0] != $perguntaData['Resposta']) {
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
</body>

</html>
