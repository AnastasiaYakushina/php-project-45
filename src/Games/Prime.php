<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;


function playPrime(): void
{
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    startGame($question, function (): array {
        $task = random_int(MIN_NUMBER, MAX_NUMBER);
        $answer = isPrime($task) ? 'yes' : 'no';
        return [$task, $answer];
    });
}


function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
