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

function generateBrainCalcData($roundsCount)
{
    $gameRule = "What is the result of the expression?";

    $pairs = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $operations = ['+', '-', '*'];
        $operator = $operations[array_rand($operations)];
        $question = "{$number1} {$operator} {$number2}";
        $rightAnswer = getRightAnswerOfCalcGame($number1, $number2, $operator);

        $pairs[$question] = $rightAnswer;
    }
    return [$gameRule,$pairs];
}

function startBrainCalc()
{
    $roundsCount = 3;
    $gameData = generateBrainCalcData($roundsCount);
    flow($gameData);
}
