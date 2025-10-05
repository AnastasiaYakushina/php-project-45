<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function generateGcdTask(int $minNumber, int $maxNumber): array
{
    $a = rand($minNumber, $maxNumber);
    $b = rand($minNumber, $maxNumber);
    $task = "{$a} {$b}";
    $answer = gcd($a, $b);
    return [$task, strval($answer)];
}

function playGcd(): void
{
    $question = 'Find the greatest common divisor of given numbers.';
    startGame('gcd', $question);
}
