<?php
/**
 * PHPStan level 2 でのエラー発生ケース
 */

// 1. 不明なメソッドをすべてチェックする：find メソッドを定義する
// Fatal error: Uncaught Error: Call to undefined method BookRepository::find()
class BookRepository
{}
(new BookRepository())->find();
// class BookRepository
// {
//     public function find()
//     {}
// }
// (new BookRepository())->find();

// 2. PHPDocs を検証する：find メソッドと一致する PHPDocs を記載する
// プログラム実行時にエラーにはならない
class AuthorRepository
{
    /**
     * @param int $id ID
     * @return void
     */
    public function find()
    {}
}
(new AuthorRepository())->find();
// class AuthorRepository
// {
//     /**
//      * @return void
//      */
//     public function find()
//     {}
// }
// (new AuthorRepository())->find();
