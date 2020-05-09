<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Flow\flow;

function getRightAnswerOfEvenGame($number)
{
    $result = ($number % 2 == 0) ? 'yes' : 'no';
    return $result;
}

function generateBrainEvenData($roundsCount)
{
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no"';

    $pairs = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $number = rand(0, 100);
        $question = $number;
        $rightAnswer = getRightAnswerOfEvenGame($number);

        $pairs[$question] = $rightAnswer;
    }

    return [$gameRule,$pairs];
}

function startBrainEven()
{
    $roundsCount = 3;
    $gameData = generateBrainEvenData($roundsCount);
    flow($gameData);
}
