<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\tryAgain;
use function Src\Engine\yourAnswer;

function start(): void
{
    $randInt = rand(1, 100);
    $name = welcome();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $answer = prompt("Question: {$randInt}");
    $result = IsPrime($randInt) ? 'yes' : 'no';

    if ($result == $answer) {
        yourAnswer($answer);
    } else {
        tryAgain($name, $answer, $result);
    }
}

function IsPrime($int)
{
    for ($i = 2; $i < $int; $i++) {
        if ($int % $i == 0) {
            return 0;
        }
    }
    return 1;
}
