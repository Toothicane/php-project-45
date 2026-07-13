<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

use function BrainGames\Cli\greet;

use function BrainGames\Games\EvenGame\generateEvenQuestion;
use function BrainGames\Games\EvenGame\getEvenAnswer;

use function BrainGames\Games\CalcGame\generateCalc;

use function BrainGames\Games\GcdGame\generateGcdArgs;

use function BrainGames\Games\ProgressionGame\generateProgArgs;

use function BrainGames\Games\PrimeGame\generatePrimeArgs;

const ROUNDS_COUNT = 3;

const GAME_CONFIG = [
    'even' => [
        'rules' => 'Answer "yes" if the number is even, otherwise answer "no"',
        'min' => 0, 
        'max' => 1000
    ],
    'calc' => [
        'rules' => 'What is the result of the expression?',
        'min' => 0, 
        'max' => 100
    ],
    'gcd' => [
        'rules' => 'Find the greatest common divisor of given numbers',
        'min' => 0, 
        'max' => 100
    ],
    'progression' => [
        'rules' => 'What number is missing in the progression?',
        'min' => 0, 
        'max' => 100
    ],
    'prime' => [
        'rules' => 'Answer "yes" if given number is prime. Otherwise answer "no"',
        'min' => 1, 
        'max' => 200
    ]
];

function runGame(string $gameName) : void
{
    $config = GAME_CONFIG[$gameName];

    $userName = greet();

    line($config['rules']);

    for($i = 0; $i < ROUNDS_COUNT; $i++) {
        switch($gameName) {
            case 'even':
                $question = generateEvenQuestion($config['min'], $config['max']);
                if($question === false) {
                    return;
                }
                $correctAnswer = getEvenAnswer($question);
                break;
            case 'calc':
                $calcArgs = generateCalc($config['min'], $config['max']);
                if(empty($calcArgs)) {
                    return;
                }
                $question = $calcArgs['question'];
                $correctAnswer = (string) $calcArgs['answer'];
                break;
            case 'gcd':
                $gcdArgs = generateGcdArgs($config['min'], $config['max']);
                if(empty($gcdArgs)) {
                    return;
                }
                $question = $gcdArgs['question'];
                $correctAnswer = (string) $gcdArgs['answer'];
                break;
            case 'progression':
                $progArgs = generateProgArgs($config['min'], $config['max']);
                if(empty($progArgs)) {
                    return;
                }
                $question = $progArgs['question'];
                $correctAnswer = (string) $progArgs['answer'];
                break;
            case 'prime':
                $primeArgs = generatePrimeArgs($config['min'], $config['max']);
                if(empty($primeArgs)) {
                    return;
                }
                $question = $primeArgs['question'];
                $correctAnswer = (string) $primeArgs['answer'];
                break;
            default:
                return;    
        }

        line("Question: %s", $question);
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
