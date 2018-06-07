CREATE DATABASE IF NOT EXISTS ci_api;

USE ci_api;

DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `keys`;

CREATE TABLE IF NOT EXISTS `keys` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `key` varchar(40) NOT NULL,
 `level` int(2) NOT NULL,
 `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
 `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
 `ip_addresses` text,
 `date_created` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'CODEX@123', 0, 0, 0, NULL, '2017-10-12 13:34:33');
