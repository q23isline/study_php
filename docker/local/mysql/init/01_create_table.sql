CHARSET utf8mb4;

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) NOT NULL COMMENT 'ID',
  `login_id` varchar(50) NOT NULL COMMENT 'ログインID',
  `password` varchar(255) COMMENT 'パスワード',
  `role_name` varchar(20) NOT NULL COMMENT 'ロール名',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `created` datetime NOT NULL COMMENT '作成日',
  `modified` datetime NOT NULL COMMENT '更新日',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_IDX1` (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
