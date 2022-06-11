<?php
/**
 * PHPStan level 6 でのエラー発生ケース
 */

// 1. 欠落しているタイプヒントを報告する：引数のタイプヒントを定義する
// プログラム実行時にエラーにはならない
function deleteBook($id): int
{
    return $id;
}
echo deleteBook(1);
// function deleteBook(int $id): int
// {
//     return $id;
// }
// echo deleteBook(1);
