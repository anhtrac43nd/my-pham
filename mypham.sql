-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 04:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypham`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_hd_ban`
--

CREATE TABLE `ct_hd_ban` (
  `ma_ct_hdb` int(11) NOT NULL,
  `ma_hdb` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong_ban` int(11) NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ct_hd_nhap`
--

CREATE TABLE `ct_hd_nhap` (
  `ma_cthd` int(11) NOT NULL,
  `ma_hdn` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_nhap` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_hd_nhap`
--

INSERT INTO `ct_hd_nhap` (`ma_cthd`, `ma_hdn`, `ma_sp`, `so_luong`, `gia_nhap`, `thanh_tien`) VALUES
(1, 1, 8, 10, 150000, 1500000),
(2, 1, 9, 15, 160000, 2400000),
(3, 1, 10, 31, 200000, 6200000),
(4, 2, 8, 11, 13000, 143000);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_ban`
--

CREATE TABLE `hoa_don_ban` (
  `ma_hd` int(11) NOT NULL,
  `ma_nd` int(11) NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `trang_thai_chuyen_tien` tinyint(1) NOT NULL,
  `trang_thai_nhan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoa_don_ban`
--

INSERT INTO `hoa_don_ban` (`ma_hd`, `ma_nd`, `ngay_dat_hang`, `tong_tien`, `trang_thai_chuyen_tien`, `trang_thai_nhan`) VALUES
(1, 1, '2018-04-09', 1000000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_nhap`
--

CREATE TABLE `hoa_don_nhap` (
  `ma_hdn` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `tong_tien_nhap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoa_don_nhap`
--

INSERT INTO `hoa_don_nhap` (`ma_hdn`, `ngay_nhap`, `tong_tien_nhap`) VALUES
(1, '2018-04-10', 10100000),
(2, '2018-04-10', 143000);

-- --------------------------------------------------------

--
-- Table structure for table `loai_sp`
--

CREATE TABLE `loai_sp` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`ma_loai`, `ten_loai`) VALUES
(9, 'Son Môi'),
(10, 'Kem Dưỡng'),
(11, 'Kem Tẩy'),
(12, 'Son Lỳ');

-- --------------------------------------------------------

--
-- Table structure for table `lo_hang`
--

CREATE TABLE `lo_hang` (
  `ma_lo` int(11) NOT NULL,
  `lo_thu` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ngay_sx` date NOT NULL,
  `thanh_ly` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nd` int(11) NOT NULL,
  `ten_nd` varchar(255) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ten_tk` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ma_quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nd`, `ten_nd`, `sdt`, `dia_chi`, `ten_tk`, `mat_khau`, `ma_quyen`) VALUES
(1, 'anhtrac', '0966120499', 'HN', 'anhtrac', '$2y$10$Ry4l7gCjmaZwe9gJBvFjz.Q0KF9fmcL9NOSd/iO6waVGUiREJ1OvW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `ma_quyen` int(11) NOT NULL,
  `ten_quyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`ma_quyen`, `ten_quyen`) VALUES
(1, 'Admin'),
(2, 'Nhân Viên'),
(3, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ma_thuong_hieu` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL DEFAULT '0',
  `anh` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `ma_loai`, `ma_thuong_hieu`, `don_gia`, `so_luong`, `anh`, `mo_ta`) VALUES
(8, 'son 123', 9, 10, 50000, 21, '04-32-22-2018-04-07-images.jpeg', '<p>1213</p>'),
(9, 'Son Lỳ', 9, 14, 140000, 15, '04-44-11-2018-04-07-maxresdefault.jpg', '<p>đẹp</p>'),
(10, 'Kem Dưỡng Da 1', 10, 13, 10000, 31, '17-35-39-2018-04-09-kem-duong-am-merlot-moisturizer.png', '<p>..</p>');

-- --------------------------------------------------------

--
-- Table structure for table `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `ma_thuong_hieu` int(11) NOT NULL,
  `ten_thuong_hieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`ma_thuong_hieu`, `ten_thuong_hieu`) VALUES
(10, 'Ohuii'),
(13, 'Khương K'),
(14, 'Mỹ Phẩm gì không biết');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_hd_ban`
--
ALTER TABLE `ct_hd_ban`
  ADD PRIMARY KEY (`ma_ct_hdb`);

--
-- Indexes for table `ct_hd_nhap`
--
ALTER TABLE `ct_hd_nhap`
  ADD PRIMARY KEY (`ma_cthd`);

--
-- Indexes for table `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  ADD PRIMARY KEY (`ma_hd`);

--
-- Indexes for table `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  ADD PRIMARY KEY (`ma_hdn`);

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `lo_hang`
--
ALTER TABLE `lo_hang`
  ADD PRIMARY KEY (`ma_lo`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nd`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma_quyen`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Indexes for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`ma_thuong_hieu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ct_hd_ban`
--
ALTER TABLE `ct_hd_ban`
  MODIFY `ma_ct_hdb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ct_hd_nhap`
--
ALTER TABLE `ct_hd_nhap`
  MODIFY `ma_cthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  MODIFY `ma_hdn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lo_hang`
--
ALTER TABLE `lo_hang`
  MODIFY `ma_lo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `ma_thuong_hieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
