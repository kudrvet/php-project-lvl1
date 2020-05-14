<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Flow\flow;

function getRightAnswerOfGcdGame($number1, $number2)
{
    if ($number1 < $number2) {
        [$number1, $number2] = [$number2, $number1];
    }

    do {
        $remainder = $number1 % $number2;

        if ($remainder == 0) {
            return $number2;
        }

        $number1 = $number2;
        $number2 = $remainder;
    } while (1);
}

function generateBrainGcdData($roundsCount)
{
    $gameRule = "Find the greatest common divisor of given numbers.";

    $questionToAnswerMap = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $question = "{$number1} {$number2}";
        $rightAnswer = getRightAnswerOfGcdGame($number1, $number2);

        $questionToAnswerMap[$question] = $rightAnswer;
    }
    return [$gameRule,$questionToAnswerMap];
}

function startBrainGcd()
{
    $functionName = "BrainGames\Games\GcdGame\generateBrainGcdData";
    flow($functionName);
}
