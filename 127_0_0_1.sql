-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 07:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-10-21 13:37:09', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `vrst`
--
CREATE DATABASE IF NOT EXISTS `vrst` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vrst`;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `transection_type` enum('purchase','return') NOT NULL,
  `bill_image` varchar(300) NOT NULL,
  `bill_status` enum('draft','sended') NOT NULL,
  `created_at` datetime NOT NULL,
  `varified_by_role` int(11) DEFAULT NULL,
  `varified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `transection_type`, `bill_image`, `bill_status`, `created_at`, `varified_by_role`, `varified_by`, `status`) VALUES
(1, 'purchase', 'wqe', 'draft', '2021-02-02 00:00:00', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_detail_id` int(11) NOT NULL,
  `crop` varchar(200) NOT NULL,
  `crop_variety` varchar(200) NOT NULL,
  `qty` float(10,2) NOT NULL,
  `unit` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `DealerId` int(5) NOT NULL,
  `DealerName` varchar(100) NOT NULL,
  `DealerAdd` varchar(100) NOT NULL,
  `DealerCity` varchar(50) NOT NULL,
  `DealerPerson` varchar(50) NOT NULL,
  `DealerEmail` varchar(50) NOT NULL,
  `password` varchar(20) DEFAULT '123456',
  `DealerCont` bigint(20) NOT NULL,
  `DealerCont2` bigint(20) NOT NULL,
  `HqId` int(5) NOT NULL,
  `Hq_vc` int(5) NOT NULL DEFAULT 0,
  `Hq_fc` int(5) NOT NULL DEFAULT 0,
  `Terr_vc` int(5) NOT NULL DEFAULT 0,
  `Terr_fc` int(5) NOT NULL DEFAULT 0,
  `DealerSts` char(1) NOT NULL DEFAULT 'A',
  `CompanyId` int(2) NOT NULL,
  `CreatedBy` int(5) NOT NULL DEFAULT 0 COMMENT 'AXAUESRUser_Id',
  `CreatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `DealerId`, `DealerName`, `DealerAdd`, `DealerCity`, `DealerPerson`, `DealerEmail`, `password`, `DealerCont`, `DealerCont2`, `HqId`, `Hq_vc`, `Hq_fc`, `Terr_vc`, `Terr_fc`, `DealerSts`, `CompanyId`, `CreatedBy`, `CreatedDate`) VALUES
(1, 1, 'rahul sinha', 'model town', 'bhilai', 'rahul sinha', 'sinha.rahulsinha.sinha@gmail.com', '123456', 1234567890, 1234567809, 1, 0, 0, 0, 0, 'A', 1, 2, '2021-02-05'),
(2, 2, 'ravi dewangan', 'bilaspur', 'bhilai', 'rahul sinha', 'sinha.rahulsinha.sinha@gmail.com', '123456', 1234567890, 1234567809, 1, 0, 0, 0, 0, 'A', 1, 2, '2021-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `master_headquater`
--

CREATE TABLE `master_headquater` (
  `id` int(11) NOT NULL,
  `HqId` int(11) NOT NULL,
  `HqName` varchar(200) NOT NULL,
  `StateId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_headquater`
--

INSERT INTO `master_headquater` (`id`, `HqId`, `HqName`, `StateId`, `status`) VALUES
(1, 1, 'RAIPUR', 5, 1),
(2, 2, 'KANPUR', 34, 1),
(3, 3, 'MUZAFFARPUR', 4, 1),
(4, 4, 'VARANASI', 36, 1),
(5, 5, 'PATNA', 4, 1),
(6, 6, 'CHENNAI', 26, 1),
(7, 7, 'HYDERABAD', 30, 1),
(8, 8, 'KURUKSHETRA', 10, 1),
(9, 9, 'KOHADIYA', 5, 1),
(10, 10, 'RANCHI', 6, 1),
(11, 12, 'ALIGARH', 35, 1),
(12, 13, 'PANAGARH', 23, 1),
(13, 14, 'DEORJHAL', 5, 1),
(14, 15, 'GOMCHI', 5, 1),
(15, 17, 'KADAPA', 30, 1),
(16, 18, 'MIRZAPUR', 36, 1),
(17, 19, 'GHAZIPUR', 36, 1),
(18, 20, 'BARGARH', 21, 1),
(19, 21, 'INDORE', 15, 1),
(20, 22, 'KARIMNAGAR', 30, 1),
(21, 23, 'MORADABAD', 35, 1),
(22, 24, 'PURNIA', 4, 1),
(23, 25, 'DHAMNOD', 15, 1),
(24, 26, 'JALANDHAR', 22, 1),
(25, 27, 'HIMMATNAGAR', 9, 1),
(26, 28, 'NAGPUR', 32, 1),
(27, 29, 'MEDCHAL', 1, 1),
(28, 30, 'BAHARAICH', 34, 1),
(29, 31, 'DHAMTARI', 5, 1),
(30, 32, 'GUNTUR', 1, 1),
(31, 33, 'GAYA', 4, 1),
(32, 34, 'BHUBANESWAR', 21, 1),
(33, 35, 'MAINPURI', 35, 1),
(34, 36, 'PRATAPGARH', 34, 1),
(35, 37, 'JAIPUR', 24, 1),
(36, 38, 'RATLAM', 15, 1),
(37, 39, 'GORAKHPUR', 36, 1),
(38, 40, 'PALANI', 26, 1),
(39, 41, 'MALERKOTLA', 22, 1),
(40, 42, 'VADODARA', 9, 1),
(41, 43, 'LADWA', 22, 1),
(42, 44, 'FATEHPUR', 29, 1),
(43, 45, 'FAIZABAD', 34, 1),
(44, 46, 'NASHIK', 33, 1),
(45, 47, 'AGRA', 35, 1),
(46, 48, 'PARCHETTI', 5, 1),
(47, 49, 'SORUMSINGHI', 5, 1),
(48, 50, 'DIBRUGARH', 3, 1),
(49, 51, 'RAJKOT', 9, 1),
(50, 52, 'MANSA', 9, 1),
(51, 53, 'ANANTPUR', 30, 1),
(52, 54, 'GULBARGA', 1, 1),
(53, 55, 'AMBALA', 22, 1),
(54, 56, 'DALTONGANJ', 6, 1),
(55, 57, 'AKOLA', 32, 1),
(56, 58, 'SATARA', 33, 1),
(57, 59, 'HAZARIBAGH', 6, 1),
(58, 60, 'ANAND', 9, 1),
(59, 61, 'AURANGABAD', 33, 1),
(60, 62, 'TITLAGARH', 21, 1),
(61, 63, 'JAGDALPUR', 5, 1),
(62, 64, 'RAJNANDGAON', 5, 1),
(63, 65, 'SILLIGURI', 23, 1),
(64, 66, 'AMBIKAPUR', 5, 1),
(65, 67, 'CHAPRA', 4, 1),
(66, 68, 'WARANGAL', 30, 1),
(67, 69, 'MADANAPALLE', 30, 1),
(68, 70, 'ALLAHABAD', 36, 1),
(69, 71, 'DHARAMPUR', 9, 1),
(70, 72, 'RAJAHMUNDRY', 1, 1),
(71, 73, 'DEOGHAR', 6, 1),
(72, 74, 'KOTA', 24, 1),
(73, 75, 'DHABA', 5, 1),
(74, 76, 'JOYPUR', 21, 1),
(75, 77, 'HUBLI', 13, 1),
(76, 78, 'SANAWAD', 15, 1),
(77, 79, 'DHULE', 33, 1),
(78, 80, 'BAIKUNTHPUR', 5, 1),
(79, 81, 'BAREILLY', 35, 1),
(80, 82, 'BHANDARA', 32, 1),
(81, 83, 'SAWAIMADHOPUR', 24, 1),
(82, 84, 'DEULGAON RAJA', 33, 1),
(83, 85, 'SATNA', 15, 1),
(84, 86, 'MYSORE', 13, 1),
(85, 87, 'BILASPUR', 5, 1),
(86, 88, 'BALAGHAT', 15, 1),
(87, 89, 'RANAGHAT', 23, 1),
(88, 90, 'BAYAD', 9, 1),
(89, 91, 'BHATAPARA', 5, 1),
(90, 92, 'RAIPUR.', 5, 1),
(91, 93, 'NARAYANGAON', 33, 1),
(92, 94, 'RANEBENNUR', 13, 1),
(93, 95, 'LUCKNOW', 34, 1),
(94, 96, 'SANGLI', 33, 1),
(95, 97, 'BHAGALPUR', 4, 1),
(96, 98, 'PANIPAT', 10, 1),
(97, 99, 'NANDYAL', 1, 1),
(98, 101, 'SONIPAT', 10, 1),
(99, 102, 'RAIPUR..', 5, 1),
(100, 103, 'Gomchi', 5, 1),
(101, 104, 'Sholapur', 16, 1),
(102, 105, 'SHADNAGAR', 1, 1),
(103, 106, 'VIJAYAWADA', 1, 1),
(104, 107, 'SAGAR', 15, 1),
(105, 109, 'RAMGARH', 6, 1),
(106, 110, 'GUMLA', 6, 1),
(107, 111, 'VADODARA', 9, 1),
(108, 112, 'KOLHAPUR', 33, 1),
(109, 113, 'UDAIPUR', 24, 1),
(110, 114, 'TAUNK', 24, 1),
(111, 115, 'HASSAN', 13, 1),
(112, 116, 'GODHRA', 9, 1),
(113, 117, 'GAJWEL', 1, 1),
(114, 118, 'MAHASAMUND', 5, 1),
(115, 119, 'AMRITSAR', 22, 1),
(116, 120, 'BASTI', 36, 1),
(117, 121, 'BERHAMPUR', 21, 1),
(118, 122, 'KARNAL', 10, 1),
(119, 123, 'GONDAL', 9, 1),
(120, 124, 'VIJAYNAGRAM', 1, 1),
(121, 126, 'JADCHERLA', 30, 1),
(122, 127, 'VILLUPURAM', 26, 1),
(123, 128, 'ALWAR', 24, 1),
(124, 129, 'KURNOOL', 30, 1),
(125, 130, 'ELURU', 1, 1),
(126, 131, 'SORUM', 5, 1),
(127, 132, 'GANDHINAGAR', 9, 1),
(128, 133, 'PUNE', 33, 1),
(129, 134, 'CHITTORGARH', 24, 1),
(130, 135, 'TRICHY', 26, 1),
(131, 137, 'MADHAIPURA                                       ', 4, 1),
(132, 139, 'SITAPUR', 5, 1),
(133, 140, 'GONDIA', 32, 1),
(134, 141, 'DAUSA', 24, 1),
(135, 142, 'CUTTACK', 21, 1),
(136, 143, 'PURULIA', 23, 1),
(137, 144, 'SULTANPUR', 29, 1),
(138, 145, 'AZAMGARH', 36, 1),
(139, 146, 'KAUSAMBI', 29, 1),
(140, 147, 'RAIBAREILLY', 34, 1),
(141, 148, 'JHANSI', 34, 1),
(142, 149, 'LUDHIANA', 22, 1),
(143, 151, 'JAMMU', 12, 1),
(144, 153, 'DHARMAPURI', 26, 1),
(145, 154, 'PARBHANI', 32, 1),
(146, 155, 'BANDAMAILARAM', 1, 1),
(147, 156, 'YAVATMAL', 32, 1),
(148, 157, 'BIJNOR', 35, 1),
(149, 158, 'PRODDATUR', 1, 1),
(150, 159, 'DUAL', 29, 1),
(151, 160, 'YAMUNA NAGAR', 10, 1),
(152, 161, 'SAMASTIPUR', 4, 1),
(153, 162, 'BHADRAK', 21, 1),
(154, 163, 'HUMNABAD', 13, 1),
(155, 164, 'HOSHIARPUR', 22, 1),
(156, 165, 'MAHARAJGANJ', 29, 1),
(157, 166, 'JALGAON', 33, 1),
(158, 167, 'SHIVPURI', 15, 1),
(159, 168, 'SURAT', 9, 1),
(160, 169, 'JUNAGADH', 9, 1),
(161, 170, 'SITAPUR', 34, 1),
(162, 171, 'MEERUT', 35, 1),
(163, 172, 'JABALPUR', 15, 1),
(164, 173, 'ROHTAK', 10, 1),
(165, 174, 'MUZAFFARNAGAR', 35, 1),
(166, 175, 'SHIKOHABAD', 35, 1),
(167, 176, 'BIHARSHARIF', 4, 1),
(168, 177, 'GARHWA', 6, 1),
(169, 178, 'DAVANGERE', 13, 1),
(170, 179, 'KOLKATA', 23, 1),
(171, 180, 'HUMNABAD', 30, 1),
(172, 181, 'CHHINDWADA', 15, 1),
(173, 182, 'HAPUR', 35, 1),
(174, 183, 'SIDDHARTHNAGAR', 34, 1),
(175, 184, 'SIDDHARTHNAGAR', 34, 1),
(176, 185, 'URANGA', 5, 1),
(177, 186, 'MUMBAI', 16, 1),
(178, 187, 'JAJAPUR', 21, 1),
(179, 188, 'BALRAMPUR', 34, 1),
(180, 189, 'SUNDERGARH', 21, 1),
(181, 190, 'BHILWARA', 24, 1),
(182, 191, 'SHAHDOL', 15, 1),
(183, 192, 'TIRUNELVELI', 26, 1),
(184, 193, 'CHARAMA', 5, 1),
(185, 194, 'RAMANUJGANJ', 5, 1),
(186, 195, 'SHAHDOL', 15, 1),
(187, 196, 'MAINPAT', 5, 1),
(188, 197, 'GUWAHATI', 3, 1),
(189, 198, 'SHIKOHABAD', 35, 1),
(190, 199, 'BIHAR SHARIF', 4, 1),
(191, 200, 'THENI', 26, 1),
(192, 201, 'DEWAS', 15, 1),
(193, 202, 'UMARKOT', 21, 1),
(194, 203, 'KAWARDHA', 5, 1),
(195, 204, 'BENGALURU', 13, 1),
(196, 205, 'HARDOI', 34, 1),
(197, 206, 'GHAZIABAD', 35, 1),
(198, 207, 'FATEHABAD', 10, 1),
(199, 208, 'PATHALGAON', 5, 1),
(200, 209, 'AURAIYA', 34, 1),
(201, 210, 'NANDED', 16, 1),
(202, 211, 'VALSAD', 9, 1),
(203, 212, 'Mandya', 13, 1),
(204, 213, 'MANDYA', 1, 1),
(205, 214, 'BAHARAMPUR', 23, 1),
(206, 215, 'CHIKBELLAPUR', 13, 1),
(207, 216, 'HAVERI', 13, 1),
(208, 217, 'BELGAUM', 13, 1),
(209, 218, 'KHAMMAM', 1, 1),
(210, 219, 'BELLARY', 13, 1),
(211, 220, 'GULBARGA', 13, 1),
(212, 221, 'BIJAPUR', 13, 1),
(213, 222, 'BABAI', 15, 1),
(214, 223, 'LOHARDAGA', 6, 1),
(215, 224, 'NIZAMABAD', 30, 1),
(216, 225, 'NAWARANGPUR', 21, 1),
(217, 226, 'VYARA', 9, 1),
(218, 227, 'VYARA', 1, 1),
(219, 228, 'TONK', 24, 1),
(220, 229, 'SATHUPALLI', 30, 1),
(221, 230, 'VISAKHAPATNAM', 1, 1),
(222, 231, 'SOLAPUR', 33, 1),
(223, 232, 'GIRIDIH', 6, 1),
(224, 233, 'PERAMBALUR', 26, 1),
(225, 234, 'DINDIGUL', 26, 1),
(226, 235, 'MANDLA', 15, 1),
(227, 236, 'SURYAPET', 30, 1),
(228, 237, 'Jagdalpur', 5, 1),
(229, 238, 'BHANUPRATAPPUR', 5, 1),
(230, 239, 'DEORIA', 36, 1),
(231, 240, 'ROBERTSGANJ', 36, 1),
(232, 241, 'RUPAIDIHA', 29, 1),
(233, 242, 'JALESWAR', 21, 1),
(234, 243, 'BARPETA', 3, 1),
(235, 244, 'BALASORE ', 21, 1),
(236, 245, 'AHMEDNAGAR', 33, 1),
(237, 246, 'COIMBATORE', 26, 1),
(238, 247, 'BARDHAMAN', 23, 1),
(239, 248, 'MAHBUBNAGAR', 30, 1),
(240, 249, 'GARIABAND', 5, 1),
(241, 250, 'BHAWANIPATNA', 21, 1),
(242, 251, 'DURG', 5, 1),
(243, 252, 'HOSHANGABAD', 15, 1),
(244, 253, 'BUNDU', 6, 1),
(245, 254, 'BELAGAVI', 13, 1),
(246, 255, 'KHANDWA', 15, 1),
(247, 256, 'BERHAMPORE', 23, 1),
(248, 257, 'MATHURA', 35, 1),
(249, 258, 'HATHRAS', 29, 1),
(250, 259, 'JAMSHEDPUR', 6, 1),
(251, 260, 'KONDAGAON', 5, 1),
(252, 261, 'BASTAR', 5, 1),
(253, 262, 'BALRAMPUR', 5, 1),
(254, 263, 'PURI', 21, 1),
(255, 264, 'KALAHANDI', 21, 1),
(256, 265, 'GUNDARDEHI', 5, 1),
(257, 266, 'KURUD', 5, 1),
(258, 267, 'JOGULAMBA GADWAL', 30, 1),
(259, 268, 'KATIHAR', 4, 1),
(260, 269, 'BUNDI', 24, 1),
(261, 270, 'MAHISAGAR', 9, 1),
(262, 271, ' JAJAPUR', 21, 1),
(263, 272, 'KANTABANJI', 21, 1),
(264, 273, 'RAIPUR...', 5, 1),
(265, 274, 'DEORJHAL', 5, 1),
(266, 275, 'BANDAMAILARAM', 30, 1),
(267, 276, 'HYDERABAD', 30, 1),
(268, 278, 'KARIMNAGAR', 30, 1),
(269, 279, 'RANCHI', 6, 1),
(270, 280, 'PATNA', 4, 1),
(271, 281, 'MAHASAMUND', 5, 1),
(272, 283, 'CHENNAI', 26, 1),
(273, 284, 'SURATGARH', 24, 1),
(274, 285, 'ONGOLE', 1, 1),
(275, 286, 'SAKTI', 5, 1),
(276, 287, 'GWALIOR', 15, 1),
(277, 288, 'JAUNPUR', 36, 1),
(278, 289, 'BALLIA', 36, 1),
(279, 290, 'REWA', 15, 1),
(280, 291, 'JAMUI', 4, 1),
(281, 292, 'HAJIPUR', 4, 1),
(282, 293, 'KEONJHAR', 21, 1),
(283, 294, 'BHADRACHALAM', 1, 1),
(284, 295, 'SONBHADRA', 29, 1),
(285, 296, 'RAIGANJ', 23, 1),
(286, 297, 'MORENA', 15, 1),
(287, 298, 'ARMOOR', 30, 1),
(288, 299, 'HOOGLY', 23, 1),
(289, 300, 'WAIDHAN', 15, 1),
(290, 301, 'NAGAON', 3, 1),
(291, 302, 'JORHAT', 3, 1),
(292, 303, 'AGARATALA', 27, 1),
(293, 304, 'BARPETA - 2', 3, 1),
(294, 305, 'AMALAPURAM', 1, 1),
(295, 306, 'MYDUKUR', 1, 1),
(296, 307, 'ARANG', 5, 1),
(297, 308, 'KHARIAR ROAD', 5, 1),
(298, 309, 'Jaleshwar', 21, 1),
(299, 310, 'Dhamtari', 5, 1),
(300, 311, 'BHUBANESHWAR', 21, 1),
(301, 312, 'SIRPUR', 5, 1),
(302, 313, 'PURI', 21, 1),
(303, 314, 'PITHORA', 5, 1),
(304, 315, 'FINGESHWAR', 21, 1),
(305, 316, 'NARHARPUR', 5, 1),
(306, 317, 'LATABOT', 5, 1),
(307, 318, 'KURNOOL', 1, 1),
(308, 319, 'KANTABANJI', 21, 1),
(309, 320, 'ELURU', 1, 1),
(310, 321, 'BURDWAN', 23, 1),
(311, 322, 'DUDAWA', 5, 1),
(312, 323, 'KALAHANDI', 21, 1),
(313, 324, 'SANOUD', 5, 1),
(314, 325, 'JOGULAMBA GADWAL', 30, 1),
(315, 326, 'SURHI', 5, 1),
(316, 327, 'BHADRAK', 21, 1),
(317, 328, 'SANGALI', 5, 1),
(318, 329, 'SAMBALPUR', 5, 1),
(319, 330, 'KUKREL', 5, 1),
(320, 331, 'CHARAMA', 5, 1),
(321, 332, 'DUGALI', 5, 1),
(322, 333, 'MEGHA', 5, 1),
(323, 334, 'SALONI', 5, 1),
(324, 335, 'ARJUNDA', 5, 1),
(325, 336, 'KANDEL', 5, 1),
(326, 337, 'JUNAGARH', 5, 1),
(327, 339, 'KORRA', 5, 1),
(328, 340, 'KORRA', 5, 1),
(329, 341, 'MADAIBHATA', 5, 1),
(330, 342, 'BELOUDI', 5, 1),
(331, 343, 'SANKRA', 5, 1),
(332, 344, 'BAGBAHARA', 5, 1),
(333, 345, 'CHHURA', 5, 1),
(334, 346, 'NANDYAL', 1, 1),
(335, 347, 'MANTHANI', 30, 1),
(336, 348, 'TEKUMATLA', 30, 1),
(337, 349, 'MAGARLOAD', 5, 1),
(338, 350, 'GADWAL', 30, 1),
(339, 352, 'COOCH BEHAR', 23, 1),
(340, 353, 'YEOLA', 16, 1),
(341, 354, 'SILCHAR', 3, 1),
(342, 355, 'JEYPORE', 21, 1),
(343, 356, 'PRAYAGRAJ', 29, 1),
(344, 357, 'SEONI', 15, 1),
(345, 358, 'KANKER', 5, 1),
(346, 359, 'PANCHMAHAL', 9, 1),
(347, 360, 'RAJKOT', 9, 1),
(348, 361, 'KOHADIYA', 5, 1),
(349, 362, 'PEDDAPALLI', 30, 1),
(350, 363, 'JIND', 10, 1),
(351, 364, 'BHAWANIPATNA', 21, 1),
(352, 365, 'RANEBENNUR', 13, 1),
(353, 366, 'GOP', 21, 1),
(354, 367, 'BAYAD', 9, 1),
(355, 368, 'BASTA', 21, 1),
(356, 369, 'KAMARDA', 21, 1),
(357, 370, 'BALIAPAL', 21, 1),
(358, 371, 'KALVASRIRAMPUR', 30, 1),
(359, 372, 'VAVILALA', 30, 1),
(360, 373, 'MANGAPETA', 30, 1),
(361, 374, 'CHOPPANDANDI', 30, 1),
(362, 375, 'PARVATHAGIRI', 30, 1),
(363, 376, 'BATREL', 5, 1),
(364, 377, 'ARKAR', 5, 1),
(365, 378, 'BODRA', 5, 1),
(366, 379, 'BODRA', 5, 1),
(367, 380, 'BOTHLI', 5, 1),
(368, 381, 'KAMALAPUR', 30, 1),
(369, 382, 'NARSAMPET', 30, 1),
(370, 383, 'SIDDIPET', 30, 1),
(371, 384, 'SATHUPALLI', 30, 1),
(372, 385, 'DHARMARAM', 30, 1),
(373, 386, 'DHARUR', 30, 1),
(374, 387, 'SIRIVELLA', 1, 1),
(375, 388, 'SHADNAGAR', 30, 1),
(376, 389, 'MANTHANI', 30, 1),
(377, 390, 'WARANGAL', 30, 1),
(378, 391, 'MADAMSILLI', 5, 1),
(379, 392, 'Lonar ', 16, 1),
(380, 393, 'Brahmapur', 21, 1),
(381, 394, 'Bastar', 5, 1),
(382, 395, 'Chomu ', 24, 1),
(383, 396, 'JAIPUR', 24, 1),
(384, 397, 'BASTAR', 5, 1),
(385, 398, 'JAGDALPUR', 5, 1),
(386, 399, 'NIZAMABAD', 30, 1),
(387, 400, 'ERODE', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_state`
--

CREATE TABLE `master_state` (
  `StateId` int(5) NOT NULL,
  `State` varchar(200) NOT NULL,
  `StateCode` varchar(50) NOT NULL,
  `CountryId` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `CreatedTime` datetime NOT NULL,
  `CreatedBy` int(10) NOT NULL,
  `LastUpdated` datetime NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `IsDeleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `status`) VALUES
(1, 'Distributor', 1),
(2, 'Retailer', 1),
(3, 'Sales Agent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(200) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_code`, `status`) VALUES
(1, 'ANDHRA PRADESH', 'AP', 1),
(2, 'ARUNACHAL PRADESH', 'AR', 1),
(3, 'ASSAM', 'AS', 1),
(4, 'BIHAR', 'BR', 1),
(5, 'CHHATTISGARH', 'CG', 1),
(6, 'JHARKHAND', 'JH', 1),
(7, 'DELHI', 'DL', 1),
(8, 'GOA', 'GA', 1),
(9, 'GUJARAT', 'GJ', 1),
(10, 'HARYANA', 'HR', 1),
(11, 'HIMACHAL PRADESH', 'HP', 1),
(12, 'JAMMU & KASHMIR', 'JK', 1),
(13, 'KARNATAKA', 'KA', 1),
(14, 'KERALA', 'KL', 1),
(15, 'MADHYA PRADESH', 'MP', 1),
(16, 'MAHARASHTRA', 'MH', 1),
(17, 'MANIPUR', 'MN', 1),
(18, 'MEGHALAYA', 'ML', 1),
(19, 'MIZORAM', 'MZ', 1),
(20, 'NAGALAND', 'NL', 1),
(21, 'ODISHA', 'OR', 1),
(22, 'PUNJAB', 'PB', 1),
(23, 'WEST BENGAL', 'WB', 1),
(24, 'RAJASTHAN', 'RJ', 1),
(25, 'SIKKIM', 'SK', 1),
(26, 'TAMIL NADU', 'TN', 1),
(27, 'TRIPURA', 'TR', 1),
(28, 'UTTARAKHAND', 'UT', 1),
(29, 'UTTAR PRADESH', 'UP', 1),
(30, 'TELANGANA', 'TG', 1),
(31, 'PUDUCHERRY ', 'PY', 1),
(32, 'VIDARBHA', 'VDH', 1),
(33, 'WESTERN MAHARASTRA', 'WMH', 1),
(34, 'CENTRAL UTTAR PRADESH', 'CUP', 1),
(35, 'WESTERN UTTAR PRADESH', 'WUP', 1),
(36, 'EASTERN UTTAR PRADESH', 'EUP', 1),
(37, 'NORTH KARNATAKA', 'NKTK', 1),
(38, 'SOUTH KARNATAKA', 'SKTK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `alternet_no` varchar(12) DEFAULT NULL,
  `pan_no` varchar(10) DEFAULT NULL,
  `aadhar_no` varchar(14) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `activation_code` varchar(4) DEFAULT NULL,
  `state_id` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `contact_no`, `alternet_no`, `pan_no`, `aadhar_no`, `email`, `password`, `activation_code`, `state_id`, `created_at`, `lastlogin`, `status`) VALUES
(14, 'Sanchita', '8908674092', NULL, '', NULL, '', 'sanchita', NULL, 'OR', '2021-02-09 14:55:47', '2021-02-09 14:56:11', 1),
(15, 'rahul', '9770866241', NULL, '', NULL, '', '1234', NULL, 'CG', '2021-02-09 16:24:44', '2021-02-11 11:22:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bill_image` (`bill_image`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`bill_detail_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DealerId` (`DealerId`);

--
-- Indexes for table `master_headquater`
--
ALTER TABLE `master_headquater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `bill_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_headquater`
--
ALTER TABLE `master_headquater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
