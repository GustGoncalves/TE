<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>9</title>
</head>
<body>
    <h2>Mês do ano</h2>
    <?php
        $mes = rand(1, 12);

        switch ($mes) {
            case 1:  $nomeMes = "Janeiro";   break;
            case 2:  $nomeMes = "Fevereiro"; break;
            case 3:  $nomeMes = "Março";     break;
            case 4:  $nomeMes = "Abril";     break;
            case 5:  $nomeMes = "Maio";      break;
            case 6:  $nomeMes = "Junho";     break;
            case 7:  $nomeMes = "Julho";     break;
            case 8:  $nomeMes = "Agosto";    break;
            case 9:  $nomeMes = "Setembro";  break;
            case 10: $nomeMes = "Outubro";   break;
            case 11: $nomeMes = "Novembro";  break;
            case 12: $nomeMes = "Dezembro";  break;
            default: $nomeMes = "Mês inválido";
        }

        echo "Valor gerado: " . $mes . "<br>";
        echo "Mês correspondente: " . $nomeMes . "<br>";
    ?>
</body>
</html>