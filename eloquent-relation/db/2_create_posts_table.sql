CREATE TABLE `posts` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) unsigned NOT NULL,
  `text` TEXT NOT NULL, 
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (user_id) references users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;