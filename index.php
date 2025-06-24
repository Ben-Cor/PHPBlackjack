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
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="src/images/blackjack.png" type="image/x-icon">
</head>
<body>
<div class="heading">
    <h1 class="mainTitle">Blackjack Game</h1>
    <img class="mainIcon" src="src/images/blackjack.png" alt="blackjack icon">
</div>
</br>';

$cardDeck = new Deck();

function newHand(Deck $deck, int $player) {
    $deck ->shuffle();
    $hand = $deck->makeHand();
    $score = $hand->calcScore();
    $hand->drawCard($score, $deck);
    echo "<div class='playerHand'>";
    echo "</br> <h3 class='playerName'> Player $player </h3>".$hand->displayHand() ;
    echo "<div class='score'> Player $player score is ".$hand->calcScore()."</div></br>";
    echo "</div>";
    $score = $hand->calcScore();
    return $score;
}

?>

<div class='playerCountSelect'>
<h2 class='playerCountTitle'>Number of Players</h2>
<form method="get">
    <button type="submit" name="players" value="2">2</button>
    <button type="submit" name="players" value="3">3</button>
    <button type="submit" name="players" value="4">4</button>
</form>
</div>

<?php

if (isset($_GET['players']) && $_GET['players'] == 2) {
    echo "<div class='playerHands'>";
    $scorePlayer1 = newHand($cardDeck, 1);
    $scorePlayer2 = newHand($cardDeck, 2);
    echo "</div>";

    if ($scorePlayer1 > 21 && $scorePlayer2 > 21) {
        echo "</br> <h2 class='outcome'>It's a draw, both players are bust!</h2>";
    } elseif ($scorePlayer1 > 21) {
        echo "</br> <h2 class='outcome'>Player 2 wins! Player 1 is bust.</h2>";
    } elseif ($scorePlayer2 > 21) {
        echo "</br> <h2 class='outcome'>Player 1 wins! Player 2 is bust.</h2>";
    } elseif ($scorePlayer1 == $scorePlayer2) {
        echo "</br> <h2 class='outcome'>It is a draw</h2>";
    } elseif ($scorePlayer1 > $scorePlayer2) {
        echo "</br> <h2 class='outcome'>Player 1 wins!</h2>";
    } else {
        echo "</br> <h2 class='outcome'>Player 2 wins!</h2>";
    }
} elseif (isset($_GET['players']) && $_GET['players'] == 3) {
    echo "<div class='playerHands'>";
    $scorePlayer1 = newHand($cardDeck, 1);
    $scorePlayer2 = newHand($cardDeck, 2);
    $scorePlayer3 = newHand($cardDeck, 3);
    echo "</div>";

    if ($scorePlayer1 > 21 && $scorePlayer2 > 21 && $scorePlayer3 > 21) {
        echo "</br> <h2 class='outcome'>It's a draw, all players are bust!</h2>";
    } elseif ($scorePlayer1 > 21 && $scorePlayer2 > 21 && $scorePlayer3 <= 21) {
        echo "</br> <h2 class='outcome'>Player 3 wins! Player 1 and Player 2 are bust.</h2>";
    } elseif ($scorePlayer1 > 21 && $scorePlayer3 > 21 && $scorePlayer2 <= 21) {
        echo "</br> <h2 class='outcome'>Player 2 wins! Player 1 and Player 3 are bust.</h2>";
    } elseif ($scorePlayer2 > 21 && $scorePlayer3 > 21 && $scorePlayer1 <= 21) {
        echo "</br> <h2 class='outcome'>Player 1 wins! Player 2 and Player 3 are bust.</h2>";
    } elseif ($scorePlayer1 == $scorePlayer2 && $scorePlayer2 == $scorePlayer3) {
        echo "</br> <h2 class='outcome'>It is a draw</h2>";
    } elseif ($scorePlayer1 > $scorePlayer2 && $scorePlayer1 > $scorePlayer3 && $scorePlayer1 <= 21) {
        echo "</br> <h2 class='outcome'>Player 1 wins!</h2>";
    } elseif ($scorePlayer2 > $scorePlayer1 && $scorePlayer2 > $scorePlayer3 && $scorePlayer2 <= 21) {
        echo "</br> <h2 class='outcome'>Player 2 wins!</h2>";
    } elseif ($scorePlayer3 > $scorePlayer1 && $scorePlayer3 > $scorePlayer2 && $scorePlayer3 <= 21) {
        echo "</br> <h2 class='outcome'>Player 3 wins!</h2>";
    } else if ($scorePlayer1 == $scorePlayer2 && $scorePlayer1 <= 21 && ($scorePlayer3 > 21 || $scorePlayer3 < $scorePlayer1)) {
        echo "</br> <h2 class='outcome'>Player 1 and Player 2 draw! Player 3 loses.</h2>";
    } else if ($scorePlayer1 == $scorePlayer3 && $scorePlayer1 <= 21 && ($scorePlayer2 > 21 || $scorePlayer2 < $scorePlayer1)) {
        echo "</br> <h2 class='outcome'>Player 1 and Player 3 draw! Player 2 loses.</h2>";
    } else if ($scorePlayer2 == $scorePlayer3 && $scorePlayer2 <= 21 && ($scorePlayer1 > 21 || $scorePlayer1 < $scorePlayer2)) {
        echo "</br> <h2 class='outcome'>Player 2 and Player 3 draw! Player 1 loses.</h2>";
    }

} elseif (isset($_GET['players']) && $_GET['players'] == 4) {
    echo "<div class='playerHands'>";
    $scorePlayer1 = newHand($cardDeck, 1);
    $scorePlayer2 = newHand($cardDeck, 2);
    $scorePlayer3 = newHand($cardDeck, 3);
    $scorePlayer4 = newHand($cardDeck, 4);
    echo "</div>";
}

echo '
<button onclick="window.location.reload()" class="newGameButton">New Game</button>
</body>
</html>';