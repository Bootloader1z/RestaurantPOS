-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 10:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `fms_admin`
--

CREATE TABLE `fms_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fms_admin`
--

INSERT INTO `fms_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'System Admin', 'admin@mail.com', 'f00553be8926fe08689992ea697ac31655d186b7');

-- --------------------------------------------------------

--
-- Table structure for table `fms_chat`
--

CREATE TABLE `fms_chat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fms_customers`
--

CREATE TABLE `fms_customers` (
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phoneno` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `IP_Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fms_customers`
--

INSERT INTO `fms_customers` (`customer_id`, `customer_name`, `customer_phoneno`, `customer_email`, `customer_password`, `created_at`, `IP_Address`) VALUES
('3809daeac860', 'lhey pateno', '092222331241', 'lheypateno@gmail.com', '43f251b6bd118ed9141233676fca05e432150ad9', '2023-05-23 06:31:01.835274', ''),
('44b3b5020e29', 'test beta', '12312391239', 'testbeta@gg.com', '6fe3ddbdc7f2bbfc91fa9fb487bd44cc7ed8e466', '2023-05-16 19:47:23.899624', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `fms_orders`
--

CREATE TABLE `fms_orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fms_orders`
--

INSERT INTO `fms_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
('7da82c2bdc', 'QYRI-1295', '44b3b5020e29', 'test beta', 'f683ab11dc', 'terno ', '10', '10', 'Paid', '2023-05-23 07:11:16.071144'),
('d0cbd60166', 'NUDP-9754', '44b3b5020e29', 'test beta', '3a84f4bbc4', 'Los Angeles T shirt', '25', '33', 'Paid', '2023-05-23 07:10:51.917177'),
('dcfce974fc', 'OQFU-3987', '3809daeac860', 'lhey pateno', 'a4d40ab893', 'punk rock T shirt', '21', '10', 'Paid', '2023-05-23 06:57:19.070641'),
('e926e3fb9a', 'GFOJ-0381', '3809daeac860', 'lhey pateno', '3a84f4bbc4', 'Los Angeles T shirt', '25', '10', 'Paid', '2023-05-23 06:48:58.394621'),
('ea69e0c23c', 'LFMB-0742', '44b3b5020e29', 'test beta', 'c2893b7fbc', 'red floral crop top', '650', '10', 'Paid', '2023-05-23 07:11:16.080343');

-- --------------------------------------------------------

--
-- Table structure for table `fms_pass_resets`
--

CREATE TABLE `fms_pass_resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fms_pass_resets`
--

INSERT INTO `fms_pass_resets` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'approve', '2023-05-05 11:43:48.102125');

-- --------------------------------------------------------

--
-- Table structure for table `fms_payments`
--

CREATE TABLE `fms_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fms_payments`
--

INSERT INTO `fms_payments` (`pay_id`, `pay_code`, `order_code`, `customer_id`, `pay_amt`, `pay_method`, `created_at`) VALUES
('2693c5', 'RM2023KPNH4BWIER', 'UJYQ-5204', '44b3b5020e29', '1245', 'Cash', '2023-05-22 14:11:31.460759'),
('33d679', 'RM2023GRT6FOCXKD', 'GFOJ-0381', '3809daeac860', '250', 'Cash', '2023-05-23 06:48:58.390033'),
('3a7056', 'RM2023IC5FW6KG49', 'OQFU-3987', '3809daeac860', '210', 'Cash', '2023-05-23 06:57:19.067347'),
('ad81b3', 'RM2023PAPAMDDASX', 'LFMB-0742', '44b3b5020e29', '6500', 'Cash', '2023-05-23 07:11:16.077844'),
('d04e95', 'RM2023PAPAMDDASX', 'NUDP-9754', '44b3b5020e29', '825.00', 'Cash', '2023-05-23 07:10:51.911541'),
('f9c840', 'RM2023PAPAMDDASX', 'QYRI-1295', '44b3b5020e29', '100', 'Cash', '2023-05-23 07:11:16.068203');

-- --------------------------------------------------------

--
-- Table structure for table `fms_products`
--

CREATE TABLE `fms_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `quantity` int(50) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ;

--
-- Dumping data for table `fms_products`
--

INSERT INTO `fms_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `quantity`, `created_at`) VALUES
('3a84f4bbc4', 'KFPM-2437', 'Los Angeles T shirt', '71gpR-r22HL._AC_UL320_.jpg', 'Los Angeles T shirt for men', '25', 0, '2023-05-23 07:09:15.695444'),
('9db058e0d8', 'BOWS-9578', 'Winter pajamas for women', '81dMryMuQFL._AC_UY350_.jpg', 'winter pajama for women', '17', 85, '2023-05-22 14:49:47.856809'),
('a4d40ab893', 'YTDR-1607', 'punk rock T shirt', 'B1OGJ8t+8ZS._CLa_2140,2000_71GHv+xlqHL.png_0,0,2140,2000+0.0,0.0,2140.0,2000.0_AC_SL1500_.png', 'punk rock T shirt\r\nsmall to extra large ', '21', 74, '2023-05-23 06:56:19.877414'),
('af454918af', 'GTPE-9278', 'Black leather jacket ', '', 'Black Leather Jacket\r\nFree Size ', '15', 74, '2023-05-22 14:46:40.565437'),
('c2893b7fbc', 'CP-001', 'red floral crop top', 'images (1).jpeg', 'a red floral coquette crop top\r\nSIZE FREE', '650', 38, '2023-05-23 07:08:45.473170'),
('f683ab11dc', 'ZFRO-9671', 'terno ', '41tzCuexOLS._SS400_.jpg', 'terno with variety of colors ', '10', 536, '2023-05-23 07:11:07.483016');

-- --------------------------------------------------------

--
-- Table structure for table `fms_staff`
--

CREATE TABLE `fms_staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fms_staff`
--

INSERT INTO `fms_staff` (`staff_id`, `staff_name`, `staff_number`, `staff_email`, `staff_password`, `created_at`) VALUES
(4, 'CASHIER', 'CVND-4360', 'cash@cash.com', '0dc777c2e97fbe36333e52d2aa2d52b9f1706a27', '2023-05-23 06:54:14.824614');

-- --------------------------------------------------------

--
-- Table structure for table `fms_temp_orders`
--

CREATE TABLE `fms_temp_orders` (
  `order_code` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `prod_id` varchar(50) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` varchar(50) NOT NULL,
  `prod_qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fms_temp_orders`
--

INSERT INTO `fms_temp_orders` (`order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`) VALUES
('PHJM-1735', 'b6cd9bf34ab2', 'full name x', 'e769e274a3', 'Frappuccino', '3', '1'),
('PHJM-1735', 'b6cd9bf34ab2', 'full name x', 'e769e274a3', 'Frappuccino', '3', '1'),
('RHFB-9780', 'b6cd9bf34ab2', 'full name x', 'e769e274a3', 'Frappuccino', '3', '1'),
('XKBF-8057', 'b6cd9bf34ab2', 'full name x', 'e769e274a3', 'Frappuccino', '3', '1'),
('XKBF-8057', 'b6cd9bf34ab2', 'full name x', 'e769e274a3', 'Frappuccino', '3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fms_admin`
--
ALTER TABLE `fms_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `fms_chat`
--
ALTER TABLE `fms_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_customers`
--
ALTER TABLE `fms_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fms_orders`
--
ALTER TABLE `fms_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerOrder` (`customer_id`),
  ADD KEY `ProductOrder` (`prod_id`);

--
-- Indexes for table `fms_pass_resets`
--
ALTER TABLE `fms_pass_resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `fms_payments`
--
ALTER TABLE `fms_payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order` (`order_code`);

--
-- Indexes for table `fms_products`
--
ALTER TABLE `fms_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `fms_staff`
--
ALTER TABLE `fms_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fms_chat`
--
ALTER TABLE `fms_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fms_pass_resets`
--
ALTER TABLE `fms_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fms_staff`
--
ALTER TABLE `fms_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fms_orders`
--
ALTER TABLE `fms_orders`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `fms_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `fms_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
