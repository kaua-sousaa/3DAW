<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "av2js";

$conn = new mysqli($servidor, $username, $senha, $database);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$query = "SELECT * FROM candidato";
$result = $conn->query($query);

$candidatos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $candidato = array(
            "nome" => $row["nome"],
            "cpf" => $row["cpf"],
            "sala" => $row["sala"],
            "email" => $row["email"],
            "cargo" => $row["cargo"]
        );
        array_push($candidatos, $candidato);
    }
}

header('Content-Type: application/json');
echo json_encode($candidatos);

$conn->close();
?>
