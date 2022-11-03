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
     * コンストラクタ
     *
     * @param \PDO $pdo PHP データベース接続オブジェクト
     */
    public function __construct(
        private PDO $pdo
    ) {
    }

    /**
     * ユーザー情報をすべて取得する
     *
     * @param \App\Model\RoleName $roleName ロール名
     * @param string $name 姓名
     * @return \App\Model\User[] ユーザーオブジェクトの配列
     */
    public function findAll(RoleName $roleName, string $name): array
    {
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
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':roleName', $roleName->value, PDO::PARAM_STR);
        $statement->bindValue(':name', "%{$name}%", PDO::PARAM_STR);
        // SQL 実行
        $statement->execute();

        // SQL 実行結果をオブジェクトにつめて返す
        return $statement->fetchAll(PDO::FETCH_CLASS, 'App\Model\User');
    }
}
