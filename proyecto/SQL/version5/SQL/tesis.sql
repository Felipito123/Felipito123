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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`region` (
  `id_region` INT NOT NULL AUTO_INCREMENT,
  `nombre_region` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_region`))
ENGINE = InnoDB
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`sector` (
  `id_sector` INT NULL AUTO_INCREMENT,
  `nombre_sector` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_sector`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`cargo` (
  `id_cargo` INT NOT NULL AUTO_INCREMENT,
  `nombre_cargo` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_cargo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`etapas_spe` (
  `id_etapas_spe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_etapas_spe` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_etapas_spe`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`decision_spe` (
  `id_decision_spe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_decision_spe` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_decision_spe`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`motivo_pe` (
  `id_mpe` INT NOT NULL AUTO_INCREMENT,
  `descripcion_mpe` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_mpe`))
ENGINE = InnoDB
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`usuario` (
  `rut` VARCHAR(11) NOT NULL,
  `id_rol` INT NOT NULL,
  `id_comuna` INT NOT NULL,
  `id_cargo` INT NOT NULL,
  `id_sector` INT NULL,
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
  INDEX `fk_usuario_rol_idx` (`id_rol` ASC) ,
  INDEX `fk_usuario_comuna1_idx` (`id_comuna` ASC) ,
  INDEX `fk_usuario_sector1_idx` (`id_sector` ASC) ,
  INDEX `fk_usuario_cargo1_idx` (`id_cargo` ASC) ,
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
    ON UPDATE NO ACTION)
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`categoria_articulo` (
  `id_categoria_articulo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria_articulo` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_categoria_articulo`))
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`categoria_odonto` (
  `id_categoria_odonto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria_odonto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categoria_odonto`))
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`contacto` (
  `id_contacto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_contacto` VARCHAR(50) NOT NULL,
  `correo_contacto` VARCHAR(100) NOT NULL,
  `telefono_contacto` VARCHAR(13) NOT NULL,
  `asunto_contacto` VARCHAR(60) NOT NULL,
  `descripcion_contacto` LONGTEXT NOT NULL,
  PRIMARY KEY (`id_contacto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`testimonios` (
  `id_testimonios` INT NOT NULL AUTO_INCREMENT,
  `genero_testimonios` ENUM('F', 'M') NOT NULL,
  `nombre_testimonios` VARCHAR(150) NOT NULL,
  `comentario_testimonios` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_testimonios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;











CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`tipo_medicamento` (
  `id_tipo_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_tipo_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_tipo_medicamento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`categoria_medicamento` (
  `id_categoria_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_categoria_medicamento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`estado_medicamento` (
  `id_estado_medicamento` INT NOT NULL AUTO_INCREMENT,
  `nombre_estado_medicamento` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_estado_medicamento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`patologia` (
  `id_patologia` INT NOT NULL AUTO_INCREMENT,
  `nombre_patologia` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_patologia`))
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `saludlosalamos2`.`paciente` (
  `rut_paciente` VARCHAR(11) NOT NULL,
  `id_patologia` INT NOT NULL,
  `nombres_paciente` VARCHAR(100) NOT NULL,
  `apellidos_paciente` VARCHAR(100) NOT NULL,
  `direccion_paciente` VARCHAR(100) NOT NULL,
  `telefono_paciente` VARCHAR(9) NOT NULL,
  `correo_paciente` VARCHAR(70) NOT NULL,
  `edad_paciente` DATE NOT NULL,
  PRIMARY KEY (`rut_paciente`),
  INDEX `fk_paciente_1_idx` (`id_patologia` ASC) ,
  CONSTRAINT `fk_paciente_patologia1`
    FOREIGN KEY (`id_patologia`)
    REFERENCES `saludlosalamos2`.`patologia` (`id_patologia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
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
ENGINE = InnoDB
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
