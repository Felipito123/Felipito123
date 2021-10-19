-- MySQL Workbench Synchronization
-- Generated: 2021-01-27 01:21
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Felipe Galdames

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `saludlosalamos2` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`rol` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_rol`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`region` (
  `id_region` INT NOT NULL AUTO_INCREMENT,
  `nombre_region` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_region`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`comuna` (
  `id_comuna` INT NOT NULL AUTO_INCREMENT,
  `id_region` INT NOT NULL,
  `nombre_comuna` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_comuna`),
  INDEX `fk_comuna_region1_idx` (`id_region` ASC),
  CONSTRAINT `fk_comuna_region1`
    FOREIGN KEY (`id_region`)
    REFERENCES `saludlosalamos2`.`region` (`id_region`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`sector` (
  `id_sector` INT NOT NULL AUTO_INCREMENT,
  `nombre_sector` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_sector`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`unidad` (
  `id_unidad` INT NOT NULL AUTO_INCREMENT,
  `nombre_unidad` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_unidad`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`cargo` (
  `id_cargo` INT NOT NULL AUTO_INCREMENT,
  `nombre_cargo` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_cargo`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`etapas_spe` (
  `id_etapas_spe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_etapas_spe` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_etapas_spe`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`decision_spe` (
  `id_decision_spe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_decision_spe` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_decision_spe`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`motivo_pe` (
  `id_mpe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_mpe` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_mpe`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`tipo_remuneracion` (
  `id_tiporem` INT NOT NULL AUTO_INCREMENT,
  `descripcion_tiporem` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_tiporem`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`tipo_dia` (
  `id_tipo_dia` INT NOT NULL AUTO_INCREMENT,
  `descripcion_tipo_dia` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_tipo_dia`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`decision_spa` (
  `id_decision_spa` INT NOT NULL AUTO_INCREMENT,
  `descripcion_decision_spa` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_decision_spa`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`etapas_spa` (
  `id_etapas_spa` INT NOT NULL AUTO_INCREMENT,
  `descripcion_etapas_spa` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_etapas_spa`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`institucion` (
  `id_institucion` INT NOT NULL AUTO_INCREMENT,
  `nombre_institucion` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_institucion`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`area` (
  `id_area` INT NOT NULL AUTO_INCREMENT,
  `nombre_area` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_area`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`nacionalidad` (
  `id_nacionalidad` INT NOT NULL AUTO_INCREMENT,
  `nombre_nacionalidad` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_nacionalidad`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`pueblos_indigenas` (
  `id_pueblos_indigenas` INT NOT NULL AUTO_INCREMENT,
  `nombre_pueblos_indigenas` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_pueblos_indigenas`))
  DEFAULT CHARACTER SET = utf8;

  CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`estado_resp_agenda` (
  `id_estado_resp_agenda` INT NOT NULL AUTO_INCREMENT,
  `nombre_estado_agenda` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_resp_agenda`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`usuario` (
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
  PRIMARY KEY (`rut`),
  INDEX `fk_usuario_rol_idx` (`id_rol` ASC),
  INDEX `fk_usuario_comuna1_idx` (`id_comuna` ASC),
  INDEX `fk_usuario_sector1_idx` (`id_sector` ASC),
  INDEX `fk_usuario_cargo1_idx` (`id_cargo` ASC),
  INDEX `fk_usuario_unidad1_idx` (`id_unidad` ASC),
  CONSTRAINT `fk_usuario_rol0`
    FOREIGN KEY (`id_rol`)
    REFERENCES `saludlosalamos2`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_comuna1`
    FOREIGN KEY (`id_comuna`)
    REFERENCES `saludlosalamos2`.`comuna` (`id_comuna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_sector1`
    FOREIGN KEY (`id_sector`)
    REFERENCES `saludlosalamos2`.`sector` (`id_sector`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_cargo1`
    FOREIGN KEY (`id_cargo`)
    REFERENCES `saludlosalamos2`.`cargo` (`id_cargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_unidad1`
    FOREIGN KEY (`id_unidad`)
    REFERENCES `saludlosalamos2`.`unidad` (`id_unidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`historial_cargo` (
  `id_historial_cargo` INT NOT NULL AUTO_INCREMENT,
  `id_rol` INT NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  `fecha_cargo` DATE NOT NULL,
  PRIMARY KEY (`id_historial_cargo`),
  INDEX `fk_rol_has_usuario_usuario1_idx` (`rut` ASC),
  INDEX `fk_rol_has_usuario_rol1_idx` (`id_rol` ASC),
  CONSTRAINT `fk_rol_has_usuario_rol1`
    FOREIGN KEY (`id_rol`)
    REFERENCES `saludlosalamos2`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol_has_usuario_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)    
  DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`permiso_especial` (
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
    REFERENCES `saludlosalamos2`.`comuna` (`id_comuna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_especial_motivo1`
    FOREIGN KEY (`id_mpe`)
    REFERENCES `saludlosalamos2`.`motivo_pe` (`id_mpe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_especial_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`solicitud_permiso_especial` (
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
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_permiso_especial_permiso_especial1`
    FOREIGN KEY (`id_pe`)
    REFERENCES `saludlosalamos2`.`permiso_especial` (`id_pe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_especial_decision1`
    FOREIGN KEY (`id_decision_spe`)
    REFERENCES `saludlosalamos2`.`decision_spe` (`id_decision_spe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_especial_etapas_spe1`
    FOREIGN KEY (`id_etapas_spe`)
    REFERENCES `saludlosalamos2`.`etapas_spe` (`id_etapas_spe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`permiso_administrativo` (
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
    REFERENCES `saludlosalamos2`.`tipo_remuneracion` (`id_tiporem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_administrativo_tipo_dia1`
    FOREIGN KEY (`id_tipo_dia`)
    REFERENCES `saludlosalamos2`.`tipo_dia` (`id_tipo_dia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_administrativo_usuario1`
    FOREIGN KEY (`rut_solicitante`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_administrativo_usuario2`
    FOREIGN KEY (`rut_reemplazo`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`solicitud_permiso_administrativo` (
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
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_administrativo_decision_spa1`
    FOREIGN KEY (`id_decision_spa`)
    REFERENCES `saludlosalamos2`.`decision_spa` (`id_decision_spa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_administrativo_etapas_spa1`
    FOREIGN KEY (`id_etapas_spa`)
    REFERENCES `saludlosalamos2`.`etapas_spa` (`id_etapas_spa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_permiso_administrativo_permiso_administrativo1`
    FOREIGN KEY (`id_pa`)
    REFERENCES `saludlosalamos2`.`permiso_administrativo` (`id_pa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    DEFAULT CHARACTER SET = utf8;





CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`token` (
  `id_token` INT(11) NOT NULL AUTO_INCREMENT,
  `token_de_acceso` TEXT NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id_token`),
  INDEX `fk_token_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_token_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`eventos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `color` VARCHAR(45) NOT NULL,
  `start` VARCHAR(45) NOT NULL,
  `end` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_eventos_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_eventos_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`reunion` (
  `id_reunion` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo_reunion` VARCHAR(100) NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  `asunto_reunion` TEXT NOT NULL,
  `url_reunion` TEXT NOT NULL,
  `fecha_reunion` VARCHAR(30) NOT NULL,
  `duracion_reunion` INT(11) NOT NULL,
  `estado_reunion` ENUM('activo', 'pendiente', 'finalizada') NOT NULL DEFAULT 'pendiente',
  `contrasena_reunion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_reunion`),
  INDEX `fk_reunion_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_reunion_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`calidad` (
  `id_calidad` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `descripcion_calidad` VARCHAR(50) NOT NULL,
  `archivo_calidad` VARCHAR(150) NOT NULL,
  `estado_calidad` INT(11) NOT NULL,
  PRIMARY KEY (`id_calidad`),
  INDEX `fk_calidad_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_calidad_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`galeria` (
  `id_galeria` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `archivo_galeria` VARCHAR(150) NOT NULL,
  `titulo_galeria` VARCHAR(100) NOT NULL,
  `estado_galeria` INT(11) NOT NULL,
  PRIMARY KEY (`id_galeria`),
  INDEX `fk_galeria_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_galeria_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`banner_imagenes` (
  `id_ban_imagenes` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `nombre_ban_imagenes` VARCHAR(150) NOT NULL,
  `estado_ban_imagenes` INT(11) NOT NULL,
  `link_ban_imagenes` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_ban_imagenes`),
  INDEX `fk_ban_imagenes_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_ban_imagenes_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`banner_videos` (
  `id_ban_videos` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `nombre_ban_videos` VARCHAR(150) NOT NULL,
  `estado_ban_videos` INT(11) NOT NULL,
  `titulo_ban_videos` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_ban_videos`),
  INDEX `fk_ban_imagenes_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_ban_imagenes_usuario10`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`documentos` (
  `id_documentos` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `descripcion_documentos` VARCHAR(50) NOT NULL,
  `archivo_documentos` VARCHAR(150) NOT NULL,
  `estado_documentos` INT(11) NOT NULL,
  PRIMARY KEY (`id_documentos`),
  INDEX `fk_documentos_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_documentos_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`notificacion` (
  `id_notificacion` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `mensaje_notificacion` VARCHAR(100) NOT NULL,
  `fecha_notificacion` VARCHAR(30) NOT NULL,
  `estado_notificacion` ENUM('visto', 'novisto') NOT NULL DEFAULT 'novisto',
  PRIMARY KEY (`id_notificacion`),
  INDEX `fk_notificacion_usuario1_idx` (`rut` ASC) ,
  CONSTRAINT `fk_notificacion_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`categoria_articulo` (
  `id_categoria_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria_articulo` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_categoria_articulo`))
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`articulo` (
  `id_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(11) NOT NULL,
  `id_categoria_articulo` INT(11) NOT NULL,
  `titulo_articulo` VARCHAR(130) NOT NULL,
  `descripcion_articulo` LONGTEXT NOT NULL,
  `fecha_articulo` VARCHAR(30) NOT NULL,
  `visualizaciones_articulo` INT(11) NOT NULL,
  `archivo_articulo` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_articulo`),
  INDEX `fk_articulo_usuario1_idx` (`rut` ASC) ,
  INDEX `fk_articulo_categoria_articulo1_idx` (`id_categoria_articulo` ASC) ,
  CONSTRAINT `fk_articulo_usuario1`
    FOREIGN KEY (`rut`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulo_categoria_articulo1`
    FOREIGN KEY (`id_categoria_articulo`)
    REFERENCES `saludlosalamos2`.`categoria_articulo` (`id_categoria_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`imagen_articulo` (
  `id_imagen_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` INT(11) NOT NULL,
  `nombre_imagen_articulo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_imagen_articulo`),
  INDEX `fk_imagen_articulo_articulo1_idx` (`id_articulo` ASC) ,
  CONSTRAINT `fk_imagen_articulo_articulo1`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `saludlosalamos2`.`articulo` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`calificacion_articulo` (
  `id_calificacion_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` INT(11) NOT NULL,
  `valor_calificacion_articulo` INT(11) NOT NULL,
  `ip_calificacion_articulo` VARCHAR(16) NOT NULL,
  `pais_calificacion_articulo` VARCHAR(65) NOT NULL,
  `ciudad_calificacion_articulo` VARCHAR(100) NOT NULL,
  `region_calificacion_articulo` VARCHAR(100) NOT NULL,
  `compania_calificacion_articulo` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_calificacion_articulo`),
  INDEX `fk_calificacion_articulo_articulo1_idx` (`id_articulo` ASC) ,
  CONSTRAINT `fk_calificacion_articulo_articulo1`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `saludlosalamos2`.`articulo` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`categoria_odonto` (
  `id_categoria_odonto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria_odonto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categoria_odonto`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`articulo_odonto` (
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
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`anexo_odonto` (
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
    REFERENCES `saludlosalamos2`.`articulo_odonto` (`id_articulo_odonto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_anexo_odonto_categoria_odonto1`
    FOREIGN KEY (`id_categoria_odonto`)
    REFERENCES `saludlosalamos2`.`categoria_odonto` (`id_categoria_odonto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`contacto` (
  `id_contacto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_contacto` VARCHAR(50) NOT NULL,
  `correo_contacto` VARCHAR(100) NOT NULL,
  `telefono_contacto` VARCHAR(13) NOT NULL,
  `asunto_contacto` VARCHAR(60) NOT NULL,
  `descripcion_contacto` LONGTEXT NOT NULL,
  PRIMARY KEY (`id_contacto`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`testimonios` (
  `id_testimonios` INT NOT NULL AUTO_INCREMENT,
  `genero_testimonios` ENUM('F', 'M') NOT NULL,
  `nombre_testimonios` VARCHAR(150) NOT NULL,
  `comentario_testimonios` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_testimonios`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`tipo_medicamento` (
  `id_tipo_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_tipo_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_tipo_medicamento`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`categoria_medicamento` (
  `id_categoria_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_categoria_medicamento`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`estado_medicamento` (
  `id_estado_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_estado_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_estado_medicamento`))
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`patologia` (
  `id_patologia` INT NOT NULL AUTO_INCREMENT,
  `nombre_patologia` VARCHAR(100) NOT NULL,
  `estado_patologia` ENUM ('0','1') DEFAULT '1' NOT NULL,
  PRIMARY KEY (`id_patologia`))
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`medicamento` (
  `id_medicamento` INT NOT NULL AUTO_INCREMENT,
  `id_tipo_medicamento` INT NOT NULL,
  `id_categoria_medicamento` INT NOT NULL,
  `rut` VARCHAR(11) NOT NULL,
  `nombre_medicamento` VARCHAR(100) NOT NULL,
  `precio_medicamento` INT(7) NOT NULL,
  `dosificacion_medicamento` VARCHAR(25) NOT NULL,
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
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamento_tipo_medicamento1`
    FOREIGN KEY (`id_tipo_medicamento`)
    REFERENCES `saludlosalamos2`.`tipo_medicamento` (`id_tipo_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamento_categoria_medicamento1`
    FOREIGN KEY (`id_categoria_medicamento`)
    REFERENCES `saludlosalamos2`.`categoria_medicamento` (`id_categoria_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`historial_medicamento` (
  `id_historial_medicamento` INT NOT NULL AUTO_INCREMENT,
  `id_medicamento` INT NOT NULL,
  `id_estado_medicamento` INT NOT NULL,
  `stock_historial_medicamento` INT NOT NULL,
  PRIMARY KEY (`id_historial_medicamento`),
  INDEX `fk_historial_medicamento_estado_medicamento1_idx` (`id_estado_medicamento` ASC),
  INDEX `fk_historial_medicamento_medicamento1_idx` (`id_medicamento` ASC),
  CONSTRAINT `fk_historial_medicamento_estado_medicamento1`
    FOREIGN KEY (`id_estado_medicamento`)
    REFERENCES `saludlosalamos2`.`estado_medicamento` (`id_estado_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_medicamento_medicamento1`
    FOREIGN KEY (`id_medicamento`)
    REFERENCES `saludlosalamos2`.`medicamento` (`id_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`paciente` (
  `rut_paciente` VARCHAR(11) NOT NULL,
  `id_patologia` INT NOT NULL,
  `rut_funcionario` VARCHAR(11) NOT NULL,
  `nombres_paciente` VARCHAR(100) NOT NULL,
  `apellidos_paciente` VARCHAR(100) NOT NULL,
  `direccion_paciente` VARCHAR(100) NOT NULL,
  `telefono_paciente` VARCHAR(9) NOT NULL,
  `correo_paciente` VARCHAR(70) NOT NULL,
  `edad_paciente` DATE NOT NULL,
  PRIMARY KEY (`rut_paciente`),
  INDEX `fk_paciente_patologia1_idx` (`id_patologia` ASC),
  INDEX `fk_paciente_usuario1_idx` (`rut_funcionario` ASC),
  CONSTRAINT `fk_paciente_patologia1`
    FOREIGN KEY (`id_patologia`)
    REFERENCES `saludlosalamos2`.`patologia` (`id_patologia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_usuario1`
    FOREIGN KEY (`rut_funcionario`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`agendar_retiro_medicamento` (
  `id_retiro_med` INT NOT NULL AUTO_INCREMENT,
  `rut_paciente` VARCHAR(11) NOT NULL,
  `id_estado_resp_agenda` INT NOT NULL,
  `fecha_retiro` DATE NOT NULL,
  `fecha_respuesta_funcionario` DATE NULL,
  PRIMARY KEY (`id_retiro_med`),
  INDEX `fk_rertiro_medicamentos_paciente1_idx` (`rut_paciente` ASC),
  INDEX `fk_agendar_retiro_medicamento_estado_resp_agenda1_idx` (`id_estado_resp_agenda` ASC),
  CONSTRAINT `fk_rertiro_medicamentos_paciente1`
    FOREIGN KEY (`rut_paciente`)
    REFERENCES `saludlosalamos2`.`paciente` (`rut_paciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendar_retiro_medicamento_estado_resp_agenda1`
    FOREIGN KEY (`id_estado_resp_agenda`)
    REFERENCES `saludlosalamos2`.`estado_resp_agenda` (`id_estado_resp_agenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`solicitud_medicamento` (
  `id_solicitud_medicamento` INT NOT NULL AUTO_INCREMENT,
  `rut_paciente` VARCHAR(11) NOT NULL,
  `fecha_solicitud` DATETIME NOT NULL,
  `seguimiento` INT NOT NULL DEFAULT 0,
  INDEX `fk_paciente_has_usuario_paciente1_idx` (`rut_paciente` ASC) ,
  PRIMARY KEY (`id_solicitud_medicamento`),
  CONSTRAINT `fk_paciente_has_usuario_paciente1`
    FOREIGN KEY (`rut_paciente`)
    REFERENCES `saludlosalamos2`.`paciente` (`rut_paciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`historial_solicitud` (
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
    REFERENCES `saludlosalamos2`.`medicamento` (`id_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamento_has_solicitud_medicamento_solicitud_medicamento1`
    FOREIGN KEY (`id_solicitud_medicamento`)
    REFERENCES `saludlosalamos2`.`solicitud_medicamento` (`id_solicitud_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

    CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`libro_rsf` (
  `id_libro_rsf` INT NOT NULL AUTO_INCREMENT,
  `rut_solicitante` VARCHAR(11) NOT NULL,
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
  `tipo_telefonoprimario` ENUM('fijo', 'movil', 'laboral') NOT NULL,
  `telefono_primario` VARCHAR(15) NOT NULL,
  `tipo_telefonosecundario` ENUM('fijo', 'movil', 'laboral') NOT NULL,
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
    REFERENCES `saludlosalamos2`.`area` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_institucion1`
    FOREIGN KEY (`id_institucion`)
    REFERENCES `saludlosalamos2`.`institucion` (`id_institucion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_nacionalidad1`
    FOREIGN KEY (`id_nacionalidad`)
    REFERENCES `saludlosalamos2`.`nacionalidad` (`id_nacionalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_pueblos_indigenas1`
    FOREIGN KEY (`id_pueblos_indigenas`)
    REFERENCES `saludlosalamos2`.`pueblos_indigenas` (`id_pueblos_indigenas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_rsf_usuario1`
    FOREIGN KEY (`rut_funcionario`)
    REFERENCES `saludlosalamos2`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`imagen_libro_rsf` (
  `id_imagen_libro_rsf` INT NOT NULL AUTO_INCREMENT,
  `id_libro_rsf` INT NOT NULL,
  `nombre_imagen_libro_rsf` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_imagen_libro_rsf`),
  INDEX `fk_imagen_libro_rsf_libro_rsf1_idx` (`id_libro_rsf` ASC),
  CONSTRAINT `fk_imagen_libro_rsf_libro_rsf1`
    FOREIGN KEY (`id_libro_rsf`)
    REFERENCES `saludlosalamos2`.`libro_rsf` (`id_libro_rsf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


