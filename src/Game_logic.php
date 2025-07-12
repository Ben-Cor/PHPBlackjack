<?php

class Game_logic {
    public static function getOutcome(int $playerCount, array $scores): string {
        $busts = array_filter($scores, fn($s) => $s > 21);
        $validScores = array_filter($scores, fn($s) => $s <= 21);

        if (count($busts) == $playerCount) {
            return "It's a draw, all players are bust!";
        } elseif (count($validScores) == 1) {
            $winner = array_keys($validScores)[0] + 1; // +1 for player number
            return "Player $winner wins! All others are bust.";
        } else {
            $maxScore = max($validScores);
            $winners = array_keys($validScores, $maxScore);
            if (count($winners) > 1) {
                $winnerList = implode(", ", array_map(fn($w) => "Player " . ($w + 1), $winners));
                return "It's a draw between: $winnerList!";
            } else {
                return "Player " . ($winners[0] + 1) . " wins!";
            }
        }
    }
}