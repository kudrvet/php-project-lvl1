<?php

namespace BrainGames\Games\PrimeGame;

function getRightAnswerOfPrimeGame($number)
{
    for ($i = 2; $i <= $number / 2; $i++) {
        if (($number % $i) == 0) {
            return "no";
        }
    }

    return "yes";
}
