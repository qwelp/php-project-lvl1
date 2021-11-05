<?php

namespace Brain\Games\Progression;

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
    $name = welcome();
    line('What number is missing in the progression?');

    do {
        $arrResult = [];
        $randStep = rand(2, 5);
        $randStartInt = rand(1, 20);
        $startInt = 0;

        for ($i = 0; $i < 10; $i++) {
            $startInt += $randStep;
            $arrResult[] = $startInt;
        }

        $randElement = array_rand($arrResult);
        $result = $arrResult[$randElement];
        $arrResult[$randElement] = '..';
        $getAnswer = implode(' ', $arrResult);

        $answer = prompt("Question: {$getAnswer}");

        if ($answer == $result) {
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
        tryAgain($name, $answer, (string) $result);
    }
}
