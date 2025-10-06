-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2025 às 01:14
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `exame_bioquimica`
--

CREATE TABLE `exame_bioquimica` (
  `id` int(11) NOT NULL,
  `nbilirrubina_total` decimal(10,2) DEFAULT NULL,
  `nbilirrubina_direta` decimal(10,2) DEFAULT NULL,
  `nproteina_total` decimal(10,2) DEFAULT NULL,
  `nalbumina` decimal(10,2) DEFAULT NULL,
  `namilase` decimal(10,2) DEFAULT NULL,
  `ntgo_transaminase_glutamico_oxalacetica` decimal(10,2) DEFAULT NULL,
  `ntgp_transaminase_glutamico_piruvica` decimal(10,2) DEFAULT NULL,
  `ngama_gt_glutamiltransferase` decimal(10,2) DEFAULT NULL,
  `nfosfatase_alcalina` decimal(10,2) DEFAULT NULL,
  `nreatina_quinase_ck` decimal(10,2) DEFAULT NULL,
  `nglicose` decimal(10,2) DEFAULT NULL,
  `nferro` decimal(10,2) DEFAULT NULL,
  `ncolesterol_total` decimal(10,2) DEFAULT NULL,
  `nhdl` decimal(10,2) DEFAULT NULL,
  `nldl` decimal(10,2) DEFAULT NULL,
  `ntriglicerideos` decimal(10,2) DEFAULT NULL,
  `nureia` decimal(10,2) DEFAULT NULL,
  `ncreatinina` decimal(10,2) DEFAULT NULL,
  `nacido_urico` decimal(10,2) DEFAULT NULL,
  `npcr_proteina_c_reativa` decimal(10,2) DEFAULT NULL,
  `ncalcio` decimal(10,2) DEFAULT NULL,
  `nldh` decimal(10,2) DEFAULT NULL,
  `nmagnesio` decimal(10,2) DEFAULT NULL,
  `nfosforo` decimal(10,2) DEFAULT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_preceptor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `ddata_exame` date NOT NULL,
  `cobservacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `exame_bioquimica`
--

INSERT INTO `exame_bioquimica` (`id`, `nbilirrubina_total`, `nbilirrubina_direta`, `nproteina_total`, `nalbumina`, `namilase`, `ntgo_transaminase_glutamico_oxalacetica`, `ntgp_transaminase_glutamico_piruvica`, `ngama_gt_glutamiltransferase`, `nfosfatase_alcalina`, `nreatina_quinase_ck`, `nglicose`, `nferro`, `ncolesterol_total`, `nhdl`, `nldl`, `ntriglicerideos`, `nureia`, `ncreatinina`, `nacido_urico`, `npcr_proteina_c_reativa`, `ncalcio`, `nldh`, `nmagnesio`, `nfosforo`, `id_responsavel`, `id_preceptor`, `id_paciente`, `ddata_exame`, `cobservacao`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1231.00, 312312.00, NULL, NULL, NULL, NULL, NULL, NULL, 8, 8, 1, '2025-10-10', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1321321.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 8, 1, '2025-10-03', NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 11, 1, '2025-10-03', 'Matheus12'),
(10, NULL, NULL, NULL, 65.00, 65.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 8, 1, '2025-10-11', 'MatheusTEste1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame_hematologia`
--

CREATE TABLE `exame_hematologia` (
  `id` int(11) NOT NULL,
  `nhemacia` decimal(10,0) NOT NULL,
  `nhemoglobina` decimal(10,0) NOT NULL,
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
  `ddata_exame` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `exame_hematologia`
--

INSERT INTO `exame_hematologia` (`id`, `nhemacia`, `nhemoglobina`, `nhematocrito`, `nvcm`, `nhcm`, `nchcm`, `nrdw`, `nleucocitos`, `nneutrofilos`, `nblastos`, `npromielocitos`, `nmielocitos`, `nmetamielocitos`, `nbastonetes`, `nsegmentados`, `neosinofilos`, `nbasofilos`, `nlinfocitos`, `nlinfocitos_atipicos`, `nmonocitos`, `nmieloblastos`, `noutras_celulas`, `ncelulas_linfoides`, `ncelulas_monocitoides`, `nplaquetas`, `nvolume_plaquetario_medio`, `id_responsavel`, `id_preceptor`, `id_paciente`, `ddata_exame`) VALUES
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 3232, 3232, 11, 11, 1, '2025-10-04'),
(5, 2313, 132131, 3123, 312312, 312312, 321312, 321312, 13123, 231, 123, 312, 3123, 13, 123, 131, 321312, 3123, 0, 0, 0, 0, 0, 0, 0, 21312, 32131, 11, 9, 1, '2025-10-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `cnome` varchar(240) NOT NULL,
  `cemail` varchar(240) NOT NULL,
  `cperiodo` varchar(240) NOT NULL,
  `cmedicamento` varchar(240) DEFAULT NULL,
  `cpatologia` varchar(240) DEFAULT NULL,
  `ddata_nascimento` date NOT NULL,
  `ddata_cadastro` date NOT NULL,
  `ctelefone` varchar(240) NOT NULL,
  `ccpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `cnome`, `cemail`, `cperiodo`, `cmedicamento`, `cpatologia`, `ddata_nascimento`, `ddata_cadastro`, `ctelefone`, `ccpf`) VALUES
(1, 'JoÃ£o da Silva', 'a@dssd.com', '', 'Dipirona', 'Dipirona', '1990-05-15', '0000-00-00', '(11) 99999-8888', '1111111111'),
(2, 'PACIENTE3', 'a@aa.com', 'matutino', '', '', '2025-07-31', '0000-00-00', '99', ''),
(3, 'paciente3', 'a@aaa.com', 'matutino', '', '', '2025-08-14', '0000-00-00', '99', ''),
(4, 'pacientesla', 'a@aaaaaaaaaa.com', 'matutino', '', '', '2025-08-22', '0000-00-00', '9', ''),
(5, 'doente', 'a@aaab.com', 'matutino', 'medicamento', 'patologia', '2025-08-14', '0000-00-00', '99', ''),
(6, 'a', 'a@b.com', 'matutino', '', '', '0111-01-01', '0000-00-00', '99', ''),
(7, 'asdasd', 'a@aadasdasd.com', 'matutino', '', '', '2025-08-19', '0000-00-00', 'asdasd', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `cnome` varchar(240) NOT NULL,
  `cemail` varchar(240) NOT NULL,
  `csenha` varchar(240) NOT NULL,
  `cadmin` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `cnome`, `cemail`, `csenha`, `cadmin`) VALUES
(8, 'user10', 'a@a.com', '1', 'S'),
(9, 'user2adasd', 'a@aa.com', '11111111', 'N'),
(10, 'usernovo', 'a@aaa.com', '11111111', 'N'),
(11, 'Matheus Silva', 'matleandrosilva@gmail.com', 'matheus123', 'S');

--

--
-- Índices para tabela `exame_bioquimica`
--
ALTER TABLE `exame_bioquimica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_preceptor` (`id_preceptor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices para tabela `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_preceptor` (`id_preceptor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cemail` (`cemail`);

--
-- AUTO_INCREMENT de tabelas despejadas
--


--
-- AUTO_INCREMENT de tabela `exame_bioquimica`
--
ALTER TABLE `exame_bioquimica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `exame_bioquimica`
--
ALTER TABLE `exame_bioquimica`
  ADD CONSTRAINT `exame_bioquimica_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_bioquimica_ibfk_2` FOREIGN KEY (`id_preceptor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_bioquimica_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  ADD CONSTRAINT `exame_hematologia_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_hematologia_ibfk_2` FOREIGN KEY (`id_preceptor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_hematologia_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
