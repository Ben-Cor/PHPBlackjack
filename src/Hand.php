<?php

namespace src;

class Hand
{
    public $hand = [];

    public function displayHand(): string
    {
        $output = '';
        foreach ($this->hand as $card) {
            $output .= '<div>';
            $output .= "<p><strong>{$card->name} of {$card->suit} </strong> - {$card->score} points</p>";
            $output .= '</div>';
        }
        return $output;
    }

    public function calcScore(): int
    {
        $score = 0;
        foreach ($this->hand as $card) {
            $score += $card->score;
        }
        return $score;
    }

    public function drawCard(int $score, Deck $deck)
    {
        while ($score < 14) {
            array_push($this->hand, array_pop($deck->deck));
            if (end($this->hand)->name == 'Ace' && $score + (end($this->hand)->score) > 21) {
                end($this->hand)->score = 1;
                $score += end($this->hand)->score;
            } else {
                $score += end($this->hand)->score;
            }
        }
    }

}