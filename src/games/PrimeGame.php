<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Flow\flow;

function getRightAnswerOfPrimeGame($number)
{
    for ($i = 2; $i <= $number / 2; $i++) {
        if (($number % $i) == 0) {
            return "no";
        }
    }

    return "yes";
}

function generateBrainPrimeData($roundsCount)
{
    $gameRule = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    $questionToAnswerMap = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $number = rand(0, 3000);
        $rightAnswer = getRightAnswerOfPrimeGame($number);
        $question = $number;

        $questionToAnswerMap[$question] = $rightAnswer;
    }
    return [$gameRule,$questionToAnswerMap];
}

function startBrainPrime()
{
    $functionName = "BrainGames\Games\PrimeGame\generateBrainPrimeData";
    flow($functionName);
}
