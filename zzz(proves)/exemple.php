<?php

    if(isset($_GET['numero'])){
        echo "S'ha enviat. Valor: " . $_GET['numero'] . "<br/><br/>";
        $numeroMagic = $_GET['numeroMagic'];
        $numeroIntents = $_GET['numeroIntents']-1;
    } else {
        $numeroMagic = rand(0, 10);
        $numeroIntents = 3;
        echo "Primera vegada que arribem a la pàgina. Generar el número aleatori -> $numeroMagic";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
    <input type="hidden" name="numeroMagic" value="<?php echo $numeroMagic; ?>"/>
    <input type="number" name="numeroIntents" value="<?php echo $numeroIntents; ?>" readonly/>
    <input type="number" name="numero" size="4"/><br/><br/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>