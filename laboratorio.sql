-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2025 at 07:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laboratorio`
--

-- --------------------------------------------------------

--
-- Table structure for table `exame_bioquimica`
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
-- Dumping data for table `exame_bioquimica`
--

INSERT INTO `exame_bioquimica` (`id`, `nbilirrubina_total`, `nbilirrubina_direta`, `nproteina_total`, `nalbumina`, `namilase`, `ntgo_transaminase_glutamico_oxalacetica`, `ntgp_transaminase_glutamico_piruvica`, `ngama_gt_glutamiltransferase`, `nfosfatase_alcalina`, `nreatina_quinase_ck`, `nglicose`, `nferro`, `ncolesterol_total`, `nhdl`, `nldl`, `ntriglicerideos`, `nureia`, `ncreatinina`, `nacido_urico`, `npcr_proteina_c_reativa`, `ncalcio`, `nldh`, `nmagnesio`, `nfosforo`, `id_responsavel`, `id_preceptor`, `id_paciente`, `ddata_exame`, `cobservacao`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1231.00, 312312.00, NULL, NULL, NULL, NULL, NULL, NULL, 8, 8, 1, '2025-10-10', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1321321.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 8, 1, '2025-10-03', NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 11, 1, '2025-10-03', 'Matheus12'),
(10, 4.00, 5.00, 7.10, 4.50, 0.60, 1.25, 2.00, 3.00, 85.00, 3.50, 92.00, 105.00, 180.00, 55.00, 100.00, 130.00, 35.00, 99999999.99, 5.20, 1111.00, 32.00, 180.00, 2.00, 0.90, 8, 8, 1, '2025-01-01', 'MatheusTEste1');

-- --------------------------------------------------------

--
-- Table structure for table `exame_hematologia`
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
-- Dumping data for table `exame_hematologia`
--

INSERT INTO `exame_hematologia` (`id`, `nhemacia`, `nhemoglobina`, `nhematocrito`, `nvcm`, `nhcm`, `nchcm`, `nrdw`, `nleucocitos`, `nneutrofilos`, `nblastos`, `npromielocitos`, `nmielocitos`, `nmetamielocitos`, `nbastonetes`, `nsegmentados`, `neosinofilos`, `nbasofilos`, `nlinfocitos`, `nlinfocitos_atipicos`, `nmonocitos`, `nmieloblastos`, `noutras_celulas`, `ncelulas_linfoides`, `ncelulas_monocitoides`, `nplaquetas`, `nvolume_plaquetario_medio`, `id_responsavel`, `id_preceptor`, `id_paciente`, `ddata_exame`) VALUES
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 3232, 3232, 11, 11, 1, '2025-10-04'),
(5, 2313, 132131, 3123, 312312, 312312, 321312, 321312, 13123, 231, 123, 312, 3123, 13, 123, 131, 321312, 3123, 0, 0, 0, 0, 0, 0, 0, 1, 15, 11, 9, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
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
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id`, `cnome`, `cemail`, `cperiodo`, `cmedicamento`, `cpatologia`, `ddata_nascimento`, `ddata_cadastro`, `ctelefone`, `ccpf`) VALUES
(1, 'JoÃ£o da Silva', 'a@dssd.com', '', 'Dipirona', 'Dipirona', '1990-05-15', '0000-00-00', '(11) 99999-8888', '1111111111'),
(2, 'PACIENTE3', 'a@aa.com', 'matutino', '', '', '2025-07-31', '0000-00-00', '99', ''),
(3, 'paciente3', 'a@aaa.com', 'matutino', '', '', '2025-08-14', '0000-00-00', '99', ''),
(4, 'pacientesla', 'a@aaaaaaaaaa.com', 'matutino', '', '', '2025-08-22', '0000-00-00', '9', ''),
(5, 'doente', 'a@aaab.com', 'matutino', 'medicamento', 'patologia', '2025-08-14', '0000-00-00', '99', ''),
(6, 'a', 'a@b.com', 'matutino', '', '', '0111-01-01', '0000-00-00', '99', ''),
(7, 'asdasd', 'a@aadasdasd.com', 'matutino', '', '', '2025-08-19', '0000-00-00', 'asdasd', ''),
(8, 'pacientenovo', 'a@aaaaaaaa.com', 'matutino', '', '', '2025-10-07', '0000-00-00', '1', '111111111'),
(9, 'paciente', 'a@abcd.com', 'matutino', '', '', '1200-01-01', '0000-00-00', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `referencia_bioquimica`
--

CREATE TABLE `referencia_bioquimica` (
  `id` int(11) NOT NULL,
  `cbilirrubina_total` varchar(20) DEFAULT '0,1 - 1,2',
  `cbilirrubina_total_unidade` varchar(20) DEFAULT 'mg/dL',
  `cbilirrubina_direta` varchar(20) DEFAULT '≤ 0,1 - 1,2',
  `cbilirrubina_direta_unidade` varchar(20) DEFAULT 'mg/dL',
  `cproteina_total` varchar(20) DEFAULT '3,5 - 5,2',
  `cproteina_total_unidade` varchar(20) DEFAULT 'g/dL',
  `calbumina` varchar(20) DEFAULT '3,5 - 5,2',
  `calbumina_unidade` varchar(20) DEFAULT 'g/dL',
  `camilase` varchar(20) DEFAULT '< 100',
  `camilase_unidade` varchar(20) DEFAULT 'u/L',
  `ctgo_transaminase_glutamico_oxalacetica_m` varchar(20) DEFAULT '< 35',
  `ctgo_transaminase_glutamico_oxalacetica_f` varchar(20) DEFAULT '< 31',
  `ctgo_transaminase_glutamico_oxalacetica_unidade` varchar(20) DEFAULT 'U/L',
  `ctgp_transaminase_glutamico_piruvica_m` varchar(20) DEFAULT '< 45',
  `ctgp_transaminase_glutamico_piruvica_f` varchar(20) DEFAULT '< 34',
  `ctgp_transaminase_glutamico_piruvica_unidade` varchar(20) DEFAULT 'U/L',
  `cgama_gt_glutamiltransferase_m` varchar(20) DEFAULT '< 49',
  `cgama_gt_glutamiltransferase_f` varchar(20) DEFAULT '< 32',
  `cgama_gt_glutamiltransferase_unidade` varchar(20) DEFAULT 'U/L',
  `cfosfatase_alcalina_m` varchar(20) DEFAULT '40 - 130',
  `cfosfatase_alcalina_f` varchar(20) DEFAULT '35 - 105',
  `cfosfatase_alcalina_unidade` varchar(20) DEFAULT 'U/L',
  `ccreatina_quinase_ck_m` varchar(20) DEFAULT '< 171',
  `ccreatina_quinase_ck_f` varchar(20) DEFAULT '< 145',
  `ccreatina_quinase_ck_unidade` varchar(20) DEFAULT 'U/L',
  `cglicose` varchar(20) DEFAULT '70 - 99',
  `cglicose_unidade` varchar(20) DEFAULT 'mg/dL',
  `cferro_m_ate_40_anos` varchar(20) DEFAULT '40 - 155',
  `cferro_m_mais_de_40_anos` varchar(20) DEFAULT '35 - 168',
  `cferro_m_mais_de_60_anos` varchar(20) DEFAULT '40 - 120',
  `cferro_f_ate_40_anos` varchar(20) DEFAULT '37 - 65',
  `cferro_f_mais_de_40_anos` varchar(20) DEFAULT '23 - 134',
  `cferro_f_mais_de_60_anos` varchar(20) DEFAULT '36 - 149',
  `cferro_crianca` varchar(20) DEFAULT '2 - 12',
  `cferro_unidade` varchar(20) DEFAULT 'μg/dL',
  `ccolesterol_total` varchar(20) DEFAULT '≤ 200',
  `ccolesterol_total_unidade` varchar(20) DEFAULT 'mg/dL',
  `chdl_ate_19_anos` varchar(20) DEFAULT '> 45',
  `chdl_mais_de_20_anos` varchar(20) DEFAULT '> 40',
  `chdl_unidade` varchar(20) DEFAULT 'mg/dL',
  `cldl_baixo_risco` varchar(20) DEFAULT '< 130',
  `cldl_risco_intermediario` varchar(20) DEFAULT '< 100',
  `cldl_alto_risco` varchar(20) DEFAULT '< 70',
  `cldl_muito_alto_risco` varchar(20) DEFAULT '< 50',
  `cldl_unidade` varchar(20) DEFAULT 'mg/dL',
  `ctriglicerideos` varchar(20) DEFAULT '≤ 200',
  `ctriglicerideos_unidade` varchar(20) DEFAULT 'mg/dL',
  `cureia_m_menos_de_50_anos` varchar(20) DEFAULT '19 - 44',
  `cureia_m_mais_de_50_anos` varchar(20) DEFAULT '18 - 55',
  `cureia_f_menos_de_50_anos` varchar(20) DEFAULT '15 - 40',
  `cureia_f_mais_de_50_anos` varchar(20) DEFAULT '21 - 43',
  `cureia_crianca` varchar(20) DEFAULT '11 - 36',
  `cureia_unidade` varchar(20) DEFAULT 'mg/dL',
  `ccreatinina_m` varchar(20) DEFAULT '0,6 – 1,1',
  `ccreatinina_f` varchar(20) DEFAULT '0,7 – 1,3',
  `ccreatinina_crianca` varchar(20) DEFAULT '0,5 – 1,2',
  `ccreatinina_unidade` varchar(20) DEFAULT 'mg/dL',
  `cacido_urico_m_13_a_18_anos` varchar(20) DEFAULT '3,1 – 7,6',
  `cacido_urico_m_mais_de_18_anos` varchar(20) DEFAULT '3,5 – 7,2',
  `cacido_urico_f_1_a_9_anos` varchar(20) DEFAULT '1,8 – 5,5',
  `cacido_urico_f_10_a_18_anos` varchar(20) DEFAULT '2,2 – 6,6',
  `cacido_urico_f_mais_de_18_anos` varchar(20) DEFAULT '2,6 – 6,0',
  `cacido_urico_unidade` varchar(20) DEFAULT 'mg/dL',
  `cpcr_proteina_c_reativa` varchar(20) DEFAULT '< 1,0',
  `cpcr_proteina_c_reativa_unidade` varchar(20) DEFAULT 'mg/dL',
  `ccalcio` varchar(20) DEFAULT '8,6 - 10,3',
  `ccalcio_unidade` varchar(20) DEFAULT 'mg/dL',
  `cldh` varchar(20) DEFAULT '< 480',
  `cldh_unidade` varchar(20) DEFAULT 'mg/dL',
  `cmagnesio_m` varchar(20) DEFAULT '1,8 - 2,6',
  `cmagnesio_f` varchar(20) DEFAULT '1,9 - 2,5',
  `cmagnesio_crianca` varchar(20) DEFAULT '1,5 - 2,3',
  `cmagnesio_unidade` varchar(20) DEFAULT 'mg/dL',
  `cfosforo_adulto` varchar(20) DEFAULT '2,6 - 4,5',
  `cfosforo_1_a_3_anos` varchar(20) DEFAULT '3,1 - 6,0',
  `cfosforo_4_a_12_anos` varchar(20) DEFAULT '3,3 - 5,7',
  `cfosforo_13_a_15_anos` varchar(20) DEFAULT '2,9 - 5,1',
  `cfosforo_16_a_18_anos` varchar(20) DEFAULT '2,7 - 4,9',
  `cfosforo_unidade` varchar(20) DEFAULT 'mg/dL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referencia_hematologia`
--

CREATE TABLE `referencia_hematologia` (
  `id` int(11) NOT NULL,
  `chemacia_m` varchar(20) DEFAULT '4,3 - 5,7',
  `chemacia_f` varchar(20) DEFAULT '3,9 - 5,0',
  `chemacia_unidade` varchar(20) DEFAULT 'milhões/µL',
  `chemoglobina_m` varchar(20) DEFAULT '13,5 - 17,5',
  `chemoglobina_f` varchar(20) DEFAULT '12,0 - 15,5',
  `chemoglobina_unidade` varchar(20) DEFAULT 'g/dL',
  `chematocrito_m` varchar(20) DEFAULT '30,0 - 50,0',
  `chematocrito_f` varchar(20) DEFAULT '35,0 - 45,0',
  `chematocrito_unidade` varchar(20) DEFAULT '%',
  `cvcm_m` varchar(20) DEFAULT '80 - 100',
  `cvcm_f` varchar(20) DEFAULT '80 - 100',
  `cvcm_unidade` varchar(20) DEFAULT 'fL',
  `chcm_m` varchar(20) DEFAULT '26 - 34',
  `chcm_f` varchar(20) DEFAULT '26 - 34',
  `chcm_unidade` varchar(20) DEFAULT 'pg',
  `cchcw_m` varchar(20) DEFAULT '31 - 36',
  `cchcw_f` varchar(20) DEFAULT '31 - 36',
  `cchcw_unidade` varchar(20) DEFAULT 'g/dL',
  `crdw_m` varchar(20) DEFAULT '11,5 - 16,5',
  `crdw_f` varchar(20) DEFAULT '11,5 - 16,5',
  `crdw_unidade` varchar(20) DEFAULT '%',
  `cleucocitos_relativo` varchar(20) DEFAULT '100',
  `cleucocitos_relativo_unidade` varchar(20) DEFAULT '%',
  `cleucocitos_absoluto` varchar(20) DEFAULT '4.000 - 11.000',
  `cleucocitos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cneutrofilos_relativo` varchar(20) DEFAULT '40 - 70',
  `cneutrofilos_relativo_unidade` varchar(20) DEFAULT '%',
  `cneutrofilos_absoluto` varchar(20) DEFAULT '2.000 - 7 500',
  `cneutrofilos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cblastos_relativo` varchar(20) DEFAULT '0',
  `cblastos_relativo_unidade` varchar(20) DEFAULT '%',
  `cblastos_absoluto` varchar(20) DEFAULT '0',
  `cblastos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cpromielocitos_relativo` varchar(20) DEFAULT '0',
  `cpromielocitos_relativo_unidade` varchar(20) DEFAULT '%',
  `cpromielocitos_absoluto` varchar(20) DEFAULT '0',
  `cpromielocitos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cmielocitos_relativo` varchar(20) DEFAULT '0',
  `cmielocitos_relativo_unidade` varchar(20) DEFAULT '%',
  `cmielocitos_absoluto` varchar(20) DEFAULT '0',
  `cmielocitos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cmetamielocitos_relativo` varchar(20) DEFAULT '0',
  `cmetamielocitos_relativo_unidade` varchar(20) DEFAULT '%',
  `cmetamielocitos_absoluto` varchar(20) DEFAULT '0',
  `cmetamielocitos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cbastonetes_relativo` varchar(20) DEFAULT '0 - 5',
  `cbastonetes_relativo_unidade` varchar(20) DEFAULT '%',
  `cbastonetes_absoluto` varchar(20) DEFAULT '0 - 500',
  `cbastonetes_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `csegmentados_relativo` varchar(20) DEFAULT '',
  `csegmentados_relativo_unidade` varchar(20) DEFAULT '%',
  `csegmentados_absoluto` varchar(20) DEFAULT '1.700 - 8.000',
  `csegmentados_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `ceosinofilos_relativo` varchar(20) DEFAULT '1 - 7',
  `ceosinofilos_relativo_unidade` varchar(20) DEFAULT '%',
  `ceosinofilos_absoluto` varchar(20) DEFAULT '40 - 400',
  `ceosinofilos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cbasofilos_relativo` varchar(20) DEFAULT '0 - 2',
  `cbasofilos_relativo_unidade` varchar(20) DEFAULT '%',
  `cbasofilos_absoluto` varchar(20) DEFAULT '0 - 200',
  `cbasofilos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `clinfocitos_relativo` varchar(20) DEFAULT '20 - 40',
  `clinfocitos_relativo_unidade` varchar(20) DEFAULT '%',
  `clinfocitos_absoluto` varchar(20) DEFAULT '1.000 - 2.900',
  `clinfocitos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `clinfocitos_atipicos_relativo` varchar(20) DEFAULT '0',
  `clinfocitos_atipicos_relativo_unidade` varchar(20) DEFAULT '%',
  `clinfocitos_atipicos_absoluto` varchar(20) DEFAULT '0',
  `clinfocitos_atipicos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cmonocitos_relativo` varchar(20) DEFAULT '2 - 8',
  `cmonocitos_relativo_unidade` varchar(20) DEFAULT '%',
  `cmonocitos_absoluto` varchar(20) DEFAULT '200 - 800',
  `cmonocitos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `cmieloblastos_relativo` varchar(20) DEFAULT '0',
  `cmieloblastos_relativo_unidade` varchar(20) DEFAULT '%',
  `cmieloblastos_absoluto` varchar(20) DEFAULT '0',
  `cmieloblastos_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `coutras_celulas_relativo` varchar(20) DEFAULT '0',
  `coutras_celulas_relativo_unidade` varchar(20) DEFAULT '%',
  `coutras_celulas_absoluto` varchar(20) DEFAULT '0',
  `coutras_celulas_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `ccelulas_linfoides_relativo` varchar(20) DEFAULT '0',
  `ccelulas_linfoides_relativo_unidade` varchar(20) DEFAULT '%',
  `ccelulas_linfoides_absoluto` varchar(20) DEFAULT '0',
  `ccelulas_linfoides_absoluto_unidade` varchar(20) DEFAULT '/µL',
  `ccelulas_monocitoides_relativo` varchar(20) DEFAULT '0',
  `ccelulas_monocitoides_relativo_unidade` varchar(20) DEFAULT '%',
  `ccelulas_monocitoides_absoluto` varchar(20) DEFAULT '0',
  `ccelulas_monocitoides_absoluto_unidade` varchar(20) DEFAULT NULL,
  `cplaquetas` varchar(20) DEFAULT '150 - 400',
  `cplaquetas_unidade` varchar(20) DEFAULT 'mil/µL',
  `cvolume_plaquetario_medio` varchar(20) DEFAULT '6,5 - 15,0',
  `cvolume_plaquetario_medio_unidade` varchar(20) DEFAULT 'fL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `cnome` varchar(240) NOT NULL,
  `cemail` varchar(240) NOT NULL,
  `csenha` varchar(240) NOT NULL,
  `cadmin` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `cnome`, `cemail`, `csenha`, `cadmin`) VALUES
(8, 'user10', 'a@a.com', '1', 'S'),
(9, 'user2adasd', 'a@aa.com', '11111111', 'N'),
(10, 'usernovo', 'a@aaa.com', '1', 'N'),
(11, 'Matheus Silva', 'matleandrosilva@gmail.com', 'matheus123', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exame_bioquimica`
--
ALTER TABLE `exame_bioquimica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_preceptor` (`id_preceptor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indexes for table `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_preceptor` (`id_preceptor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referencia_bioquimica`
--
ALTER TABLE `referencia_bioquimica`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referencia_hematologia`
--
ALTER TABLE `referencia_hematologia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cemail` (`cemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exame_bioquimica`
--
ALTER TABLE `exame_bioquimica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exame_bioquimica`
--
ALTER TABLE `exame_bioquimica`
  ADD CONSTRAINT `exame_bioquimica_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_bioquimica_ibfk_2` FOREIGN KEY (`id_preceptor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_bioquimica_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  ADD CONSTRAINT `exame_hematologia_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_hematologia_ibfk_2` FOREIGN KEY (`id_preceptor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exame_hematologia_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
