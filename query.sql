SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

----

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

-----


CREATE TABLE IF NOT EXISTS `relationship` (
  `rel_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_one_id` INT(10) UNSIGNED NOT NULL,
  `user_two_id` INT(10) UNSIGNED NOT NULL,
  `status` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `action_user_id` INT(10) UNSIGNED NOT NULL,
  `created_at` timestamp,
  `updated_at` timestamp,
  FOREIGN KEY (`user_one_id`) REFERENCES users(`user_id`),
  FOREIGN KEY (`user_two_id`) REFERENCES users(`user_id`),
  FOREIGN KEY (`action_user_id`) REFERENCES users(`user_id`),
  PRIMARY KEY(`rel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `relationship`
ADD UNIQUE KEY `unique_users_id` (`user_one_id`,`user_two_id`);

---------------


CREATE TABLE IF NOT EXISTS `fav_friend` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`  INT(10) UNSIGNED NOT NULL UNIQUE KEY,
    `fav_user_id` INT(10) UNSIGNED NOT NULL,
    `created_at` timestamp,
    `updated_at` timestamp,
    FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
    FOREIGN KEY (`fav_user_id`) REFERENCES users(`user_id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
----------------
