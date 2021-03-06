<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
const RANDOM_MIN = 1;
const RANDOM_MAX = 5;

function startGame(string $question, callable $arParamsFunc): bool
{
    $nameUser = welcome();
    line($question);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $arParamsFunc();

        line("Question: {$question}");
        $answerUser = prompt("Your answer");

        if ($answerUser == $correctAnswer) {
            line("Correct!");
        } else {
            tryAgain($nameUser, $answerUser, $correctAnswer);
            return false;
        }
    }

    line("Congratulations, {$nameUser}!");
    return true;
}

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $nameUser = prompt('May I have your name?');
    line("Hello, %s!", $nameUser);

    return $nameUser;
}

function tryAgain(string $nameUser, string $answerUser, string $correctAnswer): void
{
    line("'{$answerUser}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    line("Let's try again, {$nameUser}!");
}
