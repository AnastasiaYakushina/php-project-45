<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function playEven(): void
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';
    startGame($question, function (): array {
        $task = rand(MIN_NUMBER, MAX_NUMBER);
        $answer = isEven($task) ? 'yes' : 'no';
        return [$task, $answer];
    });
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
