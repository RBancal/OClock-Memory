CREATE TABLE IF NOT EXISTS `game`
(
    `id`          INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `date`        DATETIME NOT NULL,
    `utilisateur` VARCHAR(30),
    `level`       INT(1)   NOT NULL,
    `win`         BOOLEAN  NOT NULL,
    `temps`       INTEGER
    ) ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

INSERT INTO `game`(`id`, `date`, `utilisateur`, `level`, `win`, `temps`)
VALUES (1, CURRENT_DATE, 'K4rt00n', 3, true, 60),
       (2, CURRENT_DATE, 'K4rt00n', 2, true, 40),
       (3, CURRENT_DATE, 'K4rt00n', 1, true, 20);
