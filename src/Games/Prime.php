<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

function isPrime(int $number): string
{
    if ($number <= 1) {
        return 'no';
    }
    for ($i = 2; $i < $number; $i += 1) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function generatePrimeTask(int $minNumber, int $maxNumber): array
{
    $task = rand($minNumber, $maxNumber);
    $answer = isPrime($task);
    return [$task, $answer];
}

function playPrime(): void
{
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    startGame('prime', $question);
}
