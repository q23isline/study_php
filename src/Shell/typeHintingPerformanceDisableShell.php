<?php // phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols

declare(strict_types=1);

define('MAXIMUM_LOOP_COUNT', 1000000);

$start = hrtime(true);

$character = 'A';
for ($number = 0; $number < MAXIMUM_LOOP_COUNT; $number++) {
    getCellAddress($number, $character++);
}

$end = hrtime(true);

echo '処理時間: ' . ($end - $start) . "ナノ秒\n";

/**
 * @param int $number
 * @param string $character
 * @return string
 */
function getCellAddress($number, $character)
{
    return "{$character}{$number}";
}
