CHARSET utf8mb4;

INSERT IGNORE INTO `users` VALUES
(UUID(), 'admin', 'admin00', 'admin', 'システム管理者', NOW(), NOW()),
(UUID(), 'suzuki', 'suzuki00', 'general', '鈴木太郎', NOW(), NOW()),
(UUID(), 'saito', 'saito00', 'general', '斉藤花子', NOW(), NOW()),
(UUID(), 'tanaka', NULL, 'general', '田中次郎', NOW(), NOW()),
(UUID(), 'unyo', 'unyo00', 'admin', '運用アカウント', NOW(), NOW());
