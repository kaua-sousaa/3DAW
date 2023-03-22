<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho PHP</title>
</head>
<body>
    
    <h1>3DAW</h1>


    <?php 
        echo "<h2> Exercicio array </h2>";

        $carros = array("Fusca", "Opala", "Dodge", "Corcel");

        foreach($carros as $carro)
        {
            echo "Meu carro é um $carro <br>";
        }
    
    ?>
</body>
</html>