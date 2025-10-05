<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

function isEven(int $number): string
{
    return $number % 2 === 0 ? 'yes' : 'no';
}

function generateEvenTask(int $minNumber, int $maxNumber): array
{
    $task = rand($minNumber, $maxNumber);
    $answer = isEven($task);
    return [$task, $answer];
}

function playEven(): void
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';
    startGame('even', $question);
}
