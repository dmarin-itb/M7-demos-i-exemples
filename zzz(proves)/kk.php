<?php

    // FALTARIA AFEGIR QUE CONTROLI ELS NÚMEROS MÀGICS QUE JA HAN SORTIT, I QUE NO EN REPETEIXI POSTERIORMENT: FER COM ELS NÚMEROS JUGATS, PERO QUAN GENERI UN DE NOU, HO PASSI A UN ARRAY (FUNCIÓ EXPLODE) I UN DO-WHILE?

    $final = false;
    $missatge = "";
    $intents = 0;
    if(!isset($_REQUEST['numeroMagic'])) {
        $numeroMagic = rand(0, 10);
    } else {
        $numeroMagic = $_REQUEST['numeroMagic'];
        $num = $_REQUEST['num'];
        $intents = $_REQUEST['intents'];
        $numerosJugats = $_REQUEST['numerosJugats'] . " " . $num;
        // es pot fer una funció gestionarEncert($numeroMagic, $num, $intents) que retorni $final i $missatge, en un array associatiu $resultat['final'] i $resultat['missatge'], per exemple
        if($numeroMagic == $num) {
            $final = true;
            $missatge = "L'has encertat, molt bé!";
        } else if($numeroMagic < $num) {
            $intents++;
            if($intents>=3){
                $final = true;
                $missatge = "T'has quedat sense intents. El número era: $numeroMagic";
            } else
                $missatge = "El número que busques és menor";
        } else {
            $intents++;
            if($intents>=3) {
                $final = true;
                $missatge = "T'has quedat sense intents. El número era: $numeroMagic";
            } else
                $missatge = "El número que busques és major";
        }
    }
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número Màgic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-900 flex flex-col items-center justify-center min-h-screen text-white p-6">

    <div class="bg-white text-gray-800 rounded-lg shadow-lg p-8 w-full max-w-md text-center">
        <h1 class="text-3xl font-bold text-blue-700 mb-6"><i class="fa-solid fa-gamepad mr-2"></i>Número Màgic</h1>

        <?php
        if (!$final) {
        ?>
        <form action="" method="GET" class="space-y-4">
            <input type="hidden" name="numerosJugats" value="<?php echo $numerosJugats ?? ''; ?>"/>
            <input type="hidden" name="numeroMagic" value="<?php echo $numeroMagic; ?>"/>
            <input type="hidden" name="intents" value="<?php echo $intents; ?>"/>

            <label class="block text-gray-700 text-sm font-bold">Introdueix un número entre 0 i 10:</label>
            <input name="num" type="number" min="0" max="10" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>

            <input type="submit" value="Jugar!" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 cursor-pointer"/>
        </form>

        <div class="mt-6 text-gray-700">
            <p><i class="fa-solid fa-list-ul text-blue-500 mr-1"></i> Números jugats: <?php echo $numerosJugats ?? 'Cap'; ?></p>
            <?php if ($missatge) echo "<p class='mt-4 text-blue-600'><i class='fa-solid fa-comment-dots mr-1'></i> $missatge</p>"; ?>
        </div>

        <?php
        } else {
            echo "<div class='text-center'><p class='text-xl font-semibold text-green-600 mb-4'><i class='fa-solid fa-star mr-2'></i>$missatge</p>";
            echo "<a href='demo03.php' class='inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700'><i class='fa-solid fa-rotate-left mr-1'></i>Tornar a jugar</a></div>";
        }
        ?>
    </div>

</body>
</html>
