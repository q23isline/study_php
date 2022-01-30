<?php
declare(strict_types=1);

require 'config/app.php';
// require 'src/Model/User.php';
require 'src/Model/UserModel.php';
require 'src/Infrastructure/UserRepository.php';

// $users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'general', 'name' => '%鈴木%']);
$users = \App\Infrastructure\UserRepository::findAll(['role_name' => 'general', 'name' => '%鈴木%']);
print_r($users);
