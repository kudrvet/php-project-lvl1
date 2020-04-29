<?php

namespace BrainGames\Games\ProgressionGame;

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
