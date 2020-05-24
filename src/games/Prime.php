<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Flow\flow;

use const BrainGames\Flow\ROUNDS_COUNT;

function isPrime($number)
{
    if ($number <= 0) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if (($number % $i) == 0) {
            return false;
        }
    }

    return true;
}

function generateBrainPrimeData($roundsCount)
{

    $gameData = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand(0, 3000);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';

        $gameData[$question] = $rightAnswer;
    }
    return $gameData;
}

function startBrainPrime()
{
    $gameRule = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $gameData = generateBrainPrimeData(ROUNDS_COUNT);
    flow($gameRule, $gameData);
}
