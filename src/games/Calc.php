<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Flow\flow;

use const BrainGames\Flow\ROUNDS_COUNT;

function calculate($number1, $number2, $operator)
{
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

function generateData($roundsCount)
{
    $gameData = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $operations = ['+', '-', '*'];
        $operator = $operations[array_rand($operations)];
        $question = "{$number1} {$operator} {$number2}";
        $rightAnswer = calculate($number1, $number2, $operator);

        $gameData[$question] = $rightAnswer;
    }
    return $gameData;
}

function startBrainCalc()
{
    $gameRule = "What is the result of the expression?";
    $gameData = generateData(ROUNDS_COUNT);
    flow($gameRule, $gameData);
}
