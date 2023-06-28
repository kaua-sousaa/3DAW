<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();

            var pergunta = document.querySelector('input[name="excluir"]').value;

            var formData = new FormData();
            formData.append('excluir', pergunta);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'excluir.php');
            xhr.send(formData);

            xhr.addEventListener('load', function() {
                console.log(this.responseText);
            });
        });
    </script>
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

    <form action="excluir.php" method="POST">
        Digite a pergunta do item que deseja excluir:<br>
        <input type="text" name="excluir"><br>
        <input type="submit" value="Exluir">
    </form>
</body>
</html>

<?php 
    include_once("acessarSQL.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST['excluir']) && !empty($_POST['excluir'])){
            $pergunta = $_POST['excluir'];

            $sql = "DELETE FROM tabela_perguntas WHERE pergunta = ?";
            $stmt = $mysqli->prepare($sql);

            if (!$stmt) {
                echo "Erro na preparação da consulta: (" . $mysqli->errno . ") " . $mysqli->error;
                exit();
            }

        $stmt->bind_param("s", $pergunta);
        $resultado = $stmt->execute();

        if ($resultado) {
            echo "Registro excluído com sucesso!";
        } else {
            echo "Erro ao excluir o registro.";
        }

        $stmt->close();

    }else{
        echo "invalido";
    }
    }
    $mysqli->close();   
?>
