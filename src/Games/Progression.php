<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

function generateSequence(int $minNumber, int $maxNumber): array
{
    $step = rand(1, 10);
    $length = rand(5, 10);
    $start = rand($minNumber, $maxNumber);
    $sequence = [];
    for ($i = 0; $i < $length; $i += 1) {
        $currentElement = $start + $i * $step;
        $sequence[] = $currentElement;
    }
    return $sequence;
}

function generateProgressionTask(int $minNumber, int $maxNumber): array
{
    $sequence = generateSequence($minNumber, $maxNumber);
    $randomElementIndex = array_rand($sequence);
    $answer = $sequence[$randomElementIndex];
    $sequence[$randomElementIndex] = '..';
    $task = implode(' ', $sequence);
    return [$task, strval($answer)];
}

function playProgression(): void
{
    $question = 'What number is missing in the progression?';
    startGame('progression', $question);
}
