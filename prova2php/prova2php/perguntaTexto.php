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
// Ler o conteúdo do arquivo
$linhas = file('perguntas.txt', FILE_IGNORE_NEW_LINES);

// Verificar se existem linhas no arquivo
if (!empty($linhas)) {
    $perguntas = [];

    // Percorrer cada linha do arquivo
    foreach ($linhas as $linha) {
        // Dividir a linha em pergunta e opções de resposta
        $dados = explode(';', $linha);

        // Verificar se a linha contém pergunta e opções suficientes
        if (count($dados) >= 3) {
            $pergunta = $dados[0];
            $opcoes = array_slice($dados, 1, -1); // Ignorar o último elemento
            $respostasCorretas = array_map('trim', explode(';', end($dados))); // Obter as respostas corretas

            // Adicionar a pergunta, opções e respostas corretas ao array de perguntas
            $perguntas[] = [
                'pergunta' => $pergunta,
                'opcoes' => $opcoes,
                'respostasCorretas' => $respostasCorretas
            ];
        }
    }

    // Verificar se existem perguntas no arquivo
    if (!empty($perguntas)) {
        echo '<form method="POST" action="">'; // Início do formulário

        foreach ($perguntas as $indice => $perguntaData) {
            $pergunta = $perguntaData['pergunta'];
            $opcoes = $perguntaData['opcoes'];
            $respostasCorretas = $perguntaData['respostasCorretas'];

            // Imprimir a pergunta
            echo '<p>' . $pergunta . '</p>';

            // Imprimir as opções de resposta
            echo '<label>';
            echo '<input type="text" name="respostas' . $indice . '[]" value=""> ';
            echo '</label><br>';

            echo '<br>';
        }

        echo '<input type="submit" value="Enviar">'; // Botão de envio
        echo '</form>'; // Fim do formulário

        // Verificar as respostas submetidas pelo usuário
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respostasUsuario = $_POST;

            $resultado = true; // Indicador de resultado

            foreach ($perguntas as $indice => $perguntaData) {
                $respostasSelecionadas = $respostasUsuario['respostas' . $indice] ?? [];

                // Verificar se as respostas selecionadas são iguais às respostas corretas
                if (count($respostasSelecionadas) != count($perguntaData['respostasCorretas']) || array_diff($respostasSelecionadas, $perguntaData['respostasCorretas'])) {
                    $resultado = false; // Alguma resposta está incorreta
                    break; // Parar a verificação
                }
            }

            // Exibir o resultado
            if ($resultado) {
                echo '<p>Todas as respostas estão corretas!</p>';
            } else {
                echo '<p>Alguma resposta está incorreta.</p>';
            }
        }
    } else {
        echo "Não foram encontradas perguntas e respostas suficientes no arquivo.";
    }
} else {
    echo "O arquivo não contém perguntas e respostas.";
}
?>
