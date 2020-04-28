<?php

namespace BrainGames\Games\EvenGame;

function getRightAnswerOfEvenGame($number)
{
    $result = ($number % 2 == 0) ? 'yes' : 'no';
    return $result;
}
