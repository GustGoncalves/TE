<?php
$produtos = [
    ["nome" => "Mouse Gamer", "preco" => 120, "estoque" => 15],
    ["nome" => "Teclado Mecânico", "preco" => 250, "estoque" => 10],
    ["nome" => "Monitor 24’’", "preco" => 800, "estoque" => 5],
    ["nome" => "Cadeira Gamer", "preco" => 900, "estoque" => 2],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>1</title>
</head>
<body>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto['nome'] ?></td>
                    <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= $produto['estoque'] ?></td>
                    <td>
                        <?php
                            if ($produto['estoque'] == 0) {
                                echo "Esgotado";
                            } elseif ($produto['estoque'] <= 5) {
                                echo "Estoque baixo";
                            } else {
                                echo "Disponível";
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>