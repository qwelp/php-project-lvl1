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
    $flag = true;
    $roundsCount = ROUNDS_COUNT;
    $randInt = rand(1, 100);
    $name = welcome();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    do {
        $answer = prompt("Question: {$randInt}");
        $result = IsPrime((int) $randInt) ? 'yes' : 'no';

        if ($result == $answer) {
            yourAnswer($answer);
            $roundsCount--;
        } else {
            $flag = false;
            $roundsCount = -1;
        }
    } while ($roundsCount > 0);

    if ($flag) {
        line("Congratulations, {$name}!");
    } else {
        line("Your answer: {$answer}");
        tryAgain($name, $answer, $result);
    }
}

function IsPrime(int $num): bool
{
    $flag = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            $flag = false;
            break;
        }
    }

    return $flag;
}
