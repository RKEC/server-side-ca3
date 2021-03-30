DROP DATABASE IF EXISTS ca2;
CREATE DATABASE ca2;
USE ca2;
DROP TABLE IF EXISTS phones, os;

CREATE TABLE `os` (
  `osID` int(11) NOT NULL,
  `osName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `os` (`osID`, `osName`) VALUES
(1, 'Android'),
(2, 'IOS'),
(3, 'Blackberry'),
(4, 'Windows');


CREATE TABLE `phones` (
  `phoneID` int(11) NOT NULL,
  `dateAdded` date NOT NULL,
  `osID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `phones` (`phoneID`, `dateAdded`, `osID`, `name`, `price`, `image`) VALUES
(1, '2020-12-12', 2, 'iPhone 12', '999.00', '699056.jpeg'),
(2, '2020-12-30', 2, 'iPhone Xr', '750.00', '816273.jpeg'),
(3, '2021-01-20', 2, 'iPhone 11', '875.00', '453776.jpeg'),
(4, '2021-02-01', 2, 'iPhone 12 Pro', '1250.20', '620693.jpeg'),
(5, '2020-11-01', 1, 'OnePlus 8 Pro', '1205.00', '815155.png'),
(6, '2020-12-30', 1, 'OnePlus 8t', '750.10', '893274.png'),
(7, '2021-01-21', 1, 'Galaxy Note 20', '999.00', '384129.png'),
(8, '2021-01-21', 1, 'Google Pixel 4', '600.00', '782513.jpeg'),
(9, '2021-01-07', 1, 'Huawei P Smart', '160.50', '697261.png'),
(10, '2020-08-01', 3, 'BlackBerry PRIV', '200.00', '875824.jpeg'),
(11, '2020-11-07', 3, 'BlackBerry PRD', '120.00', '642848.jpg'),
(12, '2020-09-10', 4, 'Nokia Lumia 635', '286.30', '952642.jpeg'),
(13, '2020-11-09', 4, 'Nokia Lumia 200', '143.00', '260702.jpeg'),
(14, '2021-03-04', 2, 'iPhone 36 Pro', '11000.00', '156515.jpeg');

ALTER TABLE `os`
  ADD PRIMARY KEY (`osID`);

ALTER TABLE `phones`
  ADD PRIMARY KEY (`phoneID`),
  ADD KEY `osID` (`osID`);

ALTER TABLE `os`
  MODIFY `osID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


ALTER TABLE `phones`
  MODIFY `phoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `phones`
  ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`osID`) REFERENCES `os` (`osID`);
COMMIT;

