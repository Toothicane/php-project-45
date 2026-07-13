<?php

namespace BrainGames\EvenGame;

use function cli\line;
use function cli\prompt;

use function BrainGames\Cli\greet;

function isEven(int $num) : bool 
{
    if($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function playEven() : void
{
    $userName = greet();

    $roundsCount = 3;
    $minInt = 0;
    $maxInt = 1000;

    line("Answer \"yes\" if the number is even, otherwise answer \"no\"");

    for($i = 0; $i < $roundsCount; $i++) {
        $questionNum = rand($minInt, $maxInt);
        $correctAnswer = isEven($questionNum) ? "yes" : "no";

        line("Question: %d", $questionNum);
        $answer = prompt("Your answer");

        if($answer === $correctAnswer) {
            line("Correct!\n");
        } else {
            line("'%s' is a wrong anwser! The correct answer was '%s'\nLet's try again, %s!", $answer, $correctAnswer, $userName);
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
