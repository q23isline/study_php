<?php
declare(strict_types=1);

namespace App\Model;

/**
 * User
 *
 * @property string $id ユーザーID
 * @property string $login_id ログインID
 * @property string $name 姓名
 */
final class User
{
    public string $id;
    public string $login_id;
    public string $name;
}
