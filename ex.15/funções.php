<?php

function calcularimc($peso, $altura) {
    return $peso / ($altura * $altura);
}

function validaremail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function gerarsenha($tamanho) {
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%";
    $senha = "";

    for ($i = 0; $i < $tamanho; $i++) {
        $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }

    return $senha;
}

function contarvogais($texto) {
    $quantidade = 0;

    for ($i = 0; $i < strlen($texto); $i++) {
        if (strpos("aeiouAEIOU", $texto[$i]) !== false) {
            $quantidade++;
        }
    }

    return $quantidade;
}

function invertertexto($texto) {
    return strrev($texto);
}

function calcularidade($nascimento) {
    $data = new DateTime($nascimento);
    $hoje = new DateTime();

    return $hoje->diff($data)->y;
}

function convertermoeda($valor, $cotacao) {
    return $valor * $cotacao;
}

function formatartelefone($telefone) {
    $telefone = preg_replace("/[^0-9]/", "", $telefone);

    return "(" . substr($telefone, 0, 2) . ") " .
           substr($telefone, 2, 5) . "-" .
           substr($telefone, 7, 4);
}

function gerarsaudacao($hora) {
    if ($hora >= 6 && $hora < 12) {
        return "bom dia";
    } elseif ($hora >= 12 && $hora < 18) {
        return "boa tarde";
    } else {
        return "boa noite";
    }
}

function validarsenha($senha) {
    return strlen($senha) >= 8 &&
           preg_match("/[A-Z]/", $senha) &&
           preg_match("/[a-z]/", $senha) &&
           preg_match("/[0-9]/", $senha) &&
           preg_match("/[^a-zA-Z0-9]/", $senha);
}

?>