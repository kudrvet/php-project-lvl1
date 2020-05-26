<?php

namespace BrainGames\Games\Even;

use function BrainGames\Flow\flow;

use const BrainGames\Flow\ROUNDS_COUNT;

function isEven($number)
{
    return $number % 2 == 0;
}

function generateData($roundsCount)
{

    $gameData = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand(0, 100);
        $rightAnswer = isEven($question) ? 'yes' : 'no';
        $gameData[$question] = $rightAnswer;
    }

    return $gameData;
}

function startBrainEven()
{
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no"';
    $gameData = generateData(ROUNDS_COUNT);
    flow($gameRule, $gameData);
}
