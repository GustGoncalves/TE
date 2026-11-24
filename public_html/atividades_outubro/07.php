<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>7</title>
</head>
<body>
    <h2>Número secreto</h2>
    <?php
        $numeroSecreto = rand(1, 100);
        echo "Número secreto definido: " . $numeroSecreto . "<br><br>";

        $tentativa = 1;
        while ($tentativa <= 700) {
            $aleatorio = rand(1, 100);
            if ($aleatorio == $numeroSecreto) {
                echo "Acerto na posição: " . $tentativa . "º<br>";
            }
            $tentativa++;
        }
    ?>
</body>
</html>