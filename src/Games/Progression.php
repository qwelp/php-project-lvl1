<?php

namespace Brain\Games\Progression;

use function Src\Engine\startGame;

use const Src\Engine\{RANDOM_MIN, RANDOM_MAX};

function progressionGame(): void
{
    $questionMain = 'What number is missing in the progression?';
    $arParamsFunc = function () {
        $result = 0;
        $arrResult = [];
        $randStep = rand(RANDOM_MIN, RANDOM_MAX);
        $randStartInt = rand(RANDOM_MIN, RANDOM_MAX);
        $startInt = 0;

        for ($i = 0; $i < 10; $i++) {
            $startInt += $randStep;
            $arrResult[] = $startInt;
        }

        $randElement = array_rand($arrResult);
        $result = $arrResult[$randElement];
        $arrResult[$randElement] = '..';
        $getAnswer = implode(' ', $arrResult);

        return [$getAnswer, $result];
    };

    startGame($questionMain, $arParamsFunc);
}
