-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 02, 2018 lúc 05:32 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hd_ban`
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
-- Cấu trúc bảng cho bảng `ct_hd_nhap`
--

CREATE TABLE `ct_hd_nhap` (
  `ma_cthd` int(11) NOT NULL,
  `ma_hdn` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_nhap` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_ban`
--

CREATE TABLE `hoa_don_ban` (
  `ma_hd` int(11) NOT NULL,
  `ma_nd` int(11) NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `trang_thai_chuyen_tien` tinyint(1) DEFAULT '0',
  `trang_thai_nhan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_nhap`
--

CREATE TABLE `hoa_don_nhap` (
  `ma_hdn` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `tong_tien_nhap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) NOT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lo_hang`
--

CREATE TABLE `lo_hang` (
  `ma_lo` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_nhap` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL DEFAULT '0',
  `ngay_sx` date NOT NULL,
  `thanh_ly` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
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
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nd`, `ten_nd`, `sdt`, `dia_chi`, `ten_tk`, `mat_khau`, `ma_quyen`) VALUES
(2, 'hiensvn', '01213123123', 'hn', 'hiensvm', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'nguyễn văn an', '0966767566', 'hn', 'nguyenvanan', 'e10adc3949ba59abbe56e057f20f883e', 3),
(4, 'Trần Long Biên', '0987676565', 'hn', 'tranlongbien', 'e10adc3949ba59abbe56e057f20f883e', 2),
(5, 'admin', '0966120478', 'HN', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `ma_quyen` int(11) NOT NULL,
  `ten_quyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`ma_quyen`, `ten_quyen`) VALUES
(1, 'Admin'),
(2, 'Nhân Viên'),
(3, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `ma_loai` int(11) NOT NULL,
  `ma_thuong_hieu` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `phan_tram_khuyen_mai` float DEFAULT '0',
  `gia_khuyen_mai` int(11) DEFAULT '0',
  `so_luong` int(11) NOT NULL DEFAULT '0',
  `anh` varchar(255) NOT NULL,
  `mo_ta` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `ma_slide` int(11) NOT NULL,
  `ten_slide` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`ma_slide`, `ten_slide`, `noi_dung`, `anh`) VALUES
(1, 'Mỹ phẩm mới nhất', 'Bộ tứ thần kỳ cho da sáng trong rạng rỡ', '14-46-10-2018-04-18-girl1.jpg'),
(2, 'Mỹ phẩm 2', 'Mỹ phẩm mới nhất', '14-47-19-2018-04-18-girl2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `ma_thuong_hieu` int(11) NOT NULL,
  `ten_thuong_hieu` varchar(255) NOT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ct_hd_ban`
--
ALTER TABLE `ct_hd_ban`
  ADD PRIMARY KEY (`ma_ct_hdb`);

--
-- Chỉ mục cho bảng `ct_hd_nhap`
--
ALTER TABLE `ct_hd_nhap`
  ADD PRIMARY KEY (`ma_cthd`);

--
-- Chỉ mục cho bảng `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  ADD PRIMARY KEY (`ma_hd`);

--
-- Chỉ mục cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  ADD PRIMARY KEY (`ma_hdn`);

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `lo_hang`
--
ALTER TABLE `lo_hang`
  ADD PRIMARY KEY (`ma_lo`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nd`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma_quyen`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`ma_slide`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`ma_thuong_hieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ct_hd_ban`
--
ALTER TABLE `ct_hd_ban`
  MODIFY `ma_ct_hdb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ct_hd_nhap`
--
ALTER TABLE `ct_hd_nhap`
  MODIFY `ma_cthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  MODIFY `ma_hdn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lo_hang`
--
ALTER TABLE `lo_hang`
  MODIFY `ma_lo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `ma_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `ma_thuong_hieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
