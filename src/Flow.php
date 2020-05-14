<?php

namespace BrainGames\Flow;

use function BrainGames\Cli\getUserNameAndSayHello;
use function BrainGames\Cli\printGameRuleToConsole;
use function cli\line;
use function cli\prompt;

function flow($functionName, $roundsCount = 3)
{
    [$gameRule,$questionToAnswerMap] = $functionName($roundsCount);
    printGameRuleToConsole($gameRule);
    $userName = getUserNameAndSayHello();

    foreach ($questionToAnswerMap as $question => $rightAnswer) {
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
