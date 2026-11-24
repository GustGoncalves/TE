<?php
$vendas = [];
for ($i = 0; $i < 10; $i++) {
    $vendas[] = round(rand(5000, 50000) / 100, 2);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>11</title>
</head>
<body>
    <h2>Vendas diárias</h2>
    <?php
        $maiorVenda = $vendas[0];
        $menorVenda = $vendas[0];
        $somaVendas = 0;
        $qtdOtima  = 0;
        $qtdBoa    = 0;
        $qtdBaixa  = 0;

        echo "<strong>Vendas registradas:</strong><br>";
        foreach ($vendas as $venda) {
            echo "R$ " . number_format($venda, 2, ',', '.') . "<br>";

            if ($venda > $maiorVenda) {
                $maiorVenda = $venda;
            }
            if ($venda < $menorVenda) {
                $menorVenda = $venda;
            }

            $somaVendas += $venda;

            if ($venda >= 400) {
                $qtdOtima++;
            } elseif ($venda >= 200) {
                $qtdBoa++;
            } else {
                $qtdBaixa++;
            }
        }

        $mediaVendas = $somaVendas / count($vendas);
    ?>

    <h3>Resultados</h3>
    <ul>
        <li><strong>Maior venda do dia:</strong> R$ <?= number_format($maiorVenda, 2, ',', '.') ?></li>
        <li><strong>Menor venda do dia:</strong> R$ <?= number_format($menorVenda, 2, ',', '.') ?></li>
        <li><strong>Média de vendas:</strong> R$ <?= number_format($mediaVendas, 2, ',', '.') ?></li>
    </ul>

    <h3>Contagem por faixa</h3>
    <ul>
        <li><strong>Ótimas</strong> (≥ R$ 400): <?= $qtdOtima ?> venda(s)</li>
        <li><strong>Boas</strong> (≥ R$ 200 e < R$ 400): <?= $qtdBoa ?> venda(s)</li>
        <li><strong>Baixas</strong> (< R$ 200): <?= $qtdBaixa ?> venda(s)</li>
    </ul>
</body>
</html>