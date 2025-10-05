<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

function gcd($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function generateGcdTask($minNumber, $maxNumber)
{
    $a = rand($minNumber, $maxNumber);
    $b = rand($minNumber, $maxNumber);
    $task = "{$a} {$b}";
    $answer = gcd($a, $b);
    return [$task, strval($answer)];
}

function playGcd()
{
    $question = 'Find the greatest common divisor of given numbers.';
    startGame('gcd', $question);
}
