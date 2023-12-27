-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 17, 2022 at 06:27 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housing`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(10) NOT NULL,
  `book_date` date DEFAULT NULL,
  `tenant_id` int(20) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `book_start_date` date DEFAULT NULL,
  `book_end_date` date DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `book_date`, `tenant_id`, `room_id`, `book_start_date`, `book_end_date`, `status`) VALUES
(1, '2022-04-17', 2, 1, '2022-04-17', '2022-06-17', 'paid'),
(2, '2022-04-20', 1, 2, '2022-04-19', '2022-07-30', 'paid'),
(3, '2022-04-19', 4, 3, '2022-04-25', '2022-10-25', 'paid'),
(4, '2022-03-30', 8, 6, '2022-04-25', '2022-08-24', 'paid'),
(6, '2022-05-17', 12, 8, '2022-05-18', '2022-08-30', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('taftaniza', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `tenant_name` varchar(50) NOT NULL,
  `tenant_id` int(20) NOT NULL,
  `room_id` int(10) NOT NULL,
  `room_label` varchar(50) NOT NULL,
  `pay_date` date NOT NULL,
  `payment_total` int(50) NOT NULL,
  `pay_methode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `book_id`, `tenant_name`, `tenant_id`, `room_id`, `room_label`, `pay_date`, `payment_total`, `pay_methode`) VALUES
(1, 2, 'Taftaniza Auzalya D', 1, 1, 'Pixy X2', '2022-04-20', 1500000, 'transfer'),
(2, 1, 'Ananda Putri P.', 2, 2, 'Pixy X1', '2022-04-22', 1500000, 'transfer'),
(3, 3, 'Hillary de Queljoe', 4, 3, 'Pixy Y2', '2022-04-18', 1450000, 'cash'),
(4, 6, 'Rio Dewanto', 9, 6, 'Hollow Y7', '2022-05-07', 1350000, 'cash'),
(7, 2, 'Taftaniza  Auzalya D', 1, 2, 'Pixy X2', '2022-05-20', 4500000, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_label` varchar(50) DEFAULT NULL,
  `room_location` varchar(50) DEFAULT NULL,
  `room_gender` varchar(20) DEFAULT NULL,
  `room_window` varchar(100) DEFAULT NULL,
  `room_monthly_price` int(50) DEFAULT NULL,
  `room_availability` tinyint(20) DEFAULT NULL COMMENT '0 = Available , 1= Unvailables',
  `room_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_label`, `room_location`, `room_gender`, `room_window`, `room_monthly_price`, `room_availability`, `room_description`) VALUES
(1, 'Pixy X1 ', '1st floor', 'male', 'Main street, trees, mini garden, poll', 1500000, 1, 'Study desk,Wi-fi, AC, Independent bathroom, 2 windows direction to the main street'),
(2, 'Pixy X2', '1st floor', 'Female', 'Main street, trees, mini garden, poll', 1500000, 1, 'Study desk,Wi-fi, AC, Independent bathroom, 2 windows direction to the street'),
(3, 'Pixy X3', '1st floor', 'Female', 'Main street, trees, mini garden, poll', 1500000, 1, 'Study desk,Wi-fi, AC, Independent bathroom, 2 windows direction to the street'),
(4, 'Pixy X4', '1st floor', 'male', 'Main street, trees, mini garden, poll', 1500000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 2 windows direction to the street'),
(5, 'Pixy X5 ', '1st floor', 'male', 'Main street, trees, mini garden, poll', 1500000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 2 windows direction to the street'),
(6, 'Pixy X6', '2nd Floor', 'Female', 'Street, tree, garden, poll', 1450000, 1, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(7, 'Pixy X7', '2nd Floor', 'Female', 'Street, tree, garden, poll', 1450000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(8, 'Hollow Y1', '2nd Floor', 'Male', 'Street, tree, garden, poll', 1450000, 8, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(9, 'Hollow Y2', '2nd Floor', 'Male', 'Street, tree, garden, poll', 1450000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(10, 'Hollow Y3', '2nd Floor', 'Male', 'Street, tree, garden, poll', 1450000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(11, 'Hollow Y4', '3rd Floor', 'Male', 'Street, tree, garden, poll', 1400000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(12, 'Hollow Y5', '3rd floor', 'Male', 'Street, tree, garden, poll', 1400000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(13, 'Pixy X8', '3rd Floor', 'Female', 'Street, tree, garden, poll', 1400000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(14, 'Pixy X9', '3rd floor', 'Female', 'Street, tree, garden, poll', 1400000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(15, 'Pixy X10', '3rd floor', 'Female', 'Street, tree, garden, poll', 1400000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(16, 'Hollow Y6', '4th floor', 'Male', 'Street, tree, garden, poll', 1350000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(17, 'Hollow Y7', '4th floor', 'Male', 'Street, tree, garden, poll', 1350000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(18, 'Hollow Y8', '4th floor', 'Male', 'Street, tree, garden, poll', 1350000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(19, 'Hollow Y9', '4th floor', 'Male', 'Street, tree, garden, poll', 1350000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view'),
(20, 'Hollow Y10', '4th floor', 'Male', 'Street, tree, garden, poll', 1350000, 0, 'Study desk,Wi-fi, AC, Independent bathroom, 1 window direction to the city view');

-- --------------------------------------------------------

--
-- Table structure for table `Tenant`
--

CREATE TABLE `Tenant` (
  `tenant_id` int(20) NOT NULL,
  `tenant_name` varchar(50) NOT NULL,
  `tenant_address` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tenant_ktp_no` varchar(20) NOT NULL,
  `tenant_phone` varchar(20) NOT NULL,
  `tenant_email` varchar(50) NOT NULL,
  `tenant_emergcp` varchar(20) NOT NULL,
  `tenant_emergcp_phone` varchar(20) NOT NULL,
  `tenant_emergcp_email` varchar(25) NOT NULL,
  `tenant_bankaccount` varchar(25) NOT NULL,
  `tenant_bankaccount_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tenant`
--

INSERT INTO `Tenant` (`tenant_id`, `tenant_name`, `tenant_address`, `gender`, `tenant_ktp_no`, `tenant_phone`, `tenant_email`, `tenant_emergcp`, `tenant_emergcp_phone`, `tenant_emergcp_email`, `tenant_bankaccount`, `tenant_bankaccount_no`) VALUES
(1, 'Taftaniza  Auzalya D', 'Cikarang', 'female', '817204056789', '082199071997', 'tata@gmail.com', 'Jeje', '081334848002', 'jeje@gmail.com', 'BCA', '123245676568'),
(2, 'Ananda Putri P.', 'Makassar', 'female', '817245678976', '081178977790', 'nanda@gmail.com', 'Ayu', '081334545074', 'ayu@gmail.com', 'Mandiri', '827835678924'),
(3, 'Mirel Tristania ', 'Ambon', 'female', '867256768905', '081524545666', 'mirel@gmail.com', 'Giel', '082243006789', 'Giel@gmail.com', 'BNI', '8278345685468'),
(4, 'Hillary de Queljoe', 'Jakarta', 'female', '817244565349', '08114704267', 'hill@gmail.com', 'Rara', '81334678964', 'rara@gmail.com', 'Mandiri', '123233454522'),
(5, 'Bayu Bimatoro', 'Banyuwangi', 'male', '862389090908', '082243007372', 'bayu@gmail.com', 'Emi', '082245335678', 'emi@gmail.com', 'Mandiri', '827878937439'),
(6, 'Ivone Letlora', 'Ambon', 'female', '873432566432', '082343007876', 'ivone@gmail.com', 'Putri', '083424322245', 'putri@gmail.com', 'BNI', '239344345643'),
(7, 'Michelle Mariane', 'Jakarta', 'female', '872389212454', '082199633845', 'michelle@gmail.com', 'Olive', '0811673289', 'olive@gmail.com', 'BRI', '923892842435'),
(8, 'Gred Mayo', 'Solo', 'female', '782378113345', '081178982389', 'gred@gmail.com', 'Sirus', '08219867980', 'sirus@gmail.com', 'BCA', '537292688983'),
(9, 'Rio Dewanto', 'Bandung', 'male', '867863729279', '082267986755', 'rio@gmail.com', 'Giel', '08217898007', 'Giel@gmail.com', 'BRI', '787392291298'),
(10, 'Fiqa', 'Jakarta', 'female', '86237898657', '082199071997', 'Fiqa@gmail.com', '97234', '082199071997', 'mom@gmail.com', 'Mandiri', '294792'),
(11, 'Arden Edgar', 'Purwokarta', 'male', '89638492878', '081343567888', 'edgar@gmail.com', 'tata', '082199071997', 'tata@gmail.com', 'BRI', '9238928424'),
(12, 'Muhammad Abbas', 'Padang', 'male', '81718987569', '082199071997', 'abbas@gmail.com', 'Mom', '082199071997', 'mama@gmail.com', 'BTN', '7283'),
(13, 'Fatir Willy', 'Malang', 'male', '00678973567', '082367899765', 'willy@gmail.com', 'Ermila', '081897569099', 'mila@gmail.com', 'Mandiri', '9238928424'),
(14, 'Khanza Al mutshira', 'Padang', 'female', '89782896677', '082932789722', 'khanza@gmail.com', 'Nia', '083278987799', 'nia@gmail.com', 'BCA', '923892555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `FKroom1` (`room_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `room_label` (`room_label`),
  ADD KEY `tenant_name` (`tenant_name`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_label` (`room_label`);

--
-- Indexes for table `Tenant`
--
ALTER TABLE `Tenant`
  ADD PRIMARY KEY (`tenant_id`),
  ADD KEY `tenant_name` (`tenant_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Tenant`
--
ALTER TABLE `Tenant`
  MODIFY `tenant_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FKroom1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `Tenant` (`tenant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
