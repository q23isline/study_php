<?php
declare(strict_types=1);

require 'config/app.php';
require 'src/Model/User.php';
require 'src/Infrastructure/UserRepository.php';

$users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'general', 'name' => '%鈴木%']);
print_r($users);
