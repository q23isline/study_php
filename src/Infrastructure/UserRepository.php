<?php
declare(strict_types=1);

namespace App\Infrastructure;

use InvalidArgumentException;
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
        if (is_null($params)) {
            throw new InvalidArgumentException('params に null は設定できません');
        }

        if (!is_array($params)) {
            throw new InvalidArgumentException('params に配列以外は設定できません');
        }

        if (count($params) !== 2) {
            throw new InvalidArgumentException('params の項目数は 2つ以外設定できません');
        }

        if (
            !array_key_exists('roleName', $params)
            || !array_key_exists('name', $params)
        ) {
            throw new InvalidArgumentException('params は roleName キーと name キーが必須です');
        }

        if (!is_string($params['roleName'])) {
            throw new InvalidArgumentException('params["roleName"] は文字列以外設定できません');
        }

        if (!in_array($params['roleName'], ['admin', 'general'], true)) {
            throw new InvalidArgumentException('params["roleName"] は "admin" と "general" 以外設定できません');
        }

        if (!is_string($params['name'])) {
            throw new InvalidArgumentException('params["name"] は文字列以外設定できません');
        }

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
        // SQL 実行
        $statement->execute($params);

        // SQL 実行結果をオブジェクトにつめて返す
        return $statement->fetchAll(PDO::FETCH_CLASS, 'App\Model\User');
    }
}
