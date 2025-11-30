-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 07:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'CEO', 'ceo', 'ceo@mcbbank.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchId` int(11) NOT NULL,
  `branchNo` varchar(111) NOT NULL,
  `branchName` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchId`, `branchNo`, `branchName`) VALUES
(1, '100101', 'Dhaka'),
(2, '100102', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'shimla', 'iamshimla02@gmail.com', 'hi there!', '2025-08-25 16:20:14'),
(2, 'shimla', 'iamshimla02@gmail.com', 'hi there!', '2025-08-25 16:20:56'),
(3, 'jjjjj', 'jahid@gmail.com', 'jjjjj', '2025-08-26 04:21:37'),
(4, 'shimla', 'ugcc2@gmail.com', 'gsgdhubdgvhd', '2025-09-07 07:18:16'),
(5, 'Anonymous', 'anonymous@mcb.com', 'i need help', '2025-09-07 17:20:41'),
(6, 'Anonymous', 'anonymous@mcb.com', 'hsgftriutytr', '2025-09-07 17:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `message` text NOT NULL,
  `userId` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `message`, `userId`, `date`) VALUES
(1, 'This is testing message to admin or manager by fk', 1, '2017-12-15 04:30:48'),
(4, 'this is help card for admin', 1, '2017-12-17 06:45:20'),
(5, 'great!', 1, '2025-08-17 15:01:06'),
(6, 'this message is for testing.', 2, '2025-10-13 15:52:09'),
(7, 'thanks for your kind service!', 11, '2025-10-14 03:30:04'),
(8, 'thank', 11, '2025-10-14 03:39:55'),
(9, 'test', 8, '2025-10-14 03:46:23'),
(11, 'tedhnd', 11, '2025-10-14 04:39:30'),
(12, 'gfhhgfhjjh', 2, '2025-10-26 06:12:28'),
(13, 'gghhjjkkkkl', 2, '2025-10-26 06:14:11'),
(14, 'ttty', 2, '2025-10-26 06:21:31'),
(15, 'admin panel is done', 2, '2025-10-27 17:08:19'),
(16, 'appreciating your services, Thank you so much!', 13, '2025-11-08 15:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `type` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `type`, `date`) VALUES
(1, 'cashier@cashier.com', 'cashier', 'cashier', '2017-12-15 04:36:27'),
(2, 'manager@manager.com', 'manager', 'manager', '2017-12-15 04:36:27'),
(3, 'sadfas@gmail.com', 'sdfas', 'type', '2017-12-16 07:13:12'),
(4, 'fkgeo@gmail.com', 'asdfsa', 'type', '2017-12-16 07:13:18'),
(6, 'cashier2@cashier.com', 'cashier2', 'cashier', '2017-12-16 07:14:47'),
(7, 'she02@gmail.com', 'she02', 'cashier', '2025-08-17 15:13:09'),
(8, 'uracc@gmail.com', 'uracc', 'cashier', '2025-08-17 15:54:36'),
(9, 'stuff1@gmail.com', 'stuff1', 'cashier', '2025-09-08 18:10:21'),
(10, 'roni10@gmail.com', 'roni10', 'cashier', '2025-10-14 03:42:28'),
(11, 'joni10@gmail.com', 'joni10', 'cashier', '2025-10-14 04:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `email`, `username`, `password`) VALUES
(2, 'MD Suvo', 'suvo@gmail.com', 'SUVO', '52878780f6a57fa17dd9d66d50eef782'),
(4, 'MANEGER', 'manager@manager.com', 'manager', '1d0258c2440a8d19e716292b231e3190'),
(7, 'MHB Shimla', 'shimla10@gmail.com', 'mhbshimla', '35d413076d85cc5669fb43591117dc7c'),
(9, 'Ariyana Hussain', 'ariyana@gmail.com', 'ariyana', '09ea221d3db11df1f369094ffb4bda7c');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `userId` varchar(111) NOT NULL,
  `notice` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `userId`, `notice`, `date`) VALUES
(1, '1', 'Dear Customer! <br> OUr privacy policy is changed for account information get new prospectus from your nearest branch', '2017-12-14 13:11:46'),
(6, '2', 'Dear Ali,<br>\r\nOur privacy policy has been changed please visit nearest <kbd> MCB </kbd> branch for new prospectus.', '2017-12-16 06:29:23'),
(7, '8', 'you account created successfully!', '2025-08-17 15:57:42'),
(8, '9', 'your account created successfully!', '2025-08-17 16:00:32'),
(9, '6', 'hey your account in safe!', '2025-10-13 14:19:19'),
(10, '11', 'your account has been created successfully!', '2025-10-13 14:25:32'),
(11, '12', 'thanks for your patience', '2025-10-14 04:37:35'),
(12, '2', 'your account is active now!', '2025-10-19 07:40:42'),
(13, '10', 'can you get my message', '2025-10-27 17:14:26'),
(14, '2', 'working properly', '2025-10-27 17:15:58'),
(15, '13', 'Your account has been created successfully! Thanks for your patience. Wish you a happy and safe banking!', '2025-11-08 14:30:00'),
(16, '13', 'Happy Banking!', '2025-11-17 14:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `otheraccounts`
--

CREATE TABLE `otheraccounts` (
  `id` int(11) NOT NULL,
  `accountNo` varchar(111) NOT NULL,
  `bankName` varchar(111) NOT NULL,
  `holderName` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `otheraccounts`
--

INSERT INTO `otheraccounts` (`id`, `accountNo`, `bankName`, `holderName`, `balance`, `date`) VALUES
(1, '12001122', 'UBL', 'Yaqoob Quraishi', '40800', '2017-12-14 11:55:07'),
(2, '12001123', 'HBL', 'Yousaf Khan', '71000', '2017-12-14 11:55:07'),
(3, '12001124', 'HBL', 'Yousaf Khan', '71000', '2017-12-14 11:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(11) NOT NULL,
  `action` varchar(111) NOT NULL,
  `credit` varchar(111) NOT NULL,
  `debit` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `beneId` varchar(111) NOT NULL,
  `other` varchar(111) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `action`, `credit`, `debit`, `balance`, `beneId`, `other`, `userId`, `date`) VALUES
(4, 'transfer', '', '200', '', '', '12001122', 1, '2017-12-14 12:33:40'),
(5, 'transfer', '', '200', '', '', '10054777', 1, '2017-12-14 12:56:48'),
(6, 'transfer', '', '333', '', '', '10054777', 1, '2017-12-14 12:57:20'),
(7, 'transfer', '', '222', '', '', '10054777', 1, '2017-12-14 12:58:19'),
(8, 'transfer', '', '333', '', '', '10054777', 1, '2017-12-14 13:00:23'),
(16, 'withdraw', '', '100', '', '', '23423', 1, '2017-12-15 08:31:59'),
(17, 'deposit', '1200', '', '', '', '234232', 1, '2017-12-15 08:32:17'),
(18, 'transfer', '', '467', '', '', '12001122', 1, '2017-12-17 06:44:48'),
(22, 'deposit', '1200', '', '', '', '32424', 2, '2017-12-17 06:56:29'),
(23, 'withdraw', '', '12', '', '', '23423', 2, '2017-12-17 06:59:02'),
(24, 'deposit', '12', '', '', '', '21321', 2, '2017-12-17 06:59:20'),
(25, 'transfer', '', '1200', '', '', '10054777', 1, '2017-12-17 07:01:37'),
(26, 'deposit', '600', '', '', '', '342342', 2, '2017-12-17 07:04:39'),
(27, 'withdraw', '', '1012', '', '', '23423', 2, '2017-12-17 07:04:58'),
(28, 'transfer', '', '10000', '', '', '10054777', 2, '2025-10-20 14:38:24'),
(29, 'withdraw', '', '10000', '', '', '2345363856', 2, '2025-10-20 15:02:07'),
(30, 'deposit', '50000', '', '', '', '453623145', 2, '2025-10-20 15:02:33'),
(31, 'transfer', '', '10000', '', '', '1760416459', 11, '2025-10-20 15:08:32'),
(32, 'withdraw', '', '10000', '', '', '24356371', 10, '2025-10-20 15:10:56'),
(33, 'deposit', '12000000', '', '', '', '53642516', 11, '2025-10-20 15:11:46'),
(34, 'withdraw', '', '100000', '', '', '17358526', 11, '2025-10-20 15:12:34'),
(35, 'deposit', '14400000', '', '', '', '427635415', 12, '2025-10-20 15:13:54'),
(36, 'transfer', '', '100000', '', '', '1760365343', 12, '2025-10-20 15:16:46'),
(37, 'transfer', '', '1000000', '', '', '1760365343', 13, '2025-11-08 14:28:20'),
(38, 'withdraw', '', '1000000', '', '', '425423172', 13, '2025-11-08 14:33:03'),
(39, 'deposit', '500000', '', '', '', '24534325', 13, '2025-11-08 14:33:35'),
(40, 'transfer', '', '23456', '', '', '1760416459', 13, '2025-11-11 04:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `nid` varchar(111) NOT NULL,
  `number` varchar(111) NOT NULL,
  `city` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `source` varchar(111) NOT NULL,
  `accountNo` varchar(111) NOT NULL,
  `branch` varchar(111) NOT NULL,
  `accountType` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `email`, `password`, `name`, `balance`, `nid`, `number`, `city`, `address`, `source`, `accountNo`, `branch`, `accountType`, `date`) VALUES
(2, 'some2@gmail.com', 'some2', 'Ali khan', '56000', '3210375555343', '03356910260', 'Islamabad', 'Some where in isb', 'Programmer', '10054777', '1', 'Saving', '2017-12-14 04:50:06'),
(6, 'realx4rd@gmail.com', 'afsdfasd', 'Fayyaz Khan', '234234', '3240338834902', '03356910260', 'Taunsa', 'Dera Ghazi Khan', 'Govt. job', '1513410739', '1', 'saving', '2017-12-16 07:52:40'),
(7, 'realx4rd@gmail.com', 'safsadf', 'Fayyaz Khan', '12121', '3240338834902', '03356910260', 'Taunsa', 'Dera Ghazi Khan', 'Govt. job', '1513410837', '1', 'current', '2017-12-16 07:54:18'),
(8, 'uracc@gmail.com', 'uracc', 'uracc', '500', '1', '01890040951', 'sylhet', 'south surma,sylhet', 'business', '1755446085', '1', 'current', '2025-08-17 15:56:42'),
(10, 'sjahan@gmail.com', 'sjahan', 'shuborna', '9993565', '1', '01562536474', 'dhaka', 'north south surma', 'business', '1757345500', '2', 'saving', '2025-09-08 15:35:00'),
(11, 'ayana10@gmail.com', 'ayana10', 'Ayana Hussain', '13000000', '205364253', '01853462422', 'sylhet', 'south surma,sylhet', 'business', '1760365343', '2', 'saving', '2025-10-13 14:24:20'),
(12, 'shimla09@gmail.com', 'shimla09', 'shimla', '14390244', '4235345666', '01853524345', 'sylhet', 'south surma,sylhet', 'job', '1760416459', '1', 'current', '2025-10-14 04:36:47'),
(13, 'arib05@gmail.com', 'arib05', 'arib', '2476544', '1234414302', '01804414302', 'Sylhet', 'South Surma, Sylhet-3100', 'business', '1762611572', '2', 'saving', '2025-11-08 14:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'shimla', 'iamshimla02@gmail.com', 'mhbshimla', '202cb962ac59075b964b07152d234b70'),
(3, 'shi', 'shimla02@gmail.com', 'mhb', '289dff07669d7a23de0ef88d2f7129e7'),
(4, 'sgery dgtr', 'uhdg@gmail.com', 'hlwe', '202cb962ac59075b964b07152d234b70'),
(5, 'shefa', 'shefa22@gmail.com', 'shefaaaa', 'c8dfece5cc68249206e4690fc4737a8d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchId`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
