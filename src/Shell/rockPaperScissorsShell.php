<?php

// phpcs:ignoreFile PSR1.Files.SideEffects.FoundWithSymbols
/**
 * ジャンケンする
 */

declare(strict_types=1);

const ROCK_INDEX = 1;
const SCISSOR_INDEX = 2;
const PAPER_INDEX = 3;
const ROCK_PAPER_SCISSOR_INDEX = [ROCK_INDEX, SCISSOR_INDEX, PAPER_INDEX];
const WIN_INDEX = 1;
const DRAW_INDEX = 2;
const LOSE_INDEX = 3;

$rockPaperScissors = [
    ROCK_INDEX => 'グー',
    SCISSOR_INDEX => 'チョキ',
    PAPER_INDEX => 'パー',
];

print_r("最初はグー、ジャンケン\n");
print_r('（あなたの出す手を入力してください | グー: 1, チョキ: 2, パー: 3）: ');

[$myHandIndex, $yourHandIndex] = getHandIndex();

$myHand = $rockPaperScissors[$myHandIndex] ?? '無敵の手';

print_r("ポン！\n");
print_r("（相手）: {$rockPaperScissors[$yourHandIndex]}\n");
print_r("（あなた）: {$myHand}\n");

while (true) {
    if ($myHandIndex !== $yourHandIndex) {
        break;
    }

    print_r("あいこで\n");
    print_r('（あなたの出す手を入力してください | グー: 1, チョキ: 2, パー: 3）: ');

    [$myHandIndex, $yourHandIndex] = getHandIndex();

    $myHand = $rockPaperScissors[$myHandIndex] ?? '無敵の手';

    print_r("ショ！\n");
    print_r("（相手）: {$rockPaperScissors[$yourHandIndex]}\n");
    print_r("（あなた）: {$myHand}\n");
}

if (!in_array($myHandIndex, ROCK_PAPER_SCISSOR_INDEX, true)) {
    print_r("あなたの反則負け\n");
} elseif (isWin($myHandIndex, $yourHandIndex)) {
    print_r("あなたの勝ち！\n");
} else {
    print_r("あなたの負け\n");
}

/**
 * @return int[]
 */
function getHandIndex(): array
{
    $myHandIndex = (int)fgets(STDIN);
    $yourHandIndex = random_int(min(ROCK_PAPER_SCISSOR_INDEX), max(ROCK_PAPER_SCISSOR_INDEX));

    return [$myHandIndex, $yourHandIndex];
}

/**
 * @param int $myHandIndex 自分の出した手
 * @param int $yourHandIndex システムが出した手
 * @return bool
 */
function isWin(int $myHandIndex, int $yourHandIndex): bool
{
    $isWin = false;
    if ($myHandIndex === ROCK_INDEX && $yourHandIndex === SCISSOR_INDEX) {
        $isWin = true;
    } elseif ($myHandIndex === PAPER_INDEX && $yourHandIndex === ROCK_INDEX) {
        $isWin = true;
    } elseif ($myHandIndex === SCISSOR_INDEX && $yourHandIndex === PAPER_INDEX) {
        $isWin = true;
    }

    return $isWin;
}
