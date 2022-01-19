-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2021 at 06:29 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atp`
--

-- --------------------------------------------------------

--
-- Table structure for table `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeitem` varchar(220) NOT NULL,
  `descricao` varchar(440) NOT NULL,
  `categoria` varchar(220) NOT NULL,
  `foto` mediumblob,
  `situacao` varchar(220) NOT NULL DEFAULT 'Disponível',
  `dono` varchar(220) NOT NULL,
  `contatodono` varchar(220) NOT NULL,
  `emprestadopara` varchar(220) DEFAULT NULL,
  `dataemp` datetime DEFAULT NULL,
  `datadev` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itens`
--

INSERT INTO `itens` (`id`, `nomeitem`, `descricao`, `categoria`, `foto`, `situacao`, `dono`, `contatodono`, `emprestadopara`, `dataemp`, `datadev`) VALUES
(23, 'Mordedor', 'Um mordedor tricolor', 'Mordedor', 0x6d6f726465646f722063697263756c61722e6a666966, 'Emprestado', 'mel@gmail.com', '(41) 97777-7777', 'pipoca@gmail.com', '2021-11-23 00:00:00', '2021-11-26'),
(24, 'Kong', 'Brinquedo desafiador para comer', 'Comedor', 0x4272696e717565646f5f496e746572617469766f5f4b4f4e475f436c61737369635f636f6d5f44697370656e7365725f706172615f5261c3a7c3a36f5f6f755f5065746973636f5f2d5f5665726d656c686f5f333130353036335f312e6a7067, 'Disponivel', 'dora@gmail.com', '(41)99999-9999', NULL, NULL, NULL),
(25, 'Osso rosa', 'Um osso para morder', 'Osso', 0x4272696e717565646f5f5065745f496e6a65745f4f73736f5f4d6173735f44656e74616c5f466c65785f526f73615f313835383230302e6a7067, 'Emprestado', 'pipoca@gmail.com', '(41) 96666-6666', 'dora@gmail.com', '2021-11-18 00:00:00', '2021-12-03'),
(28, 'Bola', 'Uma bolinha macia', 'Bolinha', 0x626f6c696e68615f706172615f636163686f72726f5f616e74695f7374726573735f6d616369615f3439355f315f32663465303939623733373230303164373932623834343761613638623432342e6a7067, 'Disponivel', 'pipoca@gmail.com', '(41) 96666-6666', NULL, NULL, NULL),
(21, 'Macaco', 'Macaco Caco de pelÃºcia', 'Bichinho de pelÃºcia', 0x6361636f2e6a7067, 'Disponivel', 'dora@gmail.com', '(41)99999-9999', NULL, NULL, NULL),
(22, 'Corda', 'Uma corda para morder', 'Corda', 0x323635363831385f4272696e717565646f5f4d6f726465646f725f436f7264615f44656e74616c5f426f6e655f417a756c5f655f526f73615f706172615f43c3a365735f4d2e6a7067, 'Disponivel', 'pipoca@gmail.com', '(41) 96666-6666', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `telefone` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `senha`) VALUES
(18, 'Mel', 'mel@gmail.com', '(41) 97777-7777', '81a5822dba59e1502189ad58f4487c3b'),
(17, 'Pipoca', 'pipoca@gmail.com', '(41) 96666-6666', 'cdeb03f3a2b5ac1555a3866725e0af89'),
(16, 'Dora', 'dora@gmail.com', '(41)99999-9999', '4ab52314fe615b468eaef0f57e06e6fd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
