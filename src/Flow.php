<?php

namespace BrainGames\Flow;

use function BrainGames\Cli\congratulationsConsoleOutput;
use function BrainGames\Cli\getUserAnswerAndConsoleOutput;
use function BrainGames\Cli\getUserNameAndSayHello;
use function BrainGames\Cli\printGameRuleToConsole;
use function BrainGames\Cli\questionConsoleUotput;
use function BrainGames\Cli\rightConsoleOutput;
use function BrainGames\Cli\wrongConsoleOutput;

function flow($gameData)
{
    [$gameRule,$pairs] = $gameData;
    printGameRuleToConsole($gameRule);
    $userName = getUserNameAndSayHello();

    $isLoose = 0;
    foreach ($pairs as $question => $rightAnswer) {
        questionConsoleUotput($question);
        $userAnswer = getUserAnswerAndConsoleOutput();
        if ($userAnswer == $rightAnswer) {
            rightConsoleOutput();
        } else {
            wrongConsoleOutput($userAnswer, $rightAnswer, $userName);
            $isLoose = 1;
            break;
        }
    }
    if (!$isLoose) {
        finishGame($userName);
    }
}

function finishGame($userName)
{
    congratulationsConsoleOutput($userName);
}
