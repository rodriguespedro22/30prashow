CREATE DATABASE  IF NOT EXISTS `30prashow` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `30prashow`;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Jan-2023 às 18:02
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `30prashow`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idShow` int NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `zipCode` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `udated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_addresses_shows_idx` (`idShow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `buy_ticket`
--

DROP TABLE IF EXISTS `buy_ticket`;
CREATE TABLE IF NOT EXISTS `buy_ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `idTicket` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clients_has_shows_shows1_idx` (`idTicket`),
  KEY `fk_clients_has_shows_clients1_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `shows`
--

DROP TABLE IF EXISTS `shows`;
CREATE TABLE IF NOT EXISTS `shows` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day` date DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `local` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `idCategory` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_shows_category1_idx` (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `shows`
--

INSERT INTO `shows` (`id`, `day`, `name`, `local`, `image`, `idCategory`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', 'Show do Matue', 'Porto Alegre RS - Pepsi', 'storage/images/2023/01/20220404119271.jpg', 1, '2022-09-20 17:43:50', NULL),
(2, '2023-01-01', 'Show do Teto', 'Festa do Branco', 'storage/images/2023/01/6267082772801-xs.jpg', 2, '2022-09-20 18:39:23', NULL),
(3, '2023-01-01', 'Show do Teto', 'Palazzo Lounge Bar', 'storage/images/2023/01/595e6ca8ab9394fae1c8a58cca6b0726.jpg', 2, '2022-09-20 18:39:23', NULL),
(4, '2023-01-01', 'Show do Teto', 'Charqueadas - Tiradentes', 'storage/images/2023/01/595e6ca8ab9394fae1c8a58cca6b0726.jpg', 2, '2022-09-20 18:39:23', NULL),
(5, '2023-01-01', 'Show do Teto', 'Charqueadas - Tiradentes', 'storage/images/2023/01/595e6ca8ab9394fae1c8a58cca6b0726.jpg', 2, '2022-09-20 18:39:23', NULL),
(6, '2023-01-01', 'Show do Teto', 'Charqueadas - Tiradentes', 'storage/images/2023/01/595e6ca8ab9394fae1c8a58cca6b0726.jpg', 2, '2022-09-20 18:39:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'pedro', 'pedroadmin@gmail.com', '$2y$10$mQzKh2VzjHmlrOv0izGgRumm5kx0mpUjXl1wdbV5BiQ6UqUowWw0.');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Estrutura da tabela `singers-categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `singers` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `singers`) VALUES
(1, 'Matue'),
(2, 'Teto'),
(3, 'Wiu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket_show`
--

DROP TABLE IF EXISTS `ticket_show`;
CREATE TABLE IF NOT EXISTS `ticket_show` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `idShow` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shows_shows1_idx` (`idShow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `type` char(1) NOT NULL DEFAULT 'A' COMMENT 'Admin - Client',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Pedro', 'pedro@gmail.com', '1234', NULL, 'W', '2022-09-20 22:43:59', NULL),
(2, 'Alexandre Leal', 'alexandre@gmail.com', '$2y$10$mQzKh2VzjHmlrOv0izGgRumm5kx0mpUjXl1wdbV5BiQ6UqUowWw0.', NULL, 'W', '2022-12-17 19:19:36', NULL),
(3, 'Pedro', 'pedro10@gmail.com', '$2y$10$mQzKh2VzjHmlrOv0izGgRumm5kx0mpUjXl1wdbV5BiQ6UqUowWw0.', NULL, 'C', '2022-12-17 19:19:36', NULL);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `fk_addresses_shows` FOREIGN KEY (`idShow`) REFERENCES `shows` (`id`);

--
-- Limitadores para a tabela `buy_ticket`
--
ALTER TABLE `buy_ticket`
  ADD CONSTRAINT `fk_clients_has_shows_clients1` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_clients_has_shows_shows1` FOREIGN KEY (`idTicket`) REFERENCES `ticket_show` (`id`);

--
-- Limitadores para a tabela `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `fk_shows_category1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`);

--
-- Limitadores para a tabela `ticket_show`
--
ALTER TABLE `ticket_show`
  ADD CONSTRAINT `fk_shows_shows1` FOREIGN KEY (`idShow`) REFERENCES `shows` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;