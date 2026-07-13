<?php

namespace BrainGames\Games\EvenGame;

function isEven(int $num): bool
{
    return ($num % 2 === 0) ? true : false;
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
