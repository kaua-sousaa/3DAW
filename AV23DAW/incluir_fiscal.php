<?php
$id = "";
$pergunta = "";
$tipo = "";
$connection = "";

$servidor = "localhost";
$username = "root";
$senha= "";
$database = "av2js";

$conn = new mysqli($servidor,$username, $senha, $database);
if($conn->connect_error){
    die("Conexao falhou");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];
    $sala = $_GET["sala"];
    echo "É GET \n";
} else {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $sala = $_POST["sala"];
    echo "É POST: $nome, $cpf, $sala  \n";
}

try {
    $strSql = $conn->query("INSERT INTO fiscal (nome,cpf,salaProva) VALUES ('$nome','$cpf','$sala')");
    echo "OK";
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
?>