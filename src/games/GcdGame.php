<?php

namespace BrainGames\Games\GcdGame;

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
