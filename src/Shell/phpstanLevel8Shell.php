<?php
/**
 * PHPStan level 8 でのエラー発生ケース
 */

// 1. null許容型のメソッドの呼び出しとプロパティへのアクセス：プロパティを nullable にするか、setName メソッドの引数を null 不許可にする
// Fatal error: Uncaught TypeError: Cannot assign null to property Category::$name of type string
class Category
{
    public string $name = '';
    function setName(?string $name): void
    {
        $this->name = $name;
    }
}
$category = new Category();
$category->setName(null);
echo $category->name;
// class Category
// {
//     public ?string $name = '';
//     function setName(?string $name): void
//     {
//         $this->name = $name;
//     }
// }
// $category = new Category();
// $category->setName(null);
// echo $category->name;
