<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGame(string $question, callable $generateTask): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($question);
    for ($round = 1; $round <= ROUNDS_COUNT; $round += 1) {
        [$task, $correctAnswer] = $generateTask();
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
