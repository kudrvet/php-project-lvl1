<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Flow\flow;

use const BrainGames\Flow\ROUNDS_COUNT;

function generateProgression($firstNumber, $step, $lengthOfProgression)
{
    $progression = [];
    for ($i = 0; $i < $lengthOfProgression; $i++) {
        $nextNumber = $firstNumber + $step * $i;
        $progression[] = $nextNumber;
    }

    return $progression;
}

function getRightAnswerOfProgressionGame($firstNumber, $step, $lengthOfProgression)
{
    return $firstNumber + rand(0, $lengthOfProgression - 1) * $step;
}

function getQuestionOfProgressionGame($progressionArray, $rightAnswer)
{
    $progression = $progressionArray;
    $indexOfRightAnswer = array_search($rightAnswer, $progression);
    $progression[$indexOfRightAnswer] = '..';

    return implode(" ", $progression);
}

function generateBrainProgressionData($roundsCount)
{

    $gameData = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $lengthOfProgression = 10;
        $firstNumber = rand(-100, 100);

        do {
            $stepOfProgression = rand(-10, 10);
        } while ($stepOfProgression == 0);

        $progression = generateProgression($firstNumber, $stepOfProgression, $lengthOfProgression);
        $rightAnswer = getRightAnswerOfProgressionGame($firstNumber, $stepOfProgression, $lengthOfProgression);
        $question = getQuestionOfProgressionGame($progression, $rightAnswer);
        $gameData[$question] = $rightAnswer;
    }

    return $gameData;
}

function startBrainProgression()
{
    $gameRule = "What number is missing in the progression?";
    $gameData = generateBrainProgressionData(ROUNDS_COUNT);
    flow($gameRule, $gameData);
}
