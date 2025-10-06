<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;
const MIN_SEQUENCE_LENGTH = 5;
const MAX_SEQUENCE_LENGTH = 10;
const MIN_STEP_SIZE = 1;
const MAX_STEP_SIZE = 10;


function playProgression(): void
{
    $question = 'What number is missing in the progression?';
    startGame($question, function (): array {
        $sequence = generateSequence();
        $randomElementIndex = array_rand($sequence);
        $answer = $sequence[$randomElementIndex];
        $sequence[$randomElementIndex] = '..';
        $task = implode(' ', $sequence);
        return [$task, strval($answer)];
    });
}

function generateSequence(): array
{
    $step = rand(MIN_STEP_SIZE, MAX_STEP_SIZE);
    $length = rand(MIN_SEQUENCE_LENGTH, MAX_SEQUENCE_LENGTH);
    $start = rand(MIN_NUMBER, MAX_NUMBER);
    $sequence = [];
    for ($i = 0; $i < $length; $i += 1) {
        $currentElement = $start + $i * $step;
        $sequence[] = $currentElement;
    }
    return $sequence;
}
