DROP TABLE IF EXISTS `pfe`.users ;

CREATE TABLE `pfe`.`users` (
    `UserID` INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `Username` VARCHAR(65) NOT NULL ,
    `Password` VARCHAR(32) NOT NULL ,
    `EmailAddress` VARCHAR(255) NOT NULL,
    `Categories` VARCHAR(65) NULL
);

DROP TABLE IF EXISTS `pfe`.article_list;
CREATE TABLE `pfe`.`article_list` (
    `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
    `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
    `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `date` DATE NOT NULL,
    `rate_historic` varchar(255),
    `number_rate` int(11),
    `rate` int(11),
    `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `vignette_url` MEDIUMTEXT COLLATE utf8_unicode_ci,
    `resume` MEDIUMTEXT COLLATE utf8_unicode_ci,
    `content` TEXT COLLATE utf8_unicode_ci, 
    `rating` int(11)
);

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'fugiat','michel','2017-12-13',NULL ,NULL, 'animals', 'img/1.jpg','ah bah oui', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'parabout','jean-mi','2017-05-12',NULL ,NULL, 'computer-science', 'img/2.jpg','ah bah non', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'mounboots','clara','2017-09-02',NULL ,NULL, 'house', 'img/3.jpg','ah bah peut etre', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'jojolabricot','clara','2017-05-25',NULL ,NULL, 'kids', 'img/4.jpg','ah bah dsadsa', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

INSERT INTO `pfe`.article_list (`id`, `title`,`author`,`date`,`rate`,`number_rate`,`category`,`vignette_url`,`resume`,`content`)
VALUES (NULL, 'loreneipsips','urabnfoot','2017-10-05',NULL ,NULL, 'health', 'img/5.jpg','ah baaaaah oui', '<div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
    `id` int(255) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `imageURLL` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `imageURLL`) VALUES
(1, 'animals', 'img/categories/animals.png'),
(2, 'computer-science', 'img/categories/computer-science.jpg'),
(3, 'health', 'img/categories/health.jpg'),
(4, 'house', 'img/categories/house.jpg'),
(5, 'kids', 'img/categories/kids.jpg'),
(6, 'travels', 'img/categories/travels.jpg'),
(7, 'politic', 'img/categories/politic.jpg'),
(8, 'network', 'img/categories/network.jpg'),
(9, 'mathematics', 'img/categories/mathematics.jpg'),
(10, 'physics', 'img/categories/physics.jpg'),
(11, 'gaming', 'img/categories/gaming.jpg'),
(12, 'film', 'img/categories/film.jpg'),
(13, 'books', 'img/categories/books.jpg'),
(14, 'youtube', 'img/categories/youtube.jpg'),
(15, 'art', 'img/categories/art.jpg'),
(16, 'sport', 'img/categories/sport.jpg'),
(17, 'finance', 'img/categories/finance.jpg'),
(18, 'architecture', 'img/categories/architecture.jpg'),
(19, 'music', 'img/categories/music.jpg'),
(20, 'mode', 'img/categories/mode.jpg');


DROP TABLE IF EXISTS `pfe`.historic;
CREATE TABLE `pfe`.`historic` (
    `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
    `UserID` INT(25),
    `rating` int(11),
    `articleId` int(11),
    `date` datetime

);
