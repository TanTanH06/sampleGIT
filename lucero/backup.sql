/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.28-MariaDB : Database - dblucero
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dblucero` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dblucero`;

/*Table structure for table `aboutus` */

DROP TABLE IF EXISTS `aboutus`;

CREATE TABLE `aboutus` (
  `aboutid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `atitle` varchar(128) NOT NULL,
  `acontent` text DEFAULT NULL,
  PRIMARY KEY (`aboutid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `aboutus` */

insert  into `aboutus`(`aboutid`,`atitle`,`acontent`) values (2,'Misyon','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ipsum sapien, lobortis sit amet convallis non, faucibus congue neque. Suspendisse nec blandit purus, vel cursus elit. Nullam in rutrum ex. Phasellus tincidunt bibendum congue. Aliquam in nulla ac quam interdum dapibus vel nec quam. Suspendisse et pellentesque lectus. Aliquam sit amet enim odio. Etiam quis pellentesque mi, et ullamcorper elit. Fusce vel orci at ante dignissim pellentesque. Suspendisse porta risus sit amet blandit dictum. Praesent eget tempus dolor. Vestibulum eu vehicula orci. Fusce massa lectus, dictum malesuada ex in, pulvinar maximus purus. Sed sit amet tortor ac nisl cursus gravida vitae eu nisl. Vestibulum tempor euismod purus nec maximus. Nam ut justo interdum, pulvinar leo vitae, placerat nibh.'),(3,'Vision','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ipsum sapien, lobortis sit amet convallis non, faucibus congue neque. Suspendisse nec blandit purus, vel cursus elit. Nullam in rutrum ex. Phasellus tincidunt bibendum congue. Aliquam in nulla ac quam interdum dapibus vel nec quam. Suspendisse et pellentesque lectus. Aliquam sit amet enim odio. Etiam quis pellentesque mi, et ullamcorper elit. Fusce vel orci at ante dignissim pellentesque. Suspendisse porta risus sit amet blandit dictum. Praesent eget tempus dolor. Vestibulum eu vehicula orci. Fusce massa lectus, dictum malesuada ex in, pulvinar maximus purus. Sed sit amet tortor ac nisl cursus gravida vitae eu nisl. Vestibulum tempor euismod purus nec maximus. Nam ut justo interdum, pulvinar leo vitae, placerat nibh.'),(13,'samPle htmlspecialchars','&lt;script&gt; for(var x=1;x&lt;=10;x++){ alert(x)}&lt;/script&gt;'),(20,'&lt;H1&gt; SAMPLE HTMLSPECIALCHARS &lt;/H1&gt;','This page allows end-user to facilitate adding, modifying, updating, and deleting ABOUT US records.'),(21,'sampolan natin',' for(var x=1;x'),(22,'samPle Ulit','BAkA LANG \r\ntHE QUICK BROWN FOX JUMPS OVER THE lAZY DOG\r\n YEHHHHEEEEYY');

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `newsID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `date_posted` date NOT NULL,
  `author` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`newsID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `news` */

insert  into `news`(`newsID`,`title`,`date_posted`,`author`,`content`,`image`) values (1,'PH Navy denies China expelled ship in Bajo de Masinloc','2025-04-21','Martin Jalosjos','The Philippine Navy (PN) said there is no truth to reports being circulated by the Chinese Navy that it expelled BRP Apolinario Mabini (PS-36), a PN corvette, in the waters of Bajo de Masinloc (Scarborough or Panatag Shoal) for illegal intrusion.\r\n\r\nRear Admiral Roy Vincent Trinidad, PN spokesperson for West Philippine Sea (WPS), said what China was trying to do was part of its malign information strategy to shape the opinions of its internal audience.\r\n\r\n\r\n“These are all part of shaping or malign info operations more likely for their internal audience,” he said on Monday, April 21.\r\n\r\nIn a statement, the Chinese Navy said BRP Apolinario Mabini “illegally intruded into the territorial waters of China\'s Huangyan Dao without the approval of Chinese government” on Sunday, April 20, citing the Chinese name it calls Bajo de Masinloc.\r\n\r\nThe Chinese People’s Liberation Army (PLA) Southern Theater Command tracked, monitored, and warned off the corvette, according to Senior Captain Zhao Zhiwei, spokesperson for the PLA Southern Theater Command.\r\n\r\n“We solemnly warn the Philippine side to immediately cease infringement and provocation. Otherwise, all consequences arising therefrom will be borne by the Philippine side,” he noted.\r\n\r\nBut Trinidad dismissed the Chinese Navy official’s remarks, saying the PN need not to ask permission from the Chinese government if they wish to patrol Bajo de Masinloc as the shoal is located within the Philippines’ maritime zone.\r\n\r\nBajo de Masinloc is located approximately 124 nautical miles off Masinloc, Zambales – within the 200-nautical mile exclusive economic zone (EEZ) of the Philippines.\r\n\r\n“Only the Philippine Navy and other Philippine flagged law enforcement ships have the authority and legal bases to challenge any ship within maritime zones,” Trinidad stressed','1.jfif'),(2,'Gilgeous-Alexander, Jokic, Antetokounmpo named NBA MVP finalists','2025-04-21','Agence France-Presse','LOS ANGELES - Oklahoma City Thunder star Shai Gilgeous-Alexander, Denver Nuggets big man Nikola Jokic and Milwaukee Bucks star Giannis Antetokounmpo were named finalists for the 2025 NBA Most Valuable Player award on Saturday.\r\n\r\nJokic, named MVP for the third time in four years last season, has delivered another remarkable individual statistical season, averaging a triple-double of 29.6 points, 12.7 rebounds and 10.2 assists per game.\r\n\r\nThe Serbian superstar is just the third player to average a triple-double, but Canadian Gilgeous-Alexander boasted the best scoring average in the league with 32.7 points per game.\r\n\r\nGilgeous-Alexander shot almost 52% from the field as he led the Thunder to the best record in the league. Oklahoma City won 68 games and set a league record for scoring margin.','2.jpg'),(3,'State necrological service, funeral rites for Nora Aunor to be held on April 22','2025-04-21','Hannah Mallorca','The life and legacy of Nora Aunor will be honored in a state necrological service at the Metropolitan Theater (MET), before capping off with her funeral rites at the Libingan ng mga Bayani on Tuesday, April 22.\r\n\r\nIn a joint statement by the National Commission for Culture and the Arts (NCCA) and the Cultural Center of the Philippines (CCP), the necrological service will take place at the Metropolitan Theater in Manila, beginning with the arrival honors at 8:30 a.m. and will be followed by a tribute program at 9:00 a.m.\r\n\r\nIt will be open to the public, although limited slots are available, with registration starting on Monday, April 21, on the social media platforms of the government agencies.','3.png'),(4,'Ate Guy, ang pag gunita','2025-04-16','Marites','The life and legacy of Nora Aunor will be honored in a state necrological service at the Metropolitan Theater (MET), before capping off with her funeral rites at the Libingan ng mga Bayani on Tuesday, April 22.\r\n\r\nIn a joint statement by the National Commission for Culture and the Arts (NCCA) and the Cultural Center of the Philippines (CCP), the necrological service will take place at the Metropolitan Theater in Manila, beginning with the arrival honors at 8:30 a.m. and will be followed by a tribute program at 9:00 a.m.\r\n\r\nIt will be open to the public, although limited slots are available, with registration starting on Monday, April 21, on the social media platforms of the government agencies.','4.jfif');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `pword` varbinary(40) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`userid`,`fname`,`lname`,`username`,`pword`) values (1,'Harold','Lucero','master','12334234'),(2,'Hanzo','Lucero','hanzo','75004f149038473757da0be07ef76dd4a9bdbc8d'),(3,'HeNdrix','Lucero','Hendrix','f8c38b2167c0ab6d7c720e47c2139428d77d8b6a');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
