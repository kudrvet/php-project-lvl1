<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Flow\finishGame;
use function BrainGames\Flow\greetingUser;
use function BrainGames\Flow\isAnswerRightAndConsoleOutput;

function getRightAnswerOfEvenGame($number)
{
    $result = ($number % 2 == 0) ? 'yes' : 'no';
    return $result;
}

function generateBrainEvenData()
{
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no"';
    $number = rand(0, 100);
    $question = $number;
    $rightAnswer = getRightAnswerOfEvenGame($number);

    return [$gameRule,$question,$rightAnswer];
}

function startGame()
{
    $gameData = generateData();
    $gameRule = $gameData[0];
    $userName = greetingUser($gameRule);
    $countOfCorrectAnswers = 0;
    $needfulCountOfCorrectAnswers = 3;
    while ($countOfCorrectAnswers !== $needfulCountOfCorrectAnswers) {
        $gameData = generateData();
        $isUserRight = isAnswerRightAndConsoleOutput($gameData, $userName);
        if ($isUserRight) {
            $countOfCorrectAnswers += 1;
        } else {
            $countOfCorrectAnswers = 0;
        }
    }
    finishGame($userName);
}


function generateData()
{
    $gameData = generateBrainEvenData();
    return $gameData;
}

function startBrainEven()
{
    startGame();
}
