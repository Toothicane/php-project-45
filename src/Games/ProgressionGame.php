<?php

namespace BrainGames\Games\ProgressionGame;

const PROGRESSION_LENGTH = 10;
const MAX_STEP = 10;

function generateSequence(int $minFirst, int $maxFirst): array
{
    if ($maxFirst < $minFirst) {
        return [];
    }

    $step = random_int(1, MAX_STEP);
    $start = random_int($minFirst, $maxFirst);

    $result = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $result[] = $start + $i * $step;
    }

    return $result;
}

function generateProgArgs(int $minFirst, int $maxFirst): array
{
    $progression = generateSequence($minFirst, $maxFirst);

    if (empty($progression)) {
        return [];
    }

    $blankIndex = random_int(0, PROGRESSION_LENGTH - 1);
    $answer = $progression[$blankIndex];
    $progression[$blankIndex] = '..';

    return [
        'question' => implode(' ', $progression),
        'answer' => $answer
    ];
}
