<?php

declare(strict_types=1);

use src\Deck;

require_once 'src/Deck.php';
require_once 'src/Hand.php';


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blackjack Game</title>
    <style>
    </style>
</head>
<body>
<h1 class="mainTitle">Blackjack Game</h1>
</br>';

$cardDeck = new Deck();

function newHand(Deck $deck, int $player) {
    $deck ->shuffle();
    $hand = $deck->makeHand();
    $score = $hand->calcScore();
    $hand->drawCard($score, $deck);
    echo "</br> Player $player".$hand->displayHand();
    echo "Player $player score is ".$hand->calcScore()."</br></br>";
    $score = $hand->calcScore();
    return $score;
}

$scorePlayer1 = newHand($cardDeck, 1);
$scorePlayer2 = newHand($cardDeck, 2);

if ($scorePlayer1 > 21 && $scorePlayer2 > 21) {
    echo "</br> <h1>It's a draw, both players are bust!</h1>";
} elseif ($scorePlayer1 > 21) {
    echo "</br> <h1>Player 2 wins! Player 1 is bust.</h1>";
} elseif ($scorePlayer2 > 21) {
    echo "</br> <h1>Player 1 wins! Player 2 is bust.</h1>";
} elseif ($scorePlayer1 == $scorePlayer2) {
    echo "</br> <h1>It is a draw</h1>";
} elseif ($scorePlayer1 > $scorePlayer2) {
    echo "</br> <h1>Player 1 wins!</h1>";
} else {
    echo "</br> <h1>Player 2 wins!</h1>";
}

echo '
</body>
</html>';