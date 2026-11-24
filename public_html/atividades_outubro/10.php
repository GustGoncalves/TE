<?php
$nomes = ["Ana", "Bruno", "Carla", "Diego", "Eduarda"];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>10</title>
</head>
<body>
    <h2>Saudações</h2>
    <?php
        foreach ($nomes as $nome) {
            echo "Olá, " . $nome . "!<br>";
        }
    ?>
</body>
</html>