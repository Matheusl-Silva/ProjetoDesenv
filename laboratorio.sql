-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 05:58 PM
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
-- Table structure for table `anamnese_enfermagem`
--

CREATE TABLE `anamnese_enfermagem` (
  `id` int(11) NOT NULL,
  `cqueixa` varchar(250) NOT NULL,
  `dinicio_sintomas` datetime NOT NULL,
  `cfrequencia` varchar(250) NOT NULL,
  `clocalizacao_da_dor` varchar(250) NOT NULL,
  `bcardiopatia` tinyint(1) NOT NULL,
  `bhipertensao` tinyint(1) NOT NULL,
  `bdiabetes` tinyint(1) NOT NULL,
  `bcancer` tinyint(1) NOT NULL,
  `bcirurgias` tinyint(1) NOT NULL,
  `coutras_doencas` varchar(250) DEFAULT NULL,
  `calergias` varchar(250) DEFAULT NULL,
  `cmedicamento` varchar(250) DEFAULT NULL,
  `nrefeicoes_ao_dia` int(11) NOT NULL,
  `celiminacao_urinaria` varchar(250) NOT NULL,
  `celiminacao_intestinal` varchar(250) NOT NULL,
  `cciclo_menstrual` varchar(250) DEFAULT NULL,
  `csono_e_repouso` varchar(250) NOT NULL,
  `nhoras_de_sono` int(11) NOT NULL,
  `cfrequencia_fumo` varchar(250) DEFAULT NULL,
  `cfrequencia_drogas` varchar(250) DEFAULT NULL,
  `cfrequencia_alcool` varchar(250) DEFAULT NULL,
  `cfrequencia_exercicios` varchar(250) DEFAULT NULL,
  `clazer` varchar(250) DEFAULT NULL,
  `bsaneamento_basico` tinyint(1) NOT NULL,
  `canimais_domesticos` varchar(250) DEFAULT NULL,
  `bposto_de_saude` tinyint(1) NOT NULL,
  `cdoenca_familiar` varchar(250) DEFAULT NULL,
  `ctratamento_doenca_familiar` varchar(250) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `ddata` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anamnese_enfermagem`
--

-- --------------------------------------------------------

--
-- Table structure for table `exame_bioquimica`
--

CREATE TABLE `exame_bioquimica` (
  `id` int(11) NOT NULL,
  `nbilirrubina_total` decimal(10,3) DEFAULT NULL,
  `nbilirrubina_direta` decimal(10,3) DEFAULT NULL,
  `nproteina_total` decimal(10,3) DEFAULT NULL,
  `nalbumina` decimal(10,3) DEFAULT NULL,
  `namilase` decimal(10,3) DEFAULT NULL,
  `ntgo_transaminase_glutamico_oxalacetica` decimal(10,3) DEFAULT NULL,
  `ntgp_transaminase_glutamico_piruvica` decimal(10,3) DEFAULT NULL,
  `ngama_gt_glutamiltransferase` decimal(10,3) DEFAULT NULL,
  `nfosfatase_alcalina` decimal(10,3) DEFAULT NULL,
  `nreatina_quinase_ck` decimal(10,3) DEFAULT NULL,
  `nglicose` decimal(10,3) DEFAULT NULL,
  `nferro` decimal(10,3) DEFAULT NULL,
  `ncolesterol_total` decimal(10,3) DEFAULT NULL,
  `nhdl` decimal(10,3) DEFAULT NULL,
  `nldl` decimal(10,3) DEFAULT NULL,
  `ntriglicerideos` decimal(10,3) DEFAULT NULL,
  `nureia` decimal(10,3) DEFAULT NULL,
  `ncreatinina` decimal(10,3) DEFAULT NULL,
  `nacido_urico` decimal(10,3) DEFAULT NULL,
  `npcr_proteina_c_reativa` decimal(10,3) DEFAULT NULL,
  `ncalcio` decimal(10,3) DEFAULT NULL,
  `nldh` decimal(10,3) DEFAULT NULL,
  `nmagnesio` decimal(10,3) DEFAULT NULL,
  `nfosforo` decimal(10,3) DEFAULT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_preceptor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `ddata_exame` date NOT NULL,
  `cobservacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exame_bioquimica`
--

-- --------------------------------------------------------

--
-- Table structure for table `exame_hematologia`
--

CREATE TABLE `exame_hematologia` (
  `id` int(11) NOT NULL,
  `nhemacia` decimal(10,3) NOT NULL,
  `nhemoglobina` decimal(10,3) NOT NULL,
  `nhematocrito` decimal(10,3) NOT NULL,
  `nvcm` decimal(10,3) NOT NULL,
  `nhcm` decimal(10,3) NOT NULL,
  `nchcm` decimal(10,3) NOT NULL,
  `nrdw` decimal(10,3) NOT NULL,
  `nleucocitos` decimal(10,3) NOT NULL,
  `nneutrofilos` decimal(10,3) NOT NULL,
  `nblastos` decimal(10,3) NOT NULL,
  `npromielocitos` decimal(10,3) NOT NULL,
  `nmielocitos` decimal(10,3) NOT NULL,
  `nmetamielocitos` decimal(10,3) NOT NULL,
  `nbastonetes` decimal(10,3) NOT NULL,
  `nsegmentados` decimal(10,3) NOT NULL,
  `neosinofilos` decimal(10,3) NOT NULL,
  `nbasofilos` decimal(10,3) NOT NULL,
  `nlinfocitos` decimal(10,3) NOT NULL,
  `nlinfocitos_atipicos` decimal(10,3) NOT NULL,
  `nmonocitos` decimal(10,3) NOT NULL,
  `nmieloblastos` decimal(10,3) NOT NULL,
  `noutras_celulas` decimal(10,3) NOT NULL,
  `ncelulas_linfoides` decimal(10,3) NOT NULL,
  `ncelulas_monocitoides` decimal(10,3) NOT NULL,
  `nplaquetas` decimal(10,3) NOT NULL,
  `nvolume_plaquetario_medio` decimal(10,3) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_preceptor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `ddata_exame` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exame_hematologia`
--

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
  `ddata_cadastro` date NOT NULL DEFAULT (curdate()),
  `ctelefone` varchar(240) NOT NULL,
  `ccpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paciente`
--

-- --------------------------------------------------------

--
-- Table structure for table `referencia_bioquimica`
--

CREATE TABLE `referencia_bioquimica` (
  `id` int(11) NOT NULL,
  `cbilirrubina_total` varchar(100) DEFAULT '0,1 - 1,2 mg/dL',
  `cbilirrubina_direta` varchar(100) DEFAULT '≤ 0,1 - 1,2 mg/dL',
  `cproteina_total` varchar(100) DEFAULT '3,5 - 5,2 g/dL',
  `calbumina` varchar(100) DEFAULT '3,5 - 5,2 g/dL',
  `camilase` varchar(100) DEFAULT '< 100 u/L',
  `ctgo_transaminase_glutamico_oxalacetica_m` varchar(100) DEFAULT '< 35 U/L',
  `ctgo_transaminase_glutamico_oxalacetica_f` varchar(100) DEFAULT '< 31 U/L',
  `ctgp_transaminase_glutamico_piruvica_m` varchar(100) DEFAULT '< 45 U/L',
  `ctgp_transaminase_glutamico_piruvica_f` varchar(100) DEFAULT '< 34 U/L',
  `cgama_gt_glutamiltransferase_m` varchar(100) DEFAULT '< 49 U/L',
  `cgama_gt_glutamiltransferase_f` varchar(100) DEFAULT '< 32 U/L',
  `cfosfatase_alcalina_m` varchar(100) DEFAULT '40 - 130 U/L',
  `cfosfatase_alcalina_f` varchar(100) DEFAULT '35 - 105 U/L',
  `ccreatina_quinase_ck_m` varchar(100) DEFAULT '< 171 U/L',
  `ccreatina_quinase_ck_f` varchar(100) DEFAULT '< 145 U/L',
  `cglicose` varchar(100) DEFAULT '70 - 99 mg/dL',
  `cferro_m_ate_40_anos` varchar(100) DEFAULT '40 - 155 μg/dL',
  `cferro_m_mais_de_40_anos` varchar(100) DEFAULT '35 - 168 μg/dL',
  `cferro_m_mais_de_60_anos` varchar(100) DEFAULT '40 - 120 μg/dL',
  `cferro_f_ate_40_anos` varchar(100) DEFAULT '37 - 65 μg/dL',
  `cferro_f_mais_de_40_anos` varchar(100) DEFAULT '23 - 134 μg/dL',
  `cferro_f_mais_de_60_anos` varchar(100) DEFAULT '36 - 149 μg/dL',
  `cferro_crianca` varchar(100) DEFAULT '2 - 12 μg/dL',
  `ccolesterol_total` varchar(100) DEFAULT '≤ 200 mg/dL',
  `chdl_ate_19_anos` varchar(100) DEFAULT '> 45 mg/dL',
  `chdl_mais_de_20_anos` varchar(100) DEFAULT '> 40 mg/dL',
  `cldl_baixo_risco` varchar(100) DEFAULT '< 130 mg/dL',
  `cldl_risco_intermediario` varchar(100) DEFAULT '< 100 mg/dL',
  `cldl_alto_risco` varchar(100) DEFAULT '< 70 mg/dL',
  `cldl_muito_alto_risco` varchar(100) DEFAULT '< 50 mg/dL',
  `ctriglicerideos` varchar(100) DEFAULT '≤ 200 mg/dL',
  `cureia_m_menos_de_50_anos` varchar(100) DEFAULT '19 - 44 mg/dL',
  `cureia_m_mais_de_50_anos` varchar(100) DEFAULT '18 - 55 mg/dL',
  `cureia_f_menos_de_50_anos` varchar(100) DEFAULT '15 - 40 mg/dL',
  `cureia_f_mais_de_50_anos` varchar(100) DEFAULT '21 - 43 mg/dL',
  `cureia_crianca` varchar(100) DEFAULT '11 - 36 mg/dL',
  `ccreatinina_m` varchar(100) DEFAULT '0,6 – 1,1 mg/dL',
  `ccreatinina_f` varchar(100) DEFAULT '0,7 – 1,3 mg/dL',
  `ccreatinina_crianca` varchar(100) DEFAULT '0,5 – 1,2 mg/dL',
  `cacido_urico_m_13_a_18_anos` varchar(100) DEFAULT '3,1 – 7,6 mg/dL',
  `cacido_urico_m_mais_de_18_anos` varchar(100) DEFAULT '3,5 – 7,2 mg/dL',
  `cacido_urico_f_1_a_9_anos` varchar(100) DEFAULT '1,8 – 5,5 mg/dL',
  `cacido_urico_f_10_a_18_anos` varchar(100) DEFAULT '2,2 – 6,6 mg/dL',
  `cacido_urico_f_mais_de_18_anos` varchar(100) DEFAULT '2,6 – 6,0 mg/dL',
  `cpcr_proteina_c_reativa` varchar(100) DEFAULT '< 1,0 mg/dL',
  `ccalcio` varchar(100) DEFAULT '8,6 - 10,3 mg/dL',
  `cldh` varchar(100) DEFAULT '< 480 mg/dL',
  `cmagnesio_m` varchar(100) DEFAULT '1,8 - 2,6 mg/dL',
  `cmagnesio_f` varchar(100) DEFAULT '1,9 - 2,5 mg/dL',
  `cmagnesio_crianca` varchar(100) DEFAULT '1,5 - 2,3 mg/dL',
  `cfosforo_adulto` varchar(100) DEFAULT '2,6 - 4,5 mg/dL',
  `cfosforo_1_a_3_anos` varchar(100) DEFAULT '3,1 - 6,0 mg/dL',
  `cfosforo_4_a_12_anos` varchar(100) DEFAULT '3,3 - 5,7 mg/dL',
  `cfosforo_13_a_15_anos` varchar(100) DEFAULT '2,9 - 5,1 mg/dL',
  `cfosforo_16_a_18_anos` varchar(100) DEFAULT '2,7 - 4,9 mg/dL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referencia_hematologia`
--

CREATE TABLE `referencia_hematologia` (
  `id` int(11) NOT NULL,
  `chemacia_m` varchar(100) DEFAULT '4,3 - 5,7 milhões/µL',
  `chemacia_f` varchar(100) DEFAULT '3,9 - 5,0 milhões/µL',
  `chemoglobina_m` varchar(100) DEFAULT '13,5 - 17,5 g/dL',
  `chemoglobina_f` varchar(100) DEFAULT '12,0 - 15,5 g/dL',
  `chematocrito_m` varchar(100) DEFAULT '30,0 - 50,0 %',
  `chematocrito_f` varchar(100) DEFAULT '35,0 - 45,0 %',
  `cvcm_m` varchar(100) DEFAULT '80 - 100 fL',
  `cvcm_f` varchar(100) DEFAULT '80 - 100 fL',
  `chcm_m` varchar(100) DEFAULT '26 - 34 pg',
  `chcm_f` varchar(100) DEFAULT '26 - 34 pg',
  `cchcw_m` varchar(100) DEFAULT '31 - 36 g/dL',
  `cchcw_f` varchar(100) DEFAULT '31 - 36 g/dL',
  `crdw_m` varchar(100) DEFAULT '11,5 - 16,5 %',
  `crdw_f` varchar(100) DEFAULT '11,5 - 16,5 %',
  `cleucocitos_relativo` varchar(100) DEFAULT '100 %',
  `cleucocitos_absoluto` varchar(100) DEFAULT '4.000 - 11.000 /µL',
  `cneutrofilos_relativo` varchar(100) DEFAULT '40 - 70 %',
  `cneutrofilos_absoluto` varchar(100) DEFAULT '2.000 - 7 500 /µL',
  `cblastos_relativo` varchar(100) DEFAULT '0 %',
  `cblastos_absoluto` varchar(100) DEFAULT '0 /µL',
  `cpromielocitos_relativo` varchar(100) DEFAULT '0 %',
  `cpromielocitos_absoluto` varchar(100) DEFAULT '0 /µL',
  `cmielocitos_relativo` varchar(100) DEFAULT '0 %',
  `cmielocitos_absoluto` varchar(100) DEFAULT '0 /µL',
  `cmetamielocitos_relativo` varchar(100) DEFAULT '0 %',
  `cmetamielocitos_absoluto` varchar(100) DEFAULT '0 /µL',
  `cbastonetes_relativo` varchar(100) DEFAULT '0 - 5 %',
  `cbastonetes_absoluto` varchar(100) DEFAULT '0 - 500 /µL',
  `csegmentados_relativo` varchar(100) DEFAULT '%',
  `csegmentados_absoluto` varchar(100) DEFAULT '1.700 - 8.000 /µL',
  `ceosinofilos_relativo` varchar(100) DEFAULT '1 - 7 %',
  `ceosinofilos_absoluto` varchar(100) DEFAULT '40 - 400 /µL',
  `cbasofilos_relativo` varchar(100) DEFAULT '0 - 2 %',
  `cbasofilos_absoluto` varchar(100) DEFAULT '0 - 200 /µL',
  `clinfocitos_relativo` varchar(100) DEFAULT '20 - 40 %',
  `clinfocitos_absoluto` varchar(100) DEFAULT '1.000 - 2.900 /µL',
  `clinfocitos_atipicos_relativo` varchar(100) DEFAULT '0 %',
  `clinfocitos_atipicos_absoluto` varchar(100) DEFAULT '0 /µL',
  `cmonocitos_relativo` varchar(100) DEFAULT '2 - 8 %',
  `cmonocitos_absoluto` varchar(100) DEFAULT '200 - 800 /µL',
  `cmieloblastos_relativo` varchar(100) DEFAULT '0 %',
  `cmieloblastos_absoluto` varchar(100) DEFAULT '0 /µL',
  `coutras_celulas_relativo` varchar(100) DEFAULT '0 %',
  `coutras_celulas_absoluto` varchar(100) DEFAULT '0 /µL',
  `ccelulas_linfoides_relativo` varchar(100) DEFAULT '0 %',
  `ccelulas_linfoides_absoluto` varchar(100) DEFAULT '0 /µL',
  `ccelulas_monocitoides_relativo` varchar(100) DEFAULT '0 %',
  `ccelulas_monocitoides_absoluto` varchar(100) DEFAULT '0 /µL',
  `cplaquetas` varchar(100) DEFAULT '150 - 400 mil/µL',
  `cvolume_plaquetario_medio` varchar(100) DEFAULT '6,5 - 15,0 fL'
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anamnese_enfermagem`
--
ALTER TABLE `anamnese_enfermagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

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
-- AUTO_INCREMENT for table `anamnese_enfermagem`
--
ALTER TABLE `anamnese_enfermagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `exame_bioquimica`
--
ALTER TABLE `exame_bioquimica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `exame_hematologia`
--
ALTER TABLE `exame_hematologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `referencia_bioquimica`
--
ALTER TABLE `referencia_bioquimica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referencia_hematologia`
--
ALTER TABLE `referencia_hematologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anamnese_enfermagem`
--
ALTER TABLE `anamnese_enfermagem`
  ADD CONSTRAINT `anamnese_enfermagem_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
