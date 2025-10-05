<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\greet;
use function BrainGames\Games\Even\generateEvenTask;
use function BrainGames\Games\Calc\generateCalcTask;
use function BrainGames\Games\Gcd\generateGcdTask;
use function BrainGames\Games\Progression\generateProgressionTask;
use function BrainGames\Games\Prime\generatePrimeTask;

const ROUNDS_COUNT = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function generateTask($gameName)
{
    switch ($gameName) {
        case 'even':
            return generateEvenTask(MIN_NUMBER, MAX_NUMBER);
            break;
        case 'calc':
            return generateCalcTask(MIN_NUMBER, MAX_NUMBER);
            break;
        case 'gcd':
            return generateGcdTask(MIN_NUMBER, MAX_NUMBER);
            break;
        case 'progression':
            return generateProgressionTask(MIN_NUMBER, MAX_NUMBER);
            break;
        case 'prime':
            return generatePrimeTask(MIN_NUMBER, MAX_NUMBER);
            break;
    }
}

function startGame($gameName, $question)
{
    $name = greet();
    line($question);
    for ($round = 1; $round <= ROUNDS_COUNT; $round += 1) {
        [$task, $correctAnswer] = generateTask($gameName);
        line("Question: {$task}");
        $userAnswer = prompt('Your answer');
        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
