<?php

declare(strict_types=1);

namespace src;

require_once 'src/Card.php';
require_once 'src/Hand.php';

class Deck
{
    public array $deck = [];

    public function __construct()
    {
        $deckArray = [];
        for ($i = 0; $i < 52; $i++) {
            if ($i <= 12) {
                $suit = 'Hearts';
            } elseif ($i <= 25) {
                $suit = 'Diamonds';
            } elseif ($i <= 38) {
                $suit = 'Spades';
            } else {
                $suit = 'Clubs';
            }

            if (($i % 13) == 0) {
                $name = 'Ace';
                $score = 11;
            } elseif (($i % 13) == (1)) {
                $name = 'King';
                $score = 10;
            } elseif (($i % 13) == (2)) {
                $name = 'Queen';
                $score = 10;
            } elseif (($i % 13) == (3)) {
                $name = 'Jack';
                $score = 10;
            } else {
                $numberName = ($i % 13) - 2;
                $name = "$numberName";
                $score = ($i % 13) - 2;
            }

            array_push($deckArray, new Card($name, $suit, $score));

        }
        $this->deck = $deckArray;
    }

    public function shuffle(): void
    {
        shuffle($this->deck);
    }

    public function makeHand()
    {
        $hand = new Hand();
        array_push($hand->hand, array_pop($this->deck));
        array_push($hand->hand, array_pop($this->deck));
        return $hand;
    }


}

