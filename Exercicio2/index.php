<?php

echo '<h1>Exercício 2</h1>';

echo '1) Crie um array';
$numeros = [];
echo '<pre>';
print_r($numeros);
echo '</br> ---------------------------------------------------------- </br>';

echo '2) Popule este array com 7 números';
array_push($numeros, 1, 2, 3, 4, 5, 6, 7);
echo '<pre>';
print_r($numeros);
echo '</br> ---------------------------------------------------------- </br>';

echo '3) Imprima o número da terceira posição do array';
echo '<pre>';
print_r($numeros[2]);
echo '</br> ---------------------------------------------------------- </br>';

echo '4) Crie uma variável com todos os itens do array no formato de string separado por vírgula';
$numeros_str = implode(',', $numeros);
echo '<pre>';
var_dump($numeros_str);
echo '</br> ---------------------------------------------------------- </br>';

echo '5) Crie um novo array a partir da variável no formato de string que foi criada e destrua o array anterior';
$numeros_array = explode(',', $numeros_str);
unset($numeros);
echo '<pre>';
print_r($numeros_array);
print_r($numeros);
echo '</br> ---------------------------------------------------------- </br>';

echo '6) Crie uma condição para verificar se existe o valor 14 no array </br>';
if (in_array(14, $numeros_array)) {
    echo 'Existe o número 14 no array';
} else {
    echo 'Não existe o número 14 no array.';
}
echo '</br> ---------------------------------------------------------- </br>';

echo '7) Faça uma busca em cada posição. Se o número da posição atual for menor que o da posição anterior (valor anterior que não foi excluído do array ainda), exclua esta posição';
foreach ($numeros_array as $i) {
    foreach ($numeros_array as $j) {
        if ($j < $i) {
            unset($numeros_array[$j]);
        }
    }
}
echo '<pre>';
print_r($numeros_array);
echo '</br> ---------------------------------------------------------- </br>';

echo '8) Remova a última posição deste array';
$ultima_posicao = array_pop($numeros_array);
echo '<pre>';
var_dump($ultima_posicao);
echo '</br> ---------------------------------------------------------- </br>';
echo '<pre>';
print_r($numeros_array);
echo '</br> ---------------------------------------------------------- </br>';

echo '9) Conte quantos elementos tem neste array';
$result = count($numeros_array);
echo '<pre>';
var_dump($result);
echo '</br> ---------------------------------------------------------- </br>';

echo '10) Inverta as posições deste array';
$numeros_array = array_reverse($numeros_array);
echo '<pre>';
print_r($numeros_array);
echo '</br> ---------------------------------------------------------- </br>';