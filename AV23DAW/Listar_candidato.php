<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av2js";
    
    $mysqli = mysqli_connect("localhost", "root", "", "av2js");
    if ($mysqli === false) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $comandoSQL = "SELECT * FROM candidato ORDER BY salaProva ASC, nome ASC";
    $resultado = $mysqli->query($comandoSQL);

    $registros = array();

    while($row = $resultado->fetch_assoc()){
        $registros[] = $row;
    }

    $registrosJson = json_encode($registros);

    echo $registrosJson;

    $mysqli->close();
?>