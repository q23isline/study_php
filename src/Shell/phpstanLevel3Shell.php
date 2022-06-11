<?php
/**
 * PHPStan level 3 でのエラー発生ケース
 */

// 1. リターンタイプ：返り値の型を実態に合うように定義する
// Fatal error: Uncaught TypeError: findBook(): Return value must be of type array, null returned
function findBook(): array
{
    return null;
}
findBook();
// function findBook(): ?array
// {
//     return null;
// }
// findBook();

// 2. プロパティに割り当てられたタイプ
// プログラム実行時にエラーにはならない：`declare(strict_types=1);`を定義していればエラーになる
// Fatal error: Uncaught TypeError: Cannot assign string to property Book::$id of type int
class Book
{
    public int $id;
}
$book = new Book();
$book->id = '1';
// class Book
// {
//     public int $id;
// }
// $book = new Book();
// $book->id = 1;
