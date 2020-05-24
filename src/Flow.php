<?php

namespace BrainGames\Flow;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function flow($gameRule, $gameData)
{

    line('Welcome to the Brain Game!');
    line($gameRule);
    line("");
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    foreach ($gameData as $question => $rightAnswer) {
        line("Question : %s", $question);
        $userAnswer = prompt('Your answer: ');
        if ($userAnswer == $rightAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $rightAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
