-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `create_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product` (`id`, `title`, `description`, `create_at`) VALUES
(6,	'Product 1',	'Description for product 1',	'2020-04-10'),
(7,	'Product 2',	'Description for product 2',	'2020-04-10');

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_in` int(11) NOT NULL,
  `stock_left` int(11) NOT NULL,
  `unit_cost` decimal(10,0) NOT NULL,
  `total_cost` decimal(10,0) NOT NULL,
  `create_at` date NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6117D13B4584665A` (`product_id`),
  CONSTRAINT `FK_6117D13B4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `purchase` (`id`, `stock_in`, `stock_left`, `unit_cost`, `total_cost`, `create_at`, `product_id`, `status`) VALUES
(18,	5,	0,	100,	500,	'2020-04-10',	6,	0),
(20,	5,	0,	200,	1000,	'2020-04-10',	6,	0),
(21,	5,	5,	100,	500,	'2020-04-10',	6,	1),
(22,	5,	5,	200,	1000,	'2020-04-10',	6,	1),
(23,	10,	9,	200,	2000,	'2020-04-10',	7,	1);

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `profit` decimal(10,0) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6B8170444584665A` (`product_id`),
  CONSTRAINT `FK_6B8170444584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sales` (`id`, `unit_price`, `quantity`, `total_price`, `profit`, `product_id`) VALUES
(56,	300,	1,	300,	200,	6),
(57,	300,	5,	1500,	900,	6),
(58,	300,	2,	600,	200,	6),
(59,	200,	2,	400,	0,	6),
(60,	300,	1,	300,	100,	7);

-- 2020-04-10 14:39:36
