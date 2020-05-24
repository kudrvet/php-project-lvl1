<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Flow\flow;

use const BrainGames\Flow\ROUNDS_COUNT;

function getGCD($number1, $number2)
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

function startBrainGcd()
{
    $gameRule = "Find the greatest common divisor of given numbers.";
    $gameData = generateBrainGcdData(ROUNDS_COUNT);
    flow($gameRule, $gameData);
}

function generateBrainGcdData($roundsCount)
{
    $gameData = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $question = "{$number1} {$number2}";
        $rightAnswer = getGCD($number1, $number2);

        $gameData[$question] = $rightAnswer;
    }
    return $gameData;
}
