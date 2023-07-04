<?php

include_once("sql.php");

$nomeCandidato = $_POST['nome'];
$novaSalaProva = $_POST['nova_sala_prova'];

$query = "UPDATE candidatos SET sala_prova = '$novaSalaProva' WHERE nome = '$nomeCandidato'";
mysqli_query($conexao, $query);

?>