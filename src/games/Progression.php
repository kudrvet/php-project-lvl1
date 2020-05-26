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

function getAnswer($firstNumber, $step, $lengthOfProgression)
{
    return $firstNumber + rand(0, $lengthOfProgression - 1) * $step;
}

function generateData($roundsCount)
{

    $gameData = [];
    $lengthOfProgression = 10;
    for ($i = 0; $i < $roundsCount; $i++) {
        $firstNumber = rand(-100, 100);

        do {
            $stepOfProgression = rand(-10, 10);
        } while ($stepOfProgression == 0);

        $progression = generateProgression($firstNumber, $stepOfProgression, $lengthOfProgression);
        $indexOfRightAnswer = rand(0, $lengthOfProgression - 1);
        $rightAnswer = $firstNumber + $indexOfRightAnswer * $stepOfProgression;
        $progressionWithHidden = $progression;
        $progressionWithHidden[$indexOfRightAnswer] = '..';
        $question = implode(" ", $progressionWithHidden);

        $gameData[$question] = $rightAnswer;
    }

    return $gameData;
}

function startBrainProgression()
{
    $gameRule = "What number is missing in the progression?";
    $gameData = generateData(ROUNDS_COUNT);
    flow($gameRule, $gameData);
}
