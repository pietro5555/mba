-- Crear tabla evenst
CREATE TABLE `mba`.`events` ( `id` INT NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,  `date` DATETIME NOT NULL ,  `type` VARCHAR(100) NULL ,  `url_streaming` VARCHAR(255) NULL ,  `url_video` VARCHAR(255) NULL ,`status` VARCHAR(50) NOT NULL ,  `user_id` INT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,  PRIMARY KEY  (`id`)) ENGINE = InnoDB;


-- Crear tabla event_content
CREATE TABLE `mba`.`event_content` ( `id` INT NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,  `type` VARCHAR(100) NULL ,  `url` VARCHAR(255) NULL ,  `event_id` INT NOT NULL , `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,   PRIMARY KEY  (`id`)) ENGINE = InnoDB;


-- Crear tabla survey_options
CREATE TABLE `mba`.`survey_options` ( `id` INT NOT NULL AUTO_INCREMENT ,  `question` TEXT NOT NULL ,  `content_event_id` INT NOT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;


-- Crear tabla survey_options_response
CREATE TABLE `mba`.`survey_options_response` ( `id` INT NOT NULL AUTO_INCREMENT ,  `response` TEXT NOT NULL ,  `survey_options_id` INT NOT NULL ,  `user_id` INT NOT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;