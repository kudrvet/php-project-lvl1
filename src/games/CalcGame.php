<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Flow\finishGame;
use function BrainGames\Flow\greetingUser;
use function BrainGames\Flow\isAnswerRightAndConsoleOutput;

function getRightAnswerOfCalcGame($number1, $number2, $operator)
{
    $rightAnswer = 0;
    switch ($operator) {
        case '+':
            $rightAnswer = $number1 + $number2;
            break;
        case '-':
            $rightAnswer = $number1 - $number2;
            break;
        case '*':
            $rightAnswer = $number1 * $number2;
            break;
    }

    return $rightAnswer;
}

function generateBrainCalcData()
{
    $gameRule = "What is the result of the expression?";

    $number1 = rand(0, 100);
    $number2 = rand(0, 100);
    $operations = ['+', '-', '*'];
    $operator = $operations[array_rand($operations)];
    $question = "{$number1} {$operator} {$number2}";
    $rightAnswer = getRightAnswerOfCalcGame($number1, $number2, $operator);

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
    $gameData = generateBrainCalcData();
    return $gameData;
}

function startBrainCalc()
{
    startGame();
}
