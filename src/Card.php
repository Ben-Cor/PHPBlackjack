<?php

declare(strict_types=1);

namespace src;
class Card
{
    public string $name;
    public string $suit;
    public int $score;

    public function __construct(string $name, string $suit, int $score)
    {
        $this->name = $name;
        $this->suit = $suit;
        $this->score = $score;
    }

//    public function isAvailable (): bool;

}