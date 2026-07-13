<?php

namespace BrainGames\Games\EvenGame;

function isEven(int $num): bool
{
    if ($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function generateEvenArgs(int $minNum, int $maxNum): array
{

    if ($maxNum < $minNum) {
        return [];
    }

    $numberToCheck = random_int($minNum, $maxNum);

    return [
        'question' => $numberToCheck,
        'answer' => isEven($numberToCheck) ? 'yes' : 'no'
    ];
}
