<?php

namespace BrainGames\Games\EvenGame;


use function BrainGames\Cli\questionConsoleUotput;
use function BrainGames\Cli\getUserAnswerAndConsoleOutput;
use function BrainGames\Cli\rightConsoleOutput;
use function BrainGames\Cli\wrongConsoleOutput;





function getRightAnswerOfEvenGame($number)
{
    $result = ($number % 2 == 0) ? 'yes' : 'no';
    return $result;
}





//echo(getRightAnswerOfCalcGame());