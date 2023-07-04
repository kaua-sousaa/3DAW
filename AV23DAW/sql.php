<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "av2js";

$conexao = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

?>