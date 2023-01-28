# study_php

[![GitHub Actions](https://github.com/q23isline/study_php/actions/workflows/ci.yml/badge.svg)](https://github.com/q23isline/study_php/actions/workflows/ci.yml)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max-brightgreen.svg)](https://github.com/phpstan/phpstan)
[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=555555&color=007acc&logoColor=007acc)](https://open.vscode.dev/q23isline/study_php)
[![PHP](https://img.shields.io/static/v1?logo=php&label=PHP&message=v8.2.1&labelColor=555555&color=777BB4&logoColor=777BB4)](https://www.php.net)
[![MySQL](https://img.shields.io/static/v1?logo=mysql&label=MySQL&message=v8.0&labelColor=555555&color=4479A1&logoColor=4479A1)](https://dev.mysql.com)

PHP 勉強用リポジトリ

## 環境構築手順

```bash
git clone https://github.com/q23isline/study_php.git
cd study_php
docker-compose build
docker-compose up -d
docker exec -it app php composer.phar install
```

## PHP動作確認

### パターン1：ファイル実行

```bash
docker exec -it app php src/Shell/exampleShell.php
```

### パターン2：対話シェル

```bash
docker exec -it app php -a
```

対話シェル起動後、PHP の動作確認実行（下記サンプル）

```php
// 読み込みたいクラス
require 'config/app.php';
require 'src/Infrastructure/UserRepository.php';
require 'src/Model/RoleName.php';
require 'src/Model/User.php';

// 実行したい処理
global $CONF;
$pdo = new PDO($CONF['dsn'], $CONF['username'], $CONF['password'], [PDO::ATTR_EMULATE_PREPARES => false]);
$users = (new \App\Infrastructure\UserRepository($pdo))->findAll(\App\Model\RoleName::from('general'), '鈴木');
print_r($users);
```

## 静的分析チェック

```bash
docker exec -it app ./vendor/bin/phpstan analyse
```

## コーディング標準チェック

```bash
# コーディング標準チェック実行
docker exec -it app ./vendor/bin/phpcs --colors -p src/
# コーディング標準チェック自動整形実行
docker exec -it app ./vendor/bin/phpcbf --colors -p src/
```
