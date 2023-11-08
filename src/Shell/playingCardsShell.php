<?php

/**
 * ■ 仕様
 * トランプをランダムに順番を変えて表示するプログラムを作成せよ。
 * トランプは4つのスート（マーク）、1〜13までの数字の52枚である。
 * トランプを表現する配列を作り、適当に順序を入れ替えていけばよい。
 * 適当に順序を入れ替えるには、例えば2つの入れ替えるカードを乱数を使って選び、それらを入れ替える操作を何回も繰り返せばよい。
 *
 * @link https://www.cc.kyoto-su.ac.jp/~mmina/bp1/hundredKnocksAdvanced.html
 */

declare(strict_types=1);

require 'src/Service/PlayingCardsService.php';

use App\Service\PlayingCardsService;

$service = new PlayingCardsService();
$playingCards = $service->shuffle();
foreach ($playingCards as $playingCard) {
    print_r("{$playingCard}\n");
}
