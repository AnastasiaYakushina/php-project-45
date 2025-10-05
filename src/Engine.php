<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\greet;
use function BrainGames\Games\Even\generateEvenTask;
use function BrainGames\Games\Calc\generateCalcTask;
use function BrainGames\Games\Gcd\generateGcdTask;

const ROUNDS_COUNT = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function startGame($gameName, $question)
{
    $name = greet();
    line($question);
    for ($round = 1, $taskIndex = 0; $round <= ROUNDS_COUNT; $round += 1, $taskIndex += 1) {
        if ($gameName === 'even') {
            [$task, $correctAnswer] = generateEvenTask(MIN_NUMBER, MAX_NUMBER);
        } elseif ($gameName === 'calc') {
            [$task, $correctAnswer] = generateCalcTask(MIN_NUMBER, MAX_NUMBER);
        } elseif ($gameName === 'gcd') {
            [$task, $correctAnswer] = generateGcdTask(MIN_NUMBER, MAX_NUMBER);
        }
        line("Question: {$task}");
        $userAnswer = prompt('Your answer');
        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let\'s try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
