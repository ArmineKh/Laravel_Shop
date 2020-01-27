/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100134
Source Host           : localhost:3306
Source Database       : base

Target Server Type    : MYSQL
Target Server Version : 100134
File Encoding         : 65001

Date: 2019-04-23 14:49:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for card
-- ----------------------------
DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`) USING BTREE,
  KEY `product_id` (`product_id`) USING BTREE,
  CONSTRAINT `card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `card_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of card
-- ----------------------------
INSERT INTO `card` VALUES ('13', '6', '1');
INSERT INTO `card` VALUES ('13', '7', '1');
INSERT INTO `card` VALUES ('29', '6', '5');
INSERT INTO `card` VALUES ('30', '6', '1');
INSERT INTO `card` VALUES ('30', '10', '2');
INSERT INTO `card` VALUES ('30', '12', '1');

-- ----------------------------
-- Table structure for note
-- ----------------------------
DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of note
-- ----------------------------

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notification
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sum` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('9', '2019-04-19 18:14:53', '120', '28', null);
INSERT INTO `order` VALUES ('10', '2019-04-19 18:37:28', '100', '28', null);
INSERT INTO `order` VALUES ('11', '2019-04-19 18:39:47', '500', '28', null);
INSERT INTO `order` VALUES ('12', '2019-04-19 18:53:04', '50', '28', null);
INSERT INTO `order` VALUES ('13', '2019-04-19 18:55:29', '100', '28', null);
INSERT INTO `order` VALUES ('14', '2019-04-23 12:24:45', '50', '30', 'Order was received');

-- ----------------------------
-- Table structure for order_detile
-- ----------------------------
DROP TABLE IF EXISTS `order_detile`;
CREATE TABLE `order_detile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `fedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_detile_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_detile_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_detile
-- ----------------------------
INSERT INTO `order_detile` VALUES ('11', '9', '5', '30', '3', null);
INSERT INTO `order_detile` VALUES ('12', '9', '6', '50', '3', null);
INSERT INTO `order_detile` VALUES ('13', '9', '7', '60', '2', null);
INSERT INTO `order_detile` VALUES ('14', '10', '7', '60', '3', null);
INSERT INTO `order_detile` VALUES ('15', '10', '9', '50', '2', null);
INSERT INTO `order_detile` VALUES ('16', '11', '6', '50', '1', null);
INSERT INTO `order_detile` VALUES ('17', '11', '8', '500', '1', null);
INSERT INTO `order_detile` VALUES ('18', '12', '6', '50', '1', null);
INSERT INTO `order_detile` VALUES ('19', '13', '6', '50', '2', null);
INSERT INTO `order_detile` VALUES ('20', '14', '6', '50', '1', null);

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `photos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of photos
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('5', 'Logeeyar Man Shirt  1', '30.00', '10', '5c98d4171e68f1553519639.jpg', '13', '0');
INSERT INTO `product` VALUES ('6', 'Logeeyar Man Shirt  2', '50.00', '40', '5c98d48ca24071553519756.jpg', '13', '0');
INSERT INTO `product` VALUES ('7', 'Logeeyar Man Shirt  3', '60.00', '10', '5c98d497a21421553519767.jpg', '13', '0');
INSERT INTO `product` VALUES ('8', 'Logeeyar Man Shirt  4', '500.00', '10', '5c98d4a1900451553519777.jpg', '13', '0');
INSERT INTO `product` VALUES ('9', 'Logeeyar Man Shirt  5', '50.00', '10', '5c98d4adb081e1553519789.jpg', '13', '0');
INSERT INTO `product` VALUES ('10', 'Sun glasses 1', '12.00', '15', '5cbead912f44c1556000145.jpg', '30', '0');
INSERT INTO `product` VALUES ('11', 'Sun glasses 2', '15.00', '20', '1556008485.jpg', '30', '0');
INSERT INTO `product` VALUES ('12', 'Sun glasses 3', '24.00', '10', '5cbeadf4bd6be1556000244.jpg', '30', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify` int(11) DEFAULT '0',
  `emailcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `blocktime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('11', 'Gevorg', 'Abrahamyan', '17', '$2y$10$iDNMWF7eCXh8GDoJ2t9JlOCjLyTg9VYHFMMPOA3852knTFh/9BAbG', 'narek-alaverdyan95@profit.com', '5c94e7262eb474c3010ac64018b1a6fbb5b39f71030e11553262374.jpg', '0', null, '', null);
INSERT INTO `users` VALUES ('12', 'Ani', 'Yan', '18', '$2y$10$ImDO.3gnRz6Iepi8OhDZ7uZpy2nN9u0WcnAU2Y3gxvRAzGBc0LKMa', 'c@mail.ru', '5c97ad0f304d19aa07e126655a7bc2d7fbe78b56902d11553444111.jpg', '0', null, '', null);
INSERT INTO `users` VALUES ('13', null, null, '19', '$2y$10$WKLm3nnfkt6I3p5P/vx7fOpR/acp4ZBtT2AZ.h9zcxVrzNQNBhxiq', 'b@mail.ru', '5c94e7262eb474c3010ac64018b1a6fbb5b39f71030e11553262374.jpg', '1', '11a42813ea4b29ecdd66af12fb052e7f', '', null);
INSERT INTO `users` VALUES ('24', 'Tom', 'Zulalyan', '20', '$2y$10$LAni9R1XdUG9qrBCSLntV.imzBTPD8l8cTm7lXW6BCw8dx5NGj.dS', 'david-t@profit.com', '5c97ad0f304d19aa07e126655a7bc2d7fbe78b56902d11553444111.jpg', '0', null, '', null);
INSERT INTO `users` VALUES ('28', 'Tom', 'Zulalyan', '21', '$2y$10$A1cLHL6ZYdfNB/2wchNIWeGrNMnC3eoj4Tfibc/eNeX.TZ52Ez6OG', 'a@gmail.com', '5c97ad0f304d19aa07e126655a7bc2d7fbe78b56902d11553444111.jpg', '1', null, '', null);
INSERT INTO `users` VALUES ('29', null, null, null, '$2y$10$yNLqgWQc3sDg0gOAE5LTHeZgxBP3.fowWOdLSz1uQUV4pE7uQ0K6C', null, '5cb72536164da4b0474cfacd2a991400d7c072b9ffc0c1555506486.jpg', '1', null, '', null);
INSERT INTO `users` VALUES ('30', 'Ani', 'Martirosyan', null, '$2y$10$fMzN0Fj6l2McUzlHyrbqKOXPQvV4pzR26XOfwDNJ4/bKsVu382NEy', 'ani@gmail.com', '5cbece56d3048dbee3d464e6b06e6897fa45605a9b8191556008534.jpg', '1', null, 'admin', null);

-- ----------------------------
-- Table structure for wishlist
-- ----------------------------
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(55) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of wishlist
-- ----------------------------
INSERT INTO `wishlist` VALUES ('30', '11', '1');
SET FOREIGN_KEY_CHECKS=1;
