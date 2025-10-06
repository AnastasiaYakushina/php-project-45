<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function playGcd(): void
{
    $question = 'Find the greatest common divisor of given numbers.';
    startGame($question, function (): array {
        $a = rand(MIN_NUMBER, MAX_NUMBER);
        $b = rand(MIN_NUMBER, MAX_NUMBER);
        $task = "{$a} {$b}";
        $answer = getGcd($a, $b);
        return [$task, strval($answer)];
    });
}

function getGcd(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
