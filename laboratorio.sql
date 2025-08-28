-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/08/2025 às 02:02
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
  `id_paciente` int(11) NOT NULL,
  `ddata_exame` DATE NOT NULL
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
  `ddata_cadastro` date NOT NULL,
  `ctelefone` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id`, `cnome`, `cemail`, `cperiodo`, `cnome_mae`, `cmedicamento`, `cpatologia`, `ddata_nascimento`, `ddata_cadastro`, `ctelefone`) VALUES
(1, 'João da Silva', 'a@dssd.com', '', 'Maria da Silva', 'Dipirona', 'Dipirona', '1990-05-15', '0000-00-00', '(11) 99999-8888'),
(2, 'PACIENTE3', 'a@aa.com', 'matutino', 'mae2', '', '', '2025-07-31', '0000-00-00', '99'),
(3, 'paciente3', 'a@aaa.com', 'matutino', 'mae3', '', '', '2025-08-14', '0000-00-00', '99'),
(4, 'pacientesla', 'a@aaaaaaaaaa.com', 'matutino', 'mae', '', '', '2025-08-22', '0000-00-00', '9'),
(5, 'doente', 'a@aaab.com', 'matutino', 'mae', 'medicamento', 'patologia', '2025-08-14', '0000-00-00', '99'),
(6, 'a', 'a@b.com', 'matutino', 'mae', '', '', '0111-01-01', '0000-00-00', '99'),
(7, 'asdasd', 'a@aadasdasd.com', 'matutino', 'asdasd', '', '', '2025-08-19', '0000-00-00', 'asdasd');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `cnome` varchar(240) NOT NULL,
  `cemail` varchar(240) NOT NULL,
  `csenha` varchar(240) NOT NULL,
  `cadmin` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `cnome`, `cemail`, `csenha`, `cadmin`) VALUES
(8, 'user10', 'a@a.com', '1', 'S'),
(9, 'user2adasd', 'a@aa.com', '11111111', 'N'),
(10, 'usernovo', 'a@aaa.com', '11111111', 'N');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--


--
-- Estrutura para tabela `exame_bioquimica`
--
CREATE TABLE `exame_bioquimica` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `nbilirrubina_total` DECIMAL(10,2),
    `nbilirrubina_direta` DECIMAL(10,2),
    `nproteina_total` DECIMAL(10,2),
    `nalbumina` DECIMAL(10,2),
    `namilase` DECIMAL(10,2),
    `ntgo_transaminase_glutamico_oxalacetica` DECIMAL(10,2),
    `ntgp_transaminase_glutamico_piruvica` DECIMAL(10,2),
    `ngama_gt_glutamiltransferase` DECIMAL(10,2),
    `nfosfatase_alcalina` DECIMAL(10,2),
    `nreatina_quinase_ck` DECIMAL(10,2),
    `nglicose` DECIMAL(10,2),
    `nferro` DECIMAL(10,2),
    `ncolesterol_total` DECIMAL(10,2),
    `nhdl` DECIMAL(10,2),
    `nldl` DECIMAL(10,2),
    `ntriglicerideos` DECIMAL(10,2),
    `nureia` DECIMAL(10,2),
    `ncreatinina` DECIMAL(10,2),
    `nacido_urico` DECIMAL(10,2),
    `npcr_proteina_c_reativa` DECIMAL(10,2),
    `ncalcio` DECIMAL(10,2),
    `nldh` DECIMAL(10,2),
    `nmagnesio` DECIMAL(10,2),
    `nfosforo` DECIMAL(10,2),
    `id_responsavel` int(11) NOT NULL,
	  `id_preceptor` int(11) NOT NULL,
    `id_paciente` int(11) NOT NULL,
    `ddata_exame` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Índices de tabela `exame_bioquimica`
--

ALTER TABLE `exame_bioquimica`
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_preceptor` (`id_preceptor`),
  ADD KEY `id_paciente` (`id_paciente`);
  

--
-- Restrições para tabelas `exame_bioquimica`
--

ALTER TABLE `exame_bioquimica`
  ADD CONSTRAINT `exame_bioquimica_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_bioquimica_ibfk_2` FOREIGN KEY (`id_preceptor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_bioquimica_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
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
