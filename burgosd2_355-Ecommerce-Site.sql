-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2022 at 06:49 PM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burgosd2_355-Ecommerce-Site`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `userId` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `aptNum` varchar(10) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`userId`, `email`, `username`, `password`, `fName`, `lName`, `address`, `aptNum`, `city`, `zipCode`, `state`, `country`) VALUES
('626c208de227d', 'joeDoe123@montclair.edu', 'JohnDoe123', '$2y$10$1u1eVXPGOntLfu83SklNMuTWpxP2.u1GOfsQvHe7bVZm4FSRQTTxC', 'John', 'Doe', '1 Normal Ave', NULL, 'Montclair', '07043', 'NJ', 'United States'),
('62786dca5a0db', 'jamesBurgos@montclair.edu', 'Jamie123', '$2y$10$pI07QZeO1gam7htPmI/W.u9aH8BUK0xXqnMBOfko2x7XgHPsExKNe', 'James', 'Burgos', '678 Normal Ave', NULL, 'Montclair', '092737', 'NJ', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `employeeId` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `phoneNum` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipCode` int(10) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`employeeId`, `username`, `password`, `email`, `fName`, `lName`, `phoneNum`, `address`, `city`, `state`, `zipCode`, `country`) VALUES
('21667945', 'burgosd2', '$2y$10$g2arZft14z3Vnvfv8nItA./NRf8Qbix0eRqznGoNiIQXClUDz2Rhy', 'burgosd2@montclair.edu', 'Delvis', 'Burgos', '867553506', '123 idk Street', '', '', 7104, 'United States ');

-- --------------------------------------------------------

--
-- Table structure for table `OrderItems`
--

CREATE TABLE `OrderItems` (
  `orderId` varchar(10) NOT NULL,
  `productId` int(100) NOT NULL,
  `productPrice` float NOT NULL,
  `productBoughtQty` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `OrderItems`
--

INSERT INTO `OrderItems` (`orderId`, `productId`, `productPrice`, `productBoughtQty`) VALUES
('378', 26, 530, 1),
('378', 17, 35, 1),
('460', 10, 15, 4),
('460', 9, 15, 2),
('460', 1, 15, 3),
('378', 13, 6, 3),
('54', 11, 25, 2),
('54', 18, 350, 1),
('468', 3, 13, 3),
('452', 2, 30, 4),
('452', 8, 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `orderId` varchar(10) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `orderAmount` float DEFAULT NULL,
  `orderDate` date NOT NULL,
  `shipAddress` varchar(255) NOT NULL,
  `shipCity` varchar(255) NOT NULL,
  `shipState` varchar(255) NOT NULL,
  `shipZip` varchar(10) NOT NULL,
  `shipCountry` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`orderId`, `userId`, `orderAmount`, `orderDate`, `shipAddress`, `shipCity`, `shipState`, `shipZip`, `shipCountry`) VALUES
('378', '62786dca5a0db', 583, '2022-05-22', '678 Normal Ave', 'Montclair', 'NJ', '092737', 'United States'),
('460', '626c208de227d', 135, '2022-05-22', '1 Normal Ave', 'Montclair', 'NJ', '07043', 'United States'),
('54', '62786dca5a0db', 400, '2022-05-22', '678 Normal Ave', 'Montclair', 'NJ', '092737', 'United States'),
('452', '626c208de227d', 270, '2005-10-22', '1 Normal Ave', 'Montclair', 'NJ', '07043', 'United States'),
('468', '627abdcc848d3', 39, '2005-10-22', '234 Normal ave', 'NEwark', 'NJ', '08109', 'Unitedt States');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `productId` int(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` float NOT NULL,
  `productDescription` varchar(500) NOT NULL,
  `productQty` int(10) NOT NULL,
  `productImg` varchar(250) NOT NULL,
  `productCategory` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`productId`, `productName`, `productPrice`, `productDescription`, `productQty`, `productImg`, `productCategory`) VALUES
(1, 'Paper Mate BallPoint Pen', 15, 'Blue Ink | 1.0mm Tip | 12 per pack', 35, 'image1.jpeg', 'Writing'),
(2, 'BIC gel-ocity Pen', 30, 'Various Color | 12 per pack', 45, 'image2.jpeg', 'Writing'),
(3, 'Paper Mate BallPoint Pen', 13, 'Black Ink | 1.0mm Tip | 12 per pack', 47, 'image3.jpeg', 'Writing'),
(4, 'Paper Mate Mechanical Pencil', 10, '0.7mm | #2 Lead | 12 per pack', 50, 'image4.jpeg', 'Writing'),
(5, 'BIC Mechanical Pencils', 20, 'Assorted Size | #2 Lead | 60 per pack', 50, 'image5.jpeg', 'Writing'),
(6, 'TRU RED Wooden Pencil', 7, '2.2mm | #2 Lead | 48 per pack', 50, 'image6.jpeg', 'Writing'),
(7, 'BIC School Kit', 10, 'Pen | Pencil | Highlighter | 15 per pack', 50, 'image7.jpeg', 'Writing'),
(8, 'Sharpie Marker ', 35, 'Fine Tip | Black | 36 per pack', 47, 'image8.jpeg', 'Writing'),
(9, 'Expo Dry Erase Markers', 15, 'Chisel Tip | Assorted | 12 per pack', 48, 'image9.jpeg', 'Writing'),
(10, 'Domtar  8.5 x 11 Printer Paper', 15, '24lbs | 625 per pack', 44, 'image10.jpeg', 'Paper'),
(11, 'International 8.5 X 11 Paper', 25, '20lbs | 500 per pack', 48, 'image11.jpeg', 'Paper'),
(12, 'TRU RED 1-Subject Notebooks', 10, 'Assorted Colors | 70 Sheets | per pack', 50, 'image12.jpeg', 'Paper'),
(13, 'TRU RED 1-Subject Notebook', 6, 'Black | 70 Sheets per pack', 46, 'image13.jpeg', 'Paper'),
(14, 'TRU RED Accessory Holder', 20, 'Wire Mesh | Black', 50, 'image14.jpeg', 'Accessories'),
(15, 'TRU RED Letter Tray', 35, 'Black | Plastic', 50, 'image15.jpeg', 'Accessories'),
(16, 'Post-it Accessory Tray', 10, 'Black | Plastic', 50, 'image16.jpeg', 'Accessories'),
(17, 'TRU RED Letter Tray', 35, 'Black | Plastic', 49, 'image17.jpeg', 'Accessories'),
(18, 'HP Office Jet Pro', 350, 'Wireless | Brings Ink', 49, 'image18.jpeg', 'Electronics'),
(19, 'Epson WorkForce Pro', 320, 'Wireless | All in one', 50, 'image19.jpeg', 'Electronics'),
(20, 'Epson ES-200', 200, 'Portable | Support Multiple File Types | 600 dpi', 50, 'image20.jpeg', 'Electronics'),
(21, 'Epson RapidReceipt', 400, 'Portable | Captures at speeds of 35ppm', 50, 'image21.jpeg', 'Electronics'),
(23, 'Hp 27 Monitor', 200, 'Curved LED Backlit | 27 in', 50, 'image23.jpeg', 'Electronics'),
(24, 'Logitech M510 Mouse', 27, 'Wireless laser | Black', 50, 'image24.jpeg', 'Electronics'),
(25, 'Logitech Desktop KeyBoard & Mouse', 30, 'Wireless | Black ', 50, 'image25.jpeg', 'Electronics'),
(27, 'Mount-it! Adjustable Desk', 250, '29 in - 48in | Black', 50, 'image27.jpeg', 'Furniture'),
(28, 'Union & Scale Task Chair', 100, 'Mesh Back Fabric | Black', 50, 'image28.jpeg', 'Furniture'),
(29, 'FlexFit Task Chair', 210, 'Hyken Mesh | Black', 50, 'image29.jpeg', 'Furniture'),
(30, 'Union & Scale File Cabinet', 180, '21 in | Vertical | White', 50, 'image30.jpeg', 'Furniture'),
(26, '3m Standing Desk', 530, 'Adjustable Desk Riser | Gel Wrist Rest | Mouse Pad', 49, 'image26.jpeg', 'Furniture'),
(22, 'HP V22v LCD Monitor', 115, '21.45 in | Black ', 50, 'image22.jpeg', 'Electronics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
