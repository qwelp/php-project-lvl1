<?php

namespace Brain\Games\Prime;

use function Src\Engine\startGame;

use const Src\Engine\{RANDOM_MIN, RANDOM_MAX};

function IsPrime(int $num): bool
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function primeGame(): void
{
    $questionMain = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $arParamsFunc = function () {
        $randInt = rand(RANDOM_MIN, RANDOM_MAX);

        $result = (IsPrime($randInt) === true) ? 'yes' : 'no';

        return [$randInt, $result];
    };

    startGame($questionMain, $arParamsFunc);
}
