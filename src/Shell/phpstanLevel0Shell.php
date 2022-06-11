<?php
/**
 * PHPStan level 0 でのエラー発生ケース
 */

// 1. 基本的なチェック：シンタックスエラー：クラス定義に () はいらない
// Parse error: syntax error, unexpected token "(", expecting "{"
// class Profile()
// {}
// class Profile
// {}

// 2. 不明なクラス：ProfileRepository クラスを定義する
// Fatal error: Uncaught Error: Class "ProfileRepository" not found
new ProfileRepository();
// class ProfileRepository
// {}
// new ProfileRepository();

// 3. 不明な関数：存在する関数を呼び出す
// Fatal error: Uncaught Error: Call to undefined function isArray()
isArray([]);
// is_array([]);

// 4. 呼び出された不明なメソッド：find メソッドを定義する
// Fatal error: Uncaught Error: Call to undefined method AccountRepository::find()
class AccountRepository
{}
AccountRepository::find();
// class AccountRepository
// {
//     public static function find()
//     {}
// }
// AccountRepository::find();

// 5. 関数に渡された引数の数が間違っている：is_array 関数は第一引数に値が必須
// Fatal error: Uncaught ArgumentCountError: is_array() expects exactly 1 argument, 0 given
is_array();
// is_array([]);

// 6. 常に未定義の変数：account 変数を初期化する
// Warning: Undefined variable $account
class Account
{
    public function find()
    {
        return $account;
    }
}
echo (new Account)->find();
// class Account
// {
//     public function find()
//     {
//         return $account = 1;
//     }
// }
// echo (new Account)->find();
