<?php

namespace BrainGames\Games\CalcGame;

const MIN_OPERATION_NUM = 1;
const MAX_OPERATION_NUM = 3;

function generateCalcArgs(int $minNum, int $maxNum): array
{
    $firstNum = random_int($minNum, $maxNum);
    $secondNum = random_int($minNum, $maxNum);

    $operationNum = random_int(MIN_OPERATION_NUM, MAX_OPERATION_NUM);

    $result = [];

    switch ($operationNum) {
        case 1:
            $result['question'] = "{$firstNum} + {$secondNum}";
            $result['answer'] = $firstNum + $secondNum;
            break;
        case 2:
            $result['question'] = "{$firstNum} - {$secondNum}";
            $result['answer'] = $firstNum - $secondNum;
            break;
        case 3:
            $result['question'] = "{$firstNum} * {$secondNum}";
            $result['answer'] = $firstNum * $secondNum;
            break;
        default:
            return [];
    }

    return $result;
}
