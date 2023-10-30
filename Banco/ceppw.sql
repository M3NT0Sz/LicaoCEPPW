-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2023 às 15:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ceppw`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_cod` int(11) NOT NULL,
  `usu_nome` varchar(100) NOT NULL,
  `usu_sobrenome` varchar(100) NOT NULL,
  `usu_email` varchar(200) NOT NULL,
  `usu_senha` varchar(200) NOT NULL,
  `usu_cep` varchar(8) NOT NULL,
  `usu_rua` varchar(100) NOT NULL,
  `usu_bairro` varchar(100) NOT NULL,
  `usu_cidade` varchar(100) NOT NULL,
  `usu_estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`usu_cod`, `usu_nome`, `usu_sobrenome`, `usu_email`, `usu_senha`, `usu_cep`, `usu_rua`, `usu_bairro`, `usu_cidade`, `usu_estado`) VALUES
(6, 'Matheus', 'Mendes', 'matheusmendes2005@outlook.com', '01330eb9bb3b39bd932c54bac0d7e552', '01153000', 'Rua Vitorino Carmilo', 'Barra Funda', 'São Paulo', 'SP'),
(7, 'Matheus', 'Mendes', 'matheusmendes2005@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055', '01153000', 'Rua Vitorino Carmilo', 'Barra Funda', 'São Paulo', 'SP');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
