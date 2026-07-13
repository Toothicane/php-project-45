<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\greet;

const ROUNDS_COUNT = 3;

const GAME_CONFIG = [
    'even' => [
        'rules' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'function' => 'BrainGames\Games\EvenGame\generateEvenArgs',
        'min' => 0,
        'max' => 1000],
    'calc' => [
        'rules' => 'What is the result of the expression?',
        'function' => 'BrainGames\Games\CalcGame\generateCalcArgs',
        'min' => 0,
        'max' => 100],
    'gcd' => [
        'rules' => 'Find the greatest common divisor of given numbers',
        'function' => 'BrainGames\Games\GcdGame\generateGcdArgs',
        'min' => 0,
        'max' => 100],
    'progression' => [
        'rules' => 'What number is missing in the progression?',
        'function' => 'BrainGames\Games\ProgressionGame\generateProgArgs',
        'min' => 0,
        'max' => 100],
    'prime' => [
        'rules' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
        'function' => 'BrainGames\Games\PrimeGame\generatePrimeArgs',
        'min' => 1,
        'max' => 200]
];

function runGame(string $gameName): void
{
    $config = GAME_CONFIG[$gameName];

    $userName = greet();

    line("Welcome to the Brain Games!");
    line($config['rules']);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $generator = $config['function'];
        $args = $generator($config['min'], $config['max']);

        if (empty($args)) {
            return;
        }
        $question = $args['question'];
        $correctAnswer = (string) $args['answer'];

        line("Question: %s", $question);
        $answer = prompt("Your answer");

        if ($answer === $correctAnswer) {
            line("Correct!\n");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
