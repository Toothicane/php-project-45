<?php

namespace BrainGames\Games\EvenGame;

function isEven(int $num) : bool 
{
    if($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function generateEvenQuestion(int $minNum, int $maxNum)
{
    if($maxNum < $minNum) {
        return false;
    }

    return random_int($minNum, $maxNum);
}

function getEvenAnswer(int $questionNum) {
    return isEven($questionNum) ? "yes" : "no";
}