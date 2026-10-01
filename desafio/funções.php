<?php

function calcularsubtotal($quantidade, $valor) {
    return $quantidade * $valor;
}

function calculartotal($produtos) {
    $total = 0;

    foreach ($produtos as $produto) {
        $total += calcularsubtotal($produto["quantidade"], $produto["valor"]);
    }

    return $total;
}

function calculardesconto($total) {
    if ($total > 1000) {
        return $total * 0.15;
    } elseif ($total > 500) {
        return $total * 0.10;
    }

    return 0;
}

function calcularfrete($total) {
    if ($total <= 300) {
        return 35;
    } elseif ($total <= 800) {
        return 20;
    }

    return 0;
}

function encontrarprodutoMaisCaro($produtos) {
    $maior = $produtos[0];

    foreach ($produtos as $produto) {
        if ($produto["valor"] > $maior["valor"]) {
            $maior = $produto;
        }
    }

    return $maior;
}

function encontrarMaiorSubtotal($produtos) {
    $maior = $produtos[0];

    foreach ($produtos as $produto) {
        $subtotal = calcularsubtotal($produto["quantidade"], $produto["valor"]);
        $maiorSubtotal = calcularsubtotal($maior["quantidade"], $maior["valor"]);

        if ($subtotal > $maiorSubtotal) {
            $maior = $produto;
        }
    }

    return $maior;
}

function calcularQuantidadeItens($produtos) {
    $quantidade = 0;

    foreach ($produtos as $produto) {
        $quantidade += $produto["quantidade"];
    }

    return $quantidade;
}

function processarPedido($produtos) {
    $total = calculartotal($produtos);
    $desconto = calculardesconto($total);
    $frete = calcularfrete($total);
    $valorFinal = $total - $desconto + $frete;

    $subtotais = [];

    foreach ($produtos as $produto) {
        $subtotais[] = [
            "nome" => $produto["nome"],
            "subtotal" => calcularsubtotal($produto["quantidade"], $produto["valor"])
        ];
    }

    return [
        "quantidade_produtos" => count($produtos),
        "quantidade_itens" => calcularQuantidadeItens($produtos),
        "produto_mais_caro" => encontrarprodutoMaisCaro($produtos),
        "maior_subtotal" => encontrarMaiorSubtotal($produtos),
        "subtotais" => $subtotais,
        "total" => $total,
        "desconto" => $desconto,
        "frete" => $frete,
        "valor_final" => $valorFinal
    ];
}
?>