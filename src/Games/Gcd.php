<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\tryAgain;
use function Src\Engine\yourAnswer;

use const Src\Engine\ROUNDS_COUNT;

function start(): void
{
    $roundsCount = ROUNDS_COUNT;
    $name = welcome();
    line('Find the greatest common divisor of given numbers.');

    do {
        $firstInt = rand(1, 100);
        $lastInt = rand(1, 100);

        $result = gcd($firstInt, $lastInt);
        $answer = prompt("Question: {$firstInt} {$lastInt}");

        if ($answer == $result) {
            yourAnswer($answer);
            $roundsCount--;
        } else {
            tryAgain($name, $answer, $result);
        }
    } while ($roundsCount > 0);

    line("Congratulations, {$name}!");
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
