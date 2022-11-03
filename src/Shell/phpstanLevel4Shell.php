<?php
/**
 * PHPStan level 4 でのエラー発生ケース
 */

// 1. 基本的なデッドコードチェック：常に false：デッドコードは削除する
// プログラム実行時にエラーにはならない
$authorId = 1;
if (!$authorId) {
    throw new Exception();
}
echo $authorId;
// $authorId = 1;
// echo $authorId;

// 2. 基本的なデッドコードチェック：リターン後の到達不能コード：デッドコードは削除する
// プログラム実行時にエラーにはならない
function setDefaultAuthor()
{
    $authors = [];
    return $authors;
    $authors[] = 'Tanaka';
}
print_r(setDefaultAuthor());
// function setDefaultAuthor()
// {
//     $authors = [];
//     return $authors;
// }
// print_r(setDefaultAuthor());
