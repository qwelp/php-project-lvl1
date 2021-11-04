<?php

namespace Brain\Games\Cli;

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
    line('Answer "yes" if the number is even, otherwise answer "no".');

    do {
        $randInt = rand(1, 100);
        $answer = prompt("Question: {$randInt}");

        if ($randInt % 2 == 0) {
            $result = "yes";
        } else {
            $result = "no";
        }

        if (in_array($answer, ['yes', 'no'])) {
            if ($answer == 'yes') {
                if ($randInt % 2 == 0) {
                    yourAnswer($answer);
                    $roundsCount--;
                } else {
                    tryAgain($name, $answer, $result);
                }
            }

            if ($answer == 'no') {
                if ($randInt % 2 != 0) {
                    yourAnswer($answer);
                    $roundsCount--;
                } else {
                    tryAgain($name, $answer, $result);
                }
            }
        } else {
            tryAgain($name, $answer, $result);
        }
    } while ($roundsCount > 0);

    line("Congratulations, {$name}!");
}
