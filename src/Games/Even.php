<?php

namespace Brain\Games\Even;

use function Src\Engine\startGame;

use const Src\Engine\{RANDOM_MIN, RANDOM_MAX};

function evenGame(): void
{
    $questionMain = 'Answer "yes" if the number is even, otherwise answer "no".';
    $arParamsFunc = function (): callable {
        $randInt = random_int(RANDOM_MIN, RANDOM_MAX);
        $result = ($randInt % 2 == 0) ? 'yes' : 'no';

        return [$randInt, $result];
    };

    startGame($questionMain, $arParamsFunc);
}
