-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 05:26 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `CREATESALE` (IN `VNo` VARCHAR(10), IN `UserId` INT(10), IN `Price` INT(10), IN `CashOrIns` VARCHAR(60), IN `InitPay` INT(10))  INSERT INTO sale (VehicleNo, SoldBy, DateSold, SalePrice, PaymentMethod, InitialPayment)
	VALUES (VNo, UserId, CURRENT_DATE(), Price, CashOrIns, InitPay )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CREATEUSER` (IN `istrader` VARCHAR(3), IN `iscustomer` VARCHAR(3), IN `isemployee` VARCHAR(3), IN `firstname` VARCHAR(50), IN `lastname` VARCHAR(50), IN `preferedname` VARCHAR(50), IN `address` VARCHAR(50), IN `gender` VARCHAR(6), IN `DOB` DATE, IN `email` VARCHAR(60), IN `username` VARCHAR(50), IN `hashedpw` VARCHAR(255), IN `isadmin` VARCHAR(3))  BEGIN
START TRANSACTION;

	INSERT INTO userlogin ( username, hashedpassword)
    	VALUES ( username, hashedpw );
        
	INSERT INTO systemuser ( UserLoginID, istrader, iscustomer, isemployee, firstname, lastname, preferedname, address, gender, DOB, email, username, isadmin)
    	VALUES ( LAST_INSERT_ID(), istrader, iscustomer, isemployee, firstname, lastname, preferedname, address, gender, DOB, email, username, isadmin);

COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CREATEVEHICLE` (IN `RegistrationNo` VARCHAR(10), IN `EngineNo` VARCHAR(50), IN `VehicleClass` VARCHAR(20), IN `Status` VARCHAR(10), IN `FuelType` VARCHAR(10), IN `Country` VARCHAR(15), IN `Make` VARCHAR(15), IN `Model` VARCHAR(15), IN `Cost` INT, IN `SalePrice` INT, IN `UserId` INT, IN `Availability` VARCHAR(10))  NO SQL
INSERT INTO vehicle (RegistrationNo, EngineNo, VehicleClass, Status, FuelType, Country, Make, Model, Cost, SalePrice, UserId, Availability ) VALUES ( RegistrationNo, EngineNo, VehicleClass, Status, FuelType, Country, Make, Model, Cost, SalePrice, UserId, Availability )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETEVEHICLE` (IN `Id` INT)  NO SQL
DELETE
FROM vehicle
WHERE VehicleId = Id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GETALLSALES` ()  SELECT
	S.SaleID,
    s.DateSold,
    SU.PreferedName AS SoldBy,
    s.VehicleNo,
    s.SalePrice,
    s.PaymentMethod
FROM sale s
INNER JOIN systemuser SU
	ON S.SoldBy = SU.UserId
    ORDER BY s.DateSold DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GETALLVEHICLES` ()  NO SQL
SELECT
	V.*,
    SU.PreferedName AS ListedBy
FROM vehicle v
LEFT OUTER JOIN systemuser SU
	ON V.UserId = SU.UserId
    WHERE V.Availability = 'Available'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GETMODULELISTBYROLECODE` (IN `rolecode` VARCHAR(50))  NO SQL
SELECT
SR.RoleCode,
SM.*
FROM roldemodulelink RL
INNER JOIN systemrole SR
ON RL.RoleId = SR.SystemRoleId
INNER JOIN systemmodule SM
ON RL.ModuleId = SM.SystemModuleID
WHERE SR.RoleCode = rolecode$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GETUSERFORLOGIN` (IN `username` VARCHAR(50))  SELECT
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
  LEFT OUTER JOIN UserRoleLink URL
  	ON SU.UserId = URL.UserId
  LEFT OUTER JOIN systemrole SR
  	ON URL.SystemRoleId = SR.SystemRoleId
  WHERE SU.username = username$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GETVEHICLEBYID` (IN `ID` INT(10))  NO SQL
SELECT
	V.*,
    SU.PreferedName AS ListedBy
FROM vehicle v
LEFT OUTER JOIN systemuser SU
	ON V.UserId = SU.UserId
WHERE V.VehicleId = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GETVEHICLEBYREGNO` (IN `RegNo` VARCHAR(10))  READS SQL DATA
SELECT
	V.VehicleId,
    V.RegistrationNo,
    V.Make,
    V.Model,
    V.Cost,
    V.SalePrice
FROM vehicle v
WHERE V.Availability = 'Available' AND V.RegistrationNo = RegNo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REVERSESALE` (IN `ID` INT(11), IN `VNo` VARCHAR(10))  NO SQL
BEGIN
START TRANSACTION;

	DELETE FROM sale
    WHERE SaleID = ID;
    
    UPDATE vehicle V
    SET V.Availability = 'Available'
    	WHERE V.RegistrationNo = VNo;

COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATEVEHICLE` (IN `RegistrationNo` VARCHAR(10), IN `EngineNo` VARCHAR(50), IN `VehicleClass` VARCHAR(20), IN `Status` VARCHAR(10), IN `FuelType` VARCHAR(10), IN `Country` VARCHAR(15), IN `Make` VARCHAR(15), IN `Model` VARCHAR(15), IN `Cost` INT, IN `SalePrice` INT, IN `UserId` INT, IN `Availability` VARCHAR(10))  NO SQL
UPDATE
	vehicle V
SET V.RegistrationNo = RegistrationNo, V.EngineNo = EngineNo, V.VehicleClass = VehicleClass, V.Status = Status, V.FuelType = FuelType, V.Country = Country, V.Make = Make, V.Model = Model, V.Cost = Cost, V.SalePrice = SalePrice, V.UserId = UserId, V.Availability = Availability
WHERE V.RegistrationNo = RegistrationNo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATEVEHICLEAVAILABILITY` (IN `RegNo` VARCHAR(10))  UPDATE vehicle V
	SET V.Availability = 'Sold'
    WHERE V.RegistrationNo = RegNo$$

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
  `InstallmentPaymentId` int(11) NOT NULL,
  `SaleId` int(10) NOT NULL,
  `PaymentDate` date NOT NULL,
  `AmountPaid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roldemodulelink`
--

CREATE TABLE `roldemodulelink` (
  `RoleModuleId` int(10) UNSIGNED NOT NULL,
  `RoleId` int(10) UNSIGNED NOT NULL,
  `ModuleId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roldemodulelink`
--

INSERT INTO `roldemodulelink` (`RoleModuleId`, `RoleId`, `ModuleId`) VALUES
(2, 1, 2),
(3, 1, 3),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `SaleID` int(11) NOT NULL,
  `VehicleNo` varchar(10) NOT NULL,
  `SoldBy` int(11) NOT NULL,
  `DateSold` date NOT NULL,
  `SalePrice` int(11) NOT NULL,
  `PaymentMethod` varchar(60) NOT NULL DEFAULT 'Cash',
  `InitialPayment` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`SaleID`, `VehicleNo`, `SoldBy`, `DateSold`, `SalePrice`, `PaymentMethod`, `InitialPayment`) VALUES
(10, 'HD-2433', 1, '2019-12-11', 120000, 'Installment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `systemmodule`
--

CREATE TABLE `systemmodule` (
  `SystemModuleID` int(11) NOT NULL,
  `ModuleCode` varchar(50) NOT NULL,
  `ModuleName` varchar(50) DEFAULT NULL,
  `ModuleDescription` varchar(150) NOT NULL,
  `ModuleLink` varchar(20) NOT NULL,
  `ModuleImage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemmodule`
--

INSERT INTO `systemmodule` (`SystemModuleID`, `ModuleCode`, `ModuleName`, `ModuleDescription`, `ModuleLink`, `ModuleImage`) VALUES
(2, 'Inventory', 'Inventory', 'View and manage your vehicle inventory.', 'inventory.php', 'Inventory.png'),
(3, 'Sales', 'Sales', 'View and manage your sales.', 'sales.php', 'Sales.png'),
(6, 'CustomerPortal', 'Customers', '', '', ''),
(7, 'TraderPortal', 'Traders', '', '', ''),
(9, 'Customers', 'Customers', 'View and manage your customers', 'Customers.php', 'customer.png'),
(10, 'Traders', 'Traders', 'View and manage your traders', 'Traders.php', 'traders.png'),
(11, 'AddSale', 'Checkout', 'Checkout Items.', 'addsale.php', 'AddSale.png');

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
-- Table structure for table `systemuser`
--

CREATE TABLE `systemuser` (
  `UserId` int(11) NOT NULL,
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
  `Email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`UserId`, `UserLoginID`, `IsTrader`, `IsCustomer`, `IsEmployee`, `Username`, `FirstName`, `LastName`, `PreferedName`, `Gender`, `DOB`, `IsActive`, `IsActivated`, `IsAdmin`, `Address`, `Email`) VALUES
(1, 1, 'n', 'n', 'n', 'irshadh', 'Mohomed', 'Irshadh', 'irshadh', 'Male', '1994-09-26', 'y', 'y', 'y', '', ''),
(9, 8, 'y', 'n', 'n', 'abc', 'abc', 'abc', 'abc', 'Male', '2018-11-14', 'n', 'n', 'n', 'abc', 'abc2@xyz.com'),
(10, 9, 'y', 'n', 'n', 'sahanaf', 'Fathima', 'Sahana', 'Sahana', 'Female', '1995-10-16', 'n', 'n', 'n', 'Minuwangoda', 'abc@xyz.com');

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
(1, 'irshadh', 'ThEemm5.5pci6'),
(8, 'abc', 'ThG2XHmq.t7EU'),
(9, 'sahanaf', 'ThrxmgTdEzwI.');

-- --------------------------------------------------------

--
-- Table structure for table `userrolelink`
--

CREATE TABLE `userrolelink` (
  `UserId` int(11) NOT NULL,
  `SystemRoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userrolelink`
--

INSERT INTO `userrolelink` (`UserId`, `SystemRoleId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleId` int(10) UNSIGNED NOT NULL,
  `RegistrationNo` varchar(10) NOT NULL,
  `EngineNo` varchar(50) NOT NULL,
  `VehicleClass` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `FuelType` varchar(10) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Make` varchar(15) NOT NULL,
  `Model` varchar(15) NOT NULL,
  `Cost` int(10) UNSIGNED NOT NULL,
  `SalePrice` int(10) UNSIGNED NOT NULL,
  `UserId` int(10) UNSIGNED DEFAULT NULL,
  `Availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleId`, `RegistrationNo`, `EngineNo`, `VehicleClass`, `Status`, `FuelType`, `Country`, `Make`, `Model`, `Cost`, `SalePrice`, `UserId`, `Availability`) VALUES
(1, 'HD-2433', 'XYASFDE', 'Motor Cycle', 'Used', 'Petrol', 'India', 'Bajaj', 'Pulsar', 87000, 120000, 1, 'Sold'),
(2, 'CAX-0001', 'C2-XDASWR', 'Motor Cycle', 'Used', 'Petrol', 'Japan', 'Yamaha', 'FZ', 234000, 255000, 1, 'Available'),
(6, 'xd-1111', 'casdadd', 'Van', 'New', 'Petrol', 'Japan', 'Yamaha', 'qwe', 100000, 120000, 1, 'Available'),
(7, 'AF-1234', 'ASDFGHJK', 'Motor Cycle', 'Used', 'Petrol', 'India', 'Hero', 'Splendar', 65000, 85000, 1, 'Available'),
(8, 'SE-5512', 'QWERTY', 'Car', 'New', 'Diesel', 'Germany', 'BMW', '740Le', 1100000, 1300000, 1, 'Available'),
(10, 'DF-1234', 'A', 'Motor Cycle', 'Used', 'Petrol', 'A', 'A', 'A', 123000, 0, 1, 'Available'),
(11, 'CF-1234', 'GHGJGK', 'Car', 'New', 'Diesel', 'Germany', 'BMW', '740Le', 1100000, 1270000, 1, 'Available');

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
-- Indexes for table `roldemodulelink`
--
ALTER TABLE `roldemodulelink`
  ADD PRIMARY KEY (`RoleModuleId`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`SaleID`);

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
-- Indexes for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD PRIMARY KEY (`UserId`,`Username`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD KEY `UserLoginID_idx` (`UserLoginID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`UserLoginID`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD KEY `Username_idx` (`Username`);

--
-- Indexes for table `userrolelink`
--
ALTER TABLE `userrolelink`
  ADD PRIMARY KEY (`UserId`,`SystemRoleId`),
  ADD KEY `fk_User_has_SystemRole_SystemRole1_idx` (`SystemRoleId`),
  ADD KEY `fk_User_has_SystemRole_User1_idx` (`UserId`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleId`,`RegistrationNo`) USING BTREE;

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
-- AUTO_INCREMENT for table `roldemodulelink`
--
ALTER TABLE `roldemodulelink`
  MODIFY `RoleModuleId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `systemmodule`
--
ALTER TABLE `systemmodule`
  MODIFY `SystemModuleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `systemrole`
--
ALTER TABLE `systemrole`
  MODIFY `SystemRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `systemuser`
--
ALTER TABLE `systemuser`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `UserLoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userrolelink`
--
ALTER TABLE `userrolelink`
  ADD CONSTRAINT `fk_User_has_SystemRole_SystemRole1` FOREIGN KEY (`SystemRoleId`) REFERENCES `systemrole` (`SystemRoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_SystemRole_User1` FOREIGN KEY (`UserId`) REFERENCES `systemuser` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
