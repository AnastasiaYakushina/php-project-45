<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

function calc($a, $b, $operator)
{
    switch ($operator) {
        case '+':
            return $a + $b;
            break;
        case '-':
            return $a - $b;
            break;
        case '*':
            return $a * $b;
            break;
    }
}

function generateCalcTask($minNumber, $maxNumber)
{
    $operators = ['+', '-', '*'];
    $a = rand($minNumber, $maxNumber);
    $b = rand($minNumber, $maxNumber);
    $operator = $operators[array_rand($operators)];
    $task = "{$a} {$operator} {$b}";
    $answer = calc($a, $b, $operator);
    return [$task, strval($answer)];
}

function playCalc()
{
    $question = 'What is the result of the expression?';
    startGame('calc', $question);
}
