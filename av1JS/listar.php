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

    <div id="resultados"></div>

    <script>
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'listarphp.php');
        xhr.send();

        xhr.addEventListener('load', function() 
        {
            var registros = JSON.parse(this.responseText);
            var tabela = "<table>";
            tabela += "<tr><th>Pergunta</th><th>Opção 1</th><th>Opção 2</th><th>Opção 3</th><th>Resposta</th></tr>";

            for (var i = 0; i < registros.length; i++) 
            {
                var perguntas = registros[i];
                tabela += "<tr>";
                for (var ii in perguntas) 
                {
                    var valor = perguntas[ii];
                    tabela += "<td>" + valor + "</td>";
                }
                tabela += "</tr>";
            }

            tabela += "</table>";

            document.querySelector('#resultados').innerHTML = tabela;
        });
    </script>
</body>

</html>
