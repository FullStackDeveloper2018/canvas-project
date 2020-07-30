/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : maddevel_maddeve

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-30 12:28:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sig_devices
-- ----------------------------
DROP TABLE IF EXISTS `sig_devices`;
CREATE TABLE `sig_devices` (
  `device_user_id` int(11) NOT NULL,
  `device_device_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_group_id` int(11) DEFAULT NULL,
  `device_name` varchar(1000) DEFAULT NULL,
  `device_status` varchar(100) NOT NULL,
  `device_enabled` varchar(100) NOT NULL,
  `device_uuid` varchar(100) NOT NULL,
  PRIMARY KEY (`device_device_id`),
  UNIQUE KEY `device_user_id` (`device_user_id`,`device_device_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sig_devices
-- ----------------------------
INSERT INTO `sig_devices` VALUES ('1', '24', '44', 'Keith\'s Device', 'running', 'enabled', '5D73A170-AF5F-11E1-B177-4464B90080BD');
INSERT INTO `sig_devices` VALUES ('1', '25', '49', 'rpi_new', 'running', 'enabled', '10000000bb00ebaf');

-- ----------------------------
-- Table structure for sig_files
-- ----------------------------
DROP TABLE IF EXISTS `sig_files`;
CREATE TABLE `sig_files` (
  `file_file_id` int(11) NOT NULL,
  `file_user_id` int(11) DEFAULT NULL,
  `file_file_type` varchar(100) NOT NULL,
  `file_file_name` varchar(255) DEFAULT NULL,
  `file_file_description` varchar(5000) DEFAULT NULL,
  `file_file_tag_id` varchar(1000) DEFAULT NULL,
  `file_file_path` varchar(255) DEFAULT NULL,
  `file_web_page_link` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`file_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sig_files
-- ----------------------------
INSERT INTO `sig_files` VALUES ('314', '1', 'Webpage', 'yahoo', 'news yahoo', 'news', null, 'https://www.yahoo.com/');
INSERT INTO `sig_files` VALUES ('339', '1', 'Webpage', 'pyloop', 'signage', 'tesdf', null, 'https://www.google.com/');
INSERT INTO `sig_files` VALUES ('347', '1', 'Webpage', 'youtube', 'youtube homepage', 'social', null, 'https://www.youtube.com');
INSERT INTO `sig_files` VALUES ('363', '1', 'Video', 'lg4k.mp4', 'Demo video', 'social', 'uploads/1_200611060918808487_lg4k.mp4', null);
INSERT INTO `sig_files` VALUES ('364', '1', 'Video', 'Clownfishes_in_Anemone.mp4', 'DemoVideo', 'social', 'uploads/1_200611060941575790_Clownfishes_in_Anemone.mp4', null);
INSERT INTO `sig_files` VALUES ('365', '1', 'Image', 'INXX0075_1920x1080.png', 'weather_screen', 'live', 'uploads/1_200611061036747945_INXX0075_1920x1080.png', null);
INSERT INTO `sig_files` VALUES ('366', '1', 'Image', 'bg2.jpg', 'background', 'background', 'uploads/1_200611061051740803_bg2.jpg', null);

-- ----------------------------
-- Table structure for sig_groups
-- ----------------------------
DROP TABLE IF EXISTS `sig_groups`;
CREATE TABLE `sig_groups` (
  `group_user_id` int(11) NOT NULL,
  `group_group_id` int(11) NOT NULL,
  `group_group_name` varchar(100) NOT NULL,
  `group_update_tracking_md5` varchar(40) NOT NULL,
  PRIMARY KEY (`group_group_id`),
  UNIQUE KEY `group_user_id` (`group_user_id`,`group_group_id`),
  UNIQUE KEY `group_group_name` (`group_group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sig_groups
-- ----------------------------
INSERT INTO `sig_groups` VALUES ('1', '44', 'WestPack Warehouse Status', 'DQ3NGE0MjBlYTY4ZjgwZmFkYjZiMTZjNTY4ZjFhN');
INSERT INTO `sig_groups` VALUES ('1', '45', 'SEZ Floor II Store Updates', 'TUwY2Y2NGVhZmJhZDUxMjNlNDU0MzBmZDJjNTQxN');
INSERT INTO `sig_groups` VALUES ('1', '46', 'P2 Complex All Floors - Messeges', 'DBmMzcyMmViYmUxYzBkNWUwOWVhOTM0MWMxNWIyN');
INSERT INTO `sig_groups` VALUES ('1', '49', 'Keith Device Group', 'WEyZTA5NWQ5ZjZmYmYzMWNjNmY3Y2EwNjI3OTBlM');

-- ----------------------------
-- Table structure for sig_playlists
-- ----------------------------
DROP TABLE IF EXISTS `sig_playlists`;
CREATE TABLE `sig_playlists` (
  `playlist_playlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `playlist_user_id` int(11) DEFAULT NULL,
  `playlist_playlist_name` varchar(100) DEFAULT NULL,
  `playlist_md5` varchar(40) NOT NULL,
  `description` text,
  `playlist_ordered` text,
  PRIMARY KEY (`playlist_playlist_id`),
  UNIQUE KEY `Unique` (`playlist_playlist_name`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sig_playlists
-- ----------------------------
INSERT INTO `sig_playlists` VALUES ('265', '1', 'vaas1', 'TQ2N2M1ZTdjZGVjM2VlOTQ5OTg5YTg1Yjk5MTUxZ', 'test', '[{\"file_id\":\"363\",\"file_name\":\"lg4k.mp4\",\"runtime\":\"0\",\"order\":1},{\"file_id\":\"365\",\"file_name\":\"INXX0075_1920x1080.png\",\"runtime\":\"5\",\"order\":2},{\"file_id\":\"366\",\"file_name\":\"bg2.jpg\",\"runtime\":\"5\",\"order\":3},{\"file_id\":\"364\",\"file_name\":\"Clownfishes_in_Anemone.mp4\",\"runtime\":\"0\",\"order\":4}]');
INSERT INTO `sig_playlists` VALUES ('267', '1', 'New Playlist', 'DZmODk1YTZiOTM2YWJiOWIwZGNjNTRlNDcwMjBkN', 'Testing', '[{\"file_id\":\"366\",\"file_name\":\"bg2.jpg\",\"runtime\":\"7\",\"order\":1},{\"file_id\":\"364\",\"file_name\":\"Clownfishes_in_Anemone.mp4\",\"runtime\":\"0\",\"order\":2},{\"file_id\":\"339\",\"file_name\":\"pyloop\",\"runtime\":\"7\",\"order\":3}]');

-- ----------------------------
-- Table structure for sig_schedules
-- ----------------------------
DROP TABLE IF EXISTS `sig_schedules`;
CREATE TABLE `sig_schedules` (
  `sch_user_id` int(11) NOT NULL,
  `sch_group_id` int(11) NOT NULL,
  `sch_sch_id` int(11) NOT NULL,
  `sch_priority` int(11) DEFAULT NULL,
  `sch_playlist_id` int(11) DEFAULT NULL,
  `sch_weekday` varchar(1000) DEFAULT NULL,
  `sch_month_date` varchar(1000) DEFAULT NULL,
  `sch_start_date` varchar(100) DEFAULT NULL,
  `sch_end_date` varchar(100) DEFAULT NULL,
  `sch_start_time` varchar(100) DEFAULT NULL,
  `sch_end_time` varchar(100) DEFAULT NULL,
  `sch_md5` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sch_sch_id`),
  UNIQUE KEY `sch_user_id` (`sch_user_id`,`sch_group_id`,`sch_sch_id`),
  UNIQUE KEY `sch_user_id_2` (`sch_user_id`,`sch_group_id`,`sch_sch_id`,`sch_priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sig_schedules
-- ----------------------------

-- ----------------------------
-- Table structure for sig_users
-- ----------------------------
DROP TABLE IF EXISTS `sig_users`;
CREATE TABLE `sig_users` (
  `user_user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL,
  `user_license_key` varchar(100) NOT NULL,
  `user_device_limit` int(11) NOT NULL,
  `user_notes` varchar(1000) DEFAULT NULL,
  `user_created_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sig_users
-- ----------------------------
INSERT INTO `sig_users` VALUES ('1', 'Ken Frommert', 'n.vasu94@gmail.com', 'pass', 'enabled', 'none', '10', 'myself', 'test');
INSERT INTO `sig_users` VALUES ('2', 'vaspandi nallasamy', 'tnforum.rainforest@gmail.com', 'pass', '', '', '0', null, '');
DROP TRIGGER IF EXISTS `trigger_groups_md5_insert`;
DELIMITER ;;
CREATE TRIGGER `trigger_groups_md5_insert` BEFORE INSERT ON `sig_groups` FOR EACH ROW BEGIN
set new.group_update_tracking_md5=
SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_groups_md5_update`;
DELIMITER ;;
CREATE TRIGGER `trigger_groups_md5_update` BEFORE UPDATE ON `sig_groups` FOR EACH ROW BEGIN
set new.group_update_tracking_md5=
SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_playlist_md5_insert`;
DELIMITER ;;
CREATE TRIGGER `trigger_playlist_md5_insert` BEFORE INSERT ON `sig_playlists` FOR EACH ROW BEGIN
set new.playlist_md5=
SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_playlist_md5_update`;
DELIMITER ;;
CREATE TRIGGER `trigger_playlist_md5_update` BEFORE UPDATE ON `sig_playlists` FOR EACH ROW BEGIN
set new.playlist_md5=
SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40);

update sig_groups 
set group_update_tracking_md5=

SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40)

where group_group_id in

(select DISTINCT sch_group_id from sig_schedules
where sch_playlist_id = 
new.playlist_playlist_id);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_schedules_md5_insert`;
DELIMITER ;;
CREATE TRIGGER `trigger_schedules_md5_insert` BEFORE INSERT ON `sig_schedules` FOR EACH ROW BEGIN
set new.sch_md5=

SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40)
;

update sig_groups 
set group_update_tracking_md5=

SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40)

where group_group_id = new.sch_group_id;



END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_schedules_md5_update`;
DELIMITER ;;
CREATE TRIGGER `trigger_schedules_md5_update` BEFORE UPDATE ON `sig_schedules` FOR EACH ROW BEGIN
set new.sch_md5=

SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40)
;





END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_schedules_md5_delete`;
DELIMITER ;;
CREATE TRIGGER `trigger_schedules_md5_delete` BEFORE DELETE ON `sig_schedules` FOR EACH ROW update sig_groups 
set group_update_tracking_md5=

SUBSTRING(REPLACE(REPLACE(REPLACE( TO_BASE64(MD5(RAND())), '=',''),'+',''),'/',''), 2, 40)

where group_group_id = 

(select sch_group_id from sig_schedules
where sch_sch_id = 
old.sch_sch_id)
;;
DELIMITER ;
