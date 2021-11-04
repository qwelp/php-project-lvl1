<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\tryAgain;
use function Src\Engine\yourAnswer;

use const Src\Engine\ROUNDS_COUNT;

function start(): void
{
    $arrSymbol = ['+', '-', '*'];
    $roundsCount = ROUNDS_COUNT;
    $name = welcome();
    line('What is the result of the expression?');

    do {
        $firstInt = rand(1, 5);
        $lastInt = rand(1, 5);
        $symbol =  $arrSymbol[array_rand($arrSymbol)];

        switch ($symbol) {
            case '+':
                $result = $firstInt + $lastInt;
                break;
            case '-':
                $result = $firstInt - $lastInt;
                break;
            case '*':
                $result = $firstInt * $lastInt;
                break;
        }

        $question = "Question: {$firstInt} {$symbol} {$lastInt}";
        $answer = prompt($question);

        if ($answer == $result) {
            yourAnswer($answer);
            $roundsCount--;
        } else {
            tryAgain($name, $answer, $result);
            $roundsCount = -1;
        }
    } while ($roundsCount > 0);

    if ($roundsCount) {
        line($question);
        line("Your answer: {$answer}");
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
        line("Let's try again, {$name}!");
    } else {
        line("Congratulations, {$name}!");
    }
}
