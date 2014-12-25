SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `raneros`.`album`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`album` (
  `idAlbum` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idAlbum`) ,
  UNIQUE INDEX `idAlbum_UNIQUE` (`idAlbum` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `raneros`.`evento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`evento` (
  `idEvento` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(500) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `portada` VARCHAR(400) NOT NULL ,
  `album_idAlbum` INT(11) NOT NULL ,
  PRIMARY KEY (`idEvento`, `album_idAlbum`) ,
  UNIQUE INDEX `idEvento_UNIQUE` (`idEvento` ASC) ,
  INDEX `fk_evento_album1_idx` (`album_idAlbum` ASC) ,
  CONSTRAINT `fk_evento_album1`
    FOREIGN KEY (`album_idAlbum` )
    REFERENCES `raneros`.`album` (`idAlbum` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `raneros`.`foto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`foto` (
  `idFoto` INT(11) NOT NULL AUTO_INCREMENT ,
  `foto` VARCHAR(400) NULL DEFAULT NULL ,
  `album_idAlbum` INT(11) NOT NULL ,
  PRIMARY KEY (`idFoto`) ,
  UNIQUE INDEX `idFoto_UNIQUE` (`idFoto` ASC) ,
  INDEX `fk_foto_album1_idx` (`album_idAlbum` ASC) ,
  CONSTRAINT `fk_foto_album1`
    FOREIGN KEY (`album_idAlbum` )
    REFERENCES `raneros`.`album` (`idAlbum` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `raneros`.`tipotapa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`tipotapa` (
  `idTipoTapa` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipoTapa`) ,
  UNIQUE INDEX `idTipoTapa_UNIQUE` (`idTipoTapa` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `raneros`.`tapa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`tapa` (
  `idTapa` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(500) NOT NULL ,
  `tipoTapa_idTipoTapa` INT(11) NOT NULL ,
  PRIMARY KEY (`idTapa`) ,
  UNIQUE INDEX `idTapa_UNIQUE` (`idTapa` ASC) ,
  INDEX `fk_tapa_tipoTapa1_idx` (`tipoTapa_idTipoTapa` ASC) ,
  CONSTRAINT `fk_tapa_tipoTapa1`
    FOREIGN KEY (`tipoTapa_idTipoTapa` )
    REFERENCES `raneros`.`tipotapa` (`idTipoTapa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `raneros`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`usuario` (
  `idusuarios` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `apellidos` VARCHAR(45) NULL DEFAULT NULL ,
  `nick` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `esRoot` TINYINT(1) NOT NULL DEFAULT '0' ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`idusuarios`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `raneros`.`comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`comentario` (
  `idcomentario` INT(11) NOT NULL AUTO_INCREMENT ,
  `comentario` VARCHAR(500) NOT NULL ,
  `usuario_idusuarios` INT(11) NOT NULL ,
  `evento_idEvento` INT(11) NOT NULL ,
  `tapa_idTapa` INT(11) NOT NULL ,
  `foto_idFoto` INT(11) NOT NULL ,
  PRIMARY KEY (`idcomentario`) ,
  INDEX `fk_cometario_usuario1_idx` (`usuario_idusuarios` ASC) ,
  INDEX `fk_cometario_evento1_idx` (`evento_idEvento` ASC) ,
  INDEX `fk_cometario_tapa1_idx` (`tapa_idTapa` ASC) ,
  INDEX `fk_cometario_foto1_idx` (`foto_idFoto` ASC) ,
  CONSTRAINT `fk_cometario_evento1`
    FOREIGN KEY (`evento_idEvento` )
    REFERENCES `raneros`.`evento` (`idEvento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cometario_foto1`
    FOREIGN KEY (`foto_idFoto` )
    REFERENCES `raneros`.`foto` (`idFoto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cometario_tapa1`
    FOREIGN KEY (`tapa_idTapa` )
    REFERENCES `raneros`.`tapa` (`idTapa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cometario_usuario1`
    FOREIGN KEY (`usuario_idusuarios` )
    REFERENCES `raneros`.`usuario` (`idusuarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `raneros`.`menu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `raneros`.`menu` (
  `idMenu` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `url` VARCHAR(300) NOT NULL ,
  `soloRoot` TINYINT(1) NOT NULL DEFAULT '1' ,
  `usuario_idusuarios` INT(11) NOT NULL ,
  PRIMARY KEY (`idMenu`) ,
  INDEX `fk_menu_usuario1_idx` (`usuario_idusuarios` ASC) ,
  CONSTRAINT `fk_menu_usuario1`
    FOREIGN KEY (`usuario_idusuarios` )
    REFERENCES `raneros`.`usuario` (`idusuarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
