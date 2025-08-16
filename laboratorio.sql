-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/08/2025 às 20:18
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `exame_hematologia`
--

CREATE TABLE `exame_hematologia` (
  `id` int(11) NOT NULL,
  `nhemacia` decimal(10,0) NOT NULL,
  `nhemoblobina` decimal(10,0) NOT NULL,
  `nhematocrito` decimal(10,0) NOT NULL,
  `nvcm` decimal(10,0) NOT NULL,
  `nhcm` decimal(10,0) NOT NULL,
  `nchcm` decimal(10,0) NOT NULL,
  `nrdw` decimal(10,0) NOT NULL,
  `nleucocitos` decimal(10,0) NOT NULL,
  `nneutrofilos` decimal(10,0) NOT NULL,
  `nblastos` decimal(10,0) NOT NULL,
  `npromielocitos` decimal(10,0) NOT NULL,
  `nmielocitos` decimal(10,0) NOT NULL,
  `nmetamielocitos` decimal(10,0) NOT NULL,
  `nbastonetes` decimal(10,0) NOT NULL,
  `nsegmentados` decimal(10,0) NOT NULL,
  `neosinofilos` decimal(10,0) NOT NULL,
  `nbasofilos` decimal(10,0) NOT NULL,
  `nlinfocitos` decimal(10,0) NOT NULL,
  `nlinfocitos_atipicos` decimal(10,0) NOT NULL,
  `nmonocitos` decimal(10,0) NOT NULL,
  `nmieloblastos` decimal(10,0) NOT NULL,
  `noutras_celulas` decimal(10,0) NOT NULL,
  `ncelulas_linfoides` decimal(10,0) NOT NULL,
  `ncelulas_monocitoides` decimal(10,0) NOT NULL,
  `nplaquetas` decimal(10,0) NOT NULL,
  `nvolume_plaquetario_medio` decimal(10,0) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_preceptor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `cnome` varchar(240) NOT NULL,
  `cemail` varchar(240) NOT NULL,
  `cperiodo` varchar(240) NOT NULL,
  `cnome_mae` varchar(240) NOT NULL,
  `cmedicamento` varchar(240) DEFAULT NULL,
  `cpatologia` varchar(240) DEFAULT NULL,
  `ddata_nascimento` date NOT NULL,
  `ddata_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `cnome` varchar(240) NOT NULL,
  `cemail` varchar(240) NOT NULL,
  `csenha` varchar(240) NOT NULL,
  `cadmin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_preceptor` (`id_preceptor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cemail` (`cemail`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  ADD CONSTRAINT `exame_hematologia_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_hematologia_ibfk_2` FOREIGN KEY (`id_preceptor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_hematologia_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
