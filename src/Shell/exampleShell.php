<?php
declare(strict_types=1);

require 'config/app.php';
require 'src/Model/User.php';
require 'src/Model/RoleName.php';
require 'src/Infrastructure/UserRepository.php';

// グローバル変数読み込み
global $CONF;
// プレースホルダの文字列をエスケープさせるため（SQL インジェクション対策） PDO::ATTR_EMULATE_PREPARES を false
$pdo = new PDO($CONF['dsn'], $CONF['username'], $CONF['password'], [PDO::ATTR_EMULATE_PREPARES => false]);

$repository = new \App\Infrastructure\UserRepository($pdo);
$users = $repository->findAll(\App\Model\RoleName::from('general'), '鈴木');
print_r($users);
