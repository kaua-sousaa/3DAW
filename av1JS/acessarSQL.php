<?php
$hostname = "localhost";
$bancodedados = "perguntas";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
{
    if ($mysqli->connect_errno){
        echo "Erro ao conectar: (". $mysqli->connect_errno . ") ". $mysqli->connect_error;
    }
}
?>