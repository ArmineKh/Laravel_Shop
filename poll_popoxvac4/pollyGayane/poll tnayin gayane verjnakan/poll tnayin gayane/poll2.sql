/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : poll2

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2019-02-15 18:11:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for harc
-- ----------------------------
DROP TABLE IF EXISTS `harc`;
CREATE TABLE `harc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `harc` varchar(55) NOT NULL,
  `activ` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of harc
-- ----------------------------
INSERT INTO `harc` VALUES ('1', 'asd', '0');
INSERT INTO `harc` VALUES ('2', 'Hello', '0');
INSERT INTO `harc` VALUES ('3', 'Hello', '0');
INSERT INTO `harc` VALUES ('4', 'Hello', '0');
INSERT INTO `harc` VALUES ('5', 'Hello', '0');
INSERT INTO `harc` VALUES ('6', 'ggg', '0');
INSERT INTO `harc` VALUES ('7', 'Hello', '0');

-- ----------------------------
-- Table structure for patasxan
-- ----------------------------
DROP TABLE IF EXISTS `patasxan`;
CREATE TABLE `patasxan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patasxan` varchar(55) NOT NULL,
  `harc_id` int(11) NOT NULL,
  `miavor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `harc_id` (`harc_id`),
  CONSTRAINT `patasxan_ibfk_1` FOREIGN KEY (`harc_id`) REFERENCES `harc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of patasxan
-- ----------------------------
INSERT INTO `patasxan` VALUES ('1', 'a', '2', '0');
INSERT INTO `patasxan` VALUES ('2', 'b', '2', '0');
INSERT INTO `patasxan` VALUES ('3', 'a', '3', '0');
INSERT INTO `patasxan` VALUES ('4', 'b', '3', '0');
INSERT INTO `patasxan` VALUES ('5', 'a', '4', '0');
INSERT INTO `patasxan` VALUES ('6', 'b', '4', '0');
INSERT INTO `patasxan` VALUES ('7', 'asd', '5', '0');
INSERT INTO `patasxan` VALUES ('8', 'qsw', '5', '0');
INSERT INTO `patasxan` VALUES ('9', 'yh', '6', '0');
INSERT INTO `patasxan` VALUES ('10', 'lik', '6', '0');
INSERT INTO `patasxan` VALUES ('11', 'nmh', '7', '0');
INSERT INTO `patasxan` VALUES ('12', 'gtj', '7', '0');
SET FOREIGN_KEY_CHECKS=1;
