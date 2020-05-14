<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function printGameRuleToConsole($gameRule)
{
    line('Welcome to the Brain Game!');
    line($gameRule);
    line("");
}

function getUserNameAndSayHello()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
