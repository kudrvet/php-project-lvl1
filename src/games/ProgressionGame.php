<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Flow\flow;

function generateProgression($firstNumber, $stepOfProgression, $lengthOfProgression)
{
    $progression = [$firstNumber];
    for ($i = 1; $i < $lengthOfProgression; $i++) {
        $nextNumber = $firstNumber + $stepOfProgression;
        $progression[] = $nextNumber;
        $firstNumber = $nextNumber;
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

function generateBrainProgressionData()
{
    $gameRule = "What number is missing in the progression?";

    $firstNumber = rand(-100, 100);

    do {
        $stepOfProgression = rand(-10, 10);
    } while ($stepOfProgression == 0);

    $lengthOfProgression = 10;

    $progression = generateProgression($firstNumber, $stepOfProgression, $lengthOfProgression);
    $missingKey = array_rand($progression);
    $rightAnswer = getRightAnswerOfProgressionGame($progression, $missingKey);
    $question = getQuestionOfProgressionGame($progression, $missingKey);

    return [$gameRule,$question,$rightAnswer];
}



function startBrainProgression()
{
    $functionName = "BrainGames\Games\ProgressionGame\generateBrainProgressionData";
    flow($functionName);
}
