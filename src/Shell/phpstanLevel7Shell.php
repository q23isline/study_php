<?php
/**
 * PHPStan level 7 でのエラー発生ケース
 */

// 1. 部分的に間違った共用体型を報告する：返り値の型になりうる型を定義する
// プログラム実行時にエラーにはならない
function deleteAuthor(string|int $id): int
{
    return $id;
}
deleteAuthor(1);
// function deleteAuthor(string|int $id): string|int
// {
//     return $id;
// }
// deleteAuthor(1);
