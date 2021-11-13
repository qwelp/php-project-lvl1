<?php

namespace Brain\Games\Calc;

use function Src\Engine\startGame;

use const Src\Engine\{RANDOM_MIN, RANDOM_MAX};

function calcGame(): void
{
    $questionMain = 'What is the result of the expression?';
    (array) $arParamsFunc = function () {
        $result = 0;
        $min = rand(RANDOM_MIN, RANDOM_MAX);
        $max = rand(RANDOM_MIN, RANDOM_MAX);
        $arrSymbol = ['+', '-', '*'];
        $symbol =  $arrSymbol[array_rand($arrSymbol)];

        switch ($symbol) {
            case '+':
                $result = $min + $max;
                break;
            case '-':
                $result = $min - $max;
                break;
            case '*':
                $result = $min * $max;
                break;
        }

        $question = "{$min} {$symbol} {$max}";

        return [$question, $result];
    };

    startGame($questionMain, $arParamsFunc);
}
