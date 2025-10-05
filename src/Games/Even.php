<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
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
    $question = 'Welcome to the Brain Game!';
    startGame('even', $question);
}
