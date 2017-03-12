/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dinhtrung

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-17 11:36:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`admin`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'tavanchinh', 'P8URzOVzgoYuiSp8zIgjnB2dmJvoxY3s', '$2y$13$eUoz3JTgsAVNC8LnKJxkCegd.e/gIhW6ti88k9OAvnU4x4QHpVac2', null, 'chinh.tv91@gmail.com', '1', '1477461682', '1477800670');
INSERT INTO `admin` VALUES ('2', 'maingochoa', '', '$2y$13$SwATDEKqXImRpp7fxmbquObBZmZCgdtPxrV9mxZVgCfiPAaYxc3uS', null, '', '0', '1481447814', '1481447814');

-- ----------------------------
-- Table structure for admin_group
-- ----------------------------
DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE `admin_group` (
  `admin_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_group
-- ----------------------------
INSERT INTO `admin_group` VALUES ('1', '1');
INSERT INTO `admin_group` VALUES ('2', '1');

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('1', 'Red hot cake', 'http://photo.depvd.com/15/305/07/ph_yrq41GvoNN_OLzjhH19C0_wi.jpg', '1', '2016-12-02 15:43:40');
INSERT INTO `album` VALUES ('2', 'Body quá chuẩn :x', 'http://photo.depvd.com/13/117/18/ph_o1SJotZgie_BMRzSVqU_wi.jpg', '1', '2016-12-02 15:50:29');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `position` int(255) DEFAULT '888',
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Phiêu lưu -  Hành động', '0', '3', '1');
INSERT INTO `category` VALUES ('2', 'Khoa Học - Viễn Tưởng', '0', '6', '1');
INSERT INTO `category` VALUES ('3', 'Tài Liệu - Khám Phá', '0', '8', '1');
INSERT INTO `category` VALUES ('4', 'Võ Thuật - Kiếm Hiệp', '0', '2', '1');
INSERT INTO `category` VALUES ('5', 'Kinh Dị - Ma', '0', '12', '1');
INSERT INTO `category` VALUES ('6', 'Cổ Trang - Thần Thoại', '0', '1', '1');
INSERT INTO `category` VALUES ('7', 'Hình Sự - Chiến Tranh', '0', '7', '1');
INSERT INTO `category` VALUES ('51', 'Tâm Lý - Tình Cảm', '0', '4', '1');
INSERT INTO `category` VALUES ('52', 'Hài Hước', '0', '10', '1');
INSERT INTO `category` VALUES ('53', 'Văn Hóa - Tâm Linh', '0', '9', '1');
INSERT INTO `category` VALUES ('54', 'Thể Thao - Âm Nhạc', '0', '11', '1');
INSERT INTO `category` VALUES ('55', 'Phim Hoạt Hình', '0', '5', '1');
INSERT INTO `category` VALUES ('56', 'Chiếu Rạp', '0', '888', '1');
INSERT INTO `category` VALUES ('57', 'TV Show', '0', '19', '1');
INSERT INTO `category` VALUES ('58', 'Gia Đình - Học Đường', '0', '13', '1');
INSERT INTO `category` VALUES ('59', 'Phim Thuyết Minh', '0', '8888', '1');
INSERT INTO `category` VALUES ('60', 'Phim Lồng Tiếng', '0', '88888', '1');

-- ----------------------------
-- Table structure for functional
-- ----------------------------
DROP TABLE IF EXISTS `functional`;
CREATE TABLE `functional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `controller_id` varchar(50) DEFAULT NULL,
  `action_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of functional
-- ----------------------------
INSERT INTO `functional` VALUES ('1', 'Quản lý thể loại phim', '/category/index', 'category', 'index');
INSERT INTO `functional` VALUES ('2', 'Quản lý chức năng', '/functional/index', 'functional', 'index');
INSERT INTO `functional` VALUES ('3', 'Quản lý nhóm', '/groups/index', 'groups', 'index');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'Supper admin', '');
INSERT INTO `groups` VALUES ('2', 'Admin', '');

-- ----------------------------
-- Table structure for group_functional
-- ----------------------------
DROP TABLE IF EXISTS `group_functional`;
CREATE TABLE `group_functional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `functional_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1094 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_functional
-- ----------------------------
INSERT INTO `group_functional` VALUES ('1090', '1', '1');
INSERT INTO `group_functional` VALUES ('1091', '1', '2');
INSERT INTO `group_functional` VALUES ('1092', '1', '3');
INSERT INTO `group_functional` VALUES ('1093', '2', '1');

-- ----------------------------
-- Table structure for log_io
-- ----------------------------
DROP TABLE IF EXISTS `log_io`;
CREATE TABLE `log_io` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `stock_in_quantity` int(11) DEFAULT NULL,
  `stock_out_quantity` int(11) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL COMMENT 'Tồn kho đầu kỳ',
  `closing_stock` int(11) DEFAULT NULL COMMENT 'Tồn kho cuối kỳ',
  `total_input_money` bigint(20) DEFAULT NULL,
  `total_output_money` bigint(20) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `note` text,
  `monthly` varchar(255) DEFAULT NULL COMMENT 'Chu kỳ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`product_id`,`monthly`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_io
-- ----------------------------
INSERT INTO `log_io` VALUES ('1', '2', '0', '0', '0', '0', '0', '0', '2017-01-15 10:04:43', '', '2017-01');
INSERT INTO `log_io` VALUES ('5', '3', '24', '15', '0', '9', '6417735', '4780000', '2017-01-15 10:04:43', '', '2017-01');
INSERT INTO `log_io` VALUES ('6', '1', '200', '0', '0', '200', '58086200', '0', '2017-01-15 10:04:43', '', '2017-01');

-- ----------------------------
-- Table structure for log_stock_out
-- ----------------------------
DROP TABLE IF EXISTS `log_stock_out`;
CREATE TABLE `log_stock_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_out_id` int(11) NOT NULL COMMENT 'Phiếu xuất',
  `product_id` int(11) NOT NULL COMMENT 'Sản phẩm',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng',
  `price` decimal(10,0) NOT NULL COMMENT 'Giá nhập',
  `stock_in_date` datetime DEFAULT NULL COMMENT 'Ngày nhập',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_stock_out
-- ----------------------------
INSERT INTO `log_stock_out` VALUES ('8', '15', '3', '2', '269025', '2017-01-07 00:00:00');
INSERT INTO `log_stock_out` VALUES ('9', '16', '3', '1', '269025', '2017-01-07 00:00:00');
INSERT INTO `log_stock_out` VALUES ('10', '16', '3', '10', '263466', '2017-01-08 00:00:00');
INSERT INTO `log_stock_out` VALUES ('11', '16', '3', '2', '270000', '2017-01-09 00:00:00');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Tên hàng',
  `code` varchar(50) DEFAULT NULL COMMENT 'Mã hàng',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `quantity` int(11) DEFAULT '0' COMMENT 'Số lượng',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'Ram SS8G1333 PC3L', '', '2017-01-07 10:00:13', '200');
INSERT INTO `product` VALUES ('2', 'Asus pike 2008', '', '2017-01-07 10:01:05', '3');
INSERT INTO `product` VALUES ('3', 'Ram hynix', '', '2017-01-07 15:14:50', '9');

-- ----------------------------
-- Table structure for stock_in
-- ----------------------------
DROP TABLE IF EXISTS `stock_in`;
CREATE TABLE `stock_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL COMMENT 'Sản phẩm',
  `quantity` int(11) NOT NULL DEFAULT '1' COMMENT 'Số lượng',
  `quantity_sold` int(11) DEFAULT '0' COMMENT 'Đã bán',
  `price` decimal(10,0) DEFAULT NULL COMMENT 'Đơn giá',
  `create_date` datetime DEFAULT NULL COMMENT 'Ngày nhập',
  `provider` text COMMENT 'Đơn vị nhập hàng',
  `payment` tinyint(4) DEFAULT '1' COMMENT 'Hình thức thanh toán',
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock_in
-- ----------------------------
INSERT INTO `stock_in` VALUES ('2', '1', '200', '0', '290431', '2017-01-07 00:00:00', null, '1', '');
INSERT INTO `stock_in` VALUES ('3', '2', '3', '0', '416861', '2017-02-07 00:00:00', null, '1', '');
INSERT INTO `stock_in` VALUES ('4', '3', '3', '3', '269025', '2017-01-07 00:00:00', null, '1', 'Trả bảo hành');
INSERT INTO `stock_in` VALUES ('5', '3', '10', '10', '263466', '2017-01-08 00:00:00', null, '1', 'nhập thêm 10 chiếc');
INSERT INTO `stock_in` VALUES ('6', '3', '5', '2', '270000', '2017-01-09 00:00:00', null, '1', 'Nhập thêm 5c');
INSERT INTO `stock_in` VALUES ('7', '3', '6', '0', '271000', '2017-01-08 00:00:00', '', '1', '6c');

-- ----------------------------
-- Table structure for stock_out
-- ----------------------------
DROP TABLE IF EXISTS `stock_out`;
CREATE TABLE `stock_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL COMMENT 'Sản phẩm',
  `quantity` int(11) NOT NULL DEFAULT '1' COMMENT 'Số lượng',
  `price` decimal(10,0) DEFAULT NULL COMMENT 'Đơn giá',
  `create_date` datetime DEFAULT NULL COMMENT 'Ngày nhập',
  `note` text,
  `customer` text,
  `payment` tinyint(4) DEFAULT '0' COMMENT 'Hình thức thanh toán',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock_out
-- ----------------------------
INSERT INTO `stock_out` VALUES ('15', '3', '2', '310000', '2017-01-08 00:00:00', '', 'Nam VOZ', '1');
INSERT INTO `stock_out` VALUES ('16', '3', '13', '320000', '2017-01-08 00:00:00', '', 'Chinh BH', '2');
