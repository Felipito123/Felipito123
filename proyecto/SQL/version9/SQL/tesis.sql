-- MySQL Workbench Synchronization
-- Generated: 2021-01-27 01:21
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Felipe Galdames

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `id17192662_saludlosalamos` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`rol` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_rol`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`region` (
  `id_region` INT NOT NULL AUTO_INCREMENT,
  `nombre_region` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_region`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`comuna` (
  `id_comuna` INT NOT NULL AUTO_INCREMENT,
  `id_region` INT NOT NULL,
  `nombre_comuna` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_comuna`),
  INDEX `fk_comuna_region1_idx` (`id_region` ASC),
  CONSTRAINT `fk_comuna_region1`
    FOREIGN KEY (`id_region`)
    REFERENCES `id17192662_saludlosalamos`.`region` (`id_region`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`sector` (
  `id_sector` INT NOT NULL AUTO_INCREMENT,
  `nombre_sector` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_sector`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`unidad` (
  `id_unidad` INT NOT NULL AUTO_INCREMENT,
  `nombre_unidad` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_unidad`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`cargo` (
  `id_cargo` INT NOT NULL AUTO_INCREMENT,
  `nombre_cargo` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_cargo`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`etapas_spe` (
  `id_etapas_spe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_etapas_spe` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_etapas_spe`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`decision_spe` (
  `id_decision_spe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_decision_spe` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_decision_spe`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`motivo_pe` (
  `id_mpe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_mpe` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_mpe`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`tipo_remuneracion` (
  `id_tiporem` INT NOT NULL AUTO_INCREMENT,
  `descripcion_tiporem` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_tiporem`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`tipo_dia` (
  `id_tipo_dia` INT NOT NULL AUTO_INCREMENT,
  `descripcion_tipo_dia` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_tipo_dia`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`decision_spa` (
  `id_decision_spa` INT NOT NULL AUTO_INCREMENT,
  `descripcion_decision_spa` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_decision_spa`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`etapas_spa` (
  `id_etapas_spa` INT NOT NULL AUTO_INCREMENT,
  `descripcion_etapas_spa` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_etapas_spa`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`institucion` (
  `id_institucion` INT NOT NULL AUTO_INCREMENT,
  `nombre_institucion` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_institucion`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`area` (
  `id_area` INT NOT NULL AUTO_INCREMENT,
  `nombre_area` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_area`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`nacionalidad` (
  `id_nacionalidad` INT NOT NULL AUTO_INCREMENT,
  `nombre_nacionalidad` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_nacionalidad`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`pueblos_indigenas` (
  `id_pueblos_indigenas` INT NOT NULL AUTO_INCREMENT,
  `nombre_pueblos_indigenas` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_pueblos_indigenas`))
  DEFAULT CHARACTER SET = utf8;

  CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`estado_resp_agenda` (
  `id_estado_resp_agenda` INT NOT NULL AUTO_INCREMENT,
  `nombre_estado_agenda` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_resp_agenda`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`etapas_sfl` (
  `id_etapas_sfl` INT NOT NULL AUTO_INCREMENT,
  `descripcion_etapas_sfl` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_etapas_sfl`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`decision_sfl` (
  `id_decision_sfl` INT NOT NULL AUTO_INCREMENT,
  `descripcion_decision_sfl` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_decision_sfl`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`categoria_mb` (
  `id_cat_mb` INT NOT NULL AUTO_INCREMENT,
  `nombre_cat_mb` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cat_mb`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`seguimiento_sl_mat_bg` (
  `id_seg_sl_mat_bg` INT NOT NULL AUTO_INCREMENT,
  `estado_seg_mat_bg` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_seg_sl_mat_bg`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`estado_mat_bodega` (
  `id_est_mat_bg` INT NOT NULL AUTO_INCREMENT,
  `nombre_est_mat_bg` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_est_mat_bg`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`usuario` (
  `rut` VARCHAR(11) NOT NULL,
  `id_rol` INT NOT NULL,
  `id_comuna` INT NOT NULL,
  `id_cargo` INT NOT NULL,
  `id_sector` INT NULL,
  `id_unidad` INT NULL,
  `nombre_usuario` VARCHAR(70) NOT NULL,
  `telefono_usuario` VARCHAR(9) NOT NULL,
  `direccion_usuario` VARCHAR(100) NOT NULL,
  `correo_usuario` VARCHAR(70) NOT NULL,
  `contrasena_usuario` VARCHAR(255) NOT NULL,
  `fechaentrada_usuario` DATE NOT NULL,
  `enlinea_usuario` ENUM('0', '1') NOT NULL DEFAULT '0',
  `imagen_usuario` VARCHAR(250) NOT NULL,
  `estado_usuario` INT NOT NULL DEFAULT 1,
  `firma_usuario` VARCHAR(200) NULL,
  `reestablecimiento` DATETIME NULL,
  PRIMARY KEY (`rut`),
  INDEX `fk_usuario_rol_idx` (`id_rol` ASC),
  INDEX `fk_usuario_comuna1_idx` (`id_comuna` ASC),
  INDEX `fk_usuario_sector1_idx` (`id_sector` ASC),
  INDEX `fk_usuario_cargo1_idx` (`id_cargo` ASC),
  INDEX `fk_usuario_unidad1_idx` (`id_unidad` ASC),
  CONSTRAINT `fk_usuario_rol0`
    FOREIGN KEY (`id_rol`)
    REFERENCES `id17192662_saludlosalamos`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_comuna1`
    FOREIGN KEY (`id_comuna`)
    REFERENCES `id17192662_saludlosalamos`.`comuna` (`id_comuna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_sector1`
    FOREIGN KEY (`id_sector`)
    REFERENCES `id17192662_saludlosalamos`.`sector` (`id_sector`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_cargo1`
    FOREIGN KEY (`id_cargo`)
    REFERENCES `id17192662_saludlosalamos`.`cargo` (`id_cargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_unidad1`
    FOREIGN KEY (`id_unidad`)
    REFERENCES `id17192662_saludlosalamos`.`unidad` (`id_unidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`historial_cargo` (
  `id_historial_cargo` INT NOT NULL AUTO_INCREMENT,
  `id_rol` INT NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  `fecha_cargo` DATE NOT NULL,
  PRIMARY KEY (`id_historial_cargo`),
  INDEX `fk_rol_has_usuario_usuario1_idx` (`rut` ASC),
  INDEX `fk_rol_has_usuario_rol1_idx` (`id_rol` ASC),
  CONSTRAINT `fk_rol_has_usuario_rol1`
    FOREIGN KEY (`id_rol`)
    REFERENCES `id17192662_saludlosalamos`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol_has_usuario_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)    
  DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`permiso_especial` (
  `id_pe` INT NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `id_comuna` INT NOT NULL,
  `id_mpe` INT NOT NULL,
  `fecha_actual_pe` DATE NOT NULL,
  `horainicio_pe` TIME NOT NULL,
  `horatermino_pe` TIME NOT NULL,
  `fecha_permiso_pe` DATE NOT NULL,
  PRIMARY KEY (`id_pe`),
  INDEX `fk_solicitud_permiso_especial_comuna1_idx` (`id_comuna` ASC),
  INDEX `fk_solicitud_permiso_especial_motivo1_idx` (`id_mpe` ASC),
  INDEX `fk_permiso_especial_usuario1_idx` (`rut` ASC),
  CONSTRAINT `fk_solicitud_permiso_especial_comuna1`
    FOREIGN KEY (`id_comuna`)
    REFERENCES `id17192662_saludlosalamos`.`comuna` (`id_comuna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_especial_motivo1`
    FOREIGN KEY (`id_mpe`)
    REFERENCES `id17192662_saludlosalamos`.`motivo_pe` (`id_mpe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_especial_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`solicitud_permiso_especial` (
  `id_spe` INT NOT NULL AUTO_INCREMENT,
  `id_pe` INT NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  `id_decision_spe` INT NOT NULL,
  `id_etapas_spe` INT NOT NULL,
  `fecha_spe` DATE NOT NULL,
  `observacion_spe` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_spe`),
  INDEX `fk_usuario_has_permiso_especial_permiso_especial1_idx` (`id_pe` ASC) ,
  INDEX `fk_usuario_has_permiso_especial_usuario1_idx` (`rut` ASC) ,
  INDEX `fk_solicitud_permiso_especial_decision1_idx` (`id_decision_spe` ASC) ,
  INDEX `fk_solicitud_permiso_especial_etapas_spe1_idx` (`id_etapas_spe` ASC) ,
  CONSTRAINT `fk_usuario_has_permiso_especial_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_permiso_especial_permiso_especial1`
    FOREIGN KEY (`id_pe`)
    REFERENCES `id17192662_saludlosalamos`.`permiso_especial` (`id_pe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_especial_decision1`
    FOREIGN KEY (`id_decision_spe`)
    REFERENCES `id17192662_saludlosalamos`.`decision_spe` (`id_decision_spe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_especial_etapas_spe1`
    FOREIGN KEY (`id_etapas_spe`)
    REFERENCES `id17192662_saludlosalamos`.`etapas_spe` (`id_etapas_spe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`permiso_administrativo` (
  `id_pa` INT NOT NULL AUTO_INCREMENT,
  `rut_solicitante` VARCHAR(11) NOT NULL,
  `rut_reemplazo` VARCHAR(11) NOT NULL,
  `id_tiporem` INT NOT NULL,
  `id_tipo_dia` INT NOT NULL,
  `motivo_pa` VARCHAR(150) NOT NULL,
  `fecha_actual_pa` DATE NOT NULL,
  `fecha_pa` DATE NOT NULL,
  `con_goce_remuneraciones` INT NULL,
  `sin_goce_remuneraciones` INT NULL,
  `otros` VARCHAR(150) NULL,
  PRIMARY KEY (`id_pa`),
  INDEX `fk_permiso_administrativo_tipo_remuneracion1_idx` (`id_tiporem` ASC),
  INDEX `fk_permiso_administrativo_tipo_dia1_idx` (`id_tipo_dia` ASC),
  INDEX `fk_permiso_administrativo_usuario1_idx` (`rut_solicitante` ASC),
  INDEX `fk_permiso_administrativo_usuario2_idx` (`rut_reemplazo` ASC),
  CONSTRAINT `fk_permiso_administrativo_tipo_remuneracion1`
    FOREIGN KEY (`id_tiporem`)
    REFERENCES `id17192662_saludlosalamos`.`tipo_remuneracion` (`id_tiporem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_administrativo_tipo_dia1`
    FOREIGN KEY (`id_tipo_dia`)
    REFERENCES `id17192662_saludlosalamos`.`tipo_dia` (`id_tipo_dia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_administrativo_usuario1`
    FOREIGN KEY (`rut_solicitante`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_administrativo_usuario2`
    FOREIGN KEY (`rut_reemplazo`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`solicitud_permiso_administrativo` (
  `id_spa` INT NOT NULL AUTO_INCREMENT,
  `id_pa` INT NOT NULL,
  `rut_receptor` VARCHAR(11) NOT NULL,
  `id_decision_spa` INT NOT NULL,
  `id_etapas_spa` INT NOT NULL,
  `fecha_respuesta_spa` DATE NOT NULL,
  `observacion_spa` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_spa`),
  INDEX `fk_solicitud_permiso_administrativo_usuario1_idx` (`rut_receptor` ASC),
  INDEX `fk_solicitud_permiso_administrativo_decision_spa1_idx` (`id_decision_spa` ASC),
  INDEX `fk_solicitud_permiso_administrativo_etapas_spa1_idx` (`id_etapas_spa` ASC),
  INDEX `fk_solicitud_permiso_administrativo_permiso_administrativo1_idx` (`id_pa` ASC),
  CONSTRAINT `fk_solicitud_permiso_administrativo_usuario1`
    FOREIGN KEY (`rut_receptor`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_administrativo_decision_spa1`
    FOREIGN KEY (`id_decision_spa`)
    REFERENCES `id17192662_saludlosalamos`.`decision_spa` (`id_decision_spa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_administrativo_etapas_spa1`
    FOREIGN KEY (`id_etapas_spa`)
    REFERENCES `id17192662_saludlosalamos`.`etapas_spa` (`id_etapas_spa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_administrativo_permiso_administrativo1`
    FOREIGN KEY (`id_pa`)
    REFERENCES `id17192662_saludlosalamos`.`permiso_administrativo` (`id_pa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`permiso_feriado_legal` (
  `id_pfl` INT NOT NULL AUTO_INCREMENT,
  `rut_solicitante` VARCHAR(11) NOT NULL,
  `rut_reemplazo` VARCHAR(11) NOT NULL,
  `fecha_registro_pfl` DATE NOT NULL,
  `fecha_permiso_pfl` DATE NOT NULL,
  `ano_pfl` YEAR(4) NOT NULL,
  `numero_de_dias_pfl` INT(2) NOT NULL,
  `banderaAutorizaProrroga` ENUM('1', '2') NULL,
  `ano_feriado_acumulado_pfl` YEAR(4) NULL,
  `dias_feriado_acumulado_pfl` INT(2) NULL,
  `otros_pfl` VARCHAR(150) NULL,
  PRIMARY KEY (`id_pfl`),
  INDEX `fk_permiso_feriado_legal_usuario1_idx` (`rut_solicitante` ASC),
  INDEX `fk_permiso_feriado_legal_usuario2_idx` (`rut_reemplazo` ASC),
  CONSTRAINT `fk_permiso_feriado_legal_usuario1`
    FOREIGN KEY (`rut_solicitante`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_feriado_legal_usuario2`
    FOREIGN KEY (`rut_reemplazo`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`autoriza` (
  `id_autoriza` INT NOT NULL AUTO_INCREMENT,
  `id_pfl` INT NULL,
  `desde` DATE NOT NULL,
  `hasta` DATE NOT NULL,
  PRIMARY KEY (`id_autoriza`),
  INDEX `fk_autoriza_permiso_feriado_legal1_idx` (`id_pfl` ASC),
  CONSTRAINT `fk_autoriza_permiso_feriado_legal1`
    FOREIGN KEY (`id_pfl`)
    REFERENCES `id17192662_saludlosalamos`.`permiso_feriado_legal` (`id_pfl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`prorroga` (
  `id_prorroga` INT NOT NULL AUTO_INCREMENT,
  `id_pfl` INT NULL,
  `desde` DATE NOT NULL,
  `hasta` DATE NOT NULL,
  PRIMARY KEY (`id_prorroga`),
  INDEX `fk_prorroga_permiso_feriado_legal1_idx` (`id_pfl` ASC),
  CONSTRAINT `fk_prorroga_permiso_feriado_legal1`
    FOREIGN KEY (`id_pfl`)
    REFERENCES `id17192662_saludlosalamos`.`permiso_feriado_legal` (`id_pfl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`solicitud_feriado_legal` (
  `id_sfl` INT NOT NULL AUTO_INCREMENT,
  `id_pfl` INT NOT NULL,
  `rut_receptor` VARCHAR(11) NOT NULL,
  `id_decision_sfl` INT NOT NULL,
  `id_etapas_sfl` INT NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `observacion_sfl` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_sfl`),
  INDEX `fk_solicitud_feriado_legal_permiso_feriado_legal1_idx` (`id_pfl` ASC),
  INDEX `fk_solicitud_feriado_legal_etapas_sfl1_idx` (`id_etapas_sfl` ASC),
  INDEX `fk_solicitud_feriado_legal_decision_sfl1_idx` (`id_decision_sfl` ASC),
  INDEX `fk_solicitud_feriado_legal_usuario1_idx` (`rut_receptor` ASC),
  CONSTRAINT `fk_solicitud_feriado_legal_permiso_feriado_legal1`
    FOREIGN KEY (`id_pfl`)
    REFERENCES `id17192662_saludlosalamos`.`permiso_feriado_legal` (`id_pfl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_feriado_legal_etapas_sfl1`
    FOREIGN KEY (`id_etapas_sfl`)
    REFERENCES `id17192662_saludlosalamos`.`etapas_sfl` (`id_etapas_sfl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_feriado_legal_decision_sfl1`
    FOREIGN KEY (`id_decision_sfl`)
    REFERENCES `id17192662_saludlosalamos`.`decision_sfl` (`id_decision_sfl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_feriado_legal_usuario1`
    FOREIGN KEY (`rut_receptor`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`token` (
  `id_token` INT(11) NOT NULL AUTO_INCREMENT,
  `token_de_acceso` TEXT NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id_token`),
  INDEX `fk_token_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_token_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`eventos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rut_creador` VARCHAR(11) NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `color` VARCHAR(45) NOT NULL,
  `start` VARCHAR(45) NOT NULL,
  `end` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_eventos_usuario1_idx` (`rut_creador` ASC) ,
  CONSTRAINT `fk_eventos_usuario1`
    FOREIGN KEY (`rut_creador`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

  CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`destinatarios_eventos` (
  `id_de` INT NOT NULL AUTO_INCREMENT,
  `rut_receptor` VARCHAR(11) NOT NULL,
  `id_eventos` INT NOT NULL,
  PRIMARY KEY (`id_de`),
  INDEX `fk_usuario_has_eventos_eventos1_idx` (`id_eventos` ASC),
  INDEX `fk_usuario_has_eventos_usuario1_idx` (`rut_receptor` ASC),
  CONSTRAINT `fk_usuario_has_eventos_usuario1`
    FOREIGN KEY (`rut_receptor`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_eventos_eventos1`
    FOREIGN KEY (`id_eventos`)
    REFERENCES `id17192662_saludlosalamos`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


  CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`reunion` (
  `id_reunion` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo_reunion` VARCHAR(100) NOT NULL,
  `rut_creador` VARCHAR(11) NOT NULL,
  `asunto_reunion` TEXT NOT NULL,
  `url_reunion` TEXT NOT NULL,
  `fecha_reunion` VARCHAR(30) NOT NULL,
  `fecha_con_formato` DATE NOT NULL,
  `duracion_reunion` INT NOT NULL,
  `estado_reunion` ENUM('activo', 'pendiente', 'finalizada') NOT NULL DEFAULT 'pendiente',
  `contrasena_reunion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_reunion`),
  INDEX `fk_reunion_usuario1_idx` (`rut_creador` ASC),
  CONSTRAINT `fk_reunion_usuario1`
    FOREIGN KEY (`rut_creador`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
 DEFAULT CHARACTER SET = utf8;

 CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`destinatario_reunion` (
  `id_dr` INT NOT NULL AUTO_INCREMENT,
  `id_reunion` INT(11) NOT NULL,
  `rut_receptor` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id_dr`),
  INDEX `fk_reunion_has_usuario_usuario1_idx` (`rut_receptor` ASC),
  INDEX `fk_reunion_has_usuario_reunion1_idx` (`id_reunion` ASC),
  CONSTRAINT `fk_reunion_has_usuario_reunion1`
    FOREIGN KEY (`id_reunion`)
    REFERENCES `id17192662_saludlosalamos`.`reunion` (`id_reunion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reunion_has_usuario_usuario1`
    FOREIGN KEY (`rut_receptor`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`calidad` (
  `id_calidad` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `descripcion_calidad` VARCHAR(50) NOT NULL,
  `archivo_calidad` VARCHAR(150) NOT NULL,
  `estado_calidad` INT(11) NOT NULL,
  PRIMARY KEY (`id_calidad`),
  INDEX `fk_calidad_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_calidad_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`galeria` (
  `id_galeria` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `archivo_galeria` VARCHAR(150) NOT NULL,
  `titulo_galeria` VARCHAR(100) NOT NULL,
  `estado_galeria` INT(11) NOT NULL,
  PRIMARY KEY (`id_galeria`),
  INDEX `fk_galeria_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_galeria_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`banner_imagenes` (
  `id_ban_imagenes` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `nombre_ban_imagenes` VARCHAR(150) NOT NULL,
  `estado_ban_imagenes` INT(11) NOT NULL,
  `link_ban_imagenes` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_ban_imagenes`),
  INDEX `fk_ban_imagenes_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_ban_imagenes_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`banner_videos` (
  `id_ban_videos` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `nombre_ban_videos` VARCHAR(150) NOT NULL,
  `estado_ban_videos` INT(11) NOT NULL,
  `titulo_ban_videos` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_ban_videos`),
  INDEX `fk_ban_imagenes_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_ban_imagenes_usuario10`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`documentos` (
  `id_documentos` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `descripcion_documentos` VARCHAR(50) NOT NULL,
  `archivo_documentos` VARCHAR(150) NOT NULL,
  `estado_documentos` INT(11) NOT NULL,
  PRIMARY KEY (`id_documentos`),
  INDEX `fk_documentos_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_documentos_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`notificacion` (
  `id_notificacion` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `mensaje_notificacion` VARCHAR(100) NOT NULL,
  `fecha_notificacion` VARCHAR(30) NOT NULL,
  `estado_notificacion` ENUM('visto', 'novisto') NOT NULL DEFAULT 'novisto',
  PRIMARY KEY (`id_notificacion`),
  INDEX `fk_notificacion_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_notificacion_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`categoria_articulo` (
  `id_categoria_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria_articulo` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_categoria_articulo`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`articulo` (
  `id_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `id_categoria_articulo` INT(11) NOT NULL,
  `titulo_articulo` VARCHAR(170) NOT NULL,
  `descripcion_articulo` LONGTEXT NOT NULL,
  `fecha_articulo` VARCHAR(30) NOT NULL,
  `visualizaciones_articulo` INT(11) NOT NULL,
  `archivo_articulo` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_articulo`),
  INDEX `fk_articulo_usuario1_idx` (`rut` ASC) ,
  INDEX `fk_articulo_categoria_articulo1_idx` (`id_categoria_articulo` ASC) ,
  CONSTRAINT `fk_articulo_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulo_categoria_articulo1`
    FOREIGN KEY (`id_categoria_articulo`)
    REFERENCES `id17192662_saludlosalamos`.`categoria_articulo` (`id_categoria_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`imagen_articulo` (
  `id_imagen_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` INT(11) NOT NULL,
  `nombre_imagen_articulo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_imagen_articulo`),
  INDEX `fk_imagen_articulo_articulo1_idx` (`id_articulo` ASC) ,
  CONSTRAINT `fk_imagen_articulo_articulo1`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `id17192662_saludlosalamos`.`articulo` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`calificacion_articulo` (
  `id_calificacion_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` INT(11) NOT NULL,
  `valor_calificacion_articulo` INT(11) NOT NULL,
  `ip_calificacion_articulo` VARCHAR(16) NOT NULL,
  `pais_calificacion_articulo` VARCHAR(65) NOT NULL,
  `ciudad_calificacion_articulo` VARCHAR(100) NOT NULL,
  `region_calificacion_articulo` VARCHAR(100) NOT NULL,
  `compania_calificacion_articulo` VARCHAR(150) NOT NULL,
  `fecha_calificacion_articulo` DATE NOT NULL,
  PRIMARY KEY (`id_calificacion_articulo`),
  INDEX `fk_calificacion_articulo_articulo1_idx` (`id_articulo` ASC) ,
  CONSTRAINT `fk_calificacion_articulo_articulo1`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `id17192662_saludlosalamos`.`articulo` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`visitas_articulo` (
  `id_vis_art` INT NOT NULL AUTO_INCREMENT,
  `id_articulo` INT NOT NULL,
  `fecha_vis_art` DATE NOT NULL,
  `ip_vis_art` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id_vis_art`),
  INDEX `fk_visitas_articulo_articulo1_idx` (`id_articulo` ASC),
  CONSTRAINT `fk_visitas_articulo_articulo1`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `id17192662_saludlosalamos`.`articulo` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`categoria_odonto` (
  `id_categoria_odonto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria_odonto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categoria_odonto`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`articulo_odonto` (
  `id_articulo_odonto` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `titulo_articulo_odonto` VARCHAR(130) NOT NULL,
  `frase_articulo_odonto` VARCHAR(130) NOT NULL,
  `cita_articulo_odonto` VARCHAR(130) NOT NULL,
  `descripcion_articulo_odonto` LONGTEXT NOT NULL,
  `archivo_articulo_odonto` VARCHAR(100) NOT NULL,
  `estado_articulo_odonto` ENUM('visible', 'oculto') NOT NULL DEFAULT 'oculto',
  PRIMARY KEY (`id_articulo_odonto`),
  INDEX `fk_articulo_odonto_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_articulo_odonto_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`anexo_odonto` (
  `id_anexo_odonto` INT(11) NOT NULL AUTO_INCREMENT,
  `id_articulo_odonto` INT(11) NOT NULL,
  `id_categoria_odonto` INT(11) NOT NULL,
  `titulo_anexo_odonto` VARCHAR(130) NOT NULL,
  `descripcion_anexo_odonto` LONGTEXT NOT NULL,
  `archivo_anexo_odonto` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id_anexo_odonto`),
  INDEX `fk_anexo_odonto_articulo_odonto1_idx` (`id_articulo_odonto` ASC) ,
  INDEX `fk_anexo_odonto_categoria_odonto1_idx` (`id_categoria_odonto` ASC) ,
  CONSTRAINT `fk_anexo_odonto_articulo_odonto1`
    FOREIGN KEY (`id_articulo_odonto`)
    REFERENCES `id17192662_saludlosalamos`.`articulo_odonto` (`id_articulo_odonto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_anexo_odonto_categoria_odonto1`
    FOREIGN KEY (`id_categoria_odonto`)
    REFERENCES `id17192662_saludlosalamos`.`categoria_odonto` (`id_categoria_odonto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`contacto` (
  `id_contacto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_contacto` VARCHAR(50) NOT NULL,
  `correo_contacto` VARCHAR(100) NOT NULL,
  `telefono_contacto` VARCHAR(13) NOT NULL,
  `asunto_contacto` VARCHAR(60) NOT NULL,
  `descripcion_contacto` LONGTEXT NOT NULL,
  `fecha_contacto` DATE NOT NULL,
  PRIMARY KEY (`id_contacto`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`testimonios` (
  `id_testimonios` INT NOT NULL AUTO_INCREMENT,
  `genero_testimonios` ENUM('F', 'M') NOT NULL,
  `nombre_testimonios` VARCHAR(150) NOT NULL,
  `comentario_testimonios` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_testimonios`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`tipo_medicamento` (
  `id_tipo_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_tipo_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_tipo_medicamento`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`categoria_medicamento` (
  `id_categoria_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_categoria_medicamento`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`estado_medicamento` (
  `id_estado_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_estado_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_estado_medicamento`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`patologia` (
  `id_patologia` INT NOT NULL AUTO_INCREMENT,
  `nombre_patologia` VARCHAR(100) NOT NULL,
  `estado_patologia` ENUM ('0','1') DEFAULT '1' NOT NULL,
  PRIMARY KEY (`id_patologia`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`medicamento` (
  `id_medicamento` INT NOT NULL AUTO_INCREMENT,
  `id_tipo_medicamento` INT NOT NULL,
  `id_categoria_medicamento` INT NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  `nombre_medicamento` VARCHAR(100) NOT NULL,
  `precio_medicamento` INT(7) NOT NULL,
  `dosificacion_medicamento` VARCHAR(40) NOT NULL,
  `imagen_medicamento` VARCHAR(250) NOT NULL,
  `visibilidad_medicamento` INT NOT NULL,
  `stock_total` INT(11) NOT NULL,
  `cantidadminima` INT NOT NULL,
  `cantidadmaxima` INT NOT NULL,
  `historial` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`id_medicamento`),
  INDEX `fk_medicamento_usuario1_idx` (`rut` ASC),
  INDEX `fk_medicamento_tipo_medicamento1_idx` (`id_tipo_medicamento` ASC) ,
  INDEX `fk_medicamento_categoria_medicamento1_idx` (`id_categoria_medicamento` ASC),
  CONSTRAINT `fk_medicamento_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamento_tipo_medicamento1`
    FOREIGN KEY (`id_tipo_medicamento`)
    REFERENCES `id17192662_saludlosalamos`.`tipo_medicamento` (`id_tipo_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamento_categoria_medicamento1`
    FOREIGN KEY (`id_categoria_medicamento`)
    REFERENCES `id17192662_saludlosalamos`.`categoria_medicamento` (`id_categoria_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`historial_medicamento` (
  `id_historial_medicamento` INT NOT NULL AUTO_INCREMENT,
  `id_medicamento` INT NOT NULL,
  `id_estado_medicamento` INT NOT NULL,
  `stock_historial_medicamento` INT NOT NULL,
  PRIMARY KEY (`id_historial_medicamento`),
  INDEX `fk_historial_medicamento_estado_medicamento1_idx` (`id_estado_medicamento` ASC),
  INDEX `fk_historial_medicamento_medicamento1_idx` (`id_medicamento` ASC),
  CONSTRAINT `fk_historial_medicamento_estado_medicamento1`
    FOREIGN KEY (`id_estado_medicamento`)
    REFERENCES `id17192662_saludlosalamos`.`estado_medicamento` (`id_estado_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_medicamento_medicamento1`
    FOREIGN KEY (`id_medicamento`)
    REFERENCES `id17192662_saludlosalamos`.`medicamento` (`id_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`paciente` (
  `rut_paciente` VARCHAR(11) NOT NULL,
  `id_patologia` INT NOT NULL,
  `rut_funcionario` VARCHAR(11) NOT NULL,
  `nombres_paciente` VARCHAR(100) NOT NULL,
  `apellidos_paciente` VARCHAR(100) NOT NULL,
  `sexo_paciente` ENUM('Mujer', 'Hombre') NOT NULL,
  `direccion_paciente` VARCHAR(100) NOT NULL,
  `telefono_paciente` VARCHAR(9) NOT NULL,
  `correo_paciente` VARCHAR(70) NOT NULL,
  `edad_paciente` DATE NOT NULL,
  `fecha_registro` DATE NOT NULL,
  PRIMARY KEY (`rut_paciente`),
  INDEX `fk_paciente_patologia1_idx` (`id_patologia` ASC),
  INDEX `fk_paciente_usuario1_idx` (`rut_funcionario` ASC),
  CONSTRAINT `fk_paciente_patologia1`
    FOREIGN KEY (`id_patologia`)
    REFERENCES `id17192662_saludlosalamos`.`patologia` (`id_patologia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_usuario1`
    FOREIGN KEY (`rut_funcionario`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`agendar_retiro_medicamento` (
  `id_retiro_med` INT NOT NULL AUTO_INCREMENT,
  `rut_paciente` VARCHAR(11) NOT NULL,
  `id_estado_resp_agenda` INT NOT NULL,
  `fecha_retiro` DATE NOT NULL,
  `fecha_respuesta_funcionario` DATE NULL,
  `comentario_funcionario` VARCHAR(75) NULL,
  PRIMARY KEY (`id_retiro_med`),
  INDEX `fk_rertiro_medicamentos_paciente1_idx` (`rut_paciente` ASC),
  INDEX `fk_agendar_retiro_medicamento_estado_resp_agenda1_idx` (`id_estado_resp_agenda` ASC),
  CONSTRAINT `fk_rertiro_medicamentos_paciente1`
    FOREIGN KEY (`rut_paciente`)
    REFERENCES `id17192662_saludlosalamos`.`paciente` (`rut_paciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendar_retiro_medicamento_estado_resp_agenda1`
    FOREIGN KEY (`id_estado_resp_agenda`)
    REFERENCES `id17192662_saludlosalamos`.`estado_resp_agenda` (`id_estado_resp_agenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`solicitud_medicamento` (
  `id_solicitud_medicamento` INT NOT NULL AUTO_INCREMENT,
  `rut_paciente` VARCHAR(11) NOT NULL,
  `fecha_solicitud` DATETIME NOT NULL,
  `seguimiento` INT NOT NULL DEFAULT 0,
  INDEX `fk_paciente_has_usuario_paciente1_idx` (`rut_paciente` ASC) ,
  PRIMARY KEY (`id_solicitud_medicamento`),
  CONSTRAINT `fk_paciente_has_usuario_paciente1`
    FOREIGN KEY (`rut_paciente`)
    REFERENCES `id17192662_saludlosalamos`.`paciente` (`rut_paciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`historial_solicitud` (
  `id_historial_solicitud` INT NOT NULL AUTO_INCREMENT,
  `id_medicamento` INT NOT NULL,
  `id_solicitud_medicamento` INT NOT NULL,
  `stock_historial_solicitud` INT NOT NULL,
  `estado_historial_solicitud` INT NOT NULL,
  `comentario_historial_solicitud` VARCHAR(150) NOT NULL,
  INDEX `fk_medicamento_has_solicitud_medicamento_solicitud_medicame_idx` (`id_solicitud_medicamento` ASC),
  INDEX `fk_medicamento_has_solicitud_medicamento_medicamento1_idx` (`id_medicamento` ASC),
  PRIMARY KEY (`id_historial_solicitud`),
  CONSTRAINT `fk_medicamento_has_solicitud_medicamento_medicamento1`
    FOREIGN KEY (`id_medicamento`)
    REFERENCES `id17192662_saludlosalamos`.`medicamento` (`id_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamento_has_solicitud_medicamento_solicitud_medicamento1`
    FOREIGN KEY (`id_solicitud_medicamento`)
    REFERENCES `id17192662_saludlosalamos`.`solicitud_medicamento` (`id_solicitud_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

    CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`libro_rsf` (
  `id_libro_rsf` INT NOT NULL AUTO_INCREMENT,
  `rut_solicitante` VARCHAR(14) NOT NULL,
  `rut_funcionario` VARCHAR(11) NULL,
  `id_area` INT NOT NULL,
  `id_institucion` INT NOT NULL,
  `id_nacionalidad` INT NOT NULL,
  `id_pueblos_indigenas` INT NOT NULL,
  `tipo_persona` ENUM('persona natural', 'paciente del cesfam') NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellido_paterno` VARCHAR(45) NOT NULL,
  `apellido_materno` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `sexo` ENUM('hombre', 'mujer') NOT NULL,
  `tipo_telefonoprimario` ENUM('fijo', 'movil', 'laboral','') NOT NULL,
  `telefono_primario` VARCHAR(15) NOT NULL,
  `tipo_telefonosecundario` ENUM('fijo', 'movil', 'laboral','') NOT NULL,
  `telefono_secundario` VARCHAR(15) NOT NULL,
  `es_afectado` ENUM('no', 'si') NOT NULL,
  `tipo_solicitud` ENUM('reclamo', 'sugerencia', 'felicitaciones') NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `fecha_evento` DATE NOT NULL,
  `detalle` VARCHAR(2000) NOT NULL,
  `observaciones` VARCHAR(2000) NOT NULL,
  `correo` VARCHAR(75) NOT NULL,
  `fecha_respuesta_funcionario` DATE NULL,
  `estado_respuesta` ENUM('0', '1') NOT NULL,
  `comentario_respuesta_funcionario` VARCHAR(2000) NULL,
  PRIMARY KEY (`id_libro_rsf`),
  INDEX `fk_libro_rsf_area1_idx` (`id_area` ASC),
  INDEX `fk_libro_rsf_institucion1_idx` (`id_institucion` ASC),
  INDEX `fk_libro_rsf_nacionalidad1_idx` (`id_nacionalidad` ASC),
  INDEX `fk_libro_rsf_pueblos_indigenas1_idx` (`id_pueblos_indigenas` ASC),
  INDEX `fk_libro_rsf_usuario1_idx` (`rut_funcionario` ASC),
  CONSTRAINT `fk_libro_rsf_area1`
    FOREIGN KEY (`id_area`)
    REFERENCES `id17192662_saludlosalamos`.`area` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_institucion1`
    FOREIGN KEY (`id_institucion`)
    REFERENCES `id17192662_saludlosalamos`.`institucion` (`id_institucion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_nacionalidad1`
    FOREIGN KEY (`id_nacionalidad`)
    REFERENCES `id17192662_saludlosalamos`.`nacionalidad` (`id_nacionalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_pueblos_indigenas1`
    FOREIGN KEY (`id_pueblos_indigenas`)
    REFERENCES `id17192662_saludlosalamos`.`pueblos_indigenas` (`id_pueblos_indigenas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_usuario1`
    FOREIGN KEY (`rut_funcionario`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`imagen_libro_rsf` (
  `id_imagen_libro_rsf` INT NOT NULL AUTO_INCREMENT,
  `id_libro_rsf` INT NOT NULL,
  `nombre_imagen_libro_rsf` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_imagen_libro_rsf`),
  INDEX `fk_imagen_libro_rsf_libro_rsf1_idx` (`id_libro_rsf` ASC),
  CONSTRAINT `fk_imagen_libro_rsf_libro_rsf1`
    FOREIGN KEY (`id_libro_rsf`)
    REFERENCES `id17192662_saludlosalamos`.`libro_rsf` (`id_libro_rsf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`materiales_bodega` (
  `id_mb` INT NOT NULL AUTO_INCREMENT,
  `id_cat_mb` INT NOT NULL,
  `fecharegistro_mb` DATE NOT NULL,
  `nombre_material_mb` VARCHAR(60) NOT NULL,
  `cantidad_mb` INT NOT NULL,
  `cantidad_minima_mb` INT NOT NULL,
  `cantidad_maxima_mb` INT NOT NULL,
  `historial_mb` INT NOT NULL,
  `estado_mb` ENUM('0', '1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_mb`),
  INDEX `fk_materiales_bodega_categoria_mb1_idx` (`id_cat_mb` ASC),
  CONSTRAINT `fk_materiales_bodega_categoria_mb1`
    FOREIGN KEY (`id_cat_mb`)
    REFERENCES `id17192662_saludlosalamos`.`categoria_mb` (`id_cat_mb`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`solicitud_mat_bodega` (
  `id_sl_mat_bg` INT NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `id_mb` INT NOT NULL,
  `id_seg_sl_mat_bg` INT NOT NULL,
  `fecha_sl_mat_bg` DATE NOT NULL,
  `stock_sl_mat_bg` INT NOT NULL,
  `comentario_sl_mat_bg` VARCHAR(75) NULL,
  PRIMARY KEY (`id_sl_mat_bg`),
  INDEX `fk_usuario_has_materiales_bodega_materiales_bodega1_idx` (`id_mb` ASC),
  INDEX `fk_usuario_has_materiales_bodega_usuario1_idx` (`rut` ASC),
  INDEX `fk_solicitud_mat_bodega_seguimiento_sl_mat_bg1_idx` (`id_seg_sl_mat_bg` ASC),
  CONSTRAINT `fk_usuario_has_materiales_bodega_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_materiales_bodega_materiales_bodega1`
    FOREIGN KEY (`id_mb`)
    REFERENCES `id17192662_saludlosalamos`.`materiales_bodega` (`id_mb`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_mat_bodega_seguimiento_sl_mat_bg1`
    FOREIGN KEY (`id_seg_sl_mat_bg`)
    REFERENCES `id17192662_saludlosalamos`.`seguimiento_sl_mat_bg` (`id_seg_sl_mat_bg`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`historial_mat_bodega` (
  `id_hs_mat_bg` INT NOT NULL AUTO_INCREMENT,
  `id_mb` INT NOT NULL,
  `id_est_mat_bg` INT NOT NULL,
  `stock_hs_mat_bg` INT NOT NULL,
  PRIMARY KEY (`id_hs_mat_bg`),
  INDEX `fk_historial_mat_bodega_estado_mat_bodega1_idx` (`id_est_mat_bg` ASC),
  INDEX `fk_historial_mat_bodega_materiales_bodega1_idx` (`id_mb` ASC),
  CONSTRAINT `fk_historial_mat_bodega_estado_mat_bodega1`
    FOREIGN KEY (`id_est_mat_bg`)
    REFERENCES `id17192662_saludlosalamos`.`estado_mat_bodega` (`id_est_mat_bg`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_mat_bodega_materiales_bodega1`
    FOREIGN KEY (`id_mb`)
    REFERENCES `id17192662_saludlosalamos`.`materiales_bodega` (`id_mb`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`soporte_tecnico` (
  `id_sop_tec` INT NOT NULL AUTO_INCREMENT,
  `emisor` VARCHAR(11) NOT NULL,
  `receptor` VARCHAR(11) NOT NULL,
  `fechayhora_sop_tec` DATETIME NOT NULL,
  `comentario_sop_tec` VARCHAR(200) NOT NULL,
  `estado_eliminado_sop_tec` ENUM('0', '1') NOT NULL DEFAULT '0',
  `navegador_sop_tec` VARCHAR(45) NOT NULL,
  `versionnaveg_sop_tec` VARCHAR(45) NOT NULL,
  `sistemaoperativo_sop_tec` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_sop_tec`),
  INDEX `fk_soporte_tecnico_usuario1_idx` (`emisor` ASC),
  INDEX `fk_soporte_tecnico_usuario2_idx` (`receptor` ASC),
  CONSTRAINT `fk_soporte_tecnico_usuario1`
    FOREIGN KEY (`emisor`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_soporte_tecnico_usuario2`
    FOREIGN KEY (`receptor`)
    REFERENCES `id17192662_saludlosalamos`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `id17192662_saludlosalamos`.`opinante` (
  `id_opte` INT NOT NULL AUTO_INCREMENT,
  `id_articulo` INT NOT NULL,
  `id_fb_opte` BIGINT(17) NOT NULL,
  `imagen_fb_opte` VARCHAR(200) NOT NULL,
  `nomyapell_fb_opte` VARCHAR(100) NOT NULL,
  `correo_fb_opte` VARCHAR(75) NOT NULL,
  `comentario_opte` VARCHAR(150) NOT NULL,
  `fecha_opte` DATE NOT NULL,
  PRIMARY KEY (`id_opte`),
  INDEX `fk_opinante_articulo1_idx` (`id_articulo` ASC),
  CONSTRAINT `fk_opinante_articulo1`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `id17192662_saludlosalamos`.`articulo` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


