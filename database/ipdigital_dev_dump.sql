-- --------------------------------------------------------
-- Host:                         46.101.116.238
-- Server version:               10.5.15-MariaDB-0+deb11u1 - Debian 11
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ipdigital
CREATE DATABASE IF NOT EXISTS `ipdigital` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ipdigital`;

-- Dumping structure for table ipdigital.Company
CREATE TABLE IF NOT EXISTS `Company` (
  `vatNum` char(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(96) DEFAULT NULL,
  PRIMARY KEY (`vatNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Company: ~11 rows (approximately)
/*!40000 ALTER TABLE `Company` DISABLE KEYS */;
INSERT INTO `Company` (`vatNum`, `name`, `address`) VALUES
	('FR94376125', 'Danbo', 'Rue Jeanne D’Arc 63/F, Paris, France'),
	('IT315284678', 'MemSystems S.p.a.', 'Largo Colombo 56/C, Milano, Italy'),
	('IT534697215', 'PlaStic', 'Viale Europa 103/A, Torino, Italy'),
	('IT788945231', 'Comma', 'Corso Milano 117/B, Padova, Italy'),
	('IT895623147', 'ipDigital', '740 Madison Ave, New York, NY 10065, USA'),
	('JP654123987', 'Bandai Namco Entertainment', '5 Chome-Shiba, Minato City, Tokyo 108-0014, Japan'),
	('JP854621397', 'Nintendo', '11-1 Kamitoba Hokodatecho, Minami Ward, Kyoto, Japan'),
	('US102938475', 'Bethesda Softworks', '1370 Piccard Dr, Rockville, MD 20850, USA'),
	('US473829175', 'Alphabet', '1600 Amphitheathre Pkwy, Mountain View, CA 94043, USA'),
	('US741236985', 'Meta Platforms', '1 Hacker Way, Menlo Park, CA 94025, USA'),
	('US852647913', 'SpaceX', '1 Rocket Rd, Hawthorne, CA 90250, USA');
/*!40000 ALTER TABLE `Company` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Complaint
CREATE TABLE IF NOT EXISTS `Complaint` (
  `vatNum` char(11) NOT NULL,
  `shippingCode` char(10) DEFAULT NULL,
  `nonComplianceCode` int(11) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `answer` varchar(254) DEFAULT NULL,
  `closed` bit(11) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`vatNum`,`nonComplianceCode`),
  KEY `shippingCode` (`shippingCode`),
  KEY `nonComplianceCode` (`nonComplianceCode`),
  CONSTRAINT `Complaint_ibfk_1` FOREIGN KEY (`vatNum`) REFERENCES `Customer` (`vatNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Complaint_ibfk_2` FOREIGN KEY (`shippingCode`) REFERENCES `Lot` (`shippingCode`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Complaint_ibfk_3` FOREIGN KEY (`nonComplianceCode`) REFERENCES `NonCompliance` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Complaint: ~6 rows (approximately)
/*!40000 ALTER TABLE `Complaint` DISABLE KEYS */;
INSERT INTO `Complaint` (`vatNum`, `shippingCode`, `nonComplianceCode`, `description`, `answer`, `closed`) VALUES
	('IT788945231', '0258463971', 12, 'asd', 'ciao', b'00000001'),
	('JP654123987', '8462597310', 16, 'test3', NULL, b'00000000'),
	('JP854621397', '0258463971', 12, 'asdasd', 'aSAs', b'00000000'),
	('JP854621397', '8462597310', 15, 'jhgjhvv', 'klnlkbnkj', b'00000001'),
	('US102938475', '7946138520', 13, 'sdsadsad', 'lolllone', b'00000001'),
	('US473829175', '1346792468', 11, 'sdasdasdcx', 'hdajshaghjsjha', b'00000001'),
	('US473829175', '1346792468', 15, 'bjjj', 'asdasd', b'00000001');
/*!40000 ALTER TABLE `Complaint` ENABLE KEYS */;

-- Dumping structure for table ipdigital.CorrectiveAction
CREATE TABLE IF NOT EXISTS `CorrectiveAction` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.CorrectiveAction: ~24 rows (approximately)
/*!40000 ALTER TABLE `CorrectiveAction` DISABLE KEYS */;
INSERT INTO `CorrectiveAction` (`code`, `name`, `description`) VALUES
	(1, 'Ask Missing', 'Ask the supplier for the missing parts.'),
	(2, 'Ask New Shipping', 'Ask the supplier to ship again the lost order.'),
	(3, 'Ask Refund', 'Ask the supplier for a refunf'),
	(4, 'Tell Supplier For Surplus', 'Inform the supplier about the extra items in the order.'),
	(5, 'File Claim', 'File a claim to the supplier giving the ID codes of the damaged/not working parts, anda ask for a refund'),
	(6, 'Discard Pen Drive', 'Discard the damaged pen drive and investigate the problem in processes 3, 5, 7 ,9, 13, 14'),
	(7, 'Replace Label', 'Replace the ID label and investigate the problem in the label printing process'),
	(8, 'Replace Label 2', 'Replace the label and investigate the problem in the ID-codes’ assigning process'),
	(9, 'Restart Processes', 'Return the pen drive to process 15'),
	(10, 'Corrections', 'Individuate and correct the organizational problems'),
	(11, 'Product Replacement', 'Replace the damaged or not working products sold to the customer'),
	(12, 'Refund Customer', 'Refund the customer, with a little extra for the inconvenience'),
	(13, 'Ask Missing', 'Ask the supplier for the missing parts.'),
	(14, 'Ask New Shipping', 'Ask the supplier to ship again the lost order.'),
	(15, 'Ask Refund', 'Ask the supplier for a refunf'),
	(16, 'Tell Supplier For Surplus', 'Inform the supplier about the extra items in the order.'),
	(17, 'File Claim', 'File a claim to the supplier giving the ID codes of the damaged/not working parts, anda ask for a refund'),
	(18, 'Discard Pen Drive', 'Discard the damaged pen drive and investigate the problem in processes 3, 5, 7 ,9, 13, 14'),
	(19, 'Replace Label', 'Replace the ID label and investigate the problem in the label printing process'),
	(20, 'Replace Label 2', 'Replace the label and investigate the problem in the ID-codes’ assigning process'),
	(21, 'Restart Processes', 'Return the pen drive to process 15'),
	(22, 'Corrections', 'Individuate and correct the organizational problems'),
	(23, 'Product Replacement', 'Replace the damaged or not working products sold to the customer'),
	(24, 'Refund Customer', 'Refund the customer, with a little extra for the inconvenience');
/*!40000 ALTER TABLE `CorrectiveAction` ENABLE KEYS */;

-- Dumping structure for table ipdigital.CurrentCompany
CREATE TABLE IF NOT EXISTS `CurrentCompany` (
  `vatNum` char(11) NOT NULL,
  PRIMARY KEY (`vatNum`),
  CONSTRAINT `CurrentCompany_ibfk_1` FOREIGN KEY (`vatNum`) REFERENCES `Company` (`vatNum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.CurrentCompany: ~0 rows (approximately)
/*!40000 ALTER TABLE `CurrentCompany` DISABLE KEYS */;
INSERT INTO `CurrentCompany` (`vatNum`) VALUES
	('IT895623147');
/*!40000 ALTER TABLE `CurrentCompany` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Customer
CREATE TABLE IF NOT EXISTS `Customer` (
  `vatNum` char(11) NOT NULL,
  PRIMARY KEY (`vatNum`),
  CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`vatNum`) REFERENCES `Company` (`vatNum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Customer: ~7 rows (approximately)
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` (`vatNum`) VALUES
	('IT788945231'),
	('JP654123987'),
	('JP854621397'),
	('US102938475'),
	('US473829175'),
	('US741236985'),
	('US852647913');
/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Department
CREATE TABLE IF NOT EXISTS `Department` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `directorFiscalCode` char(16) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `directorFiscalCode` (`directorFiscalCode`),
  CONSTRAINT `Department_ibfk_1` FOREIGN KEY (`directorFiscalCode`) REFERENCES `Employee` (`fiscalCode`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Department: ~5 rows (approximately)
/*!40000 ALTER TABLE `Department` DISABLE KEYS */;
INSERT INTO `Department` (`code`, `name`, `directorFiscalCode`) VALUES
	(1, 'Administration', 'CCHLCU80A01C352V'),
	(2, 'Production', 'RSSMRA80L09F205V'),
	(3, 'Marketing', 'MOXMFR87H28F158K'),
	(4, 'Human Resources', 'RSNSMN84H04D612M'),
	(5, 'Unlisted Employees', 'MUIGDR73T18L219X');
/*!40000 ALTER TABLE `Department` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Employee
CREATE TABLE IF NOT EXISTS `Employee` (
  `fiscalCode` char(16) NOT NULL,
  `job` varchar(32) NOT NULL,
  `role` varchar(32) NOT NULL,
  `company` char(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  PRIMARY KEY (`fiscalCode`),
  KEY `department` (`department`),
  KEY `company` (`company`),
  CONSTRAINT `Employee_ibfk_1` FOREIGN KEY (`fiscalCode`) REFERENCES `PersonalData` (`fiscalCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Employee_ibfk_3` FOREIGN KEY (`department`) REFERENCES `Department` (`code`),
  CONSTRAINT `Employee_ibfk_4` FOREIGN KEY (`company`) REFERENCES `Company` (`vatNum`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Employee: ~31 rows (approximately)
/*!40000 ALTER TABLE `Employee` DISABLE KEYS */;
INSERT INTO `Employee` (`fiscalCode`, `job`, `role`, `company`, `department`) VALUES
	('AAAAAAAAAAAAAAAA', 'developer', 'employee', 'IT895623147', 5),
	('ABCDEF1111111111', 'Pro developer', 'employee', 'IT895623147', 5),
	('BLCDRK62B05D612N', 'Labourer', 'Assembler', 'US852647913', 2),
	('BNFSMN87H27F158K', 'Labourer', 'Assembler', 'IT534697215', 2),
	('BRNPCL74A06G224X', 'Employee', 'Market analyst', 'US102938475', 3),
	('BRSGLI95H41G224M', 'Employee', 'Market analyst', 'IT895623147', 3),
	('CCHLCU80A01C352V', 'Employee', 'Administration Manager', 'IT895623147', 1),
	('CNDMHL03D23G224D', 'developer', 'employee', 'IT895623147', 5),
	('DHYT6543568965TY', 'developer', 'employee', 'IT895623147', 5),
	('DHYT65S3568965TY', 'developer', 'employee', 'IT895623147', 5),
	('DLCFLR75H70L219E', 'Employee', 'Accountant', 'FR94376125', 1),
	('DOEJHN70E01F205O', 'Employee', 'Accountant', 'US741236985', 1),
	('GRNGNN63C03F205O', 'Employee', 'Market analyst', 'IT788945231', 3),
	('HSHJOE80A01F205P', 'Employee', 'Accountant', 'JP854621397', 1),
	('JCKNRW92R11G224S', 'Employee', 'Recruiter', 'US473829175', 4),
	('KJJSAJDGUASD7AS7', 'developer', 'employee', 'IT895623147', 5),
	('LGAFPP92H17L483X', 'Employee', 'Accountant', 'IT895623147', 1),
	('MOXMFR87H28F158K', 'Employee', 'Marketing Manager', 'IT895623147', 3),
	('MRLMRZ86E10A944Y', 'Labourer', 'Head of the assembly line', 'IT895623147', 2),
	('MSCNGL95A59A326B', 'Employee', 'Market analyst', 'IT315284678', 3),
	('MUIGDR73T18L219X', 'Employee', 'Sorting Manager', 'IT895623147', 5),
	('NKMSSH67R24F205T', 'Labourer', 'Assembler', 'JP654123987', 2),
	('PCCPTR55H17D612D', 'Employee', 'Customer relations', 'IT895623147', 4),
	('PRTCST87S53B354J', 'Labourer', 'Assembler', 'IT895623147', 2),
	('RGTNRC98D26F132F', 'developer', 'employee', 'IT895623147', 5),
	('RSNSMN84H04D612M', 'Employee', 'HR Manager', 'IT895623147', 4),
	('RSSMRA80L09F205V', 'Employee', 'Production Manager', 'IT895623147', 2),
	('SDRTYTGYU7654RTY', 'developer', 'employee', 'IT895623147', 5),
	('SDTEYFKDUTY56789', 'developer', 'employee', 'IT895623147', 5),
	('SDTEYFTHUTY56789', 'developer', 'CEO', 'IT895623147', 5),
	('STEHD7364TRYF89J', 'developer', 'employee', 'IT895623147', 5);
/*!40000 ALTER TABLE `Employee` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Lot
CREATE TABLE IF NOT EXISTS `Lot` (
  `shippingCode` char(10) NOT NULL,
  `orderCode` int(11) NOT NULL,
  `deliveryDate` date DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  PRIMARY KEY (`shippingCode`),
  KEY `orderCode` (`orderCode`),
  CONSTRAINT `Lot_ibfk_1` FOREIGN KEY (`orderCode`) REFERENCES `Orders` (`invoiceNum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Lot: ~7 rows (approximately)
/*!40000 ALTER TABLE `Lot` DISABLE KEYS */;
INSERT INTO `Lot` (`shippingCode`, `orderCode`, `deliveryDate`, `quantity`) VALUES
	('0258463971', 1, '2022-01-03', 100),
	('1346792468', 7, '2022-02-23', 200),
	('1472583690', 2, '2022-03-13', 60),
	('7619438246', 6, '2022-01-23', 15),
	('7946138520', 5, '2021-11-26', 30),
	('8462597310', 3, '2021-06-02', 20),
	('9638527410', 4, '2022-04-07', 150);
/*!40000 ALTER TABLE `Lot` ENABLE KEYS */;

-- Dumping structure for table ipdigital.NonCompliance
CREATE TABLE IF NOT EXISTS `NonCompliance` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `lot` char(10) DEFAULT NULL,
  `processOrigin` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `repEmployee` char(16) DEFAULT NULL,
  `date` date NOT NULL,
  `comment` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `type` (`type`),
  KEY `lot` (`lot`),
  KEY `processOrigin` (`processOrigin`),
  KEY `repEmployee` (`repEmployee`),
  CONSTRAINT `NonCompliance_ibfk_1` FOREIGN KEY (`type`) REFERENCES `NonComplianceList` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `NonCompliance_ibfk_2` FOREIGN KEY (`lot`) REFERENCES `Lot` (`shippingCode`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `NonCompliance_ibfk_3` FOREIGN KEY (`processOrigin`) REFERENCES `Process` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `NonCompliance_ibfk_4` FOREIGN KEY (`repEmployee`) REFERENCES `Employee` (`fiscalCode`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.NonCompliance: ~17 rows (approximately)
/*!40000 ALTER TABLE `NonCompliance` DISABLE KEYS */;
INSERT INTO `NonCompliance` (`code`, `lot`, `processOrigin`, `type`, `repEmployee`, `date`, `comment`) VALUES
	(11, '9638527410', 1, 1, NULL, '2022-05-04', 'test1'),
	(12, '1472583690', 2, 6, NULL, '2022-05-04', 'test2'),
	(13, '7619438246', 3, 13, NULL, '2022-05-04', 'Lallero'),
	(14, '1346792468', 1, 10, NULL, '2022-05-05', 'sdsd'),
	(15, '7619438246', 3, 9, NULL, '2022-05-05', 'mhjhj'),
	(16, '1346792468', 3, 12, NULL, '2022-05-05', 'jjjggjhgh'),
	(17, '7946138520', 3, 3, NULL, '2022-05-05', 'iohoi'),
	(19, '7946138520', 3, 14, NULL, '2022-05-05', 'dssad asd'),
	(20, '7619438246', 1, 9, NULL, '2022-05-05', 'sdasd'),
	(23, '9638527410', 1, 1, NULL, '2022-05-05', 'sd'),
	(24, '7946138520', 3, 6, NULL, '2022-05-05', 'asdasd'),
	(25, '1346792468', 2, 10, NULL, '2022-05-05', 'sas'),
	(27, '7946138520', 1, 13, NULL, '2022-05-05', 'sad'),
	(28, '1472583690', 1, 8, NULL, '2022-05-05', 'asds'),
	(29, '7619438246', 2, 12, NULL, '2022-05-05', 'sad'),
	(30, '7619438246', 2, 12, NULL, '2022-05-05', 'sadasdasd'),
	(32, '8462597310', 2, 8, NULL, '2022-05-05', 'sxsad'),
	(33, '7619438246', 2, 5, NULL, '2022-05-05', 'asdas');
/*!40000 ALTER TABLE `NonCompliance` ENABLE KEYS */;

-- Dumping structure for table ipdigital.NonComplianceAnalysis
CREATE TABLE IF NOT EXISTS `NonComplianceAnalysis` (
  `nonComplianceCode` int(11) NOT NULL,
  `manager` char(16) NOT NULL,
  `employee` char(16) DEFAULT NULL,
  `expirationDate` date NOT NULL,
  PRIMARY KEY (`nonComplianceCode`,`manager`),
  KEY `manager` (`manager`),
  KEY `employee` (`employee`),
  CONSTRAINT `NonComplianceAnalysis_ibfk_1` FOREIGN KEY (`nonComplianceCode`) REFERENCES `NonCompliance` (`code`) ON UPDATE CASCADE,
  CONSTRAINT `NonComplianceAnalysis_ibfk_2` FOREIGN KEY (`manager`) REFERENCES `Employee` (`fiscalCode`) ON UPDATE CASCADE,
  CONSTRAINT `NonComplianceAnalysis_ibfk_3` FOREIGN KEY (`employee`) REFERENCES `Employee` (`fiscalCode`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.NonComplianceAnalysis: ~14 rows (approximately)
/*!40000 ALTER TABLE `NonComplianceAnalysis` DISABLE KEYS */;
INSERT INTO `NonComplianceAnalysis` (`nonComplianceCode`, `manager`, `employee`, `expirationDate`) VALUES
	(11, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-04'),
	(12, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(13, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-04'),
	(14, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(15, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(16, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(17, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(19, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(20, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(23, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(24, 'SDTEYFTHUTY56789', 'PCCPTR55H17D612D', '2022-06-05'),
	(25, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(27, 'RGTNRC98D26F132F', 'PCCPTR55H17D612D', '2022-06-05'),
	(28, 'CCHLCU80A01C352V', 'PCCPTR55H17D612D', '2022-06-05'),
	(32, 'DHYT6543568965TY', 'PCCPTR55H17D612D', '2022-06-05');
/*!40000 ALTER TABLE `NonComplianceAnalysis` ENABLE KEYS */;

-- Dumping structure for table ipdigital.NonComplianceCheck
CREATE TABLE IF NOT EXISTS `NonComplianceCheck` (
  `nonComplianceCode` int(11) NOT NULL,
  `manager` char(16) NOT NULL,
  `employee` char(16) DEFAULT NULL,
  `expirationDate` date NOT NULL,
  PRIMARY KEY (`nonComplianceCode`,`manager`),
  KEY `manager` (`manager`),
  KEY `employee` (`employee`),
  CONSTRAINT `NonComplianceCheck_ibfk_1` FOREIGN KEY (`nonComplianceCode`) REFERENCES `NonCompliance` (`code`) ON UPDATE CASCADE,
  CONSTRAINT `NonComplianceCheck_ibfk_2` FOREIGN KEY (`manager`) REFERENCES `Employee` (`fiscalCode`) ON UPDATE CASCADE,
  CONSTRAINT `NonComplianceCheck_ibfk_3` FOREIGN KEY (`employee`) REFERENCES `Employee` (`fiscalCode`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.NonComplianceCheck: ~11 rows (approximately)
/*!40000 ALTER TABLE `NonComplianceCheck` DISABLE KEYS */;
INSERT INTO `NonComplianceCheck` (`nonComplianceCode`, `manager`, `employee`, `expirationDate`) VALUES
	(11, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-04'),
	(12, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(14, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(15, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(16, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(17, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(19, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(20, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(24, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(27, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05'),
	(32, 'RSNSMN84H04D612M', 'PCCPTR55H17D612D', '2022-06-05');
/*!40000 ALTER TABLE `NonComplianceCheck` ENABLE KEYS */;

-- Dumping structure for table ipdigital.NonComplianceList
CREATE TABLE IF NOT EXISTS `NonComplianceList` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.NonComplianceList: ~15 rows (approximately)
/*!40000 ALTER TABLE `NonComplianceList` DISABLE KEYS */;
INSERT INTO `NonComplianceList` (`code`, `name`, `description`) VALUES
	(1, 'Missing', 'Missing ordered items.'),
	(2, 'Damage', 'The ordered item is damaged or not-working.'),
	(3, 'Inelegible', 'Items different than those ordered arrived.'),
	(4, 'Surplus', 'More items arrived than were ordered.'),
	(5, 'Optical Inspection Error', 'Detected imperfection or error during optical inspection.'),
	(6, 'Solder Paste Imperfection', 'Solder paste applied on the wrong PCB pins.'),
	(7, 'Damage Inspection Error', 'Damaged component found during the inspection.'),
	(8, 'Pen Drive Not Working', 'Pen Drive doesnt work'),
	(9, 'Wrong Pen Drive Position', 'The pen drive is placed in the wrong way'),
	(10, 'Label Readability Error', 'The ID Label is unreadable or was badly printed.'),
	(11, 'Wrong Label Code', 'The code printed on the label is wrong'),
	(12, 'Damaged Pen Drive error', 'The assembled pen drive is not working.'),
	(13, 'Storing Damage Error', 'The pen drive got damaged during the storing.'),
	(14, 'Shipment Delay', 'Shipping delay caused by internal errors in the shipping process'),
	(15, 'Customer Complaint', 'The customer received an incorrect or broken item.');
/*!40000 ALTER TABLE `NonComplianceList` ENABLE KEYS */;

-- Dumping structure for table ipdigital.NonComplianceResult
CREATE TABLE IF NOT EXISTS `NonComplianceResult` (
  `nonComplianceCode` int(11) NOT NULL,
  `correctiveActionCode` int(11) DEFAULT NULL,
  `responsibility` char(11) DEFAULT NULL,
  `result` varchar(128) NOT NULL,
  `cost` double DEFAULT 0,
  `comment` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`nonComplianceCode`),
  KEY `correctiveActionCode` (`correctiveActionCode`),
  KEY `responsibility` (`responsibility`),
  CONSTRAINT `NonComplianceResult_ibfk_1` FOREIGN KEY (`nonComplianceCode`) REFERENCES `NonCompliance` (`code`) ON UPDATE CASCADE,
  CONSTRAINT `NonComplianceResult_ibfk_2` FOREIGN KEY (`correctiveActionCode`) REFERENCES `CorrectiveAction` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `NonComplianceResult_ibfk_3` FOREIGN KEY (`responsibility`) REFERENCES `Company` (`vatNum`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.NonComplianceResult: ~7 rows (approximately)
/*!40000 ALTER TABLE `NonComplianceResult` DISABLE KEYS */;
INSERT INTO `NonComplianceResult` (`nonComplianceCode`, `correctiveActionCode`, `responsibility`, `result`, `cost`, `comment`) VALUES
	(11, NULL, NULL, 'The customer received a new set of working pen drives', 0, 'Corrected'),
	(12, NULL, NULL, 'The customer received a new set of working pen drives', 0, 'Corrected'),
	(15, NULL, NULL, 'The customer received a new set of working pen drives', 0, 'Corrected'),
	(17, NULL, NULL, 'The customer received a new set of working pen drives', 0, 'Corrected'),
	(19, NULL, NULL, 'The customer received a new set of working pen drives', 0, 'Corrected'),
	(20, NULL, NULL, 'The customer received a new set of working pen drives', 0, 'Corrected'),
	(27, NULL, NULL, 'The customer received a new set of working pen drives', 0, 'Corrected');
/*!40000 ALTER TABLE `NonComplianceResult` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Orders
CREATE TABLE IF NOT EXISTS `Orders` (
  `invoiceNum` int(11) NOT NULL AUTO_INCREMENT,
  `vatNum` char(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `quantity` int(11) DEFAULT 1,
  PRIMARY KEY (`invoiceNum`),
  KEY `vatNum` (`vatNum`),
  KEY `product` (`product`),
  CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`vatNum`) REFERENCES `Company` (`vatNum`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`product`) REFERENCES `Product` (`code`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Orders: ~7 rows (approximately)
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` (`invoiceNum`, `vatNum`, `product`, `orderDate`, `quantity`) VALUES
	(1, 'US741236985', 9, '2022-01-01', 100),
	(2, 'US473829175', 9, '2022-03-12', 60),
	(3, 'US852647913', 9, '2021-05-31', 20),
	(4, 'US102938475', 9, '2022-04-02', 150),
	(5, 'JP854621397', 9, '2021-11-26', 30),
	(6, 'IT788945231', 9, '2022-01-23', 15),
	(7, 'JP654123987', 9, '2022-02-23', 200);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;

-- Dumping structure for table ipdigital.PersonalData
CREATE TABLE IF NOT EXISTS `PersonalData` (
  `fiscalCode` char(16) NOT NULL,
  `firstName` varchar(32) DEFAULT NULL,
  `lastName` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`fiscalCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.PersonalData: ~29 rows (approximately)
/*!40000 ALTER TABLE `PersonalData` DISABLE KEYS */;
INSERT INTO `PersonalData` (`fiscalCode`, `firstName`, `lastName`) VALUES
	('AAAAAAAAAAAAAAAA', 'Gianni', 'Pino'),
	('ABCDEF1111111111', 'Erik', 'P'),
	('BLCDRK62B05D612N', 'Derek', 'Blackwood'),
	('BNFSMN87H27F158K', 'Simone', 'Bonfiglio'),
	('BRNPCL74A06G224X', 'Pascal', 'Bernard'),
	('BRSGLI95H41G224M', 'Giulia', 'Bersaglieri'),
	('CCHLCU80A01C352V', 'Luca', 'Occhi'),
	('CNDMHL03D23G224D', 'Michele', 'Candian'),
	('DHYT6543568965TY', 'Lucio', 'Trevisan'),
	('DHYT65S3568965TY', 'Ruggero', 'Trevisan'),
	('DLCFLR75H70L219E', 'Fleur', 'Delacourt'),
	('DOEJHN70E01F205O', 'John', 'Doe'),
	('GRNGNN63C03F205O', 'Giovanni', 'Giorni'),
	('HSHJOE80A01F205P', 'Joe', 'Hisahishi'),
	('JCKNRW92R11G224S', 'Andrew', 'Jackson'),
	('KJJSAJDGUASD7AS7', 'hef', 'ubegne'),
	('LGAFPP92H17L483X', 'Filippo', 'Lago'),
	('MOXMFR87H28F158K', 'Manfredi', 'Mo'),
	('MRLMRZ86E10A944Y', 'Maurizio', 'Merluzzo'),
	('MSCNGL95A59A326B', 'Angela', 'Maschera'),
	('MUIGDR73T18L219X', 'Gianandrea', 'Rossi'),
	('NKMSSH67R24F205T', 'Satoshi', 'Nakamoto'),
	('PCCPTR55H17D612D', 'Pietro', 'Pacciani'),
	('PRTCST87S53B354J', 'Cristina', 'Portu'),
	('RGTNRC98D26F132F', 'Enrico', 'Arrigote'),
	('RSNSMN84H04D612M', 'Simone', 'Rosini'),
	('RSSMRA80L09F205V', 'Mario', 'Rossi'),
	('SDRTYTGYU7654RTY', 'Merlli', 'Silvana'),
	('SDTEYFKDUTY56789', 'Lucibella', 'PERTECUCCIA'),
	('SDTEYFTHUTY56789', 'Kevin', 'Azemi'),
	('STEHD7364TRYF89J', 'yitro', 'luste');
/*!40000 ALTER TABLE `PersonalData` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Process
CREATE TABLE IF NOT EXISTS `Process` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `departmentCode` int(11) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `departmentCode` (`departmentCode`),
  CONSTRAINT `Process_ibfk_1` FOREIGN KEY (`departmentCode`) REFERENCES `Department` (`code`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Process: ~20 rows (approximately)
/*!40000 ALTER TABLE `Process` DISABLE KEYS */;
INSERT INTO `Process` (`code`, `departmentCode`, `name`, `description`) VALUES
	(1, NULL, 'Supply Check', 'The items bought from the suppliers get a first inspection.'),
	(2, NULL, 'PCB Inspection', 'Optical inspection of the PCBs.'),
	(3, NULL, 'Solder Paste Application', 'The solder paste get applied on the PCBs.'),
	(4, NULL, 'First Mounting', 'Memory chip, controllers and voltage regulators get mounted on the PCB.'),
	(5, NULL, 'First Production Check', 'The assembled semi-finished product goes under an optical inspection.'),
	(6, NULL, 'Connector Mounting', 'The USB connector gets assembled on the PCB.'),
	(7, NULL, 'Connector Check', 'The assembled connector goes under an optical inspection.'),
	(8, NULL, 'Components Welding', 'The components get welded in a melting furnace, that melts solder.'),
	(9, NULL, 'Post-Welding Check', 'The semi-finished product goes under an optical inspection.'),
	(10, NULL, 'PCB Division', 'The PCBs get divided with a milling machine.'),
	(11, NULL, 'Pen Drive Test', 'The pen drives get tested.'),
	(12, NULL, 'Pen Drive Shell Mounting', 'The pen drives’ body get mounted.'),
	(13, NULL, 'Shell Check', 'The pen drives’ shells go under an optical inspection.'),
	(14, NULL, 'Cap Mounting', 'The pen drives’ cap gets mounted.'),
	(15, NULL, 'ID Label Application', 'An identification label gets applied on the pen drives.'),
	(16, NULL, 'Final Check', 'The pen drive goes under a final optical inspection.'),
	(17, NULL, 'Packaging', 'The cardboard box gets prepared and the pen drive is placed inside.'),
	(18, NULL, 'Box Storage', 'The boxes get transferred in the warehouse.'),
	(19, NULL, 'Order Preparation', 'Preparation of the package of an order.'),
	(20, NULL, 'Shipping', 'The order gets entrusted to an express courier.');
/*!40000 ALTER TABLE `Process` ENABLE KEYS */;

-- Dumping structure for table ipdigital.ProcessProduct
CREATE TABLE IF NOT EXISTS `ProcessProduct` (
  `processCode` int(11) NOT NULL,
  `productCode` int(11) NOT NULL,
  PRIMARY KEY (`processCode`,`productCode`),
  KEY `productCode` (`productCode`),
  CONSTRAINT `ProcessProduct_ibfk_1` FOREIGN KEY (`processCode`) REFERENCES `Process` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ProcessProduct_ibfk_2` FOREIGN KEY (`productCode`) REFERENCES `Product` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.ProcessProduct: ~9 rows (approximately)
/*!40000 ALTER TABLE `ProcessProduct` DISABLE KEYS */;
INSERT INTO `ProcessProduct` (`processCode`, `productCode`) VALUES
	(3, 1),
	(4, 2),
	(6, 3),
	(8, 4),
	(10, 5),
	(12, 6),
	(14, 7),
	(15, 8),
	(17, 9);
/*!40000 ALTER TABLE `ProcessProduct` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Product
CREATE TABLE IF NOT EXISTS `Product` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `price` double DEFAULT NULL,
  `producedByProcess` int(11) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `producedByProcess` (`producedByProcess`),
  CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`producedByProcess`) REFERENCES `Process` (`code`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Product: ~9 rows (approximately)
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
INSERT INTO `Product` (`code`, `name`, `price`, `producedByProcess`, `type`) VALUES
	(1, 'PCBs With Solder Paste', NULL, 3, 'Semi-finished Product'),
	(2, 'PCBs With Components', NULL, 4, 'Semi-finished Product'),
	(3, 'PCBs With Connector', NULL, 6, 'Semi-finished Product'),
	(4, 'Welded PCBs', NULL, 8, 'Semi-finished Product'),
	(5, 'Single PCB', NULL, 10, 'Semi-finished Product'),
	(6, 'USB Pen Drive w Shell', NULL, 12, 'Semi-finished Product'),
	(7, 'USB Pen Drive w Cap', NULL, 14, 'Semi-finished Product'),
	(8, 'USB Pen Drive w Label', NULL, 15, 'Semi-finished Product'),
	(9, 'USB Pen Drive', 65.5, 17, 'Finished Product');
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;

-- Dumping structure for table ipdigital.Supplier
CREATE TABLE IF NOT EXISTS `Supplier` (
  `vatNum` char(11) NOT NULL,
  `ISO9001` char(4) DEFAULT NULL,
  PRIMARY KEY (`vatNum`),
  CONSTRAINT `Supplier_ibfk_1` FOREIGN KEY (`vatNum`) REFERENCES `Company` (`vatNum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.Supplier: ~3 rows (approximately)
/*!40000 ALTER TABLE `Supplier` DISABLE KEYS */;
INSERT INTO `Supplier` (`vatNum`, `ISO9001`) VALUES
	('FR94376125', '2021'),
	('IT315284678', '2020'),
	('IT534697215', '2020');
/*!40000 ALTER TABLE `Supplier` ENABLE KEYS */;

-- Dumping structure for table ipdigital.User
CREATE TABLE IF NOT EXISTS `User` (
  `fiscalCode` char(16) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` char(60) DEFAULT NULL,
  PRIMARY KEY (`fiscalCode`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`fiscalCode`) REFERENCES `Employee` (`fiscalCode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ipdigital.User: ~29 rows (approximately)
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` (`fiscalCode`, `email`, `password`) VALUES
	('AAAAAAAAAAAAAAAA', 'nakamotosatoshi2@gmail.com', '$2y$10$hjjZ5.hHlPdAFJ1dPj180.7ToJu9juWOMmv/97Q1n.F8elGt7Q.G2'),
	('ABCDEF1111111111', 'erikpellizzon@gmail.com', '$2y$10$7obC3vUfhVDoP1E/rGRx0O6OTDm6lbT9P07u5VSDgrWL8zPj9BsR.'),
	('BLCDRK62B05D612N', 'blackwoodderek@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('BNFSMN87H27F158K', 'bonfigliosimone@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('BRNPCL74A06G224X', 'bernardpascal@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('BRSGLI95H41G224M', 'bersaglierigiulia@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('CCHLCU80A01C352V', 'occhiluca@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('CNDMHL03D23G224D', 'michelecandian23@gmail.com', '$2y$10$Me0s2kF.EdZLeoJGfg3J5uSULDkOkZ.tZA.wGOuBmPIJKLewcHMxO'),
	('DHYT6543568965TY', 'lucio.trevisan@gmail.com', '$2y$10$YnFCo4E4Ci32whexcTyeVO4tyW2ydzynhcil1CJsciI6b9z46TuYK'),
	('DHYT65S3568965TY', 'aaaaaaa.degano@gmail.com', '$2y$10$w792KhVARkPHQt.oxf2ggepGYUa1dcJnPpWAILOaNr7EFUYo8/CSq'),
	('DLCFLR75H70L219E', 'delacourtfleur@mail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('DOEJHN70E01F205O', 'doejohn@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('GRNGNN63C03F205O', 'giornigiovanni@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('HSHJOE80A01F205P', 'hisahishijoe@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('JCKNRW92R11G224S', 'jacksonandrew@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('KJJSAJDGUASD7AS7', 'hefyubegne@tozya.com', '$2y$10$kmjA98Fl17HH4/.cO7lnneE1REaS9EJyE8r.WynzK478Psiee62dG'),
	('LGAFPP92H17L483X', 'lagofilippo@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('MOXMFR87H28F158K', 'momanfredi@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('MRLMRZ86E10A944Y', 'merluzzomaurizio@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('MSCNGL95A59A326B', 'mascheraangela@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('MUIGDR73T18L219X', 'muiagianandrea@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('NKMSSH67R24F205T', 'nakamotosatoshi@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('PCCPTR55H17D612D', 'paccianipietro@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('PRTCST87S53B354J', 'portucristina@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('RGTNRC98D26F132F', 'giosue.falasco@gmail.com', '$2y$10$PlZlq79AqNuVXuEXUGyQQe1L7nUhzRZxRgD8SgrrIwX5wWjhMnfta'),
	('RSNSMN84H04D612M', 'rosinisimone@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('RSSMRA80L09F205V', 'rossimario@gmail.com', '$2y$10$IhXAxbSVpiIiBTkwxbcZ2eYjcj3r6PamjfwbBNH6BkeseeW44erry'),
	('SDRTYTGYU7654RTY', 'meril.silvanix@yahoo.com', '$2y$10$BdhEm0PY6r29vETnv9U7s.EYGAAMtzjD4Qv6tNXKj0HmUwGPD8ARO'),
	('SDTEYFKDUTY56789', 'lucibella.pertecuccia@gmail.com', '$2y$10$1vWe5NNlz7ssFMYBLhnfbuaqAmx8nCEzk4ek0KPFImRUtXJngeRfm'),
	('SDTEYFTHUTY56789', 'kevin.azemi@protonmail.ch', '$2y$10$JayAfkC2n7r0RFRiP6qgcOKga26k99IDlYaFQcw4imSZQejdDY1Iu'),
	('STEHD7364TRYF89J', 'yitroluste@tozya.com', '$2y$10$zRP3837g4phnNnG9DVZv6ucxYDNO4z5OXIerJNg8SYfMy0LEoW..K');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
