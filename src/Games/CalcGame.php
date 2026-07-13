<?php

namespace BrainGames\Games\CalcGame;

const MIN_OPERATION_NUM = 1;
const MAX_OPERATION_NUM = 3;

function generateCalcArgs(int $minNum, int $maxNum): array
{
    $firstNum = random_int($minNum, $maxNum);
    $secondNum = random_int($minNum, $maxNum);

    $operationNum = random_int(MIN_OPERATION_NUM, MAX_OPERATION_NUM);

    switch ($operationNum) {
        case 1:
            return [
                'question' => "{$firstNum} + {$secondNum}",
                'answer' => $firstNum + $secondNum
            ];
        case 2:
            return [
                'question' => "{$firstNum} - {$secondNum}",
                'answer' => $firstNum - $secondNum
            ];
        case 3:
            return [
                'question' => "{$firstNum} * {$secondNum}",
                'answer' => $firstNum * $secondNum
            ];
        default:
            return [];
    }
}
