<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Flow\finishGame;
use function BrainGames\Flow\greetingUser;
use function BrainGames\Flow\isAnswerRightAndConsoleOutput;

function getRightAnswerOfPrimeGame($number)
{
    for ($i = 2; $i <= $number / 2; $i++) {
        if (($number % $i) == 0) {
            return "no";
        }
    }

    return "yes";
}

function generateBrainPrimeData()
{
    $gameRule = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    $number = rand(0, 3000);
    $rightAnswer = getRightAnswerOfPrimeGame($number);
    $question = $number;


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
    $gameData = generateBrainPrimeData();
    return $gameData;
}

function startBrainPrime()
{
    startGame();
}
