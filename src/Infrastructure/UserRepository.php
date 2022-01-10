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
        global $CONF;
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

        $statement = $pdo->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll(PDO::FETCH_CLASS, 'App\Model\User');
    }
}
