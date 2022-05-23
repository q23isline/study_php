# study_php

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
require 'src/Model/User.php';
require 'src/Infrastructure/UserRepository.php';

// 実行したい処理
$users = \App\Infrastructure\UserRepository::findAll(['roleName' => 'general', 'name' => '%鈴木%']);
print_r($users);
```

## 静的分析チェック

```bash
docker exec -it app ./vendor/bin/phpstan analyse
```
