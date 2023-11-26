<?php

declare(strict_types=1);

namespace App\Test\TestCase\Service;

use App\Service\PlayingCardsService;
use PHPUnit\Framework\TestCase;

final class PlayingCardsServiceTest extends TestCase
{
    /**
     * @var array<string>
     */
    private const EXPECTED_ALL_CARDS = [
        'クラブA',
        'クラブ2',
        'クラブ3',
        'クラブ4',
        'クラブ5',
        'クラブ6',
        'クラブ7',
        'クラブ8',
        'クラブ9',
        'クラブ10',
        'クラブJ',
        'クラブQ',
        'クラブK',
        'スペードA',
        'スペード2',
        'スペード3',
        'スペード4',
        'スペード5',
        'スペード6',
        'スペード7',
        'スペード8',
        'スペード9',
        'スペード10',
        'スペードJ',
        'スペードQ',
        'スペードK',
        'ダイヤA',
        'ダイヤ2',
        'ダイヤ3',
        'ダイヤ4',
        'ダイヤ5',
        'ダイヤ6',
        'ダイヤ7',
        'ダイヤ8',
        'ダイヤ9',
        'ダイヤ10',
        'ダイヤJ',
        'ダイヤQ',
        'ダイヤK',
        'ハートA',
        'ハート2',
        'ハート3',
        'ハート4',
        'ハート5',
        'ハート6',
        'ハート7',
        'ハート8',
        'ハート9',
        'ハート10',
        'ハートJ',
        'ハートQ',
        'ハートK',
    ];

    /**
     * トランプのスートと数値の組み合わせすべてが返ること
     *
     * @return void
     */
    public function testAllCard(): void
    {
        // Arrange
        $expected = [];
        // Act
        $allCards = (new PlayingCardsService())->shuffle();
        $actual = array_diff($allCards, self::EXPECTED_ALL_CARDS);
        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * 同じスートと数値の組み合わせがないこと（すべての組み合わせが返ることを確認しているので枚数が 52 であることを確認する）
     *
     * @return void
     */
    public function testUniqueCard(): void
    {
        // Arrange
        $expected = 52;
        // Act
        $allCards = (new PlayingCardsService())->shuffle();
        $actual = count($allCards);
        // Assert
        $this->assertEquals($expected, $actual);
    }
}
