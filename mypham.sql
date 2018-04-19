-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 19, 2018 lúc 06:16 PM
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

--
-- Đang đổ dữ liệu cho bảng `ct_hd_ban`
--

INSERT INTO `ct_hd_ban` (`ma_ct_hdb`, `ma_hdb`, `ma_sp`, `so_luong_ban`, `gia_sp`, `thanh_tien`) VALUES
(1, 1, 12, 2, 140000, 140000),
(2, 1, 11, 2, 160000, 160000),
(3, 1, 10, 1, 150000, 150000),
(4, 3, 12, 1, 140000, 140000),
(5, 3, 11, 1, 160000, 160000),
(6, 4, 12, 9, 140000, 1260000);

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

--
-- Đang đổ dữ liệu cho bảng `hoa_don_ban`
--

INSERT INTO `hoa_don_ban` (`ma_hd`, `ma_nd`, `ngay_dat_hang`, `tong_tien`, `trang_thai_chuyen_tien`, `trang_thai_nhan`) VALUES
(1, 5, '2018-04-19', 450000, 0, 0),
(2, 5, '2018-04-19', 0, 0, 0),
(3, 5, '2018-04-19', 300000, 0, 0),
(4, 5, '2018-04-19', 1260000, 0, 0);

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

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`ma_loai`, `ten_loai`, `ten_khong_dau`) VALUES
(1, 'Kem BB - CC - DD', 'kem-bb-cc-dd'),
(2, 'Kem nền', 'kem-nen'),
(3, 'Son môi', 'son-moi'),
(4, 'Son dưỡng ', 'son-duong'),
(5, 'Tẩy trang ', 'tay-trang'),
(6, 'Dưỡng thể - Body Lotion', 'duong-the-body-lotion'),
(7, 'Sữa tắm', 'sua-tam'),
(8, 'Tẩy tế bào chết', 'tay-te-bao-chet'),
(9, 'Dưỡng da tay', 'duong-da-tay'),
(10, 'Chăm Sóc Toàn Thân', 'cham-soc-toan-than');

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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, 'Trần Long Biên', '0987676565', 'hn', 'tranlongbien', 'e10adc3949ba59abbe56e057f20f883e', 3),
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
  `so_luong` int(11) NOT NULL DEFAULT '0',
  `anh` varchar(255) NOT NULL,
  `mo_ta` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `ten_khong_dau`, `ma_loai`, `ma_thuong_hieu`, `don_gia`, `so_luong`, `anh`, `mo_ta`) VALUES
(1, 'Sữa dưỡng TFS - Perfume Seed White Peony Body Milk', 'sua-duong-tfs-perfume-seed-white-peony-body-milk', 6, 7, 225000, 12, 'sua-duong-tfs-perfume-seed-white-peony-body-milk-080920180413.jpg', ' <p><p> Đây là sản phẩm sữa dưỡng thể mới nhất của The Face Shop với công thức dưỡng trắng độc quyền chứa thành phần chiết xuất từ hạt mầm hoa lupine trắng và hoa mẫu đơn trắng mang đến hiệu quả làm trắng mịn da.</p> <p> <strong><a href=\"https://beautygarden.vn/sua-duong-trang-da-hoa-mau-don-trang-perfume-seed-white-peony-body-milk.html\">Sữa dưỡng trắng da hoa Mẫu Đơn trắng PERFUME SEED WHITE PEONY BODY MILK</a><br /> Xuất Xứ: Hàn Quốc<br /> Dung tích: 300 ml</strong></p> <p style=\"text-align: center;\"> <img alt=\"Sữa dưỡng trắng da hoa Mẫu Đơn trắng PERFUME SEED WHITE PEONY BODY MILK\" src=\"https://beautygarden.vn/Files/Uploads/Sua-duong-trang-da-hoa-Mau-Don-trang-PERFUME-SEED-WHITE-PEONY-BODY-MILK.png\" style=\"width: 650px; height: 609px;\" title=\"Sữa dưỡng trắng da hoa Mẫu Đơn trắng PERFUME SEED WHITE PEONY BODY MILK\" /></p> <p style=\"text-align: center;\"> <em>Sữa dưỡng trắng da hoa Mẫu Đơn trắng PERFUME SEED WHITE PEONY BODY MILK</em></p> </p> '),
(2, 'Kem BB Vacosi Gold Magical BB Cream SPF30', 'kem-bb-vacosi-gold-magical-bb-cream-spf30', 1, 1, 210000, 0, 'kem-bb-vacosi-gold-magical-bb-cream-spf30-081702180413.jpg', ' <p><p style=\"text-align: justify;\"> <strong>Kem BB Vacosi Gold Magical BB Cream SPF30</strong> (60ml) có nguồn gốc Hàn Quốc hiện đã về tại các cửa hàng <a href=\"https://beautygarden.vn/\">mỹ phẩm chính hãng</a> của Beauty Garden. Cùng khám phá dòng kem nền vừa mới ra lò này nhé!</p> <p style=\"text-align: justify;\"> Vacosi Gold Magical BB Cream SPF30 là loại kem nền trang điểm cao cấp đa năng được nhiều phái đẹp trên thế giới tin dùng, đặc biệt là nhận được rất nhiều lời khen từ các Beauty Blogger bởi có tính năng ưu việt được tích hợp trong một sản phẩm. Chỉ với một tuýp kem trang điểm Vacosi bạn có thể thay thế cho cả kem lót và kem nền, che phủ mọi khuyết điểm hoàn hảo, giúp làn da trắng hồng, dưỡng ẩm và giảm nếp nhăn, giúp việc trang điểm trở nên nhanh chóng và tiện lợi hơn.</p> <p style=\"text-align: justify;\"> Ngoài ra, kem trang điểm Vacosi Gold Magical BB Cream SPF30 có chứa các khoáng chất có lợi cùng nhiều dưỡng chất thiên nhiên từ trà xanh và nha đam, mang đến làn da xinh tươi, hồng hào và rạng rỡ. Đặc biệt, kem còn có tác dụng chống nắng với chỉ số SPF30/PA+++ và ngăn ngừa các rối loạn do tuyến nhờ hoạt động mạnh.</p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/kem-bb-vacosi-gold-magical-bb-cream-spf30-hinh-anh-1.jpg\" target=\"_blank\" title=\"Kem BB Vacosi Gold Magical BB Cream hình ảnh 1\"><img alt=\"kem bb vacosi gold magical bb cream spf30 hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/kem-bb-vacosi-gold-magical-bb-cream-spf30-hinh-anh-1.jpg\" style=\"width: 650px; height: 975px;\" /></a></p> <p style=\"text-align: center;\"> <em>Kem BB Vacosi Gold Magical BB Cream SPF30</em></p> </p> '),
(3, 'Kem Nền Cho Da Khô Revlon ColorStay 24hrs Makeup Dry', 'kem-nen-cho-da-kho-revlon-colorstay-24hrs-makeup-dry', 2, 2, 210000, 0, 'kem-nen-cho-da-kho-revlon-colorstay-24hrs-makeup-dry-081708180413.jpg', ' <p><p style=\"text-align: justify;\"> <strong>Kem nền Revlon ColorStay 24hrs Makeup Dry</strong> 30ml của Mỹ từ thương hiệu Revlon đã được cập nhật tại hệ thống <a href=\"https://beautygarden.vn/\">mỹ phẩm chính hãng</a> Beauty Garden, sản phẩm mang đến lớp nền đẹp, che phủ khuyết điểm hoàn hảo. Đặc biệt độ che phủ tốt nhưng lại cực kỳ mỏng nhẹ, dễ chịu không hề bí da. Thành phần không chứa dầu, không gây kích ứng, không gây mụn cho tín đồ sự yên tâm khi sử dụng.</p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/kem-nen-cho-da-kho-revlon-colorstay-24hrs-makeup-dry-hinh-anh-1.jpg\" target=\"_blank\" title=\"Kem Nền Revlon ColorStay 24hrs Makeup hình ảnh 1\"><img alt=\"kem nen cho da kho revlon colorstay 24hrs makeup dry hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/kem-nen-cho-da-kho-revlon-colorstay-24hrs-makeup-dry-hinh-anh-1.jpg\" style=\"width: 650px; height: 726px;\" /></a></p> <p style=\"text-align: center;\"> <em>Kem nền Revlon ColorStay 24hrs Makeup Dry </em></p> </p> '),
(4, 'Son Kem Lì Revlon Ultra HD Matte Lip Color (Mới)', 'son-kem-li-revlon-ultra-hd-matte-lip-color-moi-', 3, 2, 130000, 0, 'son-kem-li-revlon-ultra-hd-matte-lip-color-moi--081711180413.jpg', ' <p><p> <strong>Son kem lì Revlon Ultra HD Matte Lipcolor </strong>là dòng son mới đình đám đến từ nhãn hiệu mỹ phẩm nổi tiếng nước Mỹ – Revlon. Với công nghệ tạo màu Ultra HD hiện đại, Son Revlon Ultra HD Matte Lipcolor có khả năng lên môi cực chuẩn, hoàn toàn không kén màu da, cho bạn gái đôi môi tươi tắn quyến rũ tự nhiên suốt cả ngày. </p> <p> <strong>Son kem lì Revlon Ultra HD Matte Lip Color<br /> Dung tích: 5.9ml.<br /> Xuất xứ: USA.</strong><br /> </p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/son-kem-li-revlon-ultra-hd-matte-lip-color-moi-hinh-anh-1.jpg\" target=\"_blank\" title=\"Son kem lì Revlon Ultra HD Matte Lip Color hình ảnh 1\"><img alt=\"son kem li revlon ultra hd matte lip color moi hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/son-kem-li-revlon-ultra-hd-matte-lip-color-moi-hinh-anh-1.jpg\" style=\"width: 650px; height: 433px;\" /></a></p> </p> '),
(5, 'Kem Tẩy Trang Môi Nyx Be Gone Lip Color Remover', 'kem-tay-trang-moi-nyx-be-gone-lip-color-remover', 4, 3, 150000, 10, 'kem-tay-trang-moi-nyx-be-gone-lip-color-remover-081716180413.jpg', ' <p><p> <strong>Tẩy trang môi Nyx Be Gone Lip Color Remover</strong> là <a href=\"https://beautygarden.vn/danh-muc/tay-trang.html\">kem tẩy trang</a> dành riêng cho môi đang rất được chị em phụ nữ thế giới ưa chuộng. Với thành phần chứa nhiều vitamin E, sản phẩm không chỉ giúp làm sạch lớp son lì màu, loại bỏ toàn bộ bụi bẩn tạp chất trên môi mà còn dưỡng môi hồng hào mịn màng tự nhiên.</p> <p> <strong>Tẩy trang môi Nyx Be Gone Lip Color Remover.<br /> Dung tích: 13ml.<br /> Xuất xứ: Mỹ.</strong></p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/kem-tay-trang-moi-nyx-be-gone-lip-color-remover-hinh-anh-1.jpg\" target=\"_blank\" title=\"Tẩy trang môi Nyx Be Gone Lip Color Remover hình ảnh 1\"><img alt=\"kem tay trang moi nyx be gone lip color remover hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/kem-tay-trang-moi-nyx-be-gone-lip-color-remover-hinh-anh-1.jpg\" style=\"width: 650px; height: 433px;\" /></a></p> </p> '),
(6, 'Son Kem Lì Physicians Formula The Healthy Lip', 'son-kem-li-physicians-formula-the-healthy-lip', 3, 4, 160000, 10, 'son-kem-li-physicians-formula-the-healthy-lip-081719180413.jpg', ' <p><p style=\"text-align: justify;\"> <strong>Son Kem Lỳ Physicians Formula The Healthy Lip</strong> là dòng son mới ra mắt đầu năm 2018 này của thương hiệu <a href=\"https://beautygarden.vn/\">mỹ phẩm</a> nổi tiếng của Mỹ Physicians Formula. Với những ưu điểm nổi trội như: chất son kem mịn mượt, lên màu chuẩn đẹp tự nhiên, khả năng giữ màu cực tốt, thiết kế đơn giản xinh yêu, thỏi son Physicians Formula The Healthy Lip đã nhanh chóng chinh phục hàng triệu cô nàng tín đồ mê son khắp thế giới.</p> <p style=\"text-align: justify;\"> <br /> <strong>Son Kem Lỳ Physicians Formula The Healthy Lip<br /> Dung tích: 7ml.</strong></p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/son-kem-li-physicians-formula-the-healthy-lip-hinh-anh-1.jpg\" target=\"_blank\" title=\"Son Kem Physicians Formula The Healthy Lip hình ảnh 1\"><img alt=\"son kem li physicians formula the healthy lip hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/son-kem-li-physicians-formula-the-healthy-lip-hinh-anh-1.jpg\" style=\"width: 650px; height: 433px;\" /></a></p> </p> '),
(7, 'Son Dưỡng Trị Thâm Môi DHC Lip Cream', 'son-duong-tri-tham-moi-dhc-lip-cream', 4, 5, 140000, 10, 'son-duong-tri-tham-moi-dhc-lip-cream-081726180413.jpg', ' <p><p> <strong>Son dưỡng môi DHC Lip Cream</strong> là dòng son dưỡng chất lượng đến từ Nhật Bản, hiện đang rất được lòng các cô nàng châu Á. Với thành phần giàu dưỡng chất collagen, vitamin E, dầu oliu, hạt lô hội,... son dưỡng DHC Lip Cream không chỉ giúp cấp ẩm tức thì cho môi, tạo độ mềm mịn mà còn có khả năng trị thâm môi cực hiệu quả.</p> <p> Son Dưỡng DHC Lip Cream.<br /> Giá: 150k.<br /> Trọng lượng: 1,5gr.<br /> Xuất xứ: Nhật Bản.</p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/son-duong-tri-tham-moi-dhc-lip-cream-hinh-anh-1.jpg\" target=\"_blank\" title=\"Son Dưỡng Môi Trị Thâm DHC Lip Cream hình ảnh 1\"><img alt=\"son duong tri tham moi dhc lip cream hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/son-duong-tri-tham-moi-dhc-lip-cream-hinh-anh-1.jpg\" style=\"width: 650px; height: 975px;\" /></a></p> <p style=\"text-align: center;\"> <em>Son Dưỡng DHC Lip Cream</em></p> <p>  </p> </p> '),
(8, 'Kem Nền Cho Da Kh&#244; Revlon ColorStay 24hrs Makeup Dry', 'kem-nen-cho-da-kh-244-revlon-colorstay-24hrs-makeup-dry', 2, 2, 210000, 10, 'kem-nen-cho-da-kh-244-revlon-colorstay-24hrs-makeup-dry-103437180413.jpg', ' <p><p style=\"text-align: justify;\"> <strong>Kem nền Revlon ColorStay 24hrs Makeup Dry</strong> 30ml của Mỹ từ thương hiệu Revlon đã được cập nhật tại hệ thống <a href=\"https://beautygarden.vn/\">mỹ phẩm chính hãng</a> Beauty Garden, sản phẩm mang đến lớp nền đẹp, che phủ khuyết điểm hoàn hảo. Đặc biệt độ che phủ tốt nhưng lại cực kỳ mỏng nhẹ, dễ chịu không hề bí da. Thành phần không chứa dầu, không gây kích ứng, không gây mụn cho tín đồ sự yên tâm khi sử dụng.</p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/kem-nen-cho-da-kho-revlon-colorstay-24hrs-makeup-dry-hinh-anh-1.jpg\" target=\"_blank\" title=\"Kem Nền Revlon ColorStay 24hrs Makeup hình ảnh 1\"><img alt=\"kem nen cho da kho revlon colorstay 24hrs makeup dry hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/kem-nen-cho-da-kho-revlon-colorstay-24hrs-makeup-dry-hinh-anh-1.jpg\" style=\"width: 650px; height: 726px;\" /></a></p> <p style=\"text-align: center;\"> <em>Kem nền Revlon ColorStay 24hrs Makeup Dry </em></p> </p> '),
(9, 'Son Kem L&#236; Revlon Ultra HD Matte Lip Color (Mới)', 'son-kem-l-236-revlon-ultra-hd-matte-lip-color-moi-', 3, 2, 130000, 10, 'son-kem-l-236-revlon-ultra-hd-matte-lip-color-moi--103440180413.jpg', ' <p><p> <strong>Son kem lì Revlon Ultra HD Matte Lipcolor </strong>là dòng son mới đình đám đến từ nhãn hiệu mỹ phẩm nổi tiếng nước Mỹ – Revlon. Với công nghệ tạo màu Ultra HD hiện đại, Son Revlon Ultra HD Matte Lipcolor có khả năng lên môi cực chuẩn, hoàn toàn không kén màu da, cho bạn gái đôi môi tươi tắn quyến rũ tự nhiên suốt cả ngày. </p> <p> <strong>Son kem lì Revlon Ultra HD Matte Lip Color<br /> Dung tích: 5.9ml.<br /> Xuất xứ: USA.</strong><br /> </p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/son-kem-li-revlon-ultra-hd-matte-lip-color-moi-hinh-anh-1.jpg\" target=\"_blank\" title=\"Son kem lì Revlon Ultra HD Matte Lip Color hình ảnh 1\"><img alt=\"son kem li revlon ultra hd matte lip color moi hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/son-kem-li-revlon-ultra-hd-matte-lip-color-moi-hinh-anh-1.jpg\" style=\"width: 650px; height: 433px;\" /></a></p> </p> '),
(10, 'Kem Tẩy Trang M&#244;i Nyx Be Gone Lip Color Remover', 'kem-tay-trang-m-244-i-nyx-be-gone-lip-color-remover', 4, 3, 150000, 60, 'kem-tay-trang-m-244-i-nyx-be-gone-lip-color-remover-103444180413.jpg', ' <p><p> <strong>Tẩy trang môi Nyx Be Gone Lip Color Remover</strong> là <a href=\"https://beautygarden.vn/danh-muc/tay-trang.html\">kem tẩy trang</a> dành riêng cho môi đang rất được chị em phụ nữ thế giới ưa chuộng. Với thành phần chứa nhiều vitamin E, sản phẩm không chỉ giúp làm sạch lớp son lì màu, loại bỏ toàn bộ bụi bẩn tạp chất trên môi mà còn dưỡng môi hồng hào mịn màng tự nhiên.</p> <p> <strong>Tẩy trang môi Nyx Be Gone Lip Color Remover.<br /> Dung tích: 13ml.<br /> Xuất xứ: Mỹ.</strong></p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/kem-tay-trang-moi-nyx-be-gone-lip-color-remover-hinh-anh-1.jpg\" target=\"_blank\" title=\"Tẩy trang môi Nyx Be Gone Lip Color Remover hình ảnh 1\"><img alt=\"kem tay trang moi nyx be gone lip color remover hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/kem-tay-trang-moi-nyx-be-gone-lip-color-remover-hinh-anh-1.jpg\" style=\"width: 650px; height: 433px;\" /></a></p> </p> '),
(11, 'Son Kem L&#236; Physicians Formula The Healthy Lip', 'son-kem-l-236-physicians-formula-the-healthy-lip', 3, 4, 160000, 9, 'son-kem-l-236-physicians-formula-the-healthy-lip-103447180413.jpg', ' <p><p style=\"text-align: justify;\"> <strong>Son Kem Lỳ Physicians Formula The Healthy Lip</strong> là dòng son mới ra mắt đầu năm 2018 này của thương hiệu <a href=\"https://beautygarden.vn/\">mỹ phẩm</a> nổi tiếng của Mỹ Physicians Formula. Với những ưu điểm nổi trội như: chất son kem mịn mượt, lên màu chuẩn đẹp tự nhiên, khả năng giữ màu cực tốt, thiết kế đơn giản xinh yêu, thỏi son Physicians Formula The Healthy Lip đã nhanh chóng chinh phục hàng triệu cô nàng tín đồ mê son khắp thế giới.</p> <p style=\"text-align: justify;\"> <br /> <strong>Son Kem Lỳ Physicians Formula The Healthy Lip<br /> Dung tích: 7ml.</strong></p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/son-kem-li-physicians-formula-the-healthy-lip-hinh-anh-1.jpg\" target=\"_blank\" title=\"Son Kem Physicians Formula The Healthy Lip hình ảnh 1\"><img alt=\"son kem li physicians formula the healthy lip hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/son-kem-li-physicians-formula-the-healthy-lip-hinh-anh-1.jpg\" style=\"width: 650px; height: 433px;\" /></a></p> </p> '),
(12, 'Son Dưỡng Trị Th&#226;m M&#244;i DHC Lip Cream', 'son-duong-tri-th-226-m-m-244-i-dhc-lip-cream', 4, 5, 140000, 0, 'son-duong-tri-th-226-m-m-244-i-dhc-lip-cream-103451180413.jpg', ' <p><p> <strong>Son dưỡng môi DHC Lip Cream</strong> là dòng son dưỡng chất lượng đến từ Nhật Bản, hiện đang rất được lòng các cô nàng châu Á. Với thành phần giàu dưỡng chất collagen, vitamin E, dầu oliu, hạt lô hội,... son dưỡng DHC Lip Cream không chỉ giúp cấp ẩm tức thì cho môi, tạo độ mềm mịn mà còn có khả năng trị thâm môi cực hiệu quả.</p> <p> Son Dưỡng DHC Lip Cream.<br /> Giá: 150k.<br /> Trọng lượng: 1,5gr.<br /> Xuất xứ: Nhật Bản.</p> <p style=\"text-align: center;\"> <a href=\"https://beautygarden.vn/Upload/images/son-duong-tri-tham-moi-dhc-lip-cream-hinh-anh-1.jpg\" target=\"_blank\" title=\"Son Dưỡng Môi Trị Thâm DHC Lip Cream hình ảnh 1\"><img alt=\"son duong tri tham moi dhc lip cream hinh anh 1\" src=\"https://beautygarden.vn/Upload/images/son-duong-tri-tham-moi-dhc-lip-cream-hinh-anh-1.jpg\" style=\"width: 650px; height: 975px;\" /></a></p> <p style=\"text-align: center;\"> <em>Son Dưỡng DHC Lip Cream</em></p> <p>  </p> </p> ');

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
(2, 'Mỹ phẩm 2', 'ádsad', '14-47-19-2018-04-18-girl2.jpg');

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
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`ma_thuong_hieu`, `ten_thuong_hieu`, `ten_khong_dau`) VALUES
(1, 'Vacosi', 'vacosi'),
(2, 'Revlon', 'revlon'),
(3, 'NYX', 'nyx'),
(4, 'Physician Formula', 'physician-formula'),
(5, 'DHC', 'dhc'),
(6, 'L\'oreal', 'loreal'),
(7, 'The Face Shop', 'the-face-shop'),
(8, 'Neutrogena', 'neutrogena'),
(9, 'StIves', 'stives'),
(10, 'Bath and body works', 'bath-and-body-works'),
(11, 'Kose', 'kose'),
(12, 'Hada Labo', 'hada-labo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ct_hd_ban`
--
ALTER TABLE `ct_hd_ban`
  MODIFY `ma_ct_hdb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `ct_hd_nhap`
--
ALTER TABLE `ct_hd_nhap`
  MODIFY `ma_cthd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  MODIFY `ma_hdn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lo_hang`
--
ALTER TABLE `lo_hang`
  MODIFY `ma_lo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `ma_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `ma_thuong_hieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
