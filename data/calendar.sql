
CREATE TABLE IF NOT EXISTS `mydb`.`clndr_user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `username` VARCHAR(128) NOT NULL COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `surname` VARCHAR(45) NOT NULL COMMENT '',
  `password` VARCHAR(255) NOT NULL COMMENT '',
  `salt` VARCHAR(255) NOT NULL COMMENT '',
  `access_token` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `username_UNIQUE` (`username` ASC)  COMMENT '',
  UNIQUE INDEX `access_token_UNIQUE` (`access_token` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`clndr_calendar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`clndr_calendar` ;

CREATE TABLE IF NOT EXISTS `mydb`.`clndr_calendar` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `text` TEXT NOT NULL COMMENT '',
  `creator` INT NOT NULL COMMENT '',
  `date_event` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_evrnt_note_1_idx` (`creator` ASC)  COMMENT '',
  CONSTRAINT `fk_evrnt_note_1`
    FOREIGN KEY (`creator`)
    REFERENCES `mydb`.`clndr_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`clndr_access`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`clndr_access` ;

CREATE TABLE IF NOT EXISTS `mydb`.`clndr_access` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_owner` INT NOT NULL COMMENT '',
  `user_guest` INT NOT NULL COMMENT '',
  `date` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_clndr_access_1_idx` (`user_owner` ASC)  COMMENT '',
  INDEX `fk_clndr_access_2_idx` (`user_guest` ASC)  COMMENT '',
  CONSTRAINT `fk_clndr_access_1`
    FOREIGN KEY (`user_owner`)
    REFERENCES `mydb`.`clndr_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clndr_access_2`
    FOREIGN KEY (`user_guest`)
    REFERENCES `mydb`.`clndr_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;