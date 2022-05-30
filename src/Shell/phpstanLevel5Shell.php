<?php
/**
 * PHPStan level 5 でのエラー発生ケース
 */

// 1. メソッドと関数に渡される引数のタイプをチェックする：引数の型と一致する型でメソッド呼び出しする
// プログラム実行時にエラーにはならない：`declare(strict_types=1);`を定義していればエラーになる
// Fatal error: Uncaught TypeError: CategoryRepository::findById(): Argument #1 ($id) must be of type int, string given, called
class CategoryRepository
{
    public function findById(int $id): int
    {
        return $id;
    }
}
$repository = new CategoryRepository();
echo $repository->findById('1');
// class CategoryRepository
// {
//     public function findById(int $id): int
//     {
//         return $id;
//     }
// }
// $repository = new CategoryRepository();
// echo $repository->findById(1);
