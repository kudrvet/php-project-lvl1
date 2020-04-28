<?php

namespace BrainGames\Logic;

use function BrainGames\Cli\congratulationsConsoleOutput;
use function BrainGames\Cli\getUserAnswerAndConsoleOutput;
use function BrainGames\Cli\getUserNameAndSayHello;
use function BrainGames\Cli\greetingConsoleOutput;
use function BrainGames\Cli\questionConsoleUotput;
use function BrainGames\Cli\rightConsoleOutput;
use function BrainGames\Cli\wrongConsoleOutput;
use function BrainGames\Games\EvenGame\getRightAnswerOfEvenGame;
use function BrainGames\Games\CalcGame\getRightAnswerOfCalcGame;
use function BrainGames\Games\GcdGame\getRightAnswerOfGcdGame;
use function BrainGames\Games\ProgressionGame\generateProgression;
use function BrainGames\Games\ProgressionGame\getQuestionOfProgressionGame;
use function BrainGames\Games\ProgressionGame\getRightAnswerAndOfProgressionGame;

function startGame($gameName)
{
    greetingConsoleOutput($gameName);

    $userName = getUserNameAndSayHello();

    $countOfCorrectAnswers = 0;
    $needfulCountOfCorrectAnswers = 3;
    do {
        [$question, $rightAnswer] = generateNextRound($gameName);

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

function generateNextRound($gameName)
{

    switch ($gameName) {
        case "brain-even":
            $number = rand(0, 100);
            $question = $number;
            $rightAnswer = getRightAnswerOfEvenGame($number);
            break;

        case "brain-calc":
            $number1 = rand(0, 100);
            $number2 = rand(0, 100);
            $operations = ['+', '-', '*'];

            $operator = $operations[array_rand($operations)];
            $question = "{$number1} {$operator} {$number2}";
            $rightAnswer = getRightAnswerOfCalcGame($number1, $number2, $operator);
            break;
        case "brain-gcd":
            $number1 = rand(0, 100);
            $number2 = rand(0, 100);

            $question = "{$number1} {$number2}";
            $rightAnswer = getRightAnswerOfGcdGame($number1, $number2);
            break;

        case "brain-progression":
            $firstNumber = rand(-100, 100);

            do {
                $stepOfProgression = rand(-10, 10);
            } while ($stepOfProgression == 0);

            $lengthOfProgression = 10;

            $progression = generateProgression($firstNumber, $stepOfProgression, $lengthOfProgression);
            $missingKey = array_rand($progression);
            $rightAnswer = getRightAnswerAndOfProgressionGame($progression, $missingKey);
            $question = getQuestionOfProgressionGame($progression, $missingKey);
            break;
    }

    return [$question,$rightAnswer];
}
