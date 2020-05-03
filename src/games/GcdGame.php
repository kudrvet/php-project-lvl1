<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Flow\finishGame;
use function BrainGames\Flow\greetingUser;
use function BrainGames\Flow\isAnswerRightAndConsoleOutput;

function getRightAnswerOfGcdGame($number1, $number2)
{
    if ($number1 < $number2) {
        [$number1, $number2] = [$number2, $number1];
    }

    do {
        $remainder = $number1 % $number2;

        if ($remainder == 0) {
            return $number2;
        }

        $number1 = $number2;
        $number2 = $remainder;
    } while (1);
}

function generateBrainGcdData()
{
    $gameRule = "Find the greatest common divisor of given numbers.";

    $number1 = rand(0, 100);
    $number2 = rand(0, 100);
    $question = "{$number1} {$number2}";
    $rightAnswer = getRightAnswerOfGcdGame($number1, $number2);

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
    $gameData = generateBrainGcdData();
    return $gameData;
}

function startBrainGcd()
{
    startGame();
}
