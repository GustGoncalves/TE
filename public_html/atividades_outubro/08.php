<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>8</title>
</head>
<body>
    <h2>Nota do aluno</h2>
    <?php
        $nota = rand(1, 10);

        if ($nota >= 7) {
            $situacaoNota = "Aprovado";
        } elseif ($nota >= 5 && $nota < 7) {
            $situacaoNota = "Recuperação";
        } else {
            $situacaoNota = "Reprovado";
        }

        echo "Nota gerada: " . $nota . "<br>";
        echo "Situação: " . $situacaoNota . "<br>";
    ?>
</body>
</html>