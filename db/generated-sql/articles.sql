
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- articles.accounts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `articles`.`accounts`;

CREATE TABLE `articles`.`accounts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ccount_number` VARCHAR(3),
    `balance` VARCHAR(5),
    `firstname` VARCHAR(11),
    `lastname` VARCHAR(11),
    `age` VARCHAR(2),
    `gender` VARCHAR(1),
    `address` VARCHAR(24),
    `employer` VARCHAR(12),
    `email` VARCHAR(32),
    `city` VARCHAR(18),
    `state` VARCHAR(2),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- articles.articles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `articles`.`articles`;

CREATE TABLE `articles`.`articles`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_id` INTEGER NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `author_id` (`author_id`),
    CONSTRAINT `articles_ibfk_1`
        FOREIGN KEY (`author_id`)
        REFERENCES `articles`.`author` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- articles.author
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `articles`.`author`;

CREATE TABLE `articles`.`author`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `author_name` (`author_name`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
