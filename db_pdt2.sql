-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Ago-2018 às 22:17
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pdt2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ativ_complementares`
--

CREATE TABLE `ativ_complementares` (
  `atv_cod` int(11) NOT NULL,
  `atv_desc` varchar(100) DEFAULT NULL,
  `ta_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bloco`
--

CREATE TABLE `bloco` (
  `blo_cod` int(11) NOT NULL,
  `blo_desc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bloco`
--

INSERT INTO `bloco` (`blo_cod`, `blo_desc`) VALUES
(1, 'Bloco Administrativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cur_cod` int(11) NOT NULL,
  `cur_nome` varchar(45) NOT NULL,
  `cur_hrtotal` int(11) NOT NULL,
  `cur_nivel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cur_cod`, `cur_nome`, `cur_hrtotal`, `cur_nivel`) VALUES
(1, 'TÃ©cnico em InformÃ¡tica para Internet', 450, 'Ensino MÃ©dio-Integrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_semana`
--

CREATE TABLE `dia_semana` (
  `ds_cod` int(11) NOT NULL,
  `ds_nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `dis_cod` int(11) NOT NULL,
  `dis_nome` varchar(45) NOT NULL,
  `dis_carga` int(11) NOT NULL,
  `dis_ementa` varchar(150) NOT NULL,
  `dis_referencias` varchar(150) NOT NULL,
  `ser_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`dis_cod`, `dis_nome`, `dis_carga`, `dis_ementa`, `dis_referencias`, `ser_cod`) VALUES
(1, 'LÃ³gica da ProgramaÃ§Ã£o 1', 150, 'TESTE 1', 'TESTE 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `hor_cod` int(11) NOT NULL,
  `hor_status` varchar(45) NOT NULL,
  `sal_cod` int(11) NOT NULL,
  `aula_cod` int(11) NOT NULL,
  `ofe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hora_ativ_comp`
--

CREATE TABLE `hora_ativ_comp` (
  `hac_cod` int(11) NOT NULL,
  `atv_cod` int(11) NOT NULL,
  `aula_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hora_aula`
--

CREATE TABLE `hora_aula` (
  `aula_cod` int(11) NOT NULL,
  `ds_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hora_projeto`
--

CREATE TABLE `hora_projeto` (
  `hp_cod` int(11) NOT NULL,
  `proj_cod` int(11) NOT NULL,
  `aula_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oferta`
--

CREATE TABLE `oferta` (
  `ofe_id` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `dis_cod` int(11) NOT NULL,
  `ser_cod` int(11) NOT NULL,
  `tur_cod` int(11) NOT NULL,
  `ofe_ano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pde`
--

CREATE TABLE `pde` (
  `pde_id` int(11) NOT NULL,
  `pde_carga` int(11) NOT NULL,
  `ofe_id` int(11) NOT NULL,
  `pde_conteudo` varchar(150) NOT NULL,
  `pde_objetivos` varchar(150) NOT NULL,
  `pde_ementa` varchar(150) NOT NULL,
  `pde_propostadeaulas` varchar(150) NOT NULL,
  `pde_procedimentos` varchar(150) NOT NULL,
  `pde_avaliacoes` varchar(150) DEFAULT NULL,
  `pde_referencias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pdt`
--

CREATE TABLE `pdt` (
  `pdt_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ppc`
--

CREATE TABLE `ppc` (
  `ppc_cod` int(11) NOT NULL,
  `ppc_info` varchar(45) NOT NULL,
  `cur_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ppc`
--

INSERT INTO `ppc` (`ppc_cod`, `ppc_info`, `cur_cod`) VALUES
(1, 'PPC-teste-1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `pro_cod` int(11) NOT NULL,
  `pro_nome` varchar(45) NOT NULL,
  `pro_siape` int(11) NOT NULL,
  `pro_formacao` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`pro_cod`, `pro_nome`, `pro_siape`, `pro_formacao`) VALUES
(1, 'Rafael Poltronieri', 45613, 'GraduaÃ§Ã£o em Bacharelado em CiÃªncia da ComputaÃ§Ã£o'),
(2, 'Rafael Poltronieri', 45613, 'GraduaÃ§Ã£o em Bacharelado em CiÃªncia da ComputaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_has_disciplina`
--

CREATE TABLE `professor_has_disciplina` (
  `pro_cod` int(11) NOT NULL,
  `dis_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `proj_cod` int(11) NOT NULL,
  `tp_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `proj_status` varchar(45) NOT NULL,
  `proj_numero` int(11) DEFAULT NULL,
  `proj_data_ini` date DEFAULT NULL,
  `proj_data_fim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `sal_cod` int(11) NOT NULL,
  `sal_desc` varchar(45) NOT NULL,
  `dis_cod` int(11) DEFAULT NULL,
  `blo_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`sal_cod`, `sal_desc`, `dis_cod`, `blo_cod`) VALUES
(1, 'Sala-Teste1', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE `serie` (
  `ser_cod` int(11) NOT NULL,
  `ser_ano` int(11) NOT NULL,
  `ppc_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `serie`
--

INSERT INTO `serie` (`ser_cod`, `ser_ano`, `ppc_cod`) VALUES
(1, 2015, 1),
(2, 2015, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie_has_turma`
--

CREATE TABLE `serie_has_turma` (
  `ser_cod` int(11) NOT NULL,
  `tur_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ativ`
--

CREATE TABLE `tipo_ativ` (
  `ta_cod` int(11) NOT NULL,
  `ta_nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_projeto`
--

CREATE TABLE `tipo_projeto` (
  `tp_cod` int(11) NOT NULL,
  `tp_nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `tur_cod` int(11) NOT NULL,
  `tur_nome` varchar(45) NOT NULL,
  `tur_ano` int(45) NOT NULL,
  `ppc_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ativ_complementares`
--
ALTER TABLE `ativ_complementares`
  ADD PRIMARY KEY (`atv_cod`),
  ADD KEY `fk_ativ_complementares_tipo_ativ1_idx` (`ta_cod`),
  ADD KEY `fk_ativ_complementares_professor1_idx` (`pro_cod`);

--
-- Indexes for table `bloco`
--
ALTER TABLE `bloco`
  ADD PRIMARY KEY (`blo_cod`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cur_cod`);

--
-- Indexes for table `dia_semana`
--
ALTER TABLE `dia_semana`
  ADD PRIMARY KEY (`ds_cod`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`dis_cod`),
  ADD KEY `fk_disciplina_serie1_idx` (`ser_cod`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`hor_cod`),
  ADD KEY `fk_aula_sala1_idx` (`sal_cod`),
  ADD KEY `fk_horário_aula1_idx` (`aula_cod`),
  ADD KEY `fk_horario_Oferta1_idx` (`ofe_id`);

--
-- Indexes for table `hora_ativ_comp`
--
ALTER TABLE `hora_ativ_comp`
  ADD PRIMARY KEY (`hac_cod`),
  ADD KEY `fk_hora_ativ_ativ_complementares1_idx` (`atv_cod`),
  ADD KEY `fk_hora_ativ_hora_aula1_idx` (`aula_cod`);

--
-- Indexes for table `hora_aula`
--
ALTER TABLE `hora_aula`
  ADD PRIMARY KEY (`aula_cod`),
  ADD KEY `fk_aula_dia_semana1_idx` (`ds_cod`);

--
-- Indexes for table `hora_projeto`
--
ALTER TABLE `hora_projeto`
  ADD PRIMARY KEY (`hp_cod`),
  ADD KEY `fk_hora_projeto_projeto1_idx` (`proj_cod`),
  ADD KEY `fk_hora_projeto_hora_aula1_idx` (`aula_cod`);

--
-- Indexes for table `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`ofe_id`),
  ADD KEY `fk_professor_has_disciplina_has_serie_has_turma_serie_has_t_idx` (`ser_cod`,`tur_cod`),
  ADD KEY `fk_professor_has_disciplina_has_serie_has_turma_professor_h_idx` (`pro_cod`,`dis_cod`);

--
-- Indexes for table `pde`
--
ALTER TABLE `pde`
  ADD PRIMARY KEY (`pde_id`),
  ADD KEY `fk_Plano_ensino_Oferta1_idx` (`ofe_id`);

--
-- Indexes for table `pdt`
--
ALTER TABLE `pdt`
  ADD PRIMARY KEY (`pdt_cod`);

--
-- Indexes for table `ppc`
--
ALTER TABLE `ppc`
  ADD PRIMARY KEY (`ppc_cod`),
  ADD KEY `fk_ppc_curso1_idx` (`cur_cod`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`pro_cod`);

--
-- Indexes for table `professor_has_disciplina`
--
ALTER TABLE `professor_has_disciplina`
  ADD PRIMARY KEY (`pro_cod`,`dis_cod`),
  ADD KEY `fk_professor_has_disciplina_disciplina1_idx` (`dis_cod`),
  ADD KEY `fk_professor_has_disciplina_professor1_idx` (`pro_cod`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`proj_cod`),
  ADD KEY `fk_projeto_tipo_projeto1_idx` (`tp_cod`),
  ADD KEY `fk_projeto_professor1_idx` (`pro_cod`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`sal_cod`),
  ADD KEY `fk_sala_disciplina1_idx` (`dis_cod`),
  ADD KEY `fk_sala_bloco1_idx` (`blo_cod`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`ser_cod`),
  ADD KEY `fk_serie_ppc1_idx` (`ppc_cod`);

--
-- Indexes for table `serie_has_turma`
--
ALTER TABLE `serie_has_turma`
  ADD PRIMARY KEY (`ser_cod`,`tur_cod`),
  ADD KEY `fk_serie_has_turma_turma1_idx` (`tur_cod`),
  ADD KEY `fk_serie_has_turma_serie1_idx` (`ser_cod`);

--
-- Indexes for table `tipo_ativ`
--
ALTER TABLE `tipo_ativ`
  ADD PRIMARY KEY (`ta_cod`);

--
-- Indexes for table `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  ADD PRIMARY KEY (`tp_cod`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`tur_cod`),
  ADD KEY `fk_turma_ppc1_idx` (`ppc_cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ativ_complementares`
--
ALTER TABLE `ativ_complementares`
  MODIFY `atv_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bloco`
--
ALTER TABLE `bloco`
  MODIFY `blo_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cur_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dia_semana`
--
ALTER TABLE `dia_semana`
  MODIFY `ds_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `dis_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `hor_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hora_ativ_comp`
--
ALTER TABLE `hora_ativ_comp`
  MODIFY `hac_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hora_aula`
--
ALTER TABLE `hora_aula`
  MODIFY `aula_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hora_projeto`
--
ALTER TABLE `hora_projeto`
  MODIFY `hp_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oferta`
--
ALTER TABLE `oferta`
  MODIFY `ofe_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pde`
--
ALTER TABLE `pde`
  MODIFY `pde_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ppc`
--
ALTER TABLE `ppc`
  MODIFY `ppc_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `pro_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `proj_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `sal_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `ser_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_ativ`
--
ALTER TABLE `tipo_ativ`
  MODIFY `ta_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  MODIFY `tp_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `tur_cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ativ_complementares`
--
ALTER TABLE `ativ_complementares`
  ADD CONSTRAINT `fk_ativ_complementares_professor1` FOREIGN KEY (`pro_cod`) REFERENCES `professor` (`pro_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ativ_complementares_tipo_ativ1` FOREIGN KEY (`ta_cod`) REFERENCES `tipo_ativ` (`ta_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_disciplina_serie1` FOREIGN KEY (`ser_cod`) REFERENCES `serie` (`ser_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_aula_sala1` FOREIGN KEY (`sal_cod`) REFERENCES `sala` (`sal_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_Oferta1` FOREIGN KEY (`ofe_id`) REFERENCES `oferta` (`ofe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horário_aula1` FOREIGN KEY (`aula_cod`) REFERENCES `hora_aula` (`aula_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `hora_ativ_comp`
--
ALTER TABLE `hora_ativ_comp`
  ADD CONSTRAINT `fk_hora_ativ_ativ_complementares1` FOREIGN KEY (`atv_cod`) REFERENCES `ativ_complementares` (`atv_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hora_ativ_hora_aula1` FOREIGN KEY (`aula_cod`) REFERENCES `hora_aula` (`aula_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `hora_aula`
--
ALTER TABLE `hora_aula`
  ADD CONSTRAINT `fk_aula_dia_semana1` FOREIGN KEY (`ds_cod`) REFERENCES `dia_semana` (`ds_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `hora_projeto`
--
ALTER TABLE `hora_projeto`
  ADD CONSTRAINT `fk_hora_projeto_hora_aula1` FOREIGN KEY (`aula_cod`) REFERENCES `hora_aula` (`aula_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hora_projeto_projeto1` FOREIGN KEY (`proj_cod`) REFERENCES `projeto` (`proj_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_professor_has_disciplina_has_serie_has_turma_professor_has1` FOREIGN KEY (`pro_cod`,`dis_cod`) REFERENCES `professor_has_disciplina` (`pro_cod`, `dis_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_has_disciplina_has_serie_has_turma_serie_has_tur1` FOREIGN KEY (`ser_cod`,`tur_cod`) REFERENCES `serie_has_turma` (`ser_cod`, `tur_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pde`
--
ALTER TABLE `pde`
  ADD CONSTRAINT `fk_Plano_ensino_Oferta1` FOREIGN KEY (`ofe_id`) REFERENCES `oferta` (`ofe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ppc`
--
ALTER TABLE `ppc`
  ADD CONSTRAINT `fk_ppc_curso1` FOREIGN KEY (`cur_cod`) REFERENCES `curso` (`cur_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor_has_disciplina`
--
ALTER TABLE `professor_has_disciplina`
  ADD CONSTRAINT `fk_professor_has_disciplina_disciplina1` FOREIGN KEY (`dis_cod`) REFERENCES `disciplina` (`dis_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_has_disciplina_professor1` FOREIGN KEY (`pro_cod`) REFERENCES `professor` (`pro_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_projeto_professor1` FOREIGN KEY (`pro_cod`) REFERENCES `professor` (`pro_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projeto_tipo_projeto1` FOREIGN KEY (`tp_cod`) REFERENCES `tipo_projeto` (`tp_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `fk_sala_bloco1` FOREIGN KEY (`blo_cod`) REFERENCES `bloco` (`blo_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sala_disciplina1` FOREIGN KEY (`dis_cod`) REFERENCES `disciplina` (`dis_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `fk_serie_ppc1` FOREIGN KEY (`ppc_cod`) REFERENCES `ppc` (`ppc_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `serie_has_turma`
--
ALTER TABLE `serie_has_turma`
  ADD CONSTRAINT `fk_serie_has_turma_serie1` FOREIGN KEY (`ser_cod`) REFERENCES `serie` (`ser_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serie_has_turma_turma1` FOREIGN KEY (`tur_cod`) REFERENCES `turma` (`tur_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_ppc1` FOREIGN KEY (`ppc_cod`) REFERENCES `ppc` (`ppc_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
