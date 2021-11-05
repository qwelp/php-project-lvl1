<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\tryAgain;
use function Src\Engine\yourAnswer;

use const Src\Engine\ROUNDS_COUNT;

function start(): void
{
    $roundsCount = ROUNDS_COUNT;
    $randInt = rand(1, 100);
    $name = welcome();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $answer = prompt("Question: {$randInt}");
    $result = IsPrime($randInt) ? 'yes' : 'no';

    do {
        if ($result == $answer) {
            yourAnswer($answer);
            $roundsCount--;
        } else {
            $roundsCount = -1;
        }
    } while ($roundsCount > 0);

    if ($roundsCount) {
        line("Your answer: {$answer}");
        tryAgain($name, $answer, $result);
    } else {
        line("Congratulations, {$name}!");
    }
}

function IsPrime($p)
{
    $r1 = $p % 2;
    $r2 = $p % 3;
    $r3 = $p % 5;

    return ($p > 1) && (($r1 >= 1) && ($r2 >= 1) && ($r3 >= 1)) || in_array($p, [2,3,5]);
}
