<?php

include "funcoes.php";

echo "imc: " . number_format(calcularimc(60, 1.65), 2, ",", ".") . "<br>";

echo "e-mail válido: ";
echo validaremail("teste@email.com") ? "sim" : "não";
echo "<br>";

echo "senha aleatória: " . gerarsenha(10) . "<br>";

echo "quantidade de vogais: " . contarvogais("programação") . "<br>";

echo "texto invertido: " . invertertexto("php é legal") . "<br>";

echo "idade: " . calcularidade("2008-05-10") . " anos<br>";

echo "valor convertido: r$ " . number_format(convertermoeda(100, 5.40), 2, ",", ".") . "<br>";

echo "telefone: " . formatartelefone("47999999999") . "<br>";

echo "saudação: " . gerarsaudacao(15) . "<br>";

echo "senha forte: ";
echo validarsenha("Abc123!@") ? "sim" : "não";

?>