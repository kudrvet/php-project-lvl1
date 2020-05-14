<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Flow\flow;

function isEven($number)
{
    return ($number % 2 == 0) ? true : false;
}

function getRightAnswerOfEvenGame($isEven)
{
    return ($isEven) ? 'yes' : 'no';
}

function generateBrainEvenData($roundsCount)
{
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no"';

    $questionToAnswerMap = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand(0, 100);
        $rightAnswer = getRightAnswerOfEvenGame(isEven($question));
        $questionToAnswerMap[$question] = $rightAnswer;
    }

    return [$gameRule,$questionToAnswerMap];
}

function startBrainEven()
{
    $functionName = "BrainGames\Games\EvenGame\generateBrainEvenData";
    flow($functionName);
}
