<?php
    include_once("acessarSQL.php");

    $comandoSQL = "SELECT * FROM tabela_perguntas";
    $resultado = $mysqli->query($comandoSQL);

    $registros = array();

    while($row = $resultado->fetch_assoc()){
        $registros[] = $row;
    }

    $registrosJson = json_encode($registros);

    echo $registrosJson;

    $mysqli->close();
?>
