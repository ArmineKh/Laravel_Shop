/*
Navicat MySQL Data Transfer

Source Server         : MyConnection
Source Server Version : 100137
Source Host           : localhost:3306
Source Database       : laravel-basics

Target Server Type    : MYSQL
Target Server Version : 100137
File Encoding         : 65001

Date: 2019-06-26 22:54:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `my_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `is_friend` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of friends
-- ----------------------------

-- ----------------------------
-- Table structure for likes
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of likes
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2019_05_16_181135_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2019_05_22_160444_create_posts_table', '2');
INSERT INTO `migrations` VALUES ('3', '2019_05_26_164857_create_likes_table', '3');
INSERT INTO `migrations` VALUES ('4', '2019_05_27_163118_create_friends_table', '4');
INSERT INTO `migrations` VALUES ('5', '2019_05_27_172008_create_requests_table', '5');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('5', '2019-05-22 17:39:53', '2019-05-22 17:39:53', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '27');
INSERT INTO `posts` VALUES ('6', '2019-05-22 17:40:07', '2019-05-22 17:40:07', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '27');
INSERT INTO `posts` VALUES ('7', '2019-05-22 19:16:27', '2019-05-22 19:16:27', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '21');
INSERT INTO `posts` VALUES ('8', '2019-05-22 19:16:41', '2019-05-22 19:16:41', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '21');
INSERT INTO `posts` VALUES ('10', '2019-05-22 19:40:47', '2019-05-22 19:40:47', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '26');
INSERT INTO `posts` VALUES ('11', '2019-05-23 19:36:15', '2019-05-23 21:57:11', 'A new post....The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from', '26');
INSERT INTO `posts` VALUES ('12', '2019-05-23 20:55:30', '2019-05-24 18:15:46', 'New post', '26');
INSERT INTO `posts` VALUES ('13', '2019-06-21 14:39:03', '2019-06-21 14:39:19', 'The standard chunk of Ipsum used since the 1500s is reproduced below for those interested.', '20');

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `my_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_requered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of requests
-- ----------------------------
INSERT INTO `requests` VALUES ('1', null, null, '20', '21', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('20', '2019-05-16 21:27:17', '2019-06-25 17:08:29', 'a@mail.ru', 'Arm', '$2y$10$yyDiVO90U7yIkViFl3fPweNdT0epA75iOwyysCbwTwZ6KGAiuJBhq', null, 'Arm-20.jpg');
INSERT INTO `users` VALUES ('21', '2019-05-16 21:27:41', '2019-06-06 12:33:08', 'b@mail.ru', 'Max', '$2y$10$pXbjwXv3Duvt37ixVS0bF.DN303pOu7umGOI7GRZg9mBr/nH67an6', null, 'Max-21.jpg');
INSERT INTO `users` VALUES ('22', '2019-05-17 08:08:34', '2019-06-25 17:11:03', 'c@mail.ru', 'Max', '$2y$10$C/S.NeCgpf.dQedaAWC7e.ArRocIiqMav5HnHfPE9CpUU.tuVetGq', null, 'Max-22.jpg');
INSERT INTO `users` VALUES ('26', '2019-05-17 09:10:52', '2019-05-27 17:24:36', 'k@mail.ru', 'Test', '$2y$10$U.3rK4A4C7G.uAaKogYoZuijIJW68/W0svMESH1BHgORPtwLjoTue', null, 'Test-26.jpg');
INSERT INTO `users` VALUES ('27', '2019-05-22 12:34:36', '2019-05-26 15:27:29', 'f@mail.ru', 'Arm', '$2y$10$OoRknVHvVE33PdxiVHdenOkJv5I59zgRzV7PY7DfMMX1ul2b13wi2', null, 'Arm-27.jpg');
SET FOREIGN_KEY_CHECKS=1;
