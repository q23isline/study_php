<?php
declare(strict_types=1);

require 'config/app.php';
require 'src/Model/User.php';
require 'src/Model/RoleName.php';
require 'src/Infrastructure/UserRepository.php';

$users = \App\Infrastructure\UserRepository::findAll(\App\Model\RoleName::from('general'), '鈴木');
print_r($users);
