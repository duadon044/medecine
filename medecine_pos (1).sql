-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2026 at 07:38 PM
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
-- Database: `medecine_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` int(11) NOT NULL,
  `type` enum('product','user','receipt') NOT NULL,
  `original_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `details` text DEFAULT NULL,
  `archived_date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_sessions`
--

CREATE TABLE `cart_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cart_data`)),
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `held_date` datetime NOT NULL DEFAULT current_timestamp(),
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `daily_sales_summary`
-- (See below for the actual view)
--
CREATE TABLE `daily_sales_summary` (
`sale_date` date
,`transaction_count` bigint(21)
,`total_revenue` decimal(32,2)
,`total_items_sold` decimal(32,0)
,`average_transaction_value` decimal(14,6)
,`min_transaction` decimal(10,2)
,`max_transaction` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `inventory_status`
-- (See below for the actual view)
--
CREATE TABLE `inventory_status` (
`id` int(11)
,`name` varchar(200)
,`category` varchar(50)
,`price` decimal(10,2)
,`stock` int(11)
,`expiry_date` date
,`expiry_status` varchar(24)
,`days_until_expiry` int(7)
,`stock_status` varchar(10)
,`status` enum('active','archived')
);

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `requested_date` datetime NOT NULL DEFAULT current_timestamp(),
  `processed_date` datetime DEFAULT NULL,
  `processed_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `user_id`, `username`, `fullname`, `type`, `start_date`, `end_date`, `reason`, `status`, `requested_date`, `processed_date`, `processed_by`) VALUES
(1, 2, 'pharmacist', 'John Pharmacist', 'Sick Leave', '2026-07-20', '2026-07-22', 'Fever and flu symptoms', 'pending', '2026-07-18 20:39:24', NULL, NULL),
(2, 3, 'cashier', 'Mary Cashier', 'Vacation Leave', '2026-08-01', '2026-08-05', 'Family vacation', 'approved', '2026-07-11 20:39:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL DEFAULT 0,
  `expiry_date` date DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `category`, `price`, `stock`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol 500mg', 'Pain Relief', 8.50, 120, '2026-12-31', 'active', '2026-07-21 20:39:24', NULL),
(2, 'Ibuprofen 400mg', 'Pain Relief', 12.00, 85, '2026-10-15', 'active', '2026-07-21 20:39:24', NULL),
(3, 'Amoxicillin 500mg', 'Antibiotic', 25.00, 45, '2026-09-20', 'active', '2026-07-21 20:39:24', NULL),
(4, 'Cetirizine 10mg', 'Antihistamine', 15.00, 60, '2026-11-05', 'active', '2026-07-21 20:39:24', NULL),
(5, 'Omeprazole 20mg', 'Gastric', 18.50, 12, '2026-08-10', 'active', '2026-07-21 20:39:24', NULL),
(6, 'Losartan 50mg', 'Cardiovascular', 22.00, 40, '2027-01-15', 'active', '2026-07-21 20:39:24', NULL),
(7, 'Metformin 500mg', 'Diabetes', 20.00, 8, '2026-07-25', 'active', '2026-07-21 20:39:24', NULL),
(8, 'Vitamin C 1000mg', 'Vitamins', 10.00, 200, '2027-03-01', 'active', '2026-07-21 20:39:24', NULL),
(9, 'Zinc 50mg', 'Vitamins', 8.00, 150, '2027-02-14', 'active', '2026-07-21 20:39:24', NULL),
(10, 'Aspirin 300mg', 'Pain Relief', 6.50, 15, '2026-06-30', 'active', '2026-07-21 20:39:24', NULL),
(11, 'Azithromycin 250mg', 'Antibiotic', 45.00, 25, '2027-04-20', 'active', '2026-07-21 20:39:24', NULL),
(12, 'Loratadine 10mg', 'Antihistamine', 14.00, 70, '2027-05-10', 'active', '2026-07-21 20:39:24', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthly_sales_summary`
-- (See below for the actual view)
--
CREATE TABLE `monthly_sales_summary` (
`month` varchar(7)
,`transaction_count` bigint(21)
,`total_revenue` decimal(32,2)
,`total_items_sold` decimal(32,0)
,`average_transaction_value` decimal(14,6)
);

-- --------------------------------------------------------

--
-- Table structure for table `pending_users`
--

CREATE TABLE `pending_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Pharmacist','Cashier','Staff') NOT NULL DEFAULT 'Staff',
  `notes` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `requested_date` datetime NOT NULL DEFAULT current_timestamp(),
  `processed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending_users`
--

INSERT INTO `pending_users` (`id`, `username`, `fullname`, `email`, `password`, `role`, `notes`, `status`, `requested_date`, `processed_date`) VALUES
(1, 'jane_doe', 'Jane Doe', 'jane@example.com', 'Jane@123', 'Pharmacist', 'Looking forward to joining the team!', 'pending', '2026-07-19 20:39:24', NULL),
(2, 'bob_smith', 'Bob Smith', 'bob@example.com', 'Bob@123', 'Cashier', 'I have 5 years of experience', 'pending', '2026-07-20 20:39:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cashier_name` varchar(100) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_percent` decimal(5,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `item_count` int(11) NOT NULL DEFAULT 0,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_items`
--

CREATE TABLE `receipt_items` (
  `id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `description`, `updated_at`) VALUES
(1, 'company_name', 'MediPOS Pharmacy', 'Company/Pharmacy name', NULL),
(2, 'company_address', '123 Health St., Medical City', 'Company address', NULL),
(3, 'company_phone', '(02) 8123-4567', 'Company phone number', NULL),
(4, 'tax_rate', '0.00', 'Tax rate (if applicable)', NULL),
(5, 'currency_symbol', '₱', 'Currency symbol', NULL),
(6, 'low_stock_threshold', '20', 'Low stock alert threshold', NULL),
(7, 'expiry_warning_days', '30', 'Days before expiry to show warning', NULL),
(8, 'session_timeout', '3600', 'Session timeout in seconds', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_products`
-- (See below for the actual view)
--
CREATE TABLE `top_products` (
`medicine_id` int(11)
,`medicine_name` varchar(200)
,`category` varchar(50)
,`times_purchased` bigint(21)
,`total_quantity_sold` decimal(32,0)
,`total_revenue` decimal(32,2)
,`average_price` decimal(14,6)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Pharmacist','Cashier','Staff') NOT NULL DEFAULT 'Staff',
  `status` enum('active','archived','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'System Administrator', 'admin@medipos.com', 'Admin@123', 'Admin', 'active', '2026-07-21 20:39:24', NULL),
(2, 'pharmacist', 'John Pharmacist', 'john@medipos.com', 'Pharma@123', 'Pharmacist', 'active', '2026-07-21 20:39:24', NULL),
(3, 'cashier', 'Mary Cashier', 'mary@medipos.com', 'Cash@123', 'Cashier', 'active', '2026-07-21 20:39:24', NULL),
(4, 'superadmin', 'Super Administrator', 'superadmin@medipos.com', 'Super@2026#Admin', 'Admin', 'active', '2026-07-24 01:17:10', '2026-07-24 01:17:10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_activity_summary`
-- (See below for the actual view)
--
CREATE TABLE `user_activity_summary` (
`user_id` int(11)
,`username` varchar(50)
,`fullname` varchar(100)
,`role` enum('Admin','Pharmacist','Cashier','Staff')
,`transactions_made` bigint(21)
,`total_sales_processed` decimal(32,2)
,`audit_entries` bigint(21)
,`last_activity` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `daily_sales_summary`
--
DROP TABLE IF EXISTS `daily_sales_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daily_sales_summary`  AS SELECT cast(`receipts`.`transaction_date` as date) AS `sale_date`, count(0) AS `transaction_count`, sum(`receipts`.`total`) AS `total_revenue`, sum(`receipts`.`item_count`) AS `total_items_sold`, avg(`receipts`.`total`) AS `average_transaction_value`, min(`receipts`.`total`) AS `min_transaction`, max(`receipts`.`total`) AS `max_transaction` FROM `receipts` GROUP BY cast(`receipts`.`transaction_date` as date) ORDER BY cast(`receipts`.`transaction_date` as date) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `inventory_status`
--
DROP TABLE IF EXISTS `inventory_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventory_status`  AS SELECT `medicines`.`id` AS `id`, `medicines`.`name` AS `name`, `medicines`.`category` AS `category`, `medicines`.`price` AS `price`, `medicines`.`stock` AS `stock`, `medicines`.`expiry_date` AS `expiry_date`, CASE WHEN `medicines`.`expiry_date` is null THEN 'No expiry' WHEN `medicines`.`expiry_date` < curdate() THEN 'Expired' WHEN `medicines`.`expiry_date` <= curdate() + interval 7 day THEN 'Expiring soon (<7 days)' WHEN `medicines`.`expiry_date` <= curdate() + interval 30 day THEN 'Expiring soon (<30 days)' ELSE 'Good' END AS `expiry_status`, to_days(`medicines`.`expiry_date`) - to_days(curdate()) AS `days_until_expiry`, CASE WHEN `medicines`.`stock` < 10 THEN 'Critical' WHEN `medicines`.`stock` < 20 THEN 'Low' ELSE 'Sufficient' END AS `stock_status`, `medicines`.`status` AS `status` FROM `medicines` WHERE `medicines`.`status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `monthly_sales_summary`
--
DROP TABLE IF EXISTS `monthly_sales_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthly_sales_summary`  AS SELECT date_format(`receipts`.`transaction_date`,'%Y-%m') AS `month`, count(0) AS `transaction_count`, sum(`receipts`.`total`) AS `total_revenue`, sum(`receipts`.`item_count`) AS `total_items_sold`, avg(`receipts`.`total`) AS `average_transaction_value` FROM `receipts` GROUP BY date_format(`receipts`.`transaction_date`,'%Y-%m') ORDER BY date_format(`receipts`.`transaction_date`,'%Y-%m') DESC ;

-- --------------------------------------------------------

--
-- Structure for view `top_products`
--
DROP TABLE IF EXISTS `top_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_products`  AS SELECT `ri`.`medicine_id` AS `medicine_id`, `ri`.`medicine_name` AS `medicine_name`, `m`.`category` AS `category`, count(distinct `ri`.`receipt_id`) AS `times_purchased`, sum(`ri`.`quantity`) AS `total_quantity_sold`, sum(`ri`.`subtotal`) AS `total_revenue`, avg(`ri`.`price`) AS `average_price` FROM (`receipt_items` `ri` join `medicines` `m` on(`ri`.`medicine_id` = `m`.`id`)) GROUP BY `ri`.`medicine_id`, `ri`.`medicine_name`, `m`.`category` ORDER BY sum(`ri`.`quantity`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `user_activity_summary`
--
DROP TABLE IF EXISTS `user_activity_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_activity_summary`  AS SELECT `u`.`id` AS `user_id`, `u`.`username` AS `username`, `u`.`fullname` AS `fullname`, `u`.`role` AS `role`, count(distinct `r`.`id`) AS `transactions_made`, coalesce(sum(`r`.`total`),0) AS `total_sales_processed`, count(`a`.`id`) AS `audit_entries`, max(`a`.`created_at`) AS `last_activity` FROM ((`users` `u` left join `receipts` `r` on(`u`.`id` = `r`.`user_id`)) left join `activities` `a` on(`u`.`id` = `a`.`user_id`)) GROUP BY `u`.`id`, `u`.`username`, `u`.`fullname`, `u`.`role` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_type` (`type`),
  ADD KEY `idx_original_id` (`original_id`),
  ADD KEY `idx_archived_date` (`archived_date`),
  ADD KEY `archived_by` (`archived_by`);

--
-- Indexes for table `cart_sessions`
--
ALTER TABLE `cart_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_expires` (`expires_at`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_dates` (`start_date`,`end_date`),
  ADD KEY `processed_by` (`processed_by`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_category` (`category`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_expiry` (`expiry_date`);

--
-- Indexes for table `pending_users`
--
ALTER TABLE `pending_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_username` (`username`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `idx_order_id` (`order_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_transaction_date` (`transaction_date`);

--
-- Indexes for table `receipt_items`
--
ALTER TABLE `receipt_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_receipt_id` (`receipt_id`),
  ADD KEY `idx_medicine_id` (`medicine_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`),
  ADD KEY `idx_key` (`setting_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_sessions`
--
ALTER TABLE `cart_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pending_users`
--
ALTER TABLE `pending_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_items`
--
ALTER TABLE `receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `archives`
--
ALTER TABLE `archives`
  ADD CONSTRAINT `archives_ibfk_1` FOREIGN KEY (`archived_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cart_sessions`
--
ALTER TABLE `cart_sessions`
  ADD CONSTRAINT `cart_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leave_requests_ibfk_2` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `receipt_items`
--
ALTER TABLE `receipt_items`
  ADD CONSTRAINT `receipt_items_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `receipt_items_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
