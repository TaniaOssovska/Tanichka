-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Версія сервера:               5.7.30-0ubuntu0.18.04.1 - (Ubuntu)
-- ОС сервера:                   Linux
-- HeidiSQL Версія:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for таблиця bebe.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sum` float unsigned DEFAULT NULL,
  `email` varchar(1024) NOT NULL,
  `name` varchar(1024) DEFAULT NULL,
  `phone` varchar(1024) DEFAULT NULL,
  `comment` varchar(1024) DEFAULT NULL,
  `delivery_address` varchar(1024) DEFAULT NULL,
  `cart` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bebe.orders: 0 rows
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `sum`, `email`, `name`, `phone`, `comment`, `delivery_address`, `cart`) VALUES
	(195, 1799, 'test@gmail.com', 'Таня', '000000000', 'Нічого', 'Тернопіль, Коперника 14', '[["54", "S"]]');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for таблиця bebe.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT '0',
  `hit_sales` int(11) DEFAULT '0',
  `availability` int(11) DEFAULT NULL,
  `name` varchar(1024) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(1024) NOT NULL,
  `description` text,
  `category` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bebe.products: 20 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `rating`, `hit_sales`, `availability`, `name`, `price`, `img`, `description`, `category`) VALUES
	(43, 0, 0, 1, 'Сорочка з кишенею', 700, '5.jpg', 'Хлопок 100%\r\nКолір-білий\r\n', 1),
	(42, 0, 0, 1, 'Верхня сорочка з поясом', 1680, '4.jpg', 'Бавовна - 100%\r\nКолір-білий\r\n', 1),
	(39, 0, 0, 1, 'Смугаста сорочка з кишенею ', 999, '1.jpg', 'Колір-Червоний,білий\r\nЛьон 55%- Віскоза 45%\r\n', 1),
	(40, 0, 1, 1, 'Смугаста сорочка з кишенею', 999, '2.jpg', 'Льон 55%- Віскоза 45%\r\nКолір-синій,білий\r\n', 1),
	(41, 0, 1, 1, 'Сорочка з кишенею', 700, '3.jpg', 'Хлопок 100%\r\nКолір-бірюза\r\n', 1),
	(44, 0, 0, 1, 'Сорочка з кишенею', 700, '6.jpg', 'Хлопок 100%\r\nКолір-персик\r\n', 1),
	(45, 0, 0, 1, 'Твідова верхня сорочка', 1200, '7.jpg', 'Бавовна 85% Поліестер 13% Віскоза 2%\r\nКолір-сірий,синій,чорний,білий\r\n', 1),
	(46, 0, 0, 1, 'Сорочка з кишенею', 700, '8.jpg', 'Хлопок 100%\r\nКолір-молочний\r\n', 1),
	(47, 0, 1, 1, 'Джинсова куртка', 1500, '9.jpg', 'Бавовна-100%\r\nКолір-чорний\r\n', 3),
	(48, 0, 0, 1, 'Куртка з кишенями', 1800, '10.jpg', 'Поліестер-88% Еластан-12%\r\nКолір- пісочний\r\n', 3),
	(49, 0, 0, 1, 'Куртка в спортивному стилі', 1200, '11.jpg', 'Поліестер-94% Еластан-4%\r\nКолір-чорний\r\n', 3),
	(50, 0, 0, 1, 'Водовідштовхуюча куртка', 1299, '12.jpg', 'Поліестер 93% Нейлон 7%\r\nКолір-рожевий\r\n', 3),
	(51, 0, 1, 1, 'Водовідштовхуюча куртка', 1299, '13.jpg', 'Поліестер 93% Нейлон 7%\r\nКолір-голубий\r\n', 3),
	(52, 0, 0, 1, 'Піджак ', 1600, '14.jpg', 'Ліоцел 100%\r\nКолір-білий\r\n', 1),
	(53, 0, 0, 1, 'Комбінезон вільного крою', 1299, '15.jpg', 'Поліестер-100%\r\nКолір-оранж\r\n', 4),
	(54, 0, 0, 1, 'Комбінезон із вишивкою', 1799, '16.jpg', 'Віскоза 89% Поліестер 11%\r\nКолір-чорний\r\n', 4),
	(55, 0, 0, 1, 'Комбінезон із сіточкою', 1100, '17.jpg', 'Поліестер 100%\r\nКолір- чорний\r\n', 4),
	(56, 0, 1, 1, 'Сукня на одне плече ', 900, '18.jpg', 'Хлопок- 100%\r\nКолір- фуксія\r\n', 5),
	(57, 0, 0, 1, 'Комбінезон із принтом ', 1799, '19.jpg', 'Поліестер 100%', 4),
	(58, 0, 1, 1, 'Сукня ', 599, '20.jpg', 'Бавовна 80% Поліестер 20%\r\nКолір-оранж \r\n', 5);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for таблиця bebe.products_categories
CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) DEFAULT NULL,
  `url` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bebe.products_categories: 4 rows
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` (`id`, `name`, `url`, `description`) VALUES
	(1, 'Сорочки', 'shirts.php', NULL),
	(3, 'Куртки', 'jackets.php', NULL),
	(4, 'Комбінезони', 'overalls.php', NULL),
	(5, 'Сукні', 'dresses.php', NULL);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;

-- Dumping structure for таблиця bebe.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fullname` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table bebe.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `fullname`) VALUES
	(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Таня Оссовська ');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
