DROP TABLE IF EXISTS `pfe`.article_list ;

CREATE TABLE `pfe`.`users` (
`UserID` INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Username` VARCHAR(65) NOT NULL ,
`Password` VARCHAR(32) NOT NULL ,
`EmailAddress` VARCHAR(255) NOT NULL
);

CREATE TABLE `pfe`.`article_list` (
    `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
    `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
    `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `date` DATE NOT NULL,
    `rate` int(11),
    `number_rate` int(11),
    `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `vignette_url` MEDIUMTEXT COLLATE utf8_unicode_ci,
    `resume` MEDIUMTEXT COLLATE utf8_unicode_ci,
    `content` TEXT COLLATE utf8_unicode_ci 
);

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'fugiat','michel','2017-12-13',NULL ,NULL, 'Network', 'img/1.jpg','ah bah oui', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'parabout','jean-mi','2017-05-12',NULL ,NULL, 'Politics', 'img/2.jpg','ah bah non', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'mounboots','clara','2017-09-02',NULL ,NULL, 'Network', 'img/3.jpg','ah bah peut etre', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'jojolabricot','clara','2017-05-25',NULL ,NULL, 'Network', 'img/4.jpg','ah bah dsadsa', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'loreneipsips','urabnfoot','2017-10-05',NULL ,NULL, 'Network', 'img/5.jpg','ah baaaaah oui', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

CREATE TABLE `pfe`.`categories` (
`id` INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR(255) NOT NULL ,
`imageURLL` VARCHAR(255) NOT NULL
);

INSERT INTO `pfe`.categories (`id`, `name`,`imageURLL`)
VALUES (NULL, 'animals','img/categories/animals.png');

INSERT INTO `pfe`.categories (`id`, `name`,`imageURLL`)
VALUES (NULL, 'computer-science','img/categories/computer-science.jpg');

INSERT INTO `pfe`.categories (`id`, `name`,`imageURLL`)
VALUES (NULL, 'health','img/categories/health.jpg');

INSERT INTO `pfe`.categories (`id`, `name`,`imageURLL`)
VALUES (NULL, 'house','img/categories/house.jpg');

INSERT INTO `pfe`.categories (`id`, `name`,`imageURLL`)
VALUES (NULL, 'kids','img/categories/kids.jpg');

INSERT INTO `pfe`.categories (`id`, `name`,`imageURLL`)
VALUES (NULL, 'travels','img/categories/travels.jpg');