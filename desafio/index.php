<?php

include "funcoes.php";

$produtos = [
    [
        "nome" => "notebook",
        "quantidade" => 2,
        "valor" => 2500
    ],
    [
        "nome" => "mouse",
        "quantidade" => 3,
        "valor" => 80
    ],
    [
        "nome" => "teclado",
        "quantidade" => 1,
        "valor" => 150
    ],
    [
        "nome" => "fone",
        "quantidade" => 2,
        "valor" => 120
    ]
];

$resultado = processarPedido($produtos);

echo "relatório do pedido<br><br>";

echo "quantidade de produtos diferentes: " . $resultado["quantidade_produtos"] . "<br>";
echo "quantidade total de itens: " . $resultado["quantidade_itens"] . "<br><br>";

echo "produto mais caro: " . $resultado["produto_mais_caro"]["nome"] . "<br>";
echo "valor unitário: r$ " . number_format($resultado["produto_mais_caro"]["valor"], 2, ",", ".") . "<br><br>";

echo "produto com maior subtotal: " . $resultado["maior_subtotal"]["nome"] . "<br>";
echo "subtotal: r$ " . number_format(calcularsubtotal($resultado["maior_subtotal"]["quantidade"], $resultado["maior_subtotal"]["valor"]), 2, ",", ".") . "<br><br>";

echo "subtotais:<br>";

foreach ($resultado["subtotais"] as $subtotal) {
    echo $subtotal["nome"] . ": r$ " . number_format($subtotal["subtotal"], 2, ",", ".") . "<br>";
}

echo "<br>";

echo "valor total: r$ " . number_format($resultado["total"], 2, ",", ".") . "<br>";
echo "desconto: r$ " . number_format($resultado["desconto"], 2, ",", ".") . "<br>";
echo "frete: r$ " . number_format($resultado["frete"], 2, ",", ".") . "<br>";
echo "valor final: r$ " . number_format($resultado["valor_final"], 2, ",", ".") . "<br>";

?>