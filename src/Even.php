<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven($number)
{
    return $number % 2 === 0 ? 'yes' : 'no';
}



function playEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($rounds = 3; $rounds > 0; $rounds -= 1) {
        $randomNumber = rand(1, 100);
        line("Question: {$randomNumber}");
        $answer = prompt('Your answer');
        $correctAnswer = isEven($randomNumber);
        if ($answer !== $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let\'s try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
