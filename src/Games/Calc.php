<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function playCalc(): void
{
    $question = 'What is the result of the expression?';

    startGame($question, function (): array {
        $operators = ['+', '-', '*'];
        $a = random_int(MIN_NUMBER, MAX_NUMBER);
        $b = random_int(MIN_NUMBER, MAX_NUMBER);
        $operator = $operators[array_rand($operators)];
        $task = "{$a} {$operator} {$b}";
        $answer = runCalc($a, $b, $operator);
        return [$task, strval($answer)];
    });
}

function runCalc(int $a, int $b, string $operator): int
{
    switch ($operator) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        default:
            throw new Exception("Неподдерживаемый оператор: {$operator}. ");
    }
}
