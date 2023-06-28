<?php

include_once("acessarSQL.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $dadosJson = $_POST['dados'];

        $dados = json_decode($dadosJson);

        $pergunta = $dados->pergunta;
        $opcao1 = $dados->opcao1;
        $opcao2 = $dados->opcao2;
        $opcao3 = $dados->opcao3;
        $resposta = $dados->resposta;


    $sql = "INSERT INTO tabela_perguntas (pergunta, opcao1, opcao2, opcao3, Resposta) VALUES (?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);

    if(!$stmt){
        echo "Erro na preparação da consulta: (". $mysqli->errno . ") ";
        exit();
    }

    $stmt->bind_param("sssss", $pergunta, $opcao1,$opcao2,$opcao3,$resposta);
    $resultado = $stmt->execute();

    if($resultado){
        echo "Dados inseridos com sucesso!";
    }else{
        echo "Dados não inseridos";
    }

    $stmt->close();
    $mysqli->close();

    header("Location: index.php?sucesso=SIM");
}





?>