<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function preparaEnvio(){
            var formulario = document.getElementById("meuFormulario");
            var pergunta = formulario.pergunta.value;
            var opcao1 = formulario.opcao1.value;
            var opcao2 = formulario.opcao2.value;
            var opcao3 = formulario.opcao3.value;
            var resposta = formulario.resposta.value;

            var dados = {
                pergunta: pergunta,
                opcao1: opcao1,
                opcao2: opcao2,
                opcao3: opcao3,
                resposta: resposta
            };

            var dadosJson = JSON.stringify(dados);

            formulario.dados.value = dadosJson;

            formulario.submit();
        }

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

    <form id="meuFormulario" method="POST" action="inserirphp.php">
        Pergunta:<br>
        <input type="text" name="pergunta" id="pergunta"><br>
        Opção 1:<br>
        <input type="text" name="opcao1" id="opcao1"><br>
        Opção 2:<br>
        <input type="text" name="opcao2" id="opcao2"><br>
        Opção 3:<br>
        <input type="text" name="opcao3" id="opcao3"><br>

        Resposta correta:<br>
        <input type="text" name="resposta" id="resposta"><br>
        <input type="hidden" name="dados" id="dados" value="">
        <input type="submit" value="Enviar" onclick="preparaEnvio()">
    </form>    
</body>
</html>