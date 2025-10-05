<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

function isEven($number)
{
    return $number % 2 === 0 ? 'yes' : 'no';
}

function generateEvenTask($minNumber, $maxNumber)
{
    $task = rand($minNumber, $maxNumber);
    $answer = isEven($task);
    return [$task, $answer];
}

function playEven()
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';
    startGame('even', $question);
}
