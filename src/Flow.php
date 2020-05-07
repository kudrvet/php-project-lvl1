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
use function BrainGames\Games\CalcGame\generateData;

function flow($functionNameToGetGameData)
{
    $gameData = getGameData($functionNameToGetGameData);
    $gameRule = $gameData[0];
    printGameRuleToConsole($gameRule);
    $userName = getUserNameAndSayHello();

    $countOfCorrectAnswers = 0;
    $needfulCountOfCorrectAnswers = 3;
    while ($countOfCorrectAnswers !== $needfulCountOfCorrectAnswers) {
        $gameData = getGameData($functionNameToGetGameData);
        [, $question, $rightAnswer] = $gameData;
        questionConsoleUotput($question);
        $userAnswer = getUserAnswerAndConsoleOutput();
        if ($userAnswer == $rightAnswer) {
            $countOfCorrectAnswers += 1;
            rightConsoleOutput();
        } else {
            $countOfCorrectAnswers = 0;
            wrongConsoleOutput($userAnswer, $rightAnswer, $userName);
        }
    }
    finishGame($userName);
}

function finishGame($userName)
{
    congratulationsConsoleOutput($userName);
}

function getGameData($functionNameToGetGameData)
{
    return call_user_func($functionNameToGetGameData);
}
