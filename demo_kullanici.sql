/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50136
Source Host           : localhost:3306
Source Database       : tutorials

Target Server Type    : MYSQL
Target Server Version : 50136
File Encoding         : 65001

Date: 2010-11-06 01:09:00
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `demo_kullanici`
-- ----------------------------
DROP TABLE IF EXISTS `demo_kullanici`;
CREATE TABLE `demo_kullanici` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(20) NOT NULL,
  `parola` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of demo_kullanici
-- ----------------------------
