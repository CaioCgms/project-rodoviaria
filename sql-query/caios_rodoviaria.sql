-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2023 às 23:18
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `caios_rodoviaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `onibus`
--

CREATE TABLE `onibus` (
  `empresa` varchar(64) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `linha` varchar(128) DEFAULT NULL,
  `hora_saida` datetime DEFAULT NULL,
  `hora_chegada` datetime DEFAULT NULL,
  `duracao` varchar(64) DEFAULT NULL,
  `local_destino` varchar(64) DEFAULT NULL,
  `local_partida` varchar(64) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `poltronas`
--

CREATE TABLE `poltronas` (
  `id` int(11) NOT NULL,
  `numeracao` int(11) NOT NULL,
  `onibus_id` int(11) NOT NULL,
  `passagem_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terminais`
--

CREATE TABLE `terminais` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `onibus_id` int(11) NOT NULL,
  `poltrona_id` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cpf` varchar(32) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `onibus`
--
ALTER TABLE `onibus`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `poltronas`
--
ALTER TABLE `poltronas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `terminais`
--
ALTER TABLE `terminais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `onibus`
--
ALTER TABLE `onibus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `poltronas`
--
ALTER TABLE `poltronas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `terminais`
--
ALTER TABLE `terminais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
