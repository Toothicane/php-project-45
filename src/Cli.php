<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function greet(): string
{
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    return $name;
}
