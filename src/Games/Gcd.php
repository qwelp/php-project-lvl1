<?php

namespace Brain\Games\Gcd;

use function Src\Engine\startGame;

use const Src\Engine\RANDOM_MAX;
use const Src\Engine\RANDOM_MIN;

function gcd(int $a, int $b): int
{
    while ($a != $b) {
        if ($a > $b) {
            $a =  $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    return $b;
}

function gameGcd(): void
{
    $questionMain = 'Find the greatest common divisor of given numbers.';
    $arParamsFunc = function () {
        $min = rand(RANDOM_MIN, RANDOM_MAX);
        $max = rand(RANDOM_MIN, RANDOM_MAX);
        $question = "{$min} {$max}";

        $result = gcd($min, $max);

        return [$question, $result];
    };

    startGame($questionMain, $arParamsFunc);
}
