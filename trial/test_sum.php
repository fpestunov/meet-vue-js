<?php

require 'sum.php';

// тест 1. одно из чисел пустое, возращает второе
$a = '234';
$b = '';

echo 'Сумма (ожидается 234): ' . bigsum($a, $b) . PHP_EOL; // => 234

// тест 2. складывает числа одинаковой длины в столбик (без накопления)
$a = '4321';
$b = '4321';

echo 'Сумма (ожидается 8642): ' . bigsum($a, $b) . PHP_EOL; // => 8642

// тест 3. складывает числа одинаковой длины в столбик (с накоплением)
$a = '9999';
$b = '9999';

echo 'Сумма (ожидается 19998): ' . bigsum($a, $b) . PHP_EOL; // => 19998

// тест 4. складывает числа разной длины в столбик (с накоплением)
// меньшую строку дополняет нулями
$a = '123456789';
$b = '987';

echo 'Сумма (ожидается 123457776): ' . bigsum($a, $b) . PHP_EOL; // => 123457776

// тест 5. складываем очень большие числа
$a = '36893488147419103232';
$b = '36893488147419103232';

echo 'Сумма (ожидается 73786976294838206464): ' . bigsum($a, $b) . PHP_EOL; // => 73786976294838206464

// тест 6. складываем не целые значения
