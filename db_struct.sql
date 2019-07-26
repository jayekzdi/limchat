/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.26-MariaDB : Database - norrmalizelim
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`norrmalizelim` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;

USE `norrmalizelim`;

/*Table structure for table `accounting` */

DROP TABLE IF EXISTS `accounting`;

CREATE TABLE `accounting` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `accounting` */

/*Table structure for table `agriculture` */

DROP TABLE IF EXISTS `agriculture`;

CREATE TABLE `agriculture` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agriculture` */

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `ann_id` int(11) NOT NULL AUTO_INCREMENT,
  `ann_title` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `ann_announcement` text COLLATE utf8mb4_bin NOT NULL,
  `ann_date` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `ann_status` int(11) NOT NULL,
  `ann_pinned` int(11) NOT NULL,
  PRIMARY KEY (`ann_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `announcements` */

insert  into `announcements`(`ann_id`,`ann_title`,`ann_announcement`,`ann_date`,`ann_status`,`ann_pinned`) values (1,'Meeting','We have a meeting regarding for the preparation for upcoming Luisiana Day\r\nThis Coming March 15, 2019 at the Conference Room','03/01/2019',0,1),(2,'Policy ','We Please change your profile picture.','03/03/2019',0,1),(3,'Policy','Bawal magsuot ng shorts, sando at tsinelas sa mga lalaki\r\nat sa mga babae bawal mag suot ng plunging neckline, sleveless, miniskrit, shorts, etc.','03/03/2019',1,0),(8,'Policy','Change your DP','03/05/2019',1,1),(13,'Policy #1','Bawal ang naka crocs','03/06/2019',0,0),(14,'Meeting','May meeting tayong mga pogi ng 1:00pm','03/06/2019',0,0);

/*Table structure for table `assessor` */

DROP TABLE IF EXISTS `assessor`;

CREATE TABLE `assessor` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `assessor` */

/*Table structure for table `ataguilaso` */

DROP TABLE IF EXISTS `ataguilaso`;

CREATE TABLE `ataguilaso` (
  `cntc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cntc_username` int(11) NOT NULL,
  `cntc_fullname` int(11) NOT NULL,
  PRIMARY KEY (`cntc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `ataguilaso` */

insert  into `ataguilaso`(`cntc_id`,`cntc_username`,`cntc_fullname`) values (1,2,2),(2,3,3),(3,4,4),(4,5,5);

/*Table structure for table `budget` */

DROP TABLE IF EXISTS `budget`;

CREATE TABLE `budget` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `budget` */

/*Table structure for table `dilg` */

DROP TABLE IF EXISTS `dilg`;

CREATE TABLE `dilg` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dilg` */

/*Table structure for table `emoji` */

DROP TABLE IF EXISTS `emoji`;

CREATE TABLE `emoji` (
  `em_id` int(11) NOT NULL AUTO_INCREMENT,
  `em_code` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `em_img` blob NOT NULL,
  PRIMARY KEY (`em_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `emoji` */

insert  into `emoji`(`em_id`,`em_code`,`em_img`) values (1,':)','blobsmile.png'),(2,':(','blobsad.png'),(3,':D','blobgrin.png'),(4,':angel:','blobangel.png'),(5,'xD','blobxd.png\r\n'),(6,':joy:','blobjoy.png'),(7,'B)','blobcool.png'),(8,':smiley:','blobsmiley.png'),(9,':heart_eyes:','blobhearteyes.png'),(10,':kissing_heart:','blobkissheart.png'),(11,':*','blobkiss.png'),(12,':frown:','blobfrown.png'),(13,'-_-','blobexpressionless.png	'),(14,':/','blobneutral.png'),(15,':o','blobopenmouth.png'),(16,':rolling_eyes:','blobrollingeyes.png'),(17,'T_T','blobsob.png'),(18,':smile_sweat:','blobsmilesweat.png'),(19,':p','blobtongue.png	'),(20,'>_<','blobsmilehappyeyes.png'),(21,':angry:','blobangry.png'),(22,':blush:','blobblush.png'),(23,':\'(','blobcry.png'),(24,';)','blobwink.png');

/*Table structure for table `emp_dept` */

DROP TABLE IF EXISTS `emp_dept`;

CREATE TABLE `emp_dept` (
  `dept_id` int(10) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(200) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `emp_dept` */

insert  into `emp_dept`(`dept_id`,`dept_name`) values (1,'MAYORS OFFICE'),(2,'MPDC'),(3,'DILG'),(4,'ENGINEERING'),(5,'AGRICULTURE'),(6,'ASSESSOR'),(7,'HRMO'),(8,'MENRO'),(9,'TREASURY'),(10,'ACCOUNTING'),(11,'SANGGUNIANG BAYAN'),(12,'MCR'),(13,'BUDGET'),(14,'MSWDO'),(15,'MDRRMO');

/*Table structure for table `emp_gender` */

DROP TABLE IF EXISTS `emp_gender`;

CREATE TABLE `emp_gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(200) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `emp_gender` */

insert  into `emp_gender`(`gender_id`,`gender`) values (1,'MALE'),(2,'FEMALE');

/*Table structure for table `emp_security_question` */

DROP TABLE IF EXISTS `emp_security_question`;

CREATE TABLE `emp_security_question` (
  `sq_id` int(11) NOT NULL AUTO_INCREMENT,
  `sq_question` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`sq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `emp_security_question` */

insert  into `emp_security_question`(`sq_id`,`sq_question`) values (1,'What was your childhood nickname? '),(2,'What is the name of your favorite childhood friend? '),(3,'In what city were you born?'),(4,'What high school did you attend?'),(5,'What is your favorite movie?'),(6,'What is your mother\'s maiden name?'),(7,'What was the last name of your third grade teacher?'),(8,'In what city or town was your first job?'),(9,'Who is your favorite actor, musician, or artist?'),(10,'What is your favorite website'),(11,'Which phone number do you remember most from your childhood?'),(12,'In what year was your mother born?'),(13,'What is the color of your eyes?');

/*Table structure for table `emp_status` */

DROP TABLE IF EXISTS `emp_status`;

CREATE TABLE `emp_status` (
  `es_id` int(10) NOT NULL AUTO_INCREMENT,
  `es_status` varchar(200) NOT NULL,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `emp_status` */

insert  into `emp_status`(`es_id`,`es_status`) values (1,'Online'),(2,'Idle'),(3,'Offline');

/*Table structure for table `emp_user_type` */

DROP TABLE IF EXISTS `emp_user_type`;

CREATE TABLE `emp_user_type` (
  `u_type_id` int(1) NOT NULL AUTO_INCREMENT,
  `u_type` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`u_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `emp_user_type` */

insert  into `emp_user_type`(`u_type_id`,`u_type`) values (1,'admin'),(2,'user');

/*Table structure for table `employee_info` */

DROP TABLE IF EXISTS `employee_info`;

CREATE TABLE `employee_info` (
  `ei_id` int(10) NOT NULL AUTO_INCREMENT,
  `ei_name` varchar(200) NOT NULL,
  `ei_last_name` varchar(200) NOT NULL,
  `ei_username` varchar(200) NOT NULL,
  `ei_password` varchar(200) NOT NULL,
  `ei_gender` int(11) NOT NULL,
  `ei_birthday` varchar(200) NOT NULL,
  `ei_address` varchar(200) NOT NULL,
  `ei_dept` int(10) NOT NULL,
  `ei_status` int(10) NOT NULL,
  `ei_image` blob NOT NULL,
  `ei_security_question` int(10) NOT NULL,
  `ei_security_answer` varchar(200) NOT NULL,
  `ei_active` int(2) NOT NULL,
  `ei_user_type` int(2) NOT NULL,
  PRIMARY KEY (`ei_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `employee_info` */

insert  into `employee_info`(`ei_id`,`ei_name`,`ei_last_name`,`ei_username`,`ei_password`,`ei_gender`,`ei_birthday`,`ei_address`,`ei_dept`,`ei_status`,`ei_image`,`ei_security_question`,`ei_security_answer`,`ei_active`,`ei_user_type`) values (1,'System','Administrator','admin','598f0b6b557891d113336e6114d23b97',1,'04/03/1851','Luisiana Laguna',2,3,'',1,'28a3f3511993476e8995e7f307b385f7',1,1),(2,'John Joshua','Bala','jjbala','2c8762382857ae3d9879a5afe0e5f450',1,'08/26/1998','Brgy. Zone III Luisiana Laguna',11,1,'49143080_2524653440884926_1020701554874777600_n.jpg',3,'5331a228a30e2e0d6f45478992df90eb',1,2),(3,'Jian Paolo','De Leon','jpdeleon','2c8762382857ae3d9879a5afe0e5f450',1,'04/21/1998','Brgy. San Buenaventura Luisiana Laguna',1,1,'',13,'7a5b2342133a0cfbb741f672ea2ec5e3',1,2),(4,'Liza','Oblenida','loblenida','2c8762382857ae3d9879a5afe0e5f450',2,'05/21/1974','Brgy. San Antonio Luisiana Laguna',7,3,'liza.jpg',3,'ce42246525a31d183a13b8cb0e1f45c5',1,2),(5,'Mica','Magante','mmagante','2c8762382857ae3d9879a5afe0e5f450',2,'09/01/1998','Brgy. San Salvador Luisiana Laguna',11,3,'46377551_1769185749871180_7693082293165883392_n.jpg',6,'745a559ea8a65c014c0ffa7f3bd97568',1,2);

/*Table structure for table `engineering` */

DROP TABLE IF EXISTS `engineering`;

CREATE TABLE `engineering` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `engineering` */

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `event_date_start` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `event_date_end` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `event_time_start` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `event_time_end` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `event_status` int(11) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `event` */

insert  into `event`(`event_id`,`event_name`,`event_date_start`,`event_date_end`,`event_time_start`,`event_time_end`,`event_status`) values (1,'Luisiana Day','03/30/2019','04/04/2019','08:00 am','12:00 am',1),(2,'Grand Parade','04/03/2019','04/03/2019','08:00 am','12:00 pm',1),(3,'Baranggayan','04/03/2019','04/04/2019','07:00 pm','2:00 am',1),(4,'Flag Ceremony','03/18/2019','03/18/2019','08:00 AM','09:00 AM',1);

/*Table structure for table `groupchat` */

DROP TABLE IF EXISTS `groupchat`;

CREATE TABLE `groupchat` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `groupchat` */

insert  into `groupchat`(`group_id`,`group_name`) values (1,'MAYORS OFFICE'),(2,'MPDC'),(3,'DILG'),(4,'ENGINEERING'),(5,'AGRICULTURE'),(6,'ASSESSOR'),(7,'HRMO'),(8,'MENRO'),(9,'TREASURY'),(10,'ACCOUNTING'),(11,'SANGGUNIANG BAYAN'),(12,'MCR'),(13,'BUDGET'),(14,'MSWDO'),(15,'MDRRMO'),(16,'Tropang Groupchat'),(17,'Tropang Cabinet'),(18,'Team Dimsum');

/*Table structure for table `hrmo` */

DROP TABLE IF EXISTS `hrmo`;

CREATE TABLE `hrmo` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hrmo` */

insert  into `hrmo`(`group_id`,`group_username`,`group_name`) values (1,4,7);

/*Table structure for table `jjbala` */

DROP TABLE IF EXISTS `jjbala`;

CREATE TABLE `jjbala` (
  `cntc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cntc_username` int(11) NOT NULL,
  `cntc_fullname` int(11) NOT NULL,
  PRIMARY KEY (`cntc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `jjbala` */

insert  into `jjbala`(`cntc_id`,`cntc_username`,`cntc_fullname`) values (1,1,1),(2,3,3),(3,4,4),(4,5,5);

/*Table structure for table `jpdeleon` */

DROP TABLE IF EXISTS `jpdeleon`;

CREATE TABLE `jpdeleon` (
  `cntc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cntc_username` int(11) NOT NULL,
  `cntc_fullname` int(11) NOT NULL,
  PRIMARY KEY (`cntc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `jpdeleon` */

insert  into `jpdeleon`(`cntc_id`,`cntc_username`,`cntc_fullname`) values (1,1,1),(2,2,2),(3,4,4),(4,5,5);

/*Table structure for table `loblenida` */

DROP TABLE IF EXISTS `loblenida`;

CREATE TABLE `loblenida` (
  `cntc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cntc_username` int(11) NOT NULL,
  `cntc_fullname` int(11) NOT NULL,
  PRIMARY KEY (`cntc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `loblenida` */

insert  into `loblenida`(`cntc_id`,`cntc_username`,`cntc_fullname`) values (1,1,1),(2,2,2),(3,3,3),(4,5,5);

/*Table structure for table `mayors_office` */

DROP TABLE IF EXISTS `mayors_office`;

CREATE TABLE `mayors_office` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mayors_office` */

insert  into `mayors_office`(`group_id`,`group_username`,`group_name`) values (1,1,1),(2,3,1);

/*Table structure for table `mcr` */

DROP TABLE IF EXISTS `mcr`;

CREATE TABLE `mcr` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mcr` */

/*Table structure for table `mdrrmo` */

DROP TABLE IF EXISTS `mdrrmo`;

CREATE TABLE `mdrrmo` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mdrrmo` */

/*Table structure for table `menro` */

DROP TABLE IF EXISTS `menro`;

CREATE TABLE `menro` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menro` */

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_sender` int(10) NOT NULL,
  `msg_content` varchar(200) NOT NULL,
  `msg_reciever` int(10) NOT NULL,
  `msg_date` varchar(200) NOT NULL,
  `msg_time` varchar(200) NOT NULL,
  `msg_read` int(11) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=latin1;

/*Data for the table `message` */

insert  into `message`(`msg_id`,`msg_sender`,`msg_content`,`msg_reciever`,`msg_date`,`msg_time`,`msg_read`) values (1,2,'ang pogi ni kuya bala',3,'02/27/2019','10:11 AM',1),(2,2,'hello',3,'02/27/2019','10:11 AM',1),(3,3,':) ',2,'02/27/2019','10:35 AM',1),(4,2,'hello',3,'02/27/2019','10:35 AM',1),(5,2,'hi',5,'02/27/2019','10:35 AM',1),(6,3,':) pohi ko',2,'02/27/2019','10:35 AM',1),(7,2,'yes',3,'02/27/2019','10:36 AM',1),(8,3,':) ',5,'02/27/2019','10:36 AM',1),(9,5,'walang alert',2,'02/27/2019','10:36 AM',1),(10,5,'38859434-aurora-wallpapers.jpg',3,'02/27/2019','10:37 AM',1),(11,2,'ya',5,'02/27/2019','01:37 PM',1),(12,2,'bahala na kayo sa buhay nyo',3,'02/27/2019','03:25 PM',1),(13,2,'nasasawa na ako sa inyo',3,'02/27/2019','03:26 PM',1),(14,2,'CUSTOMER SATISFACTION SURVEY.docx',1,'02/28/2019','12:19 PM',1),(15,2,'hi.me',1,'02/28/2019','12:56 PM',1),(16,2,'SE_2.4_The_Requirements_Traceability(4).pptx',1,'02/28/2019','12:59 PM',1),(17,2,'JEDI Slides-1.1 Software Engineering-A Layered View.pdf',1,'02/28/2019','01:01 PM',1),(18,2,'hi',3,'03/02/2019','04:10 PM',1),(19,2,'hello',5,'03/02/2019','04:14 PM',1),(20,2,'hi',5,'03/02/2019','04:15 PM',1),(21,5,'hi',2,'03/02/2019','04:16 PM',1),(22,2,'hi',5,'03/02/2019','04:31 PM',1),(23,2,'hello',5,'03/02/2019','04:34 PM',1),(24,5,'hi',2,'03/02/2019','04:34 PM',1),(25,2,'hi',5,'03/02/2019','04:36 PM',1),(26,5,'hi',2,'03/02/2019','04:36 PM',1),(27,2,'hello',5,'03/02/2019','04:36 PM',1),(28,5,'hi',2,'03/02/2019','04:37 PM',1),(29,5,'hello',2,'03/02/2019','04:48 PM',1),(30,2,'hi',5,'03/02/2019','04:48 PM',1),(31,5,'hi',2,'03/02/2019','11:21 PM',1),(32,2,'hello',5,'03/02/2019','11:22 PM',1),(33,2,'hi',5,'03/02/2019','11:22 PM',1),(34,2,'hello',5,'03/02/2019','11:22 PM',1),(35,5,'hi',2,'03/02/2019','11:23 PM',1),(36,2,'hello',5,'03/02/2019','11:23 PM',1),(37,2,'hei',5,'03/02/2019','11:27 PM',1),(38,2,'hei',5,'03/02/2019','11:30 PM',1),(39,2,'hello',5,'03/02/2019','11:30 PM',1),(40,2,'hi',3,'03/03/2019','09:24 AM',1),(41,5,'20180717_170034.jpg',3,'03/04/2019','11:05 AM',1),(42,3,'15516688813831328665759.jpg',5,'03/04/2019','11:07 AM',1),(43,2,'hi',5,'03/04/2019','11:07 AM',1),(44,5,'20180717_170034.jpg',2,'03/04/2019','11:08 AM',1),(45,5,'aDETJUY',2,'03/04/2019','11:08 AM',1),(46,5,'ertuyui',3,'03/04/2019','11:08 AM',1),(47,5,'20180717_170034.jpg',3,'03/04/2019','11:08 AM',1),(48,5,'20180717_170034.jpg',3,'03/04/2019','11:08 AM',1),(49,5,'ase',3,'03/04/2019','11:08 AM',1),(50,5,'dwetsawererh',2,'03/04/2019','11:08 AM',1),(51,5,'20180717_170034.jpg',2,'03/04/2019','11:09 AM',1),(52,3,'Qwerty',5,'03/04/2019','11:09 AM',1),(53,3,'Qwww',2,'03/04/2019','11:11 AM',1),(54,2,'hi ',5,'03/04/2019','11:15 AM',1),(55,3,'pogi ko',2,'03/04/2019','11:16 AM',1),(56,3,'reply ka naman. pogi ko ano?',2,'03/04/2019','11:20 AM',1),(57,3,'yoe',2,'03/04/2019','11:20 AM',1),(58,3,'reply ka naman. pogi ko ano?',2,'03/04/2019','11:20 AM',1),(59,3,'asd?',2,'03/04/2019','11:20 AM',1),(60,3,'rwehdhshdbfhdhfgshdhsjdhjshdjshjdhsjdhjshdjshjfhsjhfjshfjshjf',2,'03/04/2019','11:21 AM',1),(61,3,'reply ka naman. pogi ko ano?',2,'03/04/2019','11:21 AM',1),(62,3,'hgy',2,'03/04/2019','11:21 AM',1),(63,3,'awqe',2,'03/04/2019','11:21 AM',1),(64,3,'reply ka naman. pogo ko ano?',2,'03/04/2019','11:21 AM',1),(65,3,'jsjcjsjcndncj. wkfjiwjfijwif',2,'03/04/2019','11:21 AM',1),(66,3,'hjfhsjfsg.',2,'03/04/2019','11:21 AM',1),(67,3,'sfiwshfshfskjfks. jfisjhfihwsuf',2,'03/04/2019','11:21 AM',1),(68,3,'jhjhjhjhj.jkkjkjjk',2,'03/04/2019','11:22 AM',1),(69,3,'may problema tayo sa query',2,'03/04/2019','11:22 AM',1),(70,3,'ah. e .',2,'03/04/2019','11:22 AM',1),(71,3,'a.e',2,'03/04/2019','11:23 AM',1),(72,3,'ah. e .',2,'03/04/2019','11:23 AM',1),(73,3,'as.',2,'03/04/2019','11:23 AM',1),(74,3,'sa. xas',2,'03/04/2019','11:23 AM',1),(75,3,'dagfdgafdg . dhjahdjdh.',2,'03/04/2019','11:23 AM',1),(76,3,'Kain kana. hahahaa',2,'03/04/2019','11:23 AM',1),(77,3,'Soimai Rice,',2,'03/04/2019','11:24 AM',1),(78,3,'Siomai Rice, Hahaha',2,'03/04/2019','11:24 AM',1),(79,2,'SE_1.1_-_Introduction_to_Software_Engineering(2).pptx',3,'03/04/2019','03:12 PM',1),(80,2,'LGU NEW LOGO2.jpg',5,'03/04/2019','03:16 PM',1),(81,5,'ljl',2,'03/04/2019','03:17 PM',1),(82,3,'Pogi ko',5,'03/04/2019','03:22 PM',1),(83,5,'qwerty',3,'03/04/2019','03:22 PM',1),(84,5,'qwerty',3,'03/04/2019','03:22 PM',1),(85,5,'vhxvshax',2,'03/04/2019','03:24 PM',1),(86,2,'LGU NEW LOGO2.jpg',5,'03/04/2019','03:27 PM',1),(87,2,'hi',5,'03/04/2019','03:27 PM',1),(88,5,'hello',2,'03/04/2019','03:33 PM',1),(89,2,':( :( ',5,'03/04/2019','03:41 PM',1),(90,3,':) :) ',2,'03/04/2019','03:42 PM',1),(91,3,'Screenshot (365) - Copy.png',2,'03/04/2019','03:42 PM',1),(92,3,'pogi ko',2,'03/04/2019','03:42 PM',1),(93,3,'Screenshot (365) - Copy.png',2,'03/04/2019','03:42 PM',1),(94,3,'qwerty',2,'03/04/2019','03:43 PM',1),(95,3,'jian pogi',2,'03/04/2019','03:43 PM',1),(96,2,'20180223_154233.jpg',3,'03/04/2019','09:58 PM',1),(97,2,'20180223_154233.jpg',3,'03/04/2019','09:58 PM',1),(98,2,'hello',3,'03/04/2019','09:58 PM',1),(99,2,'20180223_155612.jpg',3,'03/04/2019','10:00 PM',1),(100,2,'hello',3,'03/04/2019','10:00 PM',1),(101,2,'hi',3,'03/04/2019','10:00 PM',1),(102,2,'hmmm',3,'03/04/2019','10:00 PM',1),(103,2,'20180223_154233.jpg',3,'03/04/2019','10:00 PM',1),(104,2,'hi',3,'03/04/2019','10:00 PM',1),(105,2,'hello\\',3,'03/04/2019','10:00 PM',1),(106,2,'hello world',3,'03/04/2019','10:00 PM',1),(107,2,'black bck.png',3,'03/04/2019','10:06 PM',1),(108,2,'back',3,'03/04/2019','10:06 PM',1),(109,2,'back',3,'03/04/2019','10:06 PM',1),(110,2,'back',3,'03/04/2019','10:06 PM',1),(111,2,'hi',3,'03/04/2019','10:50 PM',1),(112,2,'hello',3,'03/04/2019','10:50 PM',1),(113,2,'black bck.png',3,'03/04/2019','10:50 PM',1),(114,2,':) :) ',3,'03/04/2019','10:50 PM',1),(115,2,'black bck.png',3,'03/04/2019','10:51 PM',1),(116,2,'hi',3,'03/04/2019','10:52 PM',1),(117,2,'hi',3,'03/04/2019','10:53 PM',1),(118,2,'black bck.png',3,'03/04/2019','10:53 PM',1),(119,2,'hi',5,'03/04/2019','10:53 PM',1),(120,2,'black bck.png',5,'03/04/2019','10:55 PM',1),(121,2,'hi',5,'03/04/2019','10:55 PM',1),(122,2,'hello',5,'03/04/2019','10:55 PM',1),(123,2,'black bck.png',5,'03/04/2019','10:55 PM',1),(124,2,'hi',3,'03/04/2019','10:58 PM',1),(125,2,'hello',3,'03/04/2019','10:58 PM',1),(126,2,'black bck.png',3,'03/04/2019','10:58 PM',1),(127,2,'hi',3,'03/04/2019','11:01 PM',1),(128,2,'20180223_155617.jpg',3,'03/04/2019','11:01 PM',1),(129,2,'heelo',3,'03/04/2019','11:01 PM',1),(130,2,'hi',3,'03/04/2019','11:01 PM',1),(131,2,'kamusta',3,'03/04/2019','11:01 PM',1),(132,2,'hi',3,'03/04/2019','11:02 PM',1),(133,2,'20180223_155635.jpg',3,'03/04/2019','11:02 PM',1),(134,2,'kamsuta',3,'03/04/2019','11:02 PM',1),(135,2,'hi',3,'03/04/2019','11:02 PM',1),(136,2,'black bck.png',3,'03/04/2019','11:02 PM',1),(137,2,'hi',3,'03/04/2019','11:02 PM',1),(138,2,'hi',3,'03/04/2019','11:02 PM',1),(139,2,'20180223_154233.jpg',3,'03/04/2019','11:02 PM',1),(140,2,'20180223_155635.jpg',3,'03/04/2019','11:03 PM',1),(141,2,'hi',3,'03/04/2019','11:03 PM',1),(142,5,'hi',2,'03/05/2019','04:08 AM',1),(143,5,'heeloo',2,'03/05/2019','04:09 AM',1),(144,2,'hi',5,'03/05/2019','02:54 PM',1),(145,2,'hi',5,'03/05/2019','02:55 PM',1),(146,2,'hello',5,'03/05/2019','02:56 PM',1),(147,2,'hi',5,'03/05/2019','02:56 PM',1),(148,2,'hi',5,'03/05/2019','02:56 PM',1),(149,5,'hello',2,'03/05/2019','02:57 PM',1),(150,2,'heelo',5,'03/05/2019','02:57 PM',1),(151,5,'hi',2,'03/05/2019','02:57 PM',1),(152,5,'helllo',2,'03/05/2019','02:57 PM',1),(153,2,'hi',5,'03/05/2019','02:58 PM',1),(154,2,'hi',5,'03/05/2019','03:15 PM',1),(155,2,'hi',5,'03/05/2019','03:15 PM',1),(156,2,'hi ',5,'03/05/2019','03:15 PM',1),(157,2,'hi',5,'03/05/2019','03:15 PM',1),(158,2,'hello',5,'03/05/2019','03:15 PM',1),(159,2,'hi',5,'03/05/2019','03:15 PM',1),(160,2,'hi',5,'03/05/2019','03:15 PM',1),(161,5,'hello',2,'03/05/2019','03:17 PM',1),(162,2,'hi',5,'03/05/2019','03:19 PM',1),(163,2,'hi',5,'03/05/2019','03:20 PM',1),(164,2,'hello',5,'03/05/2019','03:21 PM',1),(165,2,'hello',5,'03/05/2019','03:23 PM',1),(166,5,'hi',2,'03/05/2019','03:23 PM',1),(167,2,'balita',5,'03/05/2019','03:23 PM',1),(168,2,'hi ',5,'03/05/2019','03:23 PM',1),(169,2,'hi',5,'03/05/2019','03:34 PM',1),(170,5,'hello',2,'03/05/2019','03:35 PM',1),(171,2,'hi',5,'03/05/2019','03:35 PM',1),(172,2,'hi',5,'03/05/2019','03:35 PM',1),(173,5,'hi',2,'03/05/2019','03:35 PM',1),(174,2,'hi',5,'03/05/2019','03:35 PM',1),(175,2,'hello',5,'03/05/2019','03:36 PM',1),(176,5,'hi',2,'03/05/2019','03:37 PM',1),(177,5,'hello',2,'03/05/2019','03:37 PM',1),(178,2,'hi',5,'03/05/2019','03:37 PM',1),(179,2,'hi.haha',5,'03/06/2019','09:52 AM',1),(180,2,'hi.hahaha',5,'03/06/2019','09:52 AM',1),(181,2,'hello',5,'03/06/2019','09:57 AM',1),(182,2,'hi.me',5,'03/06/2019','09:57 AM',1),(183,2,'hi.me',5,'03/06/2019','10:06 AM',1),(184,2,'hi.haha',3,'03/06/2019','10:09 AM',1),(185,2,'hehe.xD',3,'03/06/2019','10:13 AM',1),(186,2,'xD',3,'03/06/2019','10:14 AM',1),(187,2,':D :D ',3,'03/06/2019','10:14 AM',1),(188,2,'hi',3,'03/06/2019','10:14 AM',1),(189,5,'hi',2,'03/06/2019','10:27 AM',1),(190,5,'hi',2,'03/06/2019','10:30 AM',1),(191,5,'heelllo',2,'03/06/2019','10:31 AM',1),(192,5,'heelllo',2,'03/06/2019','10:31 AM',1),(193,2,'hi',5,'03/06/2019','10:31 AM',1),(194,2,'a',5,'03/06/2019','10:31 AM',1),(195,2,'a',5,'03/06/2019','10:31 AM',1),(196,2,'a',5,'03/06/2019','10:31 AM',1),(197,2,'a',5,'03/06/2019','10:31 AM',1),(198,2,'a',5,'03/06/2019','10:31 AM',1),(199,2,'a',5,'03/06/2019','10:31 AM',1),(200,2,'a',5,'03/06/2019','10:31 AM',1),(201,2,'a',5,'03/06/2019','10:31 AM',1),(202,2,'a',5,'03/06/2019','10:31 AM',1),(203,2,'a',5,'03/06/2019','10:31 AM',1),(204,2,'a',5,'03/06/2019','10:31 AM',1),(205,2,'a',5,'03/06/2019','10:31 AM',1),(206,2,'a',5,'03/06/2019','10:31 AM',1),(207,2,'a',5,'03/06/2019','10:31 AM',1),(208,2,'a',5,'03/06/2019','10:31 AM',1),(209,2,'a',5,'03/06/2019','10:31 AM',1),(210,2,'a',5,'03/06/2019','10:31 AM',1),(211,2,'a',5,'03/06/2019','10:31 AM',1),(212,2,'a',5,'03/06/2019','10:31 AM',1),(213,2,'a',5,'03/06/2019','10:31 AM',1),(214,2,'a',5,'03/06/2019','10:31 AM',1),(215,2,'a',5,'03/06/2019','10:31 AM',1),(216,2,'hi',5,'03/06/2019','02:07 PM',1),(217,2,'hello',5,'03/06/2019','02:08 PM',1),(218,2,'cyo1.png',3,'03/06/2019','02:19 PM',1),(219,2,'3sCHAPTER4.docx',3,'03/06/2019','02:19 PM',1),(220,2,'mervick-emojionearea-v3.4.1-29-g99129f7.zip',3,'03/06/2019','02:19 PM',1),(221,2,'hi',3,'03/06/2019','02:19 PM',1),(222,2,'hi',3,'03/06/2019','02:20 PM',1),(223,2,'hello',3,'03/06/2019','02:25 PM',1),(224,3,'hi',2,'03/06/2019','02:26 PM',1),(225,3,'hi',2,'03/06/2019','02:26 PM',1),(226,3,'hi',2,'03/06/2019','02:26 PM',1),(227,2,':) :) :) ',5,'03/06/2019','03:41 PM',1),(228,5,':) :) :) ',2,'03/06/2019','03:41 PM',1),(229,2,'cyo1.png',5,'03/06/2019','03:44 PM',1),(230,2,'hi eto yung mga files',5,'03/06/2019','03:44 PM',1),(231,2,'49143080_2524653440884926_1020701554874777600_n.jpg',3,'03/07/2019','05:42 PM',1),(232,2,'bootstrap-datepicker-1.6.4-dist.zip',3,'03/07/2019','08:27 PM',1),(233,2,'broken-screen-android-windows-mac-iphone-prank-1.png',3,'03/07/2019','08:27 PM',1),(234,2,'CUSTOMER SATISFACTION SURVEY.docx',3,'03/07/2019','08:27 PM',1),(235,2,'\'',3,'03/07/2019','08:27 PM',1),(236,2,'CUSTOMER SATISFACTION SURVEY (1).docx',3,'03/07/2019','08:28 PM',1),(237,2,'shield.png',3,'03/07/2019','08:28 PM',1),(238,2,'IPAPACHECKKAYMAAMYANA1.docx',3,'03/07/2019','08:28 PM',1),(239,2,'fire-torch-png-11.png',3,'03/07/2019','08:28 PM',1),(240,2,'CUSTOMER SATISFACTION SURVEY (1).docx',3,'03/07/2019','08:28 PM',1),(241,2,'shield.png',3,'03/07/2019','08:28 PM',1),(242,2,'IPAPACHECKKAYMAAMYANA1.docx',3,'03/07/2019','08:28 PM',1),(243,2,'fire-torch-png-11.png',3,'03/07/2019','08:28 PM',1),(244,2,'hi',3,'03/07/2019','08:28 PM',1),(245,2,'pogi',3,'03/08/2019','01:56 PM',1),(246,2,'eii',3,'03/09/2019','10:59 AM',1),(247,3,'hei',2,'03/09/2019','11:09 AM',1),(248,2,'heii',5,'03/09/2019','11:15 AM',1),(249,2,'yow',5,'03/09/2019','11:16 AM',1),(250,2,'ahahaha',5,'03/09/2019','11:47 AM',1),(251,2,'eiii',3,'03/09/2019','11:47 AM',1),(252,3,'eiii',2,'03/09/2019','11:47 AM',1),(253,3,'ei',2,'03/09/2019','11:47 AM',1),(254,3,'hei',2,'03/09/2019','11:48 AM',1),(255,2,'eii',3,'03/09/2019','11:49 AM',1),(256,2,'eii',3,'03/09/2019','11:49 AM',1),(257,2,'eii',3,'03/09/2019','11:51 AM',1),(258,3,'hi',2,'03/09/2019','11:51 AM',1),(259,3,'yow',2,'03/09/2019','11:52 AM',1),(260,2,'hi',3,'03/09/2019','11:53 AM',1),(261,2,'eii',3,'03/09/2019','11:54 AM',1),(262,2,'eii',3,'03/09/2019','11:54 AM',1),(263,3,'hi',2,'03/09/2019','12:01 PM',1),(264,2,'eii',3,'03/09/2019','12:17 PM',1),(265,2,'heelllo',3,'03/09/2019','12:48 PM',1),(266,2,'hi',3,'03/09/2019','12:48 PM',1),(267,2,'yow',3,'03/09/2019','12:50 PM',1),(268,3,'hei',2,'03/09/2019','12:52 PM',1),(269,2,'eii',3,'03/09/2019','12:52 PM',1),(270,2,'eii',3,'03/09/2019','12:53 PM',1),(271,2,'hei',3,'03/09/2019','12:54 PM',1),(272,2,'hei',3,'03/09/2019','12:56 PM',1),(273,3,'hi',2,'03/09/2019','12:56 PM',1),(274,3,'hi',2,'03/09/2019','12:56 PM',1),(275,2,'hi',3,'03/09/2019','11:16 PM',1),(276,2,'hi',4,'03/09/2019','11:21 PM',1),(277,2,'heello',3,'03/09/2019','11:24 PM',1),(278,3,'hei',2,'03/09/2019','11:41 PM',1),(279,2,'yow',3,'03/09/2019','11:42 PM',1),(280,2,'yow',3,'03/09/2019','11:42 PM',1),(281,3,'eii',2,'03/09/2019','11:42 PM',1),(282,3,'ei',2,'03/09/2019','11:42 PM',1),(283,3,'eii',2,'03/09/2019','11:43 PM',1),(284,3,'hei',2,'03/10/2019','12:26 AM',1),(285,2,'yow',3,'03/10/2019','12:28 AM',1),(286,2,'eii',3,'03/10/2019','12:29 AM',1),(287,3,'hi',2,'03/10/2019','12:29 AM',1),(288,3,'eii',2,'03/10/2019','12:30 AM',1),(289,2,'zup cuz',3,'03/10/2019','12:31 AM',1),(290,2,'zup cuz',3,'03/10/2019','12:32 AM',1),(291,3,'fine hbu',2,'03/10/2019','12:32 AM',1),(292,3,'yow',2,'03/10/2019','12:32 AM',1),(293,3,'yow',2,'03/10/2019','12:32 AM',1),(294,2,'eii',3,'03/10/2019','12:33 AM',1),(295,2,'eii',3,'03/10/2019','12:33 AM',1),(296,3,'yow',2,'03/10/2019','12:33 AM',1),(297,2,'eii',3,'03/10/2019','12:34 AM',1),(298,2,'eii',3,'03/10/2019','12:49 AM',1),(299,2,'eii',3,'03/10/2019','12:49 AM',1),(300,2,'yow',3,'03/10/2019','12:50 AM',1),(301,2,'yow',3,'03/10/2019','12:50 AM',1),(302,2,'eii',3,'03/10/2019','12:50 AM',1),(303,2,'yow',3,'03/10/2019','12:51 AM',1),(304,2,'yow',3,'03/10/2019','12:51 AM',1),(305,2,'eii',3,'03/10/2019','12:51 AM',1),(306,3,'heii',2,'03/10/2019','12:51 AM',1),(307,3,'heii',2,'03/10/2019','12:51 AM',1),(308,3,'heii',2,'03/10/2019','12:52 AM',1),(309,3,'hei',5,'03/10/2019','12:53 AM',1),(310,3,'hei',2,'03/10/2019','12:57 AM',1),(311,3,'yow',2,'03/10/2019','12:57 AM',1),(312,2,'zup',3,'03/10/2019','12:57 AM',1),(313,2,'zup',3,'03/10/2019','01:09 AM',1),(314,3,'eii',2,'03/10/2019','01:10 AM',1),(315,3,'yow',2,'03/10/2019','01:10 AM',1),(316,2,'zup',3,'03/10/2019','01:10 AM',1),(317,3,'fine bruh',2,'03/10/2019','01:10 AM',1),(318,3,'how bout u cuz',2,'03/10/2019','01:10 AM',1),(319,2,'fine cuz',3,'03/10/2019','01:11 AM',1),(320,2,'how you doin',3,'03/10/2019','01:11 AM',1),(321,2,'are u allright',3,'03/10/2019','01:11 AM',1),(322,3,'yow',2,'03/10/2019','01:19 AM',1),(323,2,'eiii',3,'03/10/2019','01:21 AM',1),(324,2,'eii',3,'03/10/2019','01:21 AM',1),(325,3,'yow',2,'03/10/2019','01:22 AM',1),(326,3,'eii',2,'03/10/2019','01:22 AM',1),(327,2,'eii',3,'03/10/2019','01:23 AM',1),(328,3,'yow',2,'03/10/2019','01:25 AM',1),(329,2,'eii',3,'03/10/2019','01:26 AM',1),(330,3,'kamusta',2,'03/10/2019','01:26 AM',1),(331,3,'eii',2,'03/10/2019','01:26 AM',1),(332,3,'heii',2,'03/10/2019','01:28 AM',1),(333,3,':) :) :* :( :* :* :( :* -_- ',2,'03/10/2019','01:51 AM',1),(334,3,':( :( :( ',2,'03/10/2019','01:51 AM',1),(335,3,':frown: :frown: :frown: :frown: ',2,'03/10/2019','01:51 AM',1),(336,3,'haha xD',2,'03/10/2019','01:59 AM',1),(337,3,':\'( ;) ;) ;) ;) ',2,'03/10/2019','02:05 AM',1),(338,3,':blush: :blush: :\'( ;) ',2,'03/10/2019','02:07 AM',1),(339,3,':) :) ',2,'03/10/2019','02:09 AM',1),(340,3,'hi',2,'03/10/2019','02:09 AM',1),(341,3,':( ',2,'03/10/2019','02:09 AM',1),(342,2,'heii',3,'03/10/2019','02:27 AM',1),(343,3,'yow',2,'03/10/2019','02:28 AM',1),(344,2,'eii',3,'03/10/2019','02:30 AM',1),(345,2,'orayt',3,'03/10/2019','02:30 AM',1),(346,2,'heii',3,'03/10/2019','02:31 AM',1),(347,3,'yes',2,'03/10/2019','02:31 AM',1),(348,3,'yow',2,'03/10/2019','02:31 AM',1),(349,3,'yow',2,'03/10/2019','02:32 AM',1),(350,2,'heii',3,'03/10/2019','02:32 AM',1),(351,3,'heii',2,'03/10/2019','02:32 AM',1),(352,3,'heii',2,'03/10/2019','02:33 AM',1),(353,2,'eiii',3,'03/10/2019','02:42 AM',1),(354,2,'eii',3,'03/10/2019','02:42 AM',1),(355,3,'yow',2,'03/10/2019','02:43 AM',1),(356,3,'eii',2,'03/10/2019','02:43 AM',1),(357,3,'eii',2,'03/10/2019','02:43 AM',1),(358,2,'eii',3,'03/10/2019','02:44 AM',1),(359,2,'eii',3,'03/10/2019','02:44 AM',1),(360,2,'yow',3,'03/10/2019','02:44 AM',1),(361,2,'eii',3,'03/10/2019','02:46 AM',1),(362,3,'yow',2,'03/10/2019','02:46 AM',1),(363,3,'eii',2,'03/10/2019','02:46 AM',1),(364,3,'eii',2,'03/10/2019','02:46 AM',1),(365,3,'eii',2,'03/10/2019','02:46 AM',1),(366,3,'yooww',2,'03/10/2019','02:47 AM',1),(367,3,'eoo',2,'03/10/2019','02:47 AM',1),(368,3,'eoo',2,'03/10/2019','02:47 AM',1),(369,3,'eiii',2,'03/10/2019','02:47 AM',1),(370,2,'eiii',5,'03/10/2019','02:47 AM',1),(371,2,'eiii',5,'03/10/2019','02:47 AM',1),(372,3,'yooow',5,'03/10/2019','02:47 AM',1),(373,3,'heiii',5,'03/10/2019','02:47 AM',1),(374,3,'heiii',5,'03/10/2019','02:48 AM',1),(375,2,'yooowww',5,'03/10/2019','02:48 AM',1),(376,2,'kamusta na',5,'03/10/2019','02:48 AM',1),(377,2,'lab ka daw nilaaa',5,'03/10/2019','02:48 AM',1),(378,2,'eiii',3,'03/10/2019','02:48 AM',1),(379,3,'eiii',2,'03/10/2019','02:50 AM',1),(380,3,'eiiii',2,'03/10/2019','02:50 AM',1),(381,2,'eiiii',5,'03/10/2019','02:50 AM',0),(382,2,'eiii',5,'03/10/2019','02:50 AM',0),(383,2,'eiii',5,'03/10/2019','02:50 AM',0),(384,2,'eiiie',5,'03/10/2019','02:50 AM',0),(385,2,'ieieieie',5,'03/10/2019','02:50 AM',0),(386,3,'eeueueueueue',2,'03/10/2019','02:50 AM',1),(387,3,'qoqoqoqoqq',2,'03/10/2019','02:50 AM',1),(388,3,'qoqoqoqoq',2,'03/10/2019','02:50 AM',1),(389,3,'oq',2,'03/10/2019','02:51 AM',1),(390,3,'yoyoyoyoy',2,'03/10/2019','02:51 AM',1),(391,3,'yoyoyoyoy',5,'03/10/2019','02:51 AM',0),(392,3,'yoyoyoy',5,'03/10/2019','02:51 AM',0),(393,3,'yoyoyoy',5,'03/10/2019','02:51 AM',0),(394,3,'eooo',2,'03/10/2019','02:51 AM',1),(395,3,'eiiii',2,'03/10/2019','02:51 AM',1),(396,2,'eiii',3,'03/10/2019','02:51 AM',1),(397,2,'eiii',3,'03/10/2019','02:51 AM',1),(398,2,'eiiii',3,'03/10/2019','02:51 AM',1),(399,2,'eiiii',3,'03/10/2019','02:51 AM',1),(400,2,'eiiiie',3,'03/10/2019','02:51 AM',1),(401,2,'eieieieieieie',3,'03/10/2019','02:52 AM',1),(402,3,'eiii',2,'03/10/2019','02:52 AM',1),(403,3,'eiiii',2,'03/10/2019','02:52 AM',1),(404,3,'eieieieie',2,'03/10/2019','02:52 AM',1),(405,3,'eieieie',2,'03/10/2019','02:52 AM',1),(406,3,'eiiiii',2,'03/10/2019','02:53 AM',1),(407,3,'eiiii',2,'03/10/2019','02:53 AM',1),(408,3,'eiii',2,'03/10/2019','02:53 AM',1),(409,2,'eii',3,'03/10/2019','02:54 AM',1),(410,2,'eii',3,'03/10/2019','02:54 AM',1),(411,2,'eiiii',3,'03/10/2019','02:54 AM',1),(412,2,'eiiii',3,'03/10/2019','02:54 AM',1),(413,2,'eiiii',3,'03/10/2019','02:56 AM',1),(414,2,'eiiii',3,'03/10/2019','02:56 AM',1),(415,2,'eiii',3,'03/10/2019','02:56 AM',1),(416,3,'eiii',2,'03/10/2019','03:06 AM',1),(417,3,'eiii',2,'03/10/2019','03:06 AM',1),(418,3,'eiii',2,'03/10/2019','03:06 AM',1),(419,3,'eiii',2,'03/10/2019','03:06 AM',1),(420,3,'eiiiiii',2,'03/10/2019','03:06 AM',1),(421,3,'eiiii',2,'03/10/2019','03:06 AM',1),(422,2,'yoow',3,'03/10/2019','03:06 AM',1),(423,2,'wii',3,'03/10/2019','03:06 AM',1),(424,2,'eiii',3,'03/10/2019','03:06 AM',1),(425,2,'eiii',3,'03/10/2019','03:06 AM',1),(426,3,'eiiii',2,'03/10/2019','03:06 AM',1),(427,2,'wii',4,'03/10/2019','03:07 AM',0),(428,2,'wiii',3,'03/10/2019','03:07 AM',1),(429,2,'wiii',3,'03/10/2019','03:07 AM',1),(430,2,'wiii',3,'03/10/2019','03:07 AM',1),(431,2,'wii',3,'03/10/2019','03:07 AM',1),(432,3,'hi',2,'03/10/2019','03:08 AM',1),(433,3,'hi',2,'03/10/2019','03:08 AM',1),(434,3,'heii',2,'03/10/2019','03:08 AM',1),(435,3,'eii',2,'03/10/2019','03:08 AM',1),(436,3,'hi',2,'03/10/2019','03:09 AM',1),(437,2,'yow',3,'03/10/2019','03:09 AM',1),(438,2,'eii',3,'03/10/2019','03:09 AM',1),(439,3,'hi',2,'03/10/2019','11:30 AM',1),(440,3,'eiii',2,'03/10/2019','11:31 AM',1),(441,3,'eii',2,'03/10/2019','11:31 AM',1),(442,3,'eii',2,'03/10/2019','11:31 AM',1),(443,2,'yooww',3,'03/10/2019','11:32 AM',1),(444,3,'eiiii',2,'03/10/2019','11:32 AM',1),(445,3,'eiii',2,'03/10/2019','11:32 AM',1),(446,2,'helllo',3,'03/10/2019','11:36 AM',1),(447,2,'hello',3,'03/10/2019','11:36 AM',1),(448,2,'hello',3,'03/10/2019','11:36 AM',1),(449,2,'hi',3,'03/10/2019','11:37 AM',1),(450,3,'hi',2,'03/10/2019','11:37 AM',1),(451,3,'hi',2,'03/10/2019','11:38 AM',1),(452,3,'hi',2,'03/10/2019','11:38 AM',1),(453,3,'hrello',2,'03/10/2019','11:38 AM',1),(454,2,'heii',3,'03/10/2019','11:40 AM',1),(455,2,'heii',3,'03/10/2019','11:40 AM',1),(456,3,'heii',2,'03/10/2019','11:42 AM',1),(457,3,'gge',2,'03/10/2019','11:42 AM',1),(458,3,'ge',2,'03/10/2019','11:42 AM',1),(459,3,'ge',2,'03/10/2019','11:42 AM',1),(460,3,'eii',2,'03/10/2019','11:46 AM',1),(461,3,'eii',2,'03/10/2019','11:46 AM',1),(462,3,'yow',2,'03/10/2019','11:47 AM',1),(463,3,'eii',2,'03/10/2019','11:52 AM',1),(464,2,'yow',3,'03/10/2019','12:03 PM',1),(465,3,'eii',2,'03/10/2019','12:04 PM',1),(466,2,'eii',3,'03/10/2019','12:04 PM',1),(467,3,'yow',2,'03/10/2019','12:05 PM',1),(468,3,'eii',2,'03/10/2019','12:05 PM',1),(469,3,'yow',2,'03/10/2019','12:10 PM',1),(470,2,'eii',3,'03/10/2019','12:11 PM',1),(471,2,'eii',3,'03/10/2019','12:15 PM',1),(472,3,'yow',2,'03/10/2019','12:15 PM',1),(473,2,'eii',3,'03/10/2019','12:16 PM',1),(474,3,'yow',2,'03/10/2019','12:16 PM',1),(475,3,'eii',2,'03/10/2019','12:17 PM',1),(476,2,'yow',3,'03/10/2019','12:17 PM',1),(477,3,'eii',2,'03/10/2019','12:17 PM',1),(478,3,'eii',2,'03/10/2019','12:17 PM',1),(479,3,'eii',2,'03/10/2019','12:17 PM',1),(480,3,'eii',2,'03/10/2019','12:18 PM',1),(481,3,'eiiii',2,'03/10/2019','12:21 PM',1),(482,2,'hey',3,'03/10/2019','12:21 PM',1),(483,2,'heii',3,'03/10/2019','12:21 PM',1),(484,2,'heii',3,'03/10/2019','12:21 PM',1),(485,2,'heii',3,'03/10/2019','12:21 PM',1),(486,2,'heiii',3,'03/10/2019','12:22 PM',1),(487,2,'heii',3,'03/10/2019','12:22 PM',1),(488,3,'heii',2,'03/10/2019','12:22 PM',1),(489,3,'heii',2,'03/10/2019','12:22 PM',1),(490,3,'heii',2,'03/10/2019','12:22 PM',1),(491,2,'yow',3,'03/10/2019','12:23 PM',1),(492,2,'yoow',3,'03/10/2019','12:24 PM',1),(493,2,'eii',3,'03/10/2019','03:43 PM',1),(494,3,'hi',2,'03/10/2019','03:43 PM',1),(495,3,'heii',2,'03/10/2019','03:43 PM',1),(496,2,'hi',3,'03/10/2019','03:46 PM',1),(497,3,'hello',2,'03/10/2019','03:46 PM',1),(498,3,'hello',2,'03/10/2019','03:46 PM',1),(499,3,'hi',2,'03/10/2019','03:46 PM',1),(500,3,'hello',2,'03/10/2019','03:46 PM',1);

/*Table structure for table `message_group` */

DROP TABLE IF EXISTS `message_group`;

CREATE TABLE `message_group` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_sender` int(11) NOT NULL,
  `msg_content` varchar(200) NOT NULL,
  `msg_groupchat` int(11) NOT NULL,
  `msg_date` varchar(200) NOT NULL,
  `msg_time` varchar(200) NOT NULL,
  `msg_admin` int(1) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `message_group` */

insert  into `message_group`(`msg_id`,`msg_sender`,`msg_content`,`msg_groupchat`,`msg_date`,`msg_time`,`msg_admin`) values (1,2,'Announcement!! Ang Pogi ko',16,'02/27/2019','10:21 AM',0),(2,3,':) ang pogiko',18,'02/27/2019','10:29 AM',0),(3,5,'hellow world ',18,'02/27/2019','10:30 AM',0),(4,2,'wag kang magulo ellie',18,'02/27/2019','10:31 AM',0),(5,5,'i love senior high <3',18,'02/27/2019','10:31 AM',0),(6,3,'Gago ka elli:) ',18,'02/27/2019','10:33 AM',0),(7,5,':devil: :devil: ',18,'02/27/2019','10:34 AM',0),(8,5,'thank u',18,'02/27/2019','10:34 AM',0),(9,3,'Pogi ko â˜º:) ',18,'02/27/2019','10:34 AM',0),(10,1,'John Joshua Bala was changed to Griffindor',17,'02/27/2019','01:47 PM',1),(11,1,'John Joshua Bala was changed to Hogwarts',18,'02/27/2019','02:10 PM',1),(12,1,'John Joshua Bala was changed to Hogwarts',18,'02/27/2019','02:13 PM',1),(13,1,'John Joshua Bala was changed to Hogwarts',18,'02/27/2019','02:16 PM',1),(14,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:17 PM',1),(15,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:18 PM',1),(16,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:19 PM',1),(17,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:26 PM',1),(18,1,'John Joshua Bala was changed to Hogwarts',18,'02/27/2019','02:27 PM',1),(19,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:29 PM',1),(20,1,'John Joshua Bala was changed to Sample GC',18,'02/27/2019','02:30 PM',1),(21,1,'John Joshua Bala was changed to Sample',18,'02/27/2019','02:31 PM',1),(22,1,'John Joshua Bala was changed to Sample GC',18,'02/27/2019','02:32 PM',1),(23,1,'John Joshua Bala was changed to Sample',18,'02/27/2019','02:32 PM',1),(24,1,'John Joshua Bala was changed to Hogwarts',18,'02/27/2019','02:33 PM',1),(25,1,'John Joshua Bala was changed to Mars',18,'02/27/2019','02:37 PM',1),(26,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:38 PM',1),(27,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:40 PM',1),(28,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:42 PM',1),(29,1,'John Joshua Bala was changed to Rakk',18,'02/27/2019','02:42 PM',1),(30,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:43 PM',1),(31,1,'John Joshua Bala was changed to Sample',18,'02/27/2019','02:43 PM',1),(32,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:44 PM',1),(33,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:46 PM',1),(34,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:46 PM',1),(35,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:47 PM',1),(36,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:48 PM',1),(37,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:50 PM',1),(38,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:52 PM',1),(39,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:53 PM',1),(40,1,'John Joshua Bala was changed to Dimsum Panda',18,'02/27/2019','02:54 PM',1),(41,1,'John Joshua Bala was changed to Team Dimsum',18,'02/27/2019','02:56 PM',1),(42,2,'taba mo na ngayon',18,'02/27/2019','03:20 PM',0),(43,2,'para ka nang si dumbo',18,'02/27/2019','03:24 PM',0),(44,2,':devil:    HAHAHAHAHAHAHHAHAHAAAAAAAAAAAHHHHAHHHHHHHHhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhshahshahshaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh',18,'02/27/2019','03:24 PM',0),(45,2,'saxjjksjdksjdkjskdjksjdksjdkjskdjksjdksjkdjskjkdjskdjksjdksjkdjskdjksjdksjkdjskdjksjdks',18,'02/27/2019','03:25 PM',0),(46,2,'zxzx',17,'02/27/2019','03:25 PM',0),(47,2,'In nature, light creates the color. In the picture, color creates the light.',18,'02/28/2019','11:29 AM',0),(48,2,'thehfhfhasfasdsadsadas jdsadjsadjsadkasdlsadsjaldsaljkdsakjdlsaldsajldasjldasjlkdasjlkdsajlkdasjkldjasldjklasdjlkasjkldasjkldaskljdjkasdjkasdkjasl',18,'02/28/2019','11:29 AM',0),(49,2,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a',18,'02/28/2019','11:33 AM',0),(50,2,'dsadsadasdsadasdasdsadsaasdsad',18,'02/28/2019','11:34 AM',0),(51,2,'sdsadasdsadasdsadsadsadsadsadsadsadsadsadsadsadasdsadsasadsa',18,'02/28/2019','11:34 AM',0),(52,2,'csacsacsasacsacsacsacsacsacsacsacsacasacsacsaacsacsacsacsacascsacsacsacsa',18,'02/28/2019','11:35 AM',0),(53,2,'sadsladsaldsaldsaldsaldsladlsadlsadlasdlsadlsaldasldsaldlasdlasdlasdlsaldsad;sad;as;dsa;das;daskdksadksdksakdsakdsakdksadksad',18,'02/28/2019','11:35 AM',0),(54,2,'slslslslalalalalasldsaldsaldsaldsaldlsadlasdlasadlasdlasldasldsadlsaldasldasld',18,'02/28/2019','11:35 AM',0),(55,2,'sdjasdsalkdsajdsajdklasdjklsadjklsajdksajkdsajkdsajkdaskljdsajkldjsadjklasdkjasdjkllsadkljsakjdsakljdsakljd',18,'02/28/2019','12:00 PM',0),(56,2,'hi mga viviys',18,'02/28/2019','12:00 PM',0),(57,2,'hi',17,'02/28/2019','01:46 PM',0),(58,2,'SE_1.1_-_Introduction_to_Software_Engineering(2).pptx',17,'02/28/2019','01:46 PM',0),(59,2,':) ',17,'02/28/2019','01:46 PM',0),(60,0,'John Joshua Bala was changed to Dimsum Panda',18,'02/28/2019','02:16 PM',0),(61,0,'John Joshua Bala was changed to LIM Capstone',18,'02/28/2019','02:38 PM',0),(62,1,'John Joshua Bala was changed to Dimsum',18,'02/28/2019','02:44 PM',0),(63,1,'John Joshua Bala was changed to LIM Capstone',18,'02/28/2019','02:45 PM',0),(64,2,'hello',18,'02/28/2019','02:46 PM',0),(65,1,'John Joshua Bala was changed to Team Dimsum',18,'03/02/2019','03:47 PM',0),(66,5,'hi',11,'03/04/2019','03:25 PM',0),(67,2,'LGU NEW LOGO2.jpg',11,'03/04/2019','03:25 PM',0),(68,2,'hello',11,'03/04/2019','03:25 PM',0),(69,2,'LGU NEW LOGO2.jpg',11,'03/04/2019','03:25 PM',0),(70,2,'qwerty',11,'03/04/2019','03:25 PM',0),(71,5,'pogi ko',11,'03/04/2019','03:27 PM',0),(72,1,'John Joshua Bala was changed to Tropang Cabinet',17,'03/06/2019','10:21 AM',0),(73,2,'haha.me',18,'03/06/2019','10:26 AM',0),(74,2,'hi',11,'03/06/2019','12:58 PM',0);

/*Table structure for table `mmagante` */

DROP TABLE IF EXISTS `mmagante`;

CREATE TABLE `mmagante` (
  `cntc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cntc_username` int(11) NOT NULL,
  `cntc_fullname` int(11) NOT NULL,
  PRIMARY KEY (`cntc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `mmagante` */

insert  into `mmagante`(`cntc_id`,`cntc_username`,`cntc_fullname`) values (1,1,1),(2,2,2),(3,3,3),(4,4,4);

/*Table structure for table `mpdc` */

DROP TABLE IF EXISTS `mpdc`;

CREATE TABLE `mpdc` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mpdc` */

/*Table structure for table `mswdo` */

DROP TABLE IF EXISTS `mswdo`;

CREATE TABLE `mswdo` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mswdo` */

/*Table structure for table `sangguniang_bayan` */

DROP TABLE IF EXISTS `sangguniang_bayan`;

CREATE TABLE `sangguniang_bayan` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sangguniang_bayan` */

insert  into `sangguniang_bayan`(`group_id`,`group_username`,`group_name`) values (1,2,11),(2,5,11);

/*Table structure for table `team_dimsum` */

DROP TABLE IF EXISTS `team_dimsum`;

CREATE TABLE `team_dimsum` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `team_dimsum` */

insert  into `team_dimsum`(`group_id`,`group_username`,`group_name`) values (1,5,18),(2,3,18),(3,2,18);

/*Table structure for table `treasury` */

DROP TABLE IF EXISTS `treasury`;

CREATE TABLE `treasury` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `treasury` */

/*Table structure for table `tropang_cabinet` */

DROP TABLE IF EXISTS `tropang_cabinet`;

CREATE TABLE `tropang_cabinet` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tropang_cabinet` */

insert  into `tropang_cabinet`(`group_id`,`group_username`,`group_name`) values (1,5,17),(2,3,17),(3,2,17);

/*Table structure for table `tropang_groupchat` */

DROP TABLE IF EXISTS `tropang_groupchat`;

CREATE TABLE `tropang_groupchat` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_username` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tropang_groupchat` */

insert  into `tropang_groupchat`(`group_id`,`group_username`,`group_name`) values (1,1,16),(2,3,16),(3,4,16);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
