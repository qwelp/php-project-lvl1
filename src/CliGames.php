<?php

namespace Brain\CliGames\Cli;

use function cli\line;
use function cli\prompt;

function start()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $questions = 3;

    do {
        $randInt = rand(1, 100);
        $answer = prompt("Question: {$randInt}");

        if (in_array($answer, ['yes', 'no'])) {
            if ($answer == 'yes') {
                if ($randInt % 2 == 0) {
                    line("Your answer: {$answer}");
                    line("Correct!");
                    $questions--;
                } else {
                    again($name);
                }
            }

            if ($answer == 'no') {
                if ($randInt % 2 != 0) {
                    line("Your answer: {$answer}");
                    line("Correct!");
                    $questions--;
                } else {
                    again($name);
                }
            }
        } else {
            again($name);
        }
    } while ($questions > 0);

    line("Congratulations, {$name}!");
}

function again(string $name)
{
    line("'yes' is wrong answer ;(. Correct answer was 'no'.");
    line("Let's try again, {$name}!");
}
