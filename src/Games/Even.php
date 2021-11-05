<?php

namespace Brain\Games\Even;

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
                    $roundsCount = -1;
                }
            }

            if ($answer == 'no') {
                if ($randInt % 2 != 0) {
                    yourAnswer($answer);
                    $roundsCount--;
                } else {
                    $roundsCount = -1;
                }
            }
        } else {
            $roundsCount = -1;
        }
    } while ($roundsCount > 0);

    if ($roundsCount) {
        tryAgain($name, $answer, $result);
    } else {
        line("Congratulations, {$name}!");
    }
}
