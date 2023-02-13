
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` ( 
    `id` int NOT NULL AUTO_INCREMENT, 
    `productName` varchar(255) NOT NULL, 
    `productCode` varchar(255) NOT NULL, 
    `productPrice` float NOT NULL, 
    `created` datetime NULL, 
    `modified` datetime NULL, 
    PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;