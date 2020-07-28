<?php

function normalizeNumbers(string $a, string $b): array
{
    $lenA = strlen($a);
    $lenB = strlen($b);

    if ($lenA > $lenB) {
        $pad_length = $lenA - $lenB;
        $b = str_pad($b, $lenA, "0", STR_PAD_LEFT);
    }
    elseif ($lenB > $lenA) {
        $pad_length = $lenB - $lenA;
        $a = str_pad($a, $lenB, "0", STR_PAD_LEFT);
    }

    return [$a, $b];
}

function bigsum(string $a, string $b): string
{
    if (empty($a)) {
        return $b;
    }

    if (empty($b)) {
        return $a;
    }

    list($a, $b) = normalizeNumbers($a, $b);

    $sum = '';
    $memory = 0;
    $len = strlen($a) - 1;

    for ($i=$len; $i >= 0; $i--) {

        $temp = $memory + $a[$i] + $b[$i];

        if ($temp > 9) {
            $memory = 1;
            $temp = $temp - 10;
        } else {
            $memory = 0;
        }

        $sum = $temp . $sum;
    }

    if ($memory > 0) {
        $sum = $memory . $sum;
    }

    return $sum;
}
