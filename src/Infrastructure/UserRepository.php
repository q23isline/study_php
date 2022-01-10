<?php
declare(strict_types=1);

namespace App\Infrastructure;

use App\Model\RoleName;
use PDO;

/**
 * UserRepository
 */
final class UserRepository
{
    /**
     * ユーザー情報をすべて取得する
     *
     * @param \App\Model\RoleName $roleName ロール名
     * @param string $name 姓名
     * @return \App\Model\User[] ユーザーオブジェクトの配列
     */
    public static function findAll(RoleName $roleName, string $name)
    {
        // グローバル変数読み込み
        global $CONF;
        // プレースホルダの文字列をエスケープさせるため（SQL インジェクション対策） PDO::ATTR_EMULATE_PREPARES を false
        $pdo = new PDO($CONF['dsn'], $CONF['username'], $CONF['password'], [PDO::ATTR_EMULATE_PREPARES => false]);
        $sql = <<<SQL
SELECT
    `id`,
    `login_id`,
    `name`
FROM
    `users`
WHERE
    `role_name` = :roleName
    AND `name` LIKE :name;
SQL;

        // 実行する SQL 文作成
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':roleName', $roleName->value, PDO::PARAM_STR);
        $statement->bindValue(':name', "%{$name}%", PDO::PARAM_STR);
        // SQL 実行
        $statement->execute();

        // SQL 実行結果をオブジェクトにつめて返す
        return $statement->fetchAll(PDO::FETCH_CLASS, 'App\Model\User');
    }
}
