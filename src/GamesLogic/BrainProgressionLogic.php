<?php

const PROGRESS_DESRCR = "What number is missing in the progression?\n";

function generatingProgression(int $firstNumber, int $step, int $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $firstNumber + $i * $step;
    }
    return $progression;
}

function progression()
{
    $points = 0;
    $name = gameGreeting('progress');

    while ($points != MAX_POINTS) {
        $firstNumber = random_int(1, 10);
        $step = random_int(2, 5);
        $length = 10;
        $progression = generatingProgression($firstNumber, $step, $length);
        $hiddenNumberIndex = random_int(0, $length - 1);
        $correctAnswer = $progression[$hiddenNumberIndex];
        $progression[$hiddenNumberIndex] = '..';
        $progressionString = implode(' ', $progression);
        $question = ("Question: {$progressionString}");
        $points = playGame($correctAnswer, $question, $points, $name);
    }
}
