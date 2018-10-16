-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 11:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  WHERE username = username;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `installmentpayment`
--

CREATE TABLE `installmentpayment` (
  `InstallmentPaymentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `SaleID` int(11) NOT NULL,
  `SaleVehicleid` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Bill_BillId` int(11) NOT NULL,
  `InstallmentPayment_InstallmentPaymentId` int(11) NOT NULL,
  `Customer_CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salevehicle`
--

CREATE TABLE `salevehicle` (
  `SaleVehicleid` int(11) NOT NULL,
  `TraderID` int(11) DEFAULT NULL,
  `TraderVehicleID` int(11) NOT NULL,
  `VehicleNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `systemmodule`
--

CREATE TABLE `systemmodule` (
  `SystemModuleID` int(11) NOT NULL,
  `ModuleCode` varchar(50) NOT NULL,
  `ModuleName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `systemrole` (
  `SystemRoleId` int(11) NOT NULL,
  `RoleCode` varchar(50) NOT NULL,
  `RoleName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemrole`
--

INSERT INTO `systemrole` (`SystemRoleId`, `RoleCode`, `RoleName`) VALUES
(1, 'Admin', 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `systemrole_has_systemmodule`
--

CREATE TABLE `systemrole_has_systemmodule` (
  `SystemRole_SystemRoleId` int(11) NOT NULL,
  `SystemModule_SystemModuleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

CREATE TABLE `systemuser` (
  `UserId` int(11) NOT NULL,
  `UserLoginID` int(11) NOT NULL,
  `IsTrader` varchar(3) DEFAULT 'No',
  `IsCustomer` varchar(3) DEFAULT 'No',
  `IsEmployee` varchar(3) DEFAULT 'No',
  `Username` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PreferedName` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `IsActive` varchar(3) NOT NULL,
  `IsActivated` varchar(3) NOT NULL,
  `IsAdmin` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`UserId`, `UserLoginID`, `IsTrader`, `IsCustomer`, `IsEmployee`, `Username`, `FirstName`, `LastName`, `PreferedName`, `Gender`, `DOB`, `IsActive`, `IsActivated`, `IsAdmin`) VALUES
(1, 1, 'n', 'n', 'n', 'irshadh', 'Mohomed', 'Irshadh', 'irshadh', 'Male', '1994-09-26', 'y', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `trader`
--

CREATE TABLE `trader` (
  `TraderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tradervehicle`
--

CREATE TABLE `tradervehicle` (
  `TraderVehicleID` int(11) NOT NULL,
  `Trader_traderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `UserLoginID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `HashedPassword` varchar(16) NOT NULL
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

CREATE TABLE `user_has_systemrole` (
  `UserId` int(11) NOT NULL,
  `SystemRoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_systemrole`
--

INSERT INTO `user_has_systemrole` (`UserId`, `SystemRoleId`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `UserID_idx` (`UserID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `UserID_idx` (`UserID`);

--
-- Indexes for table `installmentpayment`
--
ALTER TABLE `installmentpayment`
  ADD PRIMARY KEY (`InstallmentPaymentId`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`SaleID`),
  ADD KEY `fk_Sale_Bill1_idx` (`Bill_BillId`),
  ADD KEY `fk_Sale_InstallmentPayment1_idx` (`InstallmentPayment_InstallmentPaymentId`),
  ADD KEY `fk_Sale_Customer1_idx` (`Customer_CustomerID`);

--
-- Indexes for table `salevehicle`
--
ALTER TABLE `salevehicle`
  ADD PRIMARY KEY (`SaleVehicleid`),
  ADD KEY `TraderID_idx` (`TraderID`);

--
-- Indexes for table `systemmodule`
--
ALTER TABLE `systemmodule`
  ADD PRIMARY KEY (`SystemModuleID`);

--
-- Indexes for table `systemrole`
--
ALTER TABLE `systemrole`
  ADD PRIMARY KEY (`SystemRoleId`);

--
-- Indexes for table `systemrole_has_systemmodule`
--
ALTER TABLE `systemrole_has_systemmodule`
  ADD PRIMARY KEY (`SystemRole_SystemRoleId`,`SystemModule_SystemModuleID`),
  ADD KEY `fk_SystemRole_has_SystemModule_SystemModule1_idx` (`SystemModule_SystemModuleID`),
  ADD KEY `fk_SystemRole_has_SystemModule_SystemRole1_idx` (`SystemRole_SystemRoleId`);

--
-- Indexes for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD PRIMARY KEY (`UserId`,`Username`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD KEY `UserLoginID_idx` (`UserLoginID`);

--
-- Indexes for table `trader`
--
ALTER TABLE `trader`
  ADD PRIMARY KEY (`TraderID`),
  ADD KEY `UserID_idx` (`UserID`);

--
-- Indexes for table `tradervehicle`
--
ALTER TABLE `tradervehicle`
  ADD PRIMARY KEY (`TraderVehicleID`),
  ADD KEY `fk_TraderVehicle_Trader1_idx` (`Trader_traderid`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`UserLoginID`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD KEY `Username_idx` (`Username`);

--
-- Indexes for table `user_has_systemrole`
--
ALTER TABLE `user_has_systemrole`
  ADD PRIMARY KEY (`UserId`,`SystemRoleId`),
  ADD KEY `fk_User_has_SystemRole_SystemRole1_idx` (`SystemRoleId`),
  ADD KEY `fk_User_has_SystemRole_User1_idx` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `installmentpayment`
--
ALTER TABLE `installmentpayment`
  MODIFY `InstallmentPaymentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salevehicle`
--
ALTER TABLE `salevehicle`
  MODIFY `SaleVehicleid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `systemmodule`
--
ALTER TABLE `systemmodule`
  MODIFY `SystemModuleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `systemrole`
--
ALTER TABLE `systemrole`
  MODIFY `SystemRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `systemuser`
--
ALTER TABLE `systemuser`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trader`
--
ALTER TABLE `trader`
  MODIFY `TraderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tradervehicle`
--
ALTER TABLE `tradervehicle`
  MODIFY `TraderVehicleID` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `salevehicle`
--
ALTER TABLE `salevehicle`
  ADD CONSTRAINT `TraderID` FOREIGN KEY (`TraderID`) REFERENCES `trader` (`TraderID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `systemrole_has_systemmodule`
--
ALTER TABLE `systemrole_has_systemmodule`
  ADD CONSTRAINT `fk_SystemRole_has_SystemModule_SystemModule1` FOREIGN KEY (`SystemModule_SystemModuleID`) REFERENCES `systemmodule` (`SystemModuleID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SystemRole_has_SystemModule_SystemRole1` FOREIGN KEY (`SystemRole_SystemRoleId`) REFERENCES `systemrole` (`SystemRoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trader`
--
ALTER TABLE `trader`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `systemuser` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tradervehicle`
--
ALTER TABLE `tradervehicle`
  ADD CONSTRAINT `fk_TraderVehicle_Trader1` FOREIGN KEY (`Trader_traderid`) REFERENCES `trader` (`TraderID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_systemrole`
--
ALTER TABLE `user_has_systemrole`
  ADD CONSTRAINT `fk_User_has_SystemRole_SystemRole1` FOREIGN KEY (`SystemRoleId`) REFERENCES `systemrole` (`SystemRoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_SystemRole_User1` FOREIGN KEY (`UserId`) REFERENCES `systemuser` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
