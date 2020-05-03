<?php

namespace BrainGames\Flow;

use function BrainGames\Cli\congratulationsConsoleOutput;
use function BrainGames\Cli\getUserAnswerAndConsoleOutput;
use function BrainGames\Cli\getUserNameAndSayHello;
use function BrainGames\Cli\greetingConsoleOutput;
use function BrainGames\Cli\printGameRuleToConsole;
use function BrainGames\Cli\questionConsoleUotput;
use function BrainGames\Cli\rightConsoleOutput;
use function BrainGames\Cli\wrongConsoleOutput;

function isAnswerRightAndConsoleOutput($gameData, $userName)
{
    [, $question, $rightAnswer] = $gameData;
    questionConsoleUotput($question);
    $userAnswer = getUserAnswerAndConsoleOutput();

    if ($userAnswer == $rightAnswer) {
        rightConsoleOutput();
        return true;
    } else {
        wrongConsoleOutput($userAnswer, $rightAnswer, $userName);
        return false;
    }
}

function greetingUser($gameRule)
{
    printGameRuleToConsole($gameRule);
    $userName = getUserNameAndSayHello();
    return $userName;
}

function finishGame($userName)
{
    congratulationsConsoleOutput($userName);
}
