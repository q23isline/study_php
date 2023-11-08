<?php

declare(strict_types=1);

namespace App\Service;

final class PlayingCardsService
{
    /**
     * @var string[]
     */
    private const SUITS = [
        'クラブ',
        'スペード',
        'ダイヤ',
        'ハート',
    ];

    /**
     * @var string[]
     */
    private const NUMBER = [
        'A',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'J',
        'Q',
        'K',
    ];

    /**
     * @return string[]
     */
    public function shuffle(): array
    {
        $playingCards = self::getPlayingCards();
        shuffle($playingCards);

        return $playingCards;
    }

    /**
     * @return string[]
     */
    private static function getPlayingCards(): array
    {
        $playingCards = [];
        foreach (self::SUITS as $suit) {
            foreach (self::NUMBER as $number) {
                $playingCards[] = "{$suit}{$number}";
            }
        }

        return $playingCards;
    }
}
