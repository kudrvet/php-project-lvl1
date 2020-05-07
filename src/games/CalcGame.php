<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Flow\flow;

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

function startBrainCalc()
{
    $functionName = "BrainGames\Games\CalcGame\generateBrainCalcData";
    flow($functionName);
}
