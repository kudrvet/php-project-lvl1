<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Flow\flow;

function generateProgression($lengthOfProgression)
{
    $firstNumber = rand(-100, 100);

    do {
        $stepOfProgression = rand(-10, 10);
    } while ($stepOfProgression == 0);

    $progression = [];
    for ($i = 0; $i < $lengthOfProgression; $i++) {
        $nextNumber = $firstNumber + $stepOfProgression * $i;
        $progression[] = $nextNumber;
    }

    return $progression;
}

function getRightAnswerOfProgressionGame($progression, $missingKey)
{
    $rightAnswer = $progression[$missingKey];
    return $rightAnswer;
}

function getQuestionOfProgressionGame($progressionArray, $missingKey)
{
    $progression = $progressionArray;
    $progression[$missingKey] = "..";
    $question = implode(" ", $progression);

    return $question;
}

function generateBrainProgressionData($roundsCount)
{
    $gameRule = "What number is missing in the progression?";

    $questionToAnswerMap = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $lengthOfProgression = 10;
        $progression = generateProgression($lengthOfProgression);
        $missingKey = array_rand($progression);
        $rightAnswer = getRightAnswerOfProgressionGame($progression, $missingKey);
        $question = getQuestionOfProgressionGame($progression, $missingKey);
        $questionToAnswerMap[$question] = $rightAnswer;
    }
    return [$gameRule,$questionToAnswerMap];
}

function startBrainProgression()
{
    $functionName = "BrainGames\Games\ProgressionGame\generateBrainProgressionData";
    flow($functionName);
}
