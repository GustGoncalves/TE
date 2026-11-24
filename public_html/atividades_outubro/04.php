<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>4</title>
</head>
<body>
    <h2>Contagem regressiva</h2>
    <?php
        $contador = 10;
        while ($contador >= 1) {
            echo $contador . "<br>";
            $contador--;
        }
    ?>
</body>
</html>