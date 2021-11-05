<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function yourAnswer(string $answer): void
{
    line("Your answer: {$answer}");
    line("Correct!");
}

function tryAgain(string $name, string $answer, string|int $correctAnswer): void
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    line("Let's try again, {$name}!");
}
