<?php
declare(strict_types=1);

namespace App\Infrastructure;

use PDO;

/**
 * UserRepository
 */
final class UserRepository
{
    /**
     * ユーザー情報をすべて取得する
     *
     * @param mixed $params パラメータ
     * @return array|false
     */
    public static function findAll($params)
    {
        // グローバル変数読み込み
        global $CONF;
        // プレースホルダの文字列をエスケープさせるため（SQL インジェクション対策） PDO::ATTR_EMULATE_PREPARES を false
        $pdo = new PDO($CONF['dsn'], $CONF['username'], $CONF['password'], [PDO::ATTR_EMULATE_PREPARES => false]);
        $sql = <<<SQL
SELECT
    `id`,
    `username`,
    `name`
FROM
    `users`
WHERE
    `role_name` = :roleName
    AND `name` LIKE :name;
SQL;

        // 実行する SQL 文作成
        $statement = $pdo->prepare($sql);
        // SQL 実行
        $statement->execute($params);

        // SQL 実行結果をオブジェクトにつめて返す
        return $statement->fetchAll(PDO::FETCH_CLASS, 'App\Model\User');
    }
}
