<?php

namespace Brain\Games\Prime;

use function Src\Engine\startGame;

use const Src\Engine\RANDOM_MAX;
use const Src\Engine\RANDOM_MIN;

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

function primeGame(): void
{
    $questionMain = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $arParamsFunc = function () {
        $randInt = rand(RANDOM_MIN, RANDOM_MAX);

        $result = IsPrime($randInt) ? 'yes' : 'no';

        return [$randInt, $result];
    };

    startGame($questionMain, $arParamsFunc);
}
