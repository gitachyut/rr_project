SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `monkeys` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(256) NOT NULL,
  `email` VARCHAR(200) NOT NULL UNIQUE KEY,
  `age` INT(3) NOT NULL,
  `bio` text NOT NULL,
  `created_at` timestamp,
  `updated_at` timestamp,
   INDEX(username(20)),
   PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `relationship` (
  `rel_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_one_id` INT(10) UNSIGNED NOT NULL,
  `user_two_id` INT(10) UNSIGNED NOT NULL,
  `status` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `action_user_id` INT(10) UNSIGNED NOT NULL,
  `created_at` timestamp,
  `updated_at` timestamp,
  FOREIGN KEY (`user_one_id`) REFERENCES monkeys(`id`),
  FOREIGN KEY (`user_two_id`) REFERENCES monkeys(`id`),
  FOREIGN KEY (`action_user_id`) REFERENCES monkeys(`id`),
  PRIMARY KEY(`rel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `relationship`
ADD UNIQUE KEY `unique_users_id` (`user_one_id`,`user_two_id`);


CREATE TABLE IF NOT EXISTS `fav_friend` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `monkey_id`  INT(10) UNSIGNED NOT NULL UNIQUE KEY,
    `fav_monkey_id` INT(10) UNSIGNED NOT NULL,
    `created_at` timestamp,
    `updated_at` timestamp,
    FOREIGN KEY (`monkey_id`) REFERENCES monkeys(`id`),
    FOREIGN KEY (`fav_monkey_id`) REFERENCES monkeys(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



/* these tables are not required for this project

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(256) NOT NULL,
  `email` VARCHAR(200) NOT NULL UNIQUE KEY,
  `age` INT(3) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  `created_at` timestamp,
  `updated_at` timestamp,
   INDEX(username(20)),
   PRIMARY KEY(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users_meta` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`  INT(10) UNSIGNED NOT NULL,
    `session_token` varchar(256) NOT NULL,
    `remember_token` TINYINT(2) NOT NULL DEFAULT '0',
    `created_at` timestamp,
    `updated_at` timestamp,
    FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
