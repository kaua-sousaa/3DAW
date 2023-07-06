<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av2js";
    
    $mysqli = mysqli_connect("localhost", "root", "", "av2js");
        if ($mysqli === false) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

$nomeCandidato = $_POST['nome'];
$novaSalaProva = $_POST['novaSala'];

$query = "UPDATE candidato SET salaProva = '$novaSalaProva' WHERE nome = '$nomeCandidato'";
if ($mysqli->query($query) === true) {
    echo "Atualização concluída com sucesso!";
} else {
    echo "Erro na atualização: " . $mysqli->error;
}

$mysqli->close();


?>