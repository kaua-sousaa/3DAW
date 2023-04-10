<?php 
//lala
$valor1=0;
$valor2=0;
$operador=0;
$result=0;

if (isset($_POST['op1']))
{
    $operador = $_POST["op1"];
}
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $valor1 = $_POST["valor1"];
        $valor2 = $_POST["valor2"];
        if ($valor1 && $valor2)
        {
            if ($operador == "+")
            {
                $result = $valor1 + $valor2;
            }else if ($operador == "-")
            {
                $result = $valor1 - $valor2;
            }else if ($operador == "*")
            {
                $result = $valor1 * $valor2;
            }else if ($operador == "/")
            {
                $result = $valor1 / $valor2;
            }
        }else if (($valor1 && !$valor2) || ($valor2 && !$valor1))
        {
            if ($operador == "seno")
            {
                if ($valor1)
                {
                    $result = sin($valor1);
                } else if($valor2){
                    $result = sin($valor2);
                } 
            }else if($operador == "cosseno")
            {
                if ($valor1){
                    $result = cos($valor1);
                } else if($valor2)
                {
                    $result = cos($valor2); 
                }             
            }else if ($operador == "tangente")
            {
                if ($valor1)
                {
                    $result = tan($valor1);
                }else if ($valor2)
                {
                    $result = tan($valor2);
                }                
            }
        }   
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora em PHP - Kauã</h1>

    <form action="Calculadora.php" method="post">
        Numero 1:<br>
        <input type="number" name="valor1"><br>
        Numero 2:<br>
        <input type="number" name="valor2"><br>  

        <input type="radio" name="op1" value="+">Soma<br>       
        <input type="radio" name="op1" value="-">Subtração<br>        
        <input type="radio" name="op1" value="*">Multiplicação<br>
        <input type="radio" name="op1" value="/">Divisão<br>
        <input type="radio" name="op1" value="seno">Seno<br>
        <input type="radio" name="op1" value="cosseno">Cosseno<br>
        <input type="radio" name="op1" value="tangente">Tangente<br>
        <input type="submit" value="enviar">
    </form>


    <p>resultado: <?php echo $result?></p>
</body>
</html>