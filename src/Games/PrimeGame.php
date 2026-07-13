<?php

namespace BrainGames\Games\PrimeGame;

function isPrime(int $num): bool
{
    if (($num < 2) || ($num % 2 === 0)) {
        return false;
    }

    if ($num === 2) {
        return true;
    }

    for ($i = 3; $i <= ceil(sqrt($num)); $i += 2) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function generatePrimeArgs(int $minNum, int $maxNum): array
{
    if ($maxNum < $minNum) {
        return [];
    }

    $numberToCheck = random_int($minNum, $maxNum);

    return [
        'question' => $numberToCheck,
        'answer' => isPrime($numberToCheck) ? 'yes' : 'no'
    ];
}
