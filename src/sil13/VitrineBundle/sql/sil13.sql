/*
Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : sil13

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-02-06 11:01:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_sold_out` tinyint(1) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marque` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `is_disabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E6612469DE2` (`category_id`),
  CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('3', 'Leffe Royale White Breads', 'La Leffe Royale Whitbread Golding est une bière d’un raffinement pur. Sa robe blonde, son amertume délicate aux notes citronnées et résineuses ainsi que ses arômes fleuris définissent à eux seuls la finesse de son caractère. Pour apprécier tout le savoir-', '0', '1', 'leffe_royale_golding_ogive_2_2', 'Leffe', '5', '0');
INSERT INTO `article` VALUES ('4', 'Leffe Royale Cascade IPA', 'La Leffe Royale Cascade se démarque par son caractère vif, sa fraîcheur intense et ses notes d’agrumes délicates (citron et pamplemousse jaune). Houblonnée à cru, cette bière à la robe dorée est une véritable IPA, (une «Indian Pale Ale» est une bière à forte teneur en houblon) de connaisseurs. Pour apprécier tout le savoir-faire de notre maître-brasseur, dégustez la Cascade IPA dans son verre calice de Leffe Royale.', '0', '1', 'leffe_royale_cascade_ogive_2_1', 'Leffe', '5', '0');
INSERT INTO `article` VALUES ('5', 'Leffe Royale Mapuche', 'La Leffe Royale Mapuche est gorgée du soleil d’Amérique du Sud. Brassée avec la technique du houblonnage à cru, son caractère complexe, sa robe cuivrée, son amertume raffinée et ses saveurs épicées sont comme un compliment à la perfection. Elle dégage alors des notes de fruits des bois et de fruits rouges ainsi que de pêche et d’abricot. Pour apprécier tout le savoir-faire de notre maître-brasseur, dégustez la Mapuche dans son verre calice de Leffe Royale.', '1', '1', 'leffe_royale_mapuche_ogive_2', 'Leffe', '5', '0');
INSERT INTO `article` VALUES ('6', 'Leffe Royale Mount Hood', 'Provenant du houblon Mount Hood, originaire de l’Oregon, et créée en Edition Hivernale, la Leffe Royale Mount Hood présente une palette de saveurs flamboyantes, aux notes délicatement épicées avec des accents caramélisés et grillés. La touche finale subtilement épicée du clou de girofle, typique de Leffe, fait de cette Royale Mount Hood à la robe rouge-brun chaleureuse, la Leffe parfaite pour s’accorder à l’automne et l’hiver.', '0', '4', 'leffe_mount_hood_ogive', 'Leffe', '5', '0');
INSERT INTO `article` VALUES ('7', 'Leffe Royale Crystal', 'Une nouvelle Leffe Royale à la mesure du printemps et de l’été.C’est sur la Côte Ouest des États-Unis que le houblon Crystal a été cultivé et ensuite sélectionné avec soin par nos maîtres-brasseurs. La Leffe Royale Crystal délivre des arômes aux accents tropicaux de fruits de la passion, de pêches, d’abricots et d’oranges. Son goût riche et délicat est harmonisé subtilement à son amertume raffinée grâce à son brassage suivant la technique du houblonnage à cru. Appréciez-la dans son verre Leffe Royale pour découvrir toutes ses subtilités.', '1', '4', 'leffe_crystal_ogive_1', 'Leffe', '4', '0');
INSERT INTO `article` VALUES ('8', 'Leffe Blonde', 'Leffe Blonde est une authentique bière blonde d’Abbaye à la douce amertume qui se savoure à tout moment de la journée.', '0', '4', 'blonde_3', 'Leffe', '3', '0');
INSERT INTO `article` VALUES ('9', 'Leffe Brune', 'Leffe Brune est une authentique bière d’Abbaye à la belle robe acajou et à la saveur pleine et légèrement sucrée qui fait de chaque gorgée un moment d’exception. Une couleur et une saveur uniques provenant de l’utilisation de malt torréfié.', '0', '5', 'brune_3', 'Leffe', '3', '0');
INSERT INTO `article` VALUES ('10', 'Leffe Radieuse', 'Leffe Radieuse est une bière d’Abbaye ambrée, riche en arômes et délicieusement raffinée. Très complexe, c’est une bière appréciée tout particulièrement des connaisseurs.', '1', '7', 'radieuse_3', 'Leffe', '3', '0');
INSERT INTO `article` VALUES ('11', 'Leffe Triple', 'Leffe Triple est une authentique bière blonde d’Abbaye de caractère qui, grâce à la présence de levure, a bénéficié d’une refermentation en bouteille. Elle offre un arôme riche et nuancé.', '0', '4', 'triple_3', 'Leffe', '3', '0');
INSERT INTO `article` VALUES ('12', 'Leffe Ruby', 'Leffe Ruby est une bière rouge rafraîchissante née de la rencontre unique entre les saveurs typiques de la bière d’Abbaye et la délicatesse des arômes boisés de fruits rouges.', '1', '7', 'ruby_2', 'Leffe', '3', '0');
INSERT INTO `article` VALUES ('13', 'Leffe Rituel', 'Leffe Rituel 9° est une bière de haute fermentation à la belle robe cuivrée. Ses arômes puissants lui donnent tout son caractère racé et prononcé.', '1', '6', 'triple_3', 'Leffe', '4', '0');
INSERT INTO `article` VALUES ('14', 'Leffe Nectar', 'Leffe Nectar est une bière blonde orangée aromatisée au miel. Douce et rafraîchissante elle se caractérise par une pointe d’acidité et dégage une véritable profusion d’arômes.', '1', '7', 'nectar_3', 'Leffe', '5', '0');
INSERT INTO `article` VALUES ('15', 'Leffe Christmas', 'Leffe de Noël est une bière spéciale qui se savoure chaque année à la période des fêtes. Avec son bouquet fruité et épicé, c’est une bière pleine de caractère qui réchauffe le cœur.', '1', '1', 'christmas_3', 'Leffe', '5', '1');

-- ----------------------------
-- Table structure for buy_order
-- ----------------------------
DROP TABLE IF EXISTS `buy_order`;
CREATE TABLE `buy_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `validate_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C70F6927A76ED395` (`user_id`),
  CONSTRAINT `FK_C70F6927A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Autre');
INSERT INTO `category` VALUES ('2', 'Speciales');
INSERT INTO `category` VALUES ('3', 'Noel');
INSERT INTO `category` VALUES ('4', 'Blonde');
INSERT INTO `category` VALUES ('5', 'Brune');
INSERT INTO `category` VALUES ('6', 'Ambrée');
INSERT INTO `category` VALUES ('7', 'Fruitée');

-- ----------------------------
-- Table structure for fos_user
-- ----------------------------
DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fos_user
-- ----------------------------
INSERT INTO `fos_user` VALUES ('1', 'admin', 'admin', 'admin@ebuy.com', 'admin@ebuy.com', '1', null, '$2y$13$nMibHDCiWP2as0iQvJAJZOCh128GDJNMxFrMEon//mf9dAQQooc3K', '2017-02-05 20:26:07', null, null, 'a:2:{i:0;s:5:\"ADMIN\";i:1;s:10:\"ROLE_ADMIN\";}');
INSERT INTO `fos_user` VALUES ('2', 'user', 'user', 'user@ebuy.com', 'user@ebuy.com', '1', null, '$2y$13$4CtKe.LXp.yZWJrz8uoDpuZ4aRaE43fy/yC54y1dvklUna70ympN.', null, null, null, 'a:0:{}');
INSERT INTO `fos_user` VALUES ('3', 'toto', 'toto', 'toto@llll.com', 'toto@llll.com', '1', null, '$2y$13$FDJD70NVNKleU8ybMAvquezc/to/HUgSI2/sZ/0VB6asgb8M6c73G', '2017-01-29 15:45:25', null, null, 'a:0:{}');

-- ----------------------------
-- Table structure for order_line
-- ----------------------------
DROP TABLE IF EXISTS `order_line`;
CREATE TABLE `order_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `buy_order_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9CE58EE17294869C` (`article_id`),
  KEY `IDX_9CE58EE17FC358ED` (`buy_order_id`),
  CONSTRAINT `FK_9CE58EE17294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  CONSTRAINT `FK_9CE58EE17FC358ED` FOREIGN KEY (`buy_order_id`) REFERENCES `buy_order` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
