<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function greetingConsoleOutput($gameName)
{
    line('Welcome to the Brain Game!');

    switch ($gameName) {
        case "brain-even":
            line('Answer "yes" if the number is even, otherwise answer "no" .');
            break;

        case "brain-calc":
            line("What is the result of the expression?");
            break;

        case "brain-gcd":
            line("Find the greatest common divisor of given numbers.");
            break;

        case "brain-progression":
            line("What number is missing in the progression?");
            break;

        case "brain-prime":
            line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
            break;
    }
    line("");
}


function getUserNameAndSayHello()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function questionConsoleUotput($question)
{
    line("Question : %s", $question);
}

function getUserAnswerAndConsoleOutput()
{
    $userAnswer = prompt('Your answer: ');
    return $userAnswer;
}

function rightConsoleOutput()
{
    line("Correct!");
}

function wrongConsoleOutput($userAnswer, $rightAnswer, $userName)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $rightAnswer);
    line("Let's try again, %s!", $userName);
}

function congratulationsConsoleOutput($userName)
{
    line("Congratulations, %s!", $userName);
}
