<?php

namespace BrainGames\Logic;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\run;

function isParity($number)
{
    $result = ($number % 2 == 0) ? true : false;
    return $result;
}

function isCorrectAnswer($isParity, $answer)
{
    $yesCondition = ($isParity == true) && ($answer == "yes");
    $noCondition = ($isParity == false) && ($answer == "no");
    return  ($yesCondition || $noCondition) ? true : false;
}

function startGame()
{
    $needfulCountOfCorrectAnswers = 3;
    $countOfCorrectAnswers = 0;

    //приветствие, запрос имени
    $userName = run();

    do {
        $number = rand();
        //выводим число на экран
        line("Question : %s", $number);
        //проверка на четность
        $parityResult = isParity($number);
        //запрос ответа пользователя
        $userAnswer = prompt('Your answer: ');
        // проверка ответа на корректность
        $isUserAnswerCorrect = isCorrectAnswer($parityResult, $userAnswer);
        // подсчет подряд отвеченных вопросов
        if ($isUserAnswerCorrect) {
            $countOfCorrectAnswers++;
            line("Correct!");
            //вывод сообщения о проигрыше, сброс счетчика ответов
        } else {
            $correctAnswer = ($userAnswer == 'yes') ? 'no' : 'yes';
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $correctAnswer);
            $countOfCorrectAnswers = 0;
        }
    } while ($countOfCorrectAnswers !== $needfulCountOfCorrectAnswers);

    line("Congratulations, %s!", $userName);
}
