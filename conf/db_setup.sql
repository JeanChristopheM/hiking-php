/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hiking` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hiking`;

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `hikes`;

CREATE TABLE `hikes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `difficulty` int(11) NOT NULL,
  `distance` float(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `elevation` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `hikes`(`ID`,`name`,`difficulty`,`distance`,`duration`,`elevation`) values

(1, "Tervuren : Le Meilleurs de l' Arboretum", 0, 9.33, "03H07", 87),
(2, "Sy : Hamoir" , 1, 12.81, "03H47", 331),
(3, "Theux", 2, 27.93, "07h31", 907),
(4, "Villers Le Temple", 2, 10.29 , "02H12", 224),
(5, "Vielsalm", 0, 10.38, "02H19", 213),
(6, "Marloie", 1, 10.6, "02H46", 237);
