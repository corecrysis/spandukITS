-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2018 at 08:19 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btsi_spanduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_spot`
--

CREATE TABLE `t_spot` (
  `m_id_spot` int(5) UNSIGNED NOT NULL,
  `m_nama_spot` varchar(253) NOT NULL,
  `m_kuota_spot` int(10) NOT NULL,
  `m_kuota_spot_dinamis` int(10) NOT NULL,
  `m_height_spanduk` varchar(7) NOT NULL,
  `m_width_spanduk` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spot`
--

INSERT INTO `t_spot` (`m_id_spot`, `m_nama_spot`, `m_kuota_spot`, `m_kuota_spot_dinamis`, `m_height_spanduk`, `m_width_spanduk`) VALUES
(1, 'ccc', 4, 4, 'asd', 'sdf'),
(17, '13', 2, 2, '4', '12'),
(18, 'a', 2, 2, '4', '3'),
(19, '3124', 12, 12, '321', '321');

-- --------------------------------------------------------

--
-- Table structure for table `t_spot_pinjam`
--

CREATE TABLE `t_spot_pinjam` (
  `m_id_spjam` int(50) UNSIGNED NOT NULL,
  `m_judul_spnjam` varchar(60) NOT NULL,
  `m_pasang_spnjam` datetime NOT NULL,
  `m_copot_spnjam` datetime NOT NULL,
  `m_unit_spnjam` varchar(253) NOT NULL,
  `m_cp_spnjam` int(50) NOT NULL,
  `m_alasan` text,
  `m_stat_spnjam` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `m_check_date` enum('0','1','2') DEFAULT '0',
  `p_tmp_pict_1` varchar(253) DEFAULT 'img_bukti/No-Image-Basic.png',
  `p_tmp_pict_2` varchar(253) DEFAULT 'img_bukti/No-Image-Basic.png',
  `p_tmp_pict_3` varchar(253) DEFAULT 'img_bukti/No-Image-Basic.png',
  `m_tmstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spot_pinjam`
--

INSERT INTO `t_spot_pinjam` (`m_id_spjam`, `m_judul_spnjam`, `m_pasang_spnjam`, `m_copot_spnjam`, `m_unit_spnjam`, `m_cp_spnjam`, `m_alasan`, `m_stat_spnjam`, `m_check_date`, `p_tmp_pict_1`, `p_tmp_pict_2`, `p_tmp_pict_3`, `m_tmstamp`) VALUES
(43, 'a', '2017-05-23 13:05:00', '2017-05-26 13:05:00', 'asd', 123, NULL, '3', '0', 'img_bukti/21762042084676afe19ef41228f8fe9bf97cb59a9.jpg', 'img_bukti/No-Image-Basic.png', 'img_bukti/No-Image-Basic.png', '2017-06-15 15:34:05'),
(44, '123', '2017-05-23 13:05:00', '2017-05-30 13:05:00', 'feads', 123, NULL, '3', '0', 'img_bukti/11607151684676afe19ef41228f8fe9bf97cb59a9.jpg', 'img_bukti/11607151684676afe19ef41228f8fe9bf97cb59a9.jpg', 'img_bukti/No-Image-Basic.png', '2017-06-15 15:34:05'),
(45, 'asd', '2017-05-24 13:05:00', '2017-05-26 13:05:00', 'asd', 321, NULL, '3', '0', 'img_bukti/14313032184676afe19ef41228f8fe9bf97cb59a9.jpg', 'img_bukti/No-Image-Basic.png', 'img_bukti/No-Image-Basic.png', '2017-06-15 15:34:05'),
(46, 'asd', '2017-05-24 14:05:00', '2017-05-30 14:05:00', 'asd', 123, NULL, '3', '0', 'img_bukti/23439819284676afe19ef41228f8fe9bf97cb59a9.jpg', 'img_bukti/No-Image-Basic.png', 'img_bukti/No-Image-Basic.png', '2017-06-15 15:34:05'),
(47, 'isra mi''raj', '2017-06-16 22:06:00', '2017-06-20 22:06:00', 'qwe', 123, NULL, '0', '0', 'img_bukti/1667674android-logo.jpg', 'img_bukti/No-Image-Basic.png', 'img_bukti/No-Image-Basic.png', '2017-06-15 15:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `t_spot_temp`
--

CREATE TABLE `t_spot_temp` (
  `a_id_spot` int(50) UNSIGNED NOT NULL,
  `m_id_spot` int(5) NOT NULL,
  `m_id_spjam` int(50) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spot_temp`
--

INSERT INTO `t_spot_temp` (`a_id_spot`, `m_id_spot`, `m_id_spjam`) VALUES
(1, 0, 22),
(2, 0, 22),
(3, 0, 22),
(4, 1, 23),
(5, 3, 23),
(6, 4, 23),
(7, 1, 24),
(8, 3, 24),
(9, 4, 24),
(10, 5, 24),
(11, 16, 25),
(12, 3, 26),
(13, 16, 26),
(14, 1, 27),
(15, 5, 27),
(16, 16, 27),
(17, 1, 28),
(18, 1, 29),
(19, 5, 29),
(20, 1, 30),
(21, 5, 30),
(22, 8, 30),
(23, 1, 31),
(24, 5, 31),
(25, 16, 32),
(26, 16, 33),
(27, 16, 34),
(28, 1, 35),
(29, 1, 35),
(30, 1, 35),
(31, 1, 35),
(32, 1, 35),
(33, 1, 36),
(34, 1, 37),
(35, 1, 38),
(36, 1, 39),
(37, 1, 40),
(38, 1, 41),
(39, 1, 42),
(40, 1, 1),
(41, 1, 44),
(42, 1, 45),
(43, 1, 46),
(44, 17, 46),
(45, 18, 46),
(46, 19, 46),
(47, 19, 47);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `m_id_user` int(5) UNSIGNED NOT NULL,
  `m_user` varchar(30) NOT NULL,
  `m_pass` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`m_id_user`, `m_user`, `m_pass`) VALUES
(1, 'admin_spanduk_its', 'babea942372eb109704b50840d5da3de'),
(2, 'monitor_spanduk_its', 'babea942372eb109704b50840d5da3de');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_spot`
--
ALTER TABLE `t_spot`
  ADD PRIMARY KEY (`m_id_spot`);

--
-- Indexes for table `t_spot_pinjam`
--
ALTER TABLE `t_spot_pinjam`
  ADD PRIMARY KEY (`m_id_spjam`);

--
-- Indexes for table `t_spot_temp`
--
ALTER TABLE `t_spot_temp`
  ADD PRIMARY KEY (`a_id_spot`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`m_id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_spot`
--
ALTER TABLE `t_spot`
  MODIFY `m_id_spot` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `t_spot_pinjam`
--
ALTER TABLE `t_spot_pinjam`
  MODIFY `m_id_spjam` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `t_spot_temp`
--
ALTER TABLE `t_spot_temp`
  MODIFY `a_id_spot` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `m_id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
