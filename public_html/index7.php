<?php

$produtos = [
    ["nome" => "Mouse Gamer", "preco" => 120, "estoque" => 15],
    ["nome" => "Teclado Mecânico", "preco" => 250, "estoque" => 10],
    ["nome" => "Monitor 24’’", "preco" => 800, "estoque" => 5],
    ["nome" => "Cadeira Gamer", "preco" => 900, "estoque" => 2],
];

foreach ($produtos as $produto) {
    echo "Produto: " . $produto["nome"] . "<br>";
    echo "Preço: R$ " . $produto["preco"] . "<br>";
    echo "Estoque: " . $produto["estoque"] . "<br><br>";
}

?>
