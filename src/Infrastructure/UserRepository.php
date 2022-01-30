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
     * @return \App\Model\User[] ユーザーオブジェクトの配列
     */
    public static function findAll($params)
    {
        // グローバル変数読み込み
        global $CONF;
        $dsn = $CONF['dsn'] ?? $CONF['ds'] ?? $CONF['dataSource'];
        $username = $CONF['username'] ?? $CONF['usr'] ?? $CONF['user'];
        $password = $CONF['password'] ?? $CONF['passwd'];
        // プレースホルダの文字列をエスケープさせるため（SQL インジェクション対策） PDO::ATTR_EMULATE_PREPARES を false
        $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_EMULATE_PREPARES => false]);
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
        $safeParams = [
            'roleName' => $params['roleName'] ?? $params['role_name'] ?? 'general',
            'name' => $params['name'],
        ];
        // SQL 実行
        $statement->execute($safeParams);
        $className = class_exists('App\Model\User') ? 'App\Model\User' : 'App\Model\UserModel';

        // SQL 実行結果をオブジェクトにつめて返す
        return $statement->fetchAll(PDO::FETCH_CLASS, $className);
    }
}
