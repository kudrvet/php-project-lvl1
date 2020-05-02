<?php

namespace BrainGames\Logic;

use function BrainGames\Cli\congratulationsConsoleOutput;
use function BrainGames\Cli\getUserAnswerAndConsoleOutput;
use function BrainGames\Cli\getUserNameAndSayHello;
use function BrainGames\Cli\greetingConsoleOutput;
use function BrainGames\Cli\printGameRuleToConsole;
use function BrainGames\Cli\questionConsoleUotput;
use function BrainGames\Cli\rightConsoleOutput;
use function BrainGames\Cli\wrongConsoleOutput;
use function BrainGames\Games\CalcGame\generateBrainCalcData;

function gameFlow($gameData)
{
    $gameRule = $gameData[0];

    printGameRuleToConsole($gameRule);
    $userName = getUserNameAndSayHello();

    $countOfCorrectAnswers = 0;
    $needfulCountOfCorrectAnswers = 3;
    do {
        // не понимаю как далее не использовать ветвление для
        // вызова метода генерации данных необходимой игры
        [, $question, $rightAnswer] = generateBrainCalcData();
        questionConsoleUotput($question);

        $userAnswer = getUserAnswerAndConsoleOutput();

        if ($userAnswer == $rightAnswer) {
            rightConsoleOutput();
            $countOfCorrectAnswers++;
        } else {
            wrongConsoleOutput($userAnswer, $rightAnswer, $userName);
            $countOfCorrectAnswers = 0;
        }
    } while ($countOfCorrectAnswers !== $needfulCountOfCorrectAnswers);

    congratulationsConsoleOutput($userName);
}


//function generateNextRound($gameName)
//{
//
//    switch ($gameName) {
//        case "brain-even":
//            $number = rand(0, 100);
//            $question = $number;
//            $rightAnswer = getRightAnswerOfEvenGame($number);
//            break;
//
//        case "brain-calc":
//            $number1 = rand(0, 100);
//            $number2 = rand(0, 100);
//            $operations = ['+', '-', '*'];
//
//            $operator = $operations[array_rand($operations)];
//            $question = "{$number1} {$operator} {$number2}";
//            $rightAnswer = getRightAnswerOfCalcGame($number1, $number2, $operator);
//            break;
//        case "brain-gcd":
//            $number1 = rand(0, 100);
//            $number2 = rand(0, 100);
//
//            $question = "{$number1} {$number2}";
//            $rightAnswer = getRightAnswerOfGcdGame($number1, $number2);
//            break;
//
//        case "brain-progression":
//            $firstNumber = rand(-100, 100);
//
//            do {
//                $stepOfProgression = rand(-10, 10);
//            } while ($stepOfProgression == 0);
//
//            $lengthOfProgression = 10;
//
//            $progression = generateProgression($firstNumber, $stepOfProgression, $lengthOfProgression);
//            $missingKey = array_rand($progression);
//            $rightAnswer = getRightAnswerOfProgressionGame($progression, $missingKey);
//            $question = getQuestionOfProgressionGame($progression, $missingKey);
//            break;
//
//        case "brain-prime":
//            $number = rand(0, 3000);
//            $rightAnswer = getRightAnswerOfPrimeGame($number);
//            $question = $number;
//    }
//
//    return [$question,$rightAnswer];
//}
