<?php

namespace BrainGames\Games\GcdGame;

function findGcd(int $a, int $b)
{
    if(($a < 0) || ($b < 0)) {
        return false;
    }

    while($b !== 0) {
        $temp = $a;
        $a = $b;
        $b = $temp % $b;
    }

    return $a;
}

function generateGcdArgs(int $minNum, int $maxNum) : array
{
    $firstNum = random_int($minNum, $maxNum);
    $secondNum = random_int($minNum, $maxNum);

    $gcd = findGcd($firstNum, $secondNum);
    if($gcd === false) {
        return [];
    }

    return [
        'question' => "{$firstNum} {$secondNum}",
        'answer' => $gcd
    ];
}