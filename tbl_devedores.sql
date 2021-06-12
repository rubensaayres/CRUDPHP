-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2021 às 21:02
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_devedores`
--

CREATE TABLE `tbl_devedores` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `CPFCNPJ` varchar(50) DEFAULT NULL,
  `dt_nascimento` date NOT NULL,
  `endereco` varchar(50) CHARACTER SET utf8 NOT NULL,
  `desc_titulo` text CHARACTER SET utf8 NOT NULL,
  `valor` float(10,2) NOT NULL,
  `dt_vencimento` date NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_devedores`
--

INSERT INTO `tbl_devedores` (`id`, `nome`, `CPFCNPJ`, `dt_nascimento`, `endereco`, `desc_titulo`, `valor`, `dt_vencimento`, `updated`) VALUES
(5, 'Rubens Antonio Ayres', '035383667000121', '2021-06-12', 'Rua Capitão Jesus, 5', 'Teste teste', 1000.50, '2021-06-30', '2021-06-12 15:53:56');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_devedores`
--
ALTER TABLE `tbl_devedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_devedores`
--
ALTER TABLE `tbl_devedores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
