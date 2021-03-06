CREATE DATABASE `hiking`;

USE `hiking`;

CREATE TABLE `hikes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `difficulty` int(11) NOT NULL,
  `distance` float(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `elevation` int(11) NOT NULL,
  `createdAt` int(20) NOT NULL,
  `updatedAt` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user`(
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `hikes`(`ID`,`name`,`difficulty`,`distance`,`duration`,`elevation`, `createdAt`, `updatedAt`) values

(1, "Tervuren : Le Meilleurs de l' Arboretum", 0, 9.33, "03H07", 87, 1638959570, 1638959570),
(2, "Sy : Hamoir" , 1, 12.81, "03H47", 331, 1638959570, 1638959570),
(3, "Theux", 2, 27.93, "07h31", 907, 1638959570, 1638959570),
(4, "Villers Le Temple", 2, 10.29 , "02H12", 224, 1638959570, 1638959570),
(5, "Vielsalm", 0, 10.38, "02H19", 213, 1638959570, 1638959570),
(6, "Marloie", 1, 10.6, "02H46", 237, 1638959570, 1638959570);
