<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>6</title>
</head>
<body>
    <h2>Soma dos divisíveis por 4 (1 a 50)</h2>
    <?php
        $soma = 0;
        for ($i = 1; $i <= 50; $i++) {
            if ($i % 4 == 0) {
                echo $i . "<br>";
                $soma += $i;
            }
        }
        echo "Resultado final: " . $soma . "<br>";
    ?>
</body>
</html>