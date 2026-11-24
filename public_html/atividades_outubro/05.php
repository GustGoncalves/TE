<?php
$categoria = "informatica";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>5</title>
</head>
<body>
    <h2>Categoria</h2>
    <?php
        switch ($categoria) {
            case "informatica":
                echo "Sessão de Informática";
                break;
            case "games":
                echo "Sessão de Games";
                break;
            case "moveis":
                echo "Sessão de Móveis";
                break;
            default:
                echo "Sessão não encontrada";
        }
    ?>
</body>
</html>