<?php

use function cli\line;
use function cli\prompt;

function evenGame()
{
    // Initializing starting variables
    $points = (int) 0;
    $isUserCorrect = true;

    // Greeting
    $name = gameGreeting();
    line("Answer 'yes' if the number is even, otherwise answer 'no'.\n");

    // Game logic
    while ($isUserCorrect === true && $points !== 3) {
        // Set a random number
        $number = random_int(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        line("Question: %s", $number);

        // Get player answer and check if it's correct
        $userAnswer = prompt('Your answer');
        $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);

        // Adding points
        if ($isUserCorrect === true) {
            line("Correct!\n");
            $points++;
        }

        // Win message
        if ($points === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}