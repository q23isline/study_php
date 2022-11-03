<?php
/**
 * PHPStan level 9 でのエラー発生ケース
 */

// 1. 型について厳密にする（mixed 不許可）：mixed を使わない
// プログラム実行時にエラーにはならない
function findDefaultCategory(mixed $id): string
{
    findCategoryById($id);

    return 'Default';
}
function findCategoryById(int $id): mixed
{
    return [];
}
print_r(findDefaultCategory(1));
// function findDefaultCategory(int $id): string
// {
//     findCategoryById($id);

//     return 'Default';
// }
// function findCategoryById(int $id): mixed
// {
//     return [];
// }
// print_r(findDefaultCategory(1));
