-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2018 às 04:43
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testefc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `quantidade_membros` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `familias`
--

INSERT INTO `familias` (`id`, `nome`, `quantidade_membros`) VALUES
(1, 'Stark', 9),
(6, 'Lannister', 12),
(7, 'Tyrell', 4),
(15, 'Baratheon', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `guerras`
--

CREATE TABLE `guerras` (
  `id` int(11) NOT NULL,
  `id_familia_desafiadora` int(11) NOT NULL,
  `id_familia_desafiada` int(11) NOT NULL,
  `id_familia_vencedora` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `guerras`
--

INSERT INTO `guerras` (`id`, `id_familia_desafiadora`, `id_familia_desafiada`, `id_familia_vencedora`, `data_inicio`, `data_fim`) VALUES
(1, 1, 6, 6, '2018-05-01', '2018-05-02'),
(2, 1, 6, 1, '2018-05-03', '2018-05-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guerras`
--
ALTER TABLE `guerras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FAMILIA_DESAFIADORA` (`id_familia_desafiadora`),
  ADD KEY `FK_FAMILIA_DESAFIADA` (`id_familia_desafiada`),
  ADD KEY `FK_FAMILIA_VENCEDORA` (`id_familia_vencedora`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `guerras`
--
ALTER TABLE `guerras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `guerras`
--
ALTER TABLE `guerras`
  ADD CONSTRAINT `FK_FAMILIA_DESAFIADA` FOREIGN KEY (`id_familia_desafiada`) REFERENCES `familias` (`id`),
  ADD CONSTRAINT `FK_FAMILIA_DESAFIADORA` FOREIGN KEY (`id_familia_desafiadora`) REFERENCES `familias` (`id`),
  ADD CONSTRAINT `FK_FAMILIA_VENCEDORA` FOREIGN KEY (`id_familia_vencedora`) REFERENCES `familias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
