<!DOCTYPE html>
<html lang>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <?php
        $nomes = array('João', 'Maria', 'Pedro', 'Ana', 'Lucas', 'Larissa');
        $notas = array(7.5, 9.0, 6.8, 8.5, 7.0, 9.5);
    ?>

    <table>
        <tr>
            <th>Nome</th>
            <th>Notas</th>
            <th>Status</th>
        <?php for($i=0;$i<=5;$i++){ ?>
            </tr>
            <tr>
                <td><?php echo $nomes[$i]; ?></td> 
                <td><?php echo $notas[$i]; ?>
                <td><?php 
                if ($notas[$i]>=8)
                {
                    echo "Aprovado";
                }else{
                    echo "Reprovado";
                }
                ?> 
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>