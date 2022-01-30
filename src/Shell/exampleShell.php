<?php
declare(strict_types=1);

require 'config/app.php';
require 'src/Model/User.php';
require 'src/Infrastructure/UserRepository.php';

$users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'general', 'name' => '%鈴木%']);
// $users = \App\Infrastructure\UserRepository::findAll(null);
// $users = \App\Infrastructure\UserRepository::findAll('');
// $users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'general', 'name' => '%鈴木%', 'hoge' => 'foo']);
// $users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'general', 'hoge' => 'foo']);
// $users = \App\Infrastructure\UserRepository::findAll(['roleName' => 1, 'name' => '%鈴木%']);
// $users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'viewer', 'name' => '%鈴木%']);
// $users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'general', 'name' => 1]);
print_r($users);
