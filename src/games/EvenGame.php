<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Flow\flow;

function getRightAnswerOfEvenGame($number)
{
    $result = ($number % 2 == 0) ? 'yes' : 'no';
    return $result;
}

function generateBrainEvenData()
{
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no"';
    $number = rand(0, 100);
    $question = $number;
    $rightAnswer = getRightAnswerOfEvenGame($number);

    return [$gameRule,$question,$rightAnswer];
}

function startBrainEven()
{
    $functionName = "BrainGames\Games\EvenGame\generateBrainEvenData";
    flow($functionName);
}
