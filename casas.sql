-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14-Ago-2024 às 09:45
-- Versão do servidor: 8.0.39-0ubuntu0.22.04.1
-- versão do PHP: 7.3.33-8+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imoveis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `casas`
--

CREATE TABLE `casas` (
  `codigo` int NOT NULL,
  `imobiliaria` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `estado_casa` enum('venda','aluguel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `casas`
--

INSERT INTO `casas` (`codigo`, `imobiliaria`, `endereco`, `preco`, `estado_casa`) VALUES
(1, 'Marcos Otero', 'Rua Ana Pernigotti, 102', 2400000, 'venda'),
(2, 'Residenze', 'Via della Pisana, 567', 243000, 'aluguel'),
(3, 'Casarão', 'Avenida Fernando Osório, 7788', 650, 'aluguel');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `casas`
--
ALTER TABLE `casas`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `casas`
--
ALTER TABLE `casas`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
