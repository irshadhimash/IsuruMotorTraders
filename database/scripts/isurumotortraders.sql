-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2018 at 06:29 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isurumotortraders`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `GETUSERFORLOGIN`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETUSERFORLOGIN` (IN `username` CHAR(50))  BEGIN
  SELECT
  	SU.UserId,
    SU.FirstName,
    SU.LastName,
    SU.PreferedName,
    SU.Username,
    UL.HashedPassword,
    SR.RoleCode AS UserRole
  FROM systemuser SU
  INNER JOIN userlogin UL
  	ON SU.UserLoginID = UL.UserLoginID
  INNER JOIN user_has_systemrole UHR
  	ON SU.UserId = UHR.UserId
  INNER JOIN systemrole SR
  	ON UHR.SystemRoleId = SR.SystemRoleId
  WHERE SU.username = username;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `BillId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`BillId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`CustomerID`),
  KEY `UserID_idx` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  KEY `UserID_idx` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `installmentpayment`
--

DROP TABLE IF EXISTS `installmentpayment`;
CREATE TABLE IF NOT EXISTS `installmentpayment` (
  `InstallmentPaymentId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`InstallmentPaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `SaleID` int(11) NOT NULL AUTO_INCREMENT,
  `SaleVehicleid` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Bill_BillId` int(11) NOT NULL,
  `InstallmentPayment_InstallmentPaymentId` int(11) NOT NULL,
  `Customer_CustomerID` int(11) NOT NULL,
  PRIMARY KEY (`SaleID`),
  KEY `fk_Sale_Bill1_idx` (`Bill_BillId`),
  KEY `fk_Sale_InstallmentPayment1_idx` (`InstallmentPayment_InstallmentPaymentId`),
  KEY `fk_Sale_Customer1_idx` (`Customer_CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `systemmodule`
--

DROP TABLE IF EXISTS `systemmodule`;
CREATE TABLE IF NOT EXISTS `systemmodule` (
  `SystemModuleID` int(11) NOT NULL AUTO_INCREMENT,
  `ModuleCode` varchar(50) NOT NULL,
  `ModuleName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SystemModuleID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemmodule`
--

INSERT INTO `systemmodule` (`SystemModuleID`, `ModuleCode`, `ModuleName`) VALUES
(1, 'Purchasing', 'Purchase'),
(2, 'Inventory', 'Inventory'),
(3, 'Sales', 'Sales Portal'),
(4, 'InstallmentPayment', 'Installment Payments'),
(5, 'ServiceAggreements', 'Service Aggreements'),
(6, 'CustomerPortal', 'Customers'),
(7, 'TraderPortal', 'Traders'),
(8, 'CostAndProfit', 'Cost And Profit');

-- --------------------------------------------------------

--
-- Table structure for table `systemrole`
--

DROP TABLE IF EXISTS `systemrole`;
CREATE TABLE IF NOT EXISTS `systemrole` (
  `SystemRoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleCode` varchar(50) NOT NULL,
  `RoleName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SystemRoleId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemrole`
--

INSERT INTO `systemrole` (`SystemRoleId`, `RoleCode`, `RoleName`) VALUES
(1, 'Admin', 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `systemrole_has_systemmodule`
--

DROP TABLE IF EXISTS `systemrole_has_systemmodule`;
CREATE TABLE IF NOT EXISTS `systemrole_has_systemmodule` (
  `SystemRole_SystemRoleId` int(11) NOT NULL,
  `SystemModule_SystemModuleID` int(11) NOT NULL,
  PRIMARY KEY (`SystemRole_SystemRoleId`,`SystemModule_SystemModuleID`),
  KEY `fk_SystemRole_has_SystemModule_SystemModule1_idx` (`SystemModule_SystemModuleID`),
  KEY `fk_SystemRole_has_SystemModule_SystemRole1_idx` (`SystemRole_SystemRoleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

DROP TABLE IF EXISTS `systemuser`;
CREATE TABLE IF NOT EXISTS `systemuser` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserLoginID` int(11) DEFAULT NULL,
  `IsTrader` varchar(3) DEFAULT 'n',
  `IsCustomer` varchar(3) DEFAULT 'n',
  `IsEmployee` varchar(3) DEFAULT 'n',
  `Username` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PreferedName` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `IsActive` varchar(3) DEFAULT 'n',
  `IsActivated` varchar(3) DEFAULT 'n',
  `IsAdmin` varchar(3) DEFAULT 'n',
  `Address` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  PRIMARY KEY (`UserId`,`Username`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  KEY `UserLoginID_idx` (`UserLoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`UserId`, `UserLoginID`, `IsTrader`, `IsCustomer`, `IsEmployee`, `Username`, `FirstName`, `LastName`, `PreferedName`, `Gender`, `DOB`, `IsActive`, `IsActivated`, `IsAdmin`, `Address`, `Email`) VALUES
(1, 1, 'n', 'n', 'n', 'irshadh', 'Mohomed', 'Irshadh', 'irshadh', 'Male', '1994-09-26', 'y', 'y', 'y', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `UserLoginID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `HashedPassword` varchar(16) NOT NULL,
  PRIMARY KEY (`UserLoginID`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  KEY `Username_idx` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`UserLoginID`, `Username`, `HashedPassword`) VALUES
(1, 'irshadh', 'ThEemm5.5pci6');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_systemrole`
--

DROP TABLE IF EXISTS `user_has_systemrole`;
CREATE TABLE IF NOT EXISTS `user_has_systemrole` (
  `UserId` int(11) NOT NULL,
  `SystemRoleId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`,`SystemRoleId`),
  KEY `fk_User_has_SystemRole_SystemRole1_idx` (`SystemRoleId`),
  KEY `fk_User_has_SystemRole_User1_idx` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_systemrole`
--

INSERT INTO `user_has_systemrole` (`UserId`, `SystemRoleId`) VALUES
(1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `fk_Sale_Bill1` FOREIGN KEY (`Bill_BillId`) REFERENCES `bill` (`BillId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sale_Customer1` FOREIGN KEY (`Customer_CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sale_InstallmentPayment1` FOREIGN KEY (`InstallmentPayment_InstallmentPaymentId`) REFERENCES `installmentpayment` (`InstallmentPaymentId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `systemrole_has_systemmodule`
--
ALTER TABLE `systemrole_has_systemmodule`
  ADD CONSTRAINT `fk_SystemRole_has_SystemModule_SystemModule1` FOREIGN KEY (`SystemModule_SystemModuleID`) REFERENCES `systemmodule` (`SystemModuleID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SystemRole_has_SystemModule_SystemRole1` FOREIGN KEY (`SystemRole_SystemRoleId`) REFERENCES `systemrole` (`SystemRoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_systemrole`
--
ALTER TABLE `user_has_systemrole`
  ADD CONSTRAINT `fk_User_has_SystemRole_SystemRole1` FOREIGN KEY (`SystemRoleId`) REFERENCES `systemrole` (`SystemRoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_SystemRole_User1` FOREIGN KEY (`UserId`) REFERENCES `systemuser` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
