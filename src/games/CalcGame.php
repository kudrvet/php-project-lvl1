<?php

namespace BrainGames\Games\CalcGame;

function getRightAnswerOfCalcGame($number1,$number2,$operator)
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