SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_pdt
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_pdt
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_pdt` DEFAULT CHARACTER SET utf8 ;
USE `db_pdt` ;

-- -----------------------------------------------------
-- Table `db_pdt`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`tipo_usuario` (
  `tu_cod` INT NOT NULL AUTO_INCREMENT,
  `tu_desc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tu_cod`))
ENGINE = InnoDB;


INSERT INTO `tipo_usuario` (`tu_cod`, `tu_desc`) VALUES
(1, 'Administrador'),
(2, 'Professor'),
(3, 'Coordenador');


-- -----------------------------------------------------
-- Table `db_pdt`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`professor` (
  `pro_cod` INT NOT NULL AUTO_INCREMENT,
  `pro_nome` VARCHAR(45) NOT NULL,
  `pro_siape` INT NOT NULL,
  `pro_formacao` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`pro_cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`usuario` (
  `usu_cod` INT NOT NULL AUTO_INCREMENT,
  `usu_nome` VARCHAR(45) NOT NULL,
  `usu_email` VARCHAR(45) NOT NULL,
  `usu_senha` VARCHAR(45) NOT NULL,
  `tu_cod` INT NOT NULL,
  `pro_cod` INT NULL,
  PRIMARY KEY (`usu_cod`),
  INDEX `fk_usuario_tipo_usuario1_idx` (`tu_cod` ASC),
  CONSTRAINT `fk_usuario_tipo_usuario1`
    FOREIGN KEY (`tu_cod`)
    REFERENCES `db_pdt`.`tipo_usuario` (`tu_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_professor1`
    FOREIGN KEY (`pro_cod`)
    REFERENCES `db_pdt`.`professor` (`pro_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


INSERT INTO `usuario` (`usu_cod`, `usu_nome`, `usu_email`, `usu_senha`, `tu_cod`) VALUES
(1, 'Administrador', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1);


-- -----------------------------------------------------
-- Table `db_pdt`.`tipo_ativ`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`tipo_ativ` (
  `ta_cod` INT NOT NULL AUTO_INCREMENT,
  `ta_nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ta_cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`ativ_complementares`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`ativ_complementares` (
  `atv_cod` INT NOT NULL AUTO_INCREMENT,
  `atv_desc` VARCHAR(100) NULL DEFAULT NULL,
  `ta_cod` INT NOT NULL,
  `pro_cod` INT NOT NULL,
  PRIMARY KEY (`atv_cod`),
  INDEX `fk_ativ_complementares_tipo_ativ1_idx` (`ta_cod` ASC),
  INDEX `fk_ativ_complementares_professor1_idx` (`pro_cod` ASC),
  CONSTRAINT `fk_ativ_complementares_tipo_ativ1`
    FOREIGN KEY (`ta_cod`)
    REFERENCES `db_pdt`.`tipo_ativ` (`ta_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ativ_complementares_professor1`
    FOREIGN KEY (`pro_cod`)
    REFERENCES `db_pdt`.`professor` (`pro_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`tipo_projeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`tipo_projeto` (
  `tp_cod` INT NOT NULL AUTO_INCREMENT,
  `tp_nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tp_cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`projeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`projeto` (
  `proj_cod` INT NOT NULL AUTO_INCREMENT,
  `tp_cod` INT NOT NULL,
  `pro_cod` INT NOT NULL,
  `proj_status` VARCHAR(45) NOT NULL,
  `proj_numero` INT NULL DEFAULT NULL,
  `proj_data_ini` DATE NULL DEFAULT NULL,
  `proj_data_fim` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`proj_cod`),
  INDEX `fk_projeto_tipo_projeto1_idx` (`tp_cod` ASC),
  INDEX `fk_projeto_professor1_idx` (`pro_cod` ASC),
  CONSTRAINT `fk_projeto_tipo_projeto1`
    FOREIGN KEY (`tp_cod`)
    REFERENCES `db_pdt`.`tipo_projeto` (`tp_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projeto_professor1`
    FOREIGN KEY (`pro_cod`)
    REFERENCES `db_pdt`.`professor` (`pro_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`nivel` (
  `niv_cod` INT NOT NULL AUTO_INCREMENT,
  `niv_desc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`niv_cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`curso` (
  `cur_cod` INT NOT NULL AUTO_INCREMENT,
  `cur_nome` VARCHAR(45) NOT NULL,
  `cur_hrtotal` INT NOT NULL,
  `niv_cod` INT NOT NULL,
  PRIMARY KEY (`cur_cod`),
  INDEX `fk_curso_nivel1_idx` (`niv_cod` ASC),
  CONSTRAINT `fk_curso_nivel1`
    FOREIGN KEY (`niv_cod`)
    REFERENCES `db_pdt`.`nivel` (`niv_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`ppc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`matriz` (
  `mat_cod` INT NOT NULL AUTO_INCREMENT,
  `mat_info` VARCHAR(45) NOT NULL,
  `cur_cod` INT NOT NULL,
  PRIMARY KEY (`mat_cod`),
  INDEX `fk_ppc_curso1_idx` (`cur_cod` ASC),
  CONSTRAINT `fk_ppc_curso1`
    FOREIGN KEY (`cur_cod`)
    REFERENCES `db_pdt`.`curso` (`cur_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`serie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`serie` (
  `ser_cod` INT NOT NULL AUTO_INCREMENT,
  `ser_modulo` VARCHAR(45) NOT NULL,
  `ser_ano` INT NOT NULL,
  `mat_cod` INT NOT NULL,
  PRIMARY KEY (`ser_cod`),
  INDEX `fk_serie_ppc1_idx` (`mat_cod` ASC),
  CONSTRAINT `fk_serie_ppc1`
    FOREIGN KEY (`mat_cod`)
    REFERENCES `db_pdt`.`matriz` (`mat_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`disciplina` (
  `dis_cod` INT NOT NULL AUTO_INCREMENT,
  `dis_nome` VARCHAR(45) NOT NULL,
  `dis_carga` INT NOT NULL,
  `dis_ementa` VARCHAR(150) NOT NULL,
  `dis_referencias` VARCHAR(150) NOT NULL,
  `ser_cod` INT NOT NULL,
  PRIMARY KEY (`dis_cod`),
  INDEX `fk_disciplina_serie1_idx` (`ser_cod` ASC),
  CONSTRAINT `fk_disciplina_serie1`
    FOREIGN KEY (`ser_cod`)
    REFERENCES `db_pdt`.`serie` (`ser_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`bloco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`bloco` (
  `blo_cod` INT NOT NULL AUTO_INCREMENT,
  `blo_desc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`blo_cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`sala` (
  `sal_cod` INT NOT NULL AUTO_INCREMENT,
  `sal_desc` VARCHAR(45) NOT NULL,
  `dis_cod` INT NULL DEFAULT NULL,
  `blo_cod` INT NOT NULL,
  PRIMARY KEY (`sal_cod`),
  INDEX `fk_sala_disciplina1_idx` (`dis_cod` ASC),
  INDEX `fk_sala_bloco1_idx` (`blo_cod` ASC),
  CONSTRAINT `fk_sala_disciplina1`
    FOREIGN KEY (`dis_cod`)
    REFERENCES `db_pdt`.`disciplina` (`dis_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sala_bloco1`
    FOREIGN KEY (`blo_cod`)
    REFERENCES `db_pdt`.`bloco` (`blo_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`turma` (
  `tur_cod` INT NOT NULL AUTO_INCREMENT,
  `tur_nome` VARCHAR(45) NOT NULL,
  `tur_ano` VARCHAR(45) NOT NULL,
  `mat_cod` INT NOT NULL,
  PRIMARY KEY (`tur_cod`),
  INDEX `fk_turma_ppc1_idx` (`mat_cod` ASC),
  CONSTRAINT `fk_turma_ppc1`
    FOREIGN KEY (`mat_cod`)
    REFERENCES `db_pdt`.`matriz` (`mat_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`dia_semana`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`dia_semana` (
  `ds_cod` INT NOT NULL AUTO_INCREMENT,
  `ds_nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ds_cod`))
ENGINE = InnoDB;

INSERT INTO `dia_semana` (`ds_cod`, `ds_nome`) VALUES
(1, 'Domingo'),
(2, 'Segunda-Feira'),
(3, 'Terça-Feira'),
(4, 'Quarta-Feira'),
(5, 'Quinta-Feira'),
(6, 'Sexta-Feira'),
(7, 'Sábado');


-- -----------------------------------------------------
-- Table `db_pdt`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`turno` (
  `turno_cod` INT NOT NULL AUTO_INCREMENT,
  `turno_desc` VARCHAR(45) NOT NULL,
  `turno_status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`turno_cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`config_hora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`config_hora` (
  `con_cod` INT NOT NULL AUTO_INCREMENT,
  `con_desc` VARCHAR(45) NOT NULL,
  `con_horaini` TIME NOT NULL,
  `con_horafin` TIME NOT NULL,
  `turno_cod` INT NOT NULL,
  PRIMARY KEY (`con_cod`),
  INDEX `fk_config_hora_turno1_idx` (`turno_cod` ASC),
  CONSTRAINT `fk_config_hora_turno1`
    FOREIGN KEY (`turno_cod`)
    REFERENCES `db_pdt`.`turno` (`turno_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`hora_aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`horario` (
  `hor_cod` INT NOT NULL AUTO_INCREMENT,
  `ds_cod` INT NOT NULL,
  `con_cod` INT NOT NULL,
  PRIMARY KEY (`hor_cod`),
  INDEX `fk_aula_dia_semana1_idx` (`ds_cod` ASC),
  INDEX `fk_horário_config_hora1_idx` (`con_cod` ASC),
  CONSTRAINT `fk_aula_dia_semana1`
    FOREIGN KEY (`ds_cod`)
    REFERENCES `db_pdt`.`dia_semana` (`ds_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horário_config_hora1`
    FOREIGN KEY (`con_cod`)
    REFERENCES `db_pdt`.`config_hora` (`con_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`serie_has_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`serie_has_turma` (
  `st_cod` INT NOT NULL AUTO_INCREMENT,
  `ser_cod` INT NOT NULL,
  `tur_cod` INT NOT NULL,
  PRIMARY KEY (`st_cod`),
  INDEX `fk_serie_has_turma_turma1_idx` (`tur_cod` ASC),
  INDEX `fk_serie_has_turma_serie1_idx` (`ser_cod` ASC),
  CONSTRAINT `fk_serie_has_turma_serie1`
    FOREIGN KEY (`ser_cod`)
    REFERENCES `db_pdt`.`serie` (`ser_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_serie_has_turma_turma1`
    FOREIGN KEY (`tur_cod`)
    REFERENCES `db_pdt`.`turma` (`tur_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`professor_has_disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`professor_has_disciplina` (
  `pd_cod` INT NOT NULL AUTO_INCREMENT,
  `dis_cod` INT NOT NULL,
  `pro_cod` INT NOT NULL,
  PRIMARY KEY (`pd_cod`),
  INDEX `fk_professor_has_disciplina_disciplina1_idx` (`dis_cod` ASC),
  INDEX `fk_professor_has_disciplina_professor1_idx` (`pro_cod` ASC),
  CONSTRAINT `fk_professor_has_disciplina_disciplina1`
    FOREIGN KEY (`dis_cod`)
    REFERENCES `db_pdt`.`disciplina` (`dis_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_has_disciplina_professor1`
    FOREIGN KEY (`pro_cod`)
    REFERENCES `db_pdt`.`professor` (`pro_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`oferta` (
  `ofe_cod` INT NOT NULL AUTO_INCREMENT,
  `pd_cod` INT NOT NULL,
  `st_cod` INT NOT NULL,
  `ofe_ano` INT NULL DEFAULT NULL,
  PRIMARY KEY (`ofe_cod`),
  INDEX `fk_oferta_professor_has_disciplina1_idx` (`pd_cod` ASC),
  INDEX `fk_oferta_serie_has_turma1_idx` (`st_cod` ASC),
  CONSTRAINT `fk_oferta_professor_has_disciplina1`
    FOREIGN KEY (`pd_cod`)
    REFERENCES `db_pdt`.`professor_has_disciplina` (`pd_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_oferta_serie_has_turma1`
    FOREIGN KEY (`st_cod`)
    REFERENCES `db_pdt`.`serie_has_turma` (`st_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`aula` (
  `aula_cod` INT NOT NULL AUTO_INCREMENT,
  `aula_status` VARCHAR(45) NOT NULL,
  `sal_cod` INT NOT NULL,
  `hor_cod` INT NOT NULL,
  `ofe_cod` INT NOT NULL,
  INDEX `fk_aula_sala1_idx` (`sal_cod` ASC),
  PRIMARY KEY (`aula_cod`),
  INDEX `fk_horário_aula1_idx` (`hor_cod` ASC),
  INDEX `fk_horario_Oferta1_idx` (`ofe_cod` ASC),
  CONSTRAINT `fk_aula_sala1`
    FOREIGN KEY (`sal_cod`)
    REFERENCES `db_pdt`.`sala` (`sal_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horário_aula1`
    FOREIGN KEY (`hor_cod`)
    REFERENCES `db_pdt`.`horario` (`hor_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_Oferta1`
    FOREIGN KEY (`ofe_cod`)
    REFERENCES `db_pdt`.`oferta` (`ofe_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`hora_projeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`hora_projeto` (
  `hp_cod` INT NOT NULL AUTO_INCREMENT,
  `proj_cod` INT NOT NULL,
  `hor_cod` INT NOT NULL,
  INDEX `fk_hora_projeto_projeto1_idx` (`proj_cod` ASC),
  PRIMARY KEY (`hp_cod`),
  INDEX `fk_hora_projeto_hora_aula1_idx` (`hor_cod` ASC),
  CONSTRAINT `fk_hora_projeto_projeto1`
    FOREIGN KEY (`proj_cod`)
    REFERENCES `db_pdt`.`projeto` (`proj_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_hora_projeto_hora_aula1`
    FOREIGN KEY (`hor_cod`)
    REFERENCES `db_pdt`.`horario` (`hor_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`hora_ativ_comp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`hora_ativ_comp` (
  `hac_cod` INT NOT NULL AUTO_INCREMENT,
  `atv_cod` INT NOT NULL,
  `hor_cod` INT NOT NULL,
  PRIMARY KEY (`hac_cod`),
  INDEX `fk_hora_ativ_ativ_complementares1_idx` (`atv_cod` ASC),
  INDEX `fk_hora_ativ_hora_aula1_idx` (`hor_cod` ASC),
  CONSTRAINT `fk_hora_ativ_ativ_complementares1`
    FOREIGN KEY (`atv_cod`)
    REFERENCES `db_pdt`.`ativ_complementares` (`atv_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_hora_ativ_hora_aula1`
    FOREIGN KEY (`hor_cod`)
    REFERENCES `db_pdt`.`horario` (`hor_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`pde`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`pde` (
  `pde_cod` INT NOT NULL AUTO_INCREMENT,
  `pde_carga` INT NOT NULL,
  `ofe_cod` INT NOT NULL,
  `pde_conteudo` VARCHAR(150) NOT NULL,
  `pde_objetivos` VARCHAR(150) NOT NULL,
  `pde_ementa` VARCHAR(150) NOT NULL,
  `pde_propostadeaulas` VARCHAR(150) NOT NULL,
  `pde_procedimentos` VARCHAR(150) NOT NULL,
  `pde_avaliacoes` VARCHAR(150) NULL DEFAULT NULL,
  `pde_referencias` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`pde_cod`),
  INDEX `fk_Plano_ensino_Oferta1_idx` (`ofe_cod` ASC),
  CONSTRAINT `fk_Plano_ensino_Oferta1`
    FOREIGN KEY (`ofe_cod`)
    REFERENCES `db_pdt`.`oferta` (`ofe_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_pdt`.`serie_turma_has_turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pdt`.`serie_turma_has_turno` (
  `stt_cod` INT NOT NULL AUTO_INCREMENT,
  `stt_status` VARCHAR(45) NOT NULL,
  `turno_cod` INT NOT NULL,
  `st_cod` INT NOT NULL,
  PRIMARY KEY (`stt_cod`),
  INDEX `fk_serie_has_turma_has_turno_turno1_idx` (`turno_cod` ASC),
  INDEX `fk_serie_turma_has_turno_serie_has_turma1_idx` (`st_cod` ASC),
  CONSTRAINT `fk_serie_has_turma_has_turno_turno1`
    FOREIGN KEY (`turno_cod`)
    REFERENCES `db_pdt`.`turno` (`turno_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_serie_turma_has_turno_serie_has_turma1`
    FOREIGN KEY (`st_cod`)
    REFERENCES `db_pdt`.`serie_has_turma` (`st_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
