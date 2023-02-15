-- Adminer 4.8.1 MySQL 8.0.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1,	1,	2,	100),
(2,	1,	2,	100),
(3,	2,	1,	100),
(4,	2,	1,	100),
(5,	2,	2,	100),
(6,	2,	2,	100),
(7,	2,	2,	100);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `productPrice` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `products` (`id`, `productName`, `productCode`, `productPrice`, `created`, `modified`) VALUES
(1,	'Product1',	'P1',	70,	'2023-02-13 13:32:46',	'2023-02-13 14:01:03'),
(2,	'Product2',	'P2',	50,	'2023-02-13 13:33:02',	'2023-02-13 13:33:02'),
(3,	'Product3',	'P3',	60,	'2023-02-13 13:33:12',	'2023-02-13 13:33:12'),
(4,	'Product4',	'P4',	60.5,	'2023-02-13 13:35:27',	'2023-02-13 13:35:27'),
(6,	'Product6',	'P6',	100,	'2023-02-13 14:01:00',	'2023-02-13 14:01:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1,	'user1',	'$2a$06$Nt2zePoCfApfBGrfZbHZIudIwZpCNqorTjbKNZtPoLCVic8goZDsi',	'user'),
(2,	'user2',	'$2a$06$Nt2zePoCfApfBGrfZbHZIudIwZpCNqorTjbKNZtPoLCVic8goZDsi',	'user');

-- 2023-02-15 06:14:12