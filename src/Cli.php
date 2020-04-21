<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no" .');
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
