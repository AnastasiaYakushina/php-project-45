<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

function calc(int $a, int $b, string $operator): int
{
    switch ($operator) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
    }
}

function generateCalcTask(int $minNumber, int $maxNumber): array
{
    $operators = ['+', '-', '*'];
    $a = rand($minNumber, $maxNumber);
    $b = rand($minNumber, $maxNumber);
    $operator = $operators[array_rand($operators)];
    $task = "{$a} {$operator} {$b}";
    $answer = calc($a, $b, $operator);
    return [$task, strval($answer)];
}

function playCalc(): void
{
    $question = 'What is the result of the expression?';
    startGame('calc', $question);
}
