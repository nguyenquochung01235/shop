-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 04:14 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `id_chitietdathang` int(11) NOT NULL,
  `SoDonDH` int(11) DEFAULT NULL,
  `MSHH` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaDatHang` float DEFAULT NULL,
  `GiamGia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`id_chitietdathang`, `SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(24, 14, 'AT10', 1, 299000, NULL),
(25, 14, 'GD5', 1, 219000, NULL),
(26, 14, 'QT5', 1, 219000, NULL),
(27, 15, 'AT1', 1, 179000, NULL),
(28, 15, 'AT3', 1, 179000, NULL),
(29, 15, 'GD1', 1, 599000, NULL),
(30, 15, 'GD4', 1, 6790000, NULL),
(31, 16, 'AK2', 1, 99000, NULL),
(32, 16, 'AK3', 1, 2000000, NULL),
(33, 16, 'AK6', 1, 189000, NULL),
(34, 16, 'AK7', 1, 159000, NULL),
(35, 16, 'AK9', 1, 119000, NULL),
(36, 16, 'AT10', 1, 299000, NULL),
(37, 16, 'QJ2', 1, 199000, NULL),
(38, 17, 'AT10', 3, 299000, NULL),
(39, 17, 'GD5', 1, 219000, NULL),
(40, 17, 'QT4', 1, 159000, NULL),
(41, 17, 'QT5', 1, 219000, NULL),
(42, 18, 'AK1', 2, 159000, NULL),
(43, 18, 'AK2', 1, 99000, NULL),
(44, 18, 'AK9', 1, 119000, NULL),
(45, 19, 'AK3', 1, 2000000, NULL),
(46, 19, 'AT10', 1, 299000, NULL),
(47, 19, 'QJ1', 2, 179000, NULL),
(48, 20, 'AK7', 3, 159000, NULL),
(49, 20, 'GD4', 2, 6790000, NULL),
(50, 20, 'GD5', 2, 219000, NULL),
(51, 20, 'QJ3', 3, 1690000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MSNV` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NgayDH` timestamp NULL DEFAULT current_timestamp(),
  `NgayGH` date DEFAULT NULL CHECK (`NgayGH` > `NgayDH`),
  `TrangThaiDH` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`) VALUES
(14, '0967105247', 'admin', '2021-10-23 17:00:00', '2021-11-22', 'Đã Thành Công'),
(15, '0832227754', 'admin', '2021-10-23 17:00:00', '2021-11-22', 'Đã Thành Công'),
(16, '0386513029', 'admin', '2021-10-25 17:00:00', '2021-11-03', 'Đã Hủy Đơn'),
(17, '0857399180', 'admin', '2021-10-25 17:00:00', '2021-11-03', 'Đã Thành Công'),
(18, '0984795691', NULL, '2021-11-10 17:00:00', NULL, 'Đang Chờ Duyệt'),
(19, '0796651408', 'admin', '2021-11-13 17:00:00', '2021-11-15', 'Đã Duyệt Đơn'),
(20, '0796651408', 'nv096', '2021-11-20 17:00:00', '2021-11-22', 'Đã Duyệt Đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` longtext COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MSKH` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(14, 'Đường 22A, B7/96, KDC 568', '0967105247'),
(15, '102 Nguyễn Văn Trường, Long Tuyền, Bình Thủy, Cần Thơ', '0832227754'),
(16, 'Đường B22, 24/KDC 91B, An Khánh, Ninh Kiều, Cần Thơ', '0386513029'),
(17, 'Thuận Hưng, Thốt Nốt, Cần Thơ', '0857399180'),
(18, 'D11, KDC 91B, Cần Thơ', '0984795691'),
(19, '334B/10, Nguyễn Văn Linh, An Khánh, Ninh Kiều', '0796651408'),
(20, '328 Tòa Nhà Hoàng Phúc, An Thới, Bình Thủy, Cần Thơ', '0796651408');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenHH` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `QuyCach` longtext COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Gia` float DEFAULT NULL,
  `SoLuongHang` int(11) DEFAULT NULL,
  `MaLoaiHang` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
('AK1', 'Áo Khoác Boomer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 159000, 110, 'AK'),
('AK10', 'Áo Khoác Kaki', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 159000, 10, 'AK'),
('AK2', 'Áo Khoác Dù', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 99000, 54, 'AK'),
('AK3', 'Áo Khoác Lu I Vui Tươi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 2000000, 8, 'AK'),
('AK4', 'Áo Khoác Nỉ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 179000, 50, 'AK'),
('AK5', 'Áo Khoác Puma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 199000, 30, 'AK'),
('AK6', 'Áo Khoác Nike', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 189000, 30, 'AK'),
('AK7', 'Áo Khoác Adidas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 159000, 97, 'AK'),
('AK8', 'Áo Khoác Gucci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 599000, 100, 'AK'),
('AK9', 'Áo Khoác Dù Hades', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 119000, 104, 'AK'),
('AT1', 'Áo Thun Trắng', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 179000, 99, 'AT'),
('AT10', 'Áo Thun Polo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 299000, 94, 'AT'),
('AT2', 'Áo Thun Givenci', 'Đã Chỉnh Sữa Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 79000, 120, 'AT'),
('AT3', 'Áo New Balance', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 179000, 99, 'AT'),
('AT4', 'Áo Nike', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 279000, 50, 'AT'),
('AT5', 'Áo Phản Quang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 69000, 300, 'AT'),
('AT6', 'Áo Tráng Gương', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 79000, 50, 'AT'),
('AT7', 'Áo Thun Cổ Trụ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 200000, 100, 'AT'),
('AT8', 'Áo Thun Gấu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 189000, 30, 'AT'),
('AT9', 'Áo Thun LV', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 119000, 100, 'AT'),
('GD1', 'Giày Adidas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 599000, 49, 'GD'),
('GD2', 'Giày Nike', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 699000, 50, 'GD'),
('GD3', 'Giày Converse Dior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 1690000, 60, 'GD'),
('GD4', 'Giày Gucci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 6790000, 47, 'GD'),
('GD5', 'Giày Puma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 219000, 26, 'GD'),
('QJ1', 'Quần Jean Xanh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 179000, 96, 'QJ'),
('QJ2', 'Quần Jean Xám', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 199000, 50, 'QJ'),
('QJ3', 'Quần Jean Đen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 1690000, 7, 'QJ'),
('QJ4', 'Quần Jean Rách Gối', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 6790000, 50, 'QJ'),
('QJ5', 'Quần Jean Ống Rộng', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 219000, 30, 'QJ'),
('QT1', 'Quần Tây Đen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 179000, 100, 'QT'),
('QT2', 'Quần Tây Âu Xám', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 279000, 50, 'QT'),
('QT3', 'Quần Tây Xanh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 179000, 100, 'QT'),
('QT4', 'Quần Tây Kaki', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 159000, 49, 'QT'),
('QT5', 'Quần Tây Caro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus condimentum justo, at ultricies velit interdum sit amet. Nulla venenatis mauris ligula, mollis rhoncus nisi auctor eget. Donec convallis risus vel felis placerat, eget iaculis lorem euismod. Praesent viverra pretium nisi, ut egestas augue lobortis nec. Nam cursus rhoncus turpis, et pretium magna tincidunt sit amet. Suspendisse suscipit lectus sit amet pellentesque egestas. Quisque vulputate ex nec tortor tincidunt, eget consectetur libero feugiat. Donec vel est odio.', 219000, 28, 'QT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MSHH` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(1, 'AT1_1', 'AT1'),
(2, 'AT1_2', 'AT1'),
(3, 'AT1_3', 'AT1'),
(4, 'AT2_1', 'AT2'),
(5, 'AT2_2', 'AT2'),
(6, 'AT2_3', 'AT2'),
(7, 'AT3_1', 'AT3'),
(8, 'AT3_2', 'AT3'),
(9, 'AT3_3', 'AT3'),
(10, 'AT4_1', 'AT4'),
(11, 'AT4_2', 'AT4'),
(12, 'AT4_3', 'AT4'),
(13, 'AT5_1', 'AT5'),
(14, 'AT5_2', 'AT5'),
(15, 'AT5_3', 'AT5'),
(16, 'AT6_1', 'AT6'),
(17, 'AT6_2', 'AT6'),
(18, 'AT6_3', 'AT6'),
(19, 'AT7_1', 'AT7'),
(20, 'AT7_2', 'AT7'),
(21, 'AT7_3', 'AT7'),
(22, 'AT8_1', 'AT8'),
(23, 'AT8_2', 'AT8'),
(24, 'AT8_3', 'AT8'),
(25, 'AT9_1', 'AT9'),
(26, 'AT9_2', 'AT9'),
(27, 'AT9_3', 'AT9'),
(28, 'AT10_1', 'AT10'),
(29, 'AT10_2', 'AT10'),
(30, 'AT10_3', 'AT10'),
(31, 'AK1_1', 'AK1'),
(32, 'AK1_2', 'AK1'),
(33, 'AK1_3', 'AK1'),
(34, 'AK2_1', 'AK2'),
(35, 'AK2_2', 'AK2'),
(36, 'AK2_3', 'AK2'),
(37, 'AK3_1', 'AK3'),
(38, 'AK3_2', 'AK3'),
(39, 'AK3_3', 'AK3'),
(40, 'AK4_1', 'AK4'),
(41, 'AK4_2', 'AK4'),
(42, 'AK4_3', 'AK4'),
(43, 'AK5_1', 'AK5'),
(44, 'AK5_2', 'AK5'),
(45, 'AK5_3', 'AK5'),
(46, 'AK6_1', 'AK6'),
(47, 'AK6_2', 'AK6'),
(48, 'AK6_3', 'AK6'),
(49, 'AK7_1', 'AK7'),
(50, 'AK7_2', 'AK7'),
(51, 'AK7_3', 'AK7'),
(52, 'AK8_1', 'AK8'),
(53, 'AK8_2', 'AK8'),
(54, 'AK8_3', 'AK8'),
(55, 'AK9_1', 'AK9'),
(56, 'AK9_2', 'AK9'),
(57, 'AK9_3', 'AK9'),
(58, 'AK10_1', 'AK10'),
(59, 'AK10_2', 'AK10'),
(60, 'AK10_3', 'AK10'),
(75, 'GD1_1', 'GD1'),
(76, 'GD1_2', 'GD1'),
(77, 'GD1_3', 'GD1'),
(78, 'GD2_1', 'GD2'),
(79, 'GD2_2', 'GD2'),
(80, 'GD2_3', 'GD2'),
(81, 'GD3_1', 'GD3'),
(82, 'GD3_2', 'GD3'),
(83, 'GD3_3', 'GD3'),
(84, 'GD4_1', 'GD4'),
(85, 'GD4_2', 'GD4'),
(86, 'GD4_3', 'GD4'),
(87, 'GD5_1', 'GD5'),
(88, 'GD5_2', 'GD5'),
(89, 'GD5_3', 'GD5'),
(90, 'QT1_1', 'QT1'),
(91, 'QT1_2', 'QT1'),
(92, 'QT1_3', 'QT1'),
(93, 'QT2_1', 'QT2'),
(94, 'QT2_2', 'QT2'),
(95, 'QT2_3', 'QT2'),
(96, 'QT3_1', 'QT3'),
(97, 'QT3_2', 'QT3'),
(98, 'QT3_3', 'QT3'),
(99, 'QT4_1', 'QT4'),
(100, 'QT4_2', 'QT4'),
(101, 'QT4_3', 'QT4'),
(102, 'QT5_1', 'QT5'),
(103, 'QT5_2', 'QT5'),
(104, 'QT5_3', 'QT5'),
(105, 'QJ1_1', 'QJ1'),
(106, 'QJ1_2', 'QJ1'),
(107, 'QJ1_3', 'QJ1'),
(108, 'QJ2_1', 'QJ2'),
(109, 'QJ2_2', 'QJ2'),
(110, 'QJ2_3', 'QJ2'),
(111, 'QJ3_1', 'QJ3'),
(112, 'QJ3_2', 'QJ3'),
(113, 'QJ3_3', 'QJ3'),
(114, 'QJ4_1', 'QJ4'),
(115, 'QJ4_2', 'QJ4'),
(116, 'QJ4_3', 'QJ4'),
(117, 'QJ5_1', 'QJ5'),
(118, 'QJ5_2', 'QJ5'),
(119, 'QJ5_3', 'QJ5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TenCongTy` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `Email`) VALUES
('0386513029', 'Bùi Phát Tấn', 'Đồi Cà', '0386513029', 'buiphattan2929@gmail.com'),
('0796651408', 'Lê Huy Hoàng Phúc', 'Đồi Cà', '0796651408', 'hoangphuc408@gmail.com'),
('0832227754', 'Nguyễn Gia Nguyễn', 'DEE Coffee', '0832227754', 'nguyengianguyen.01012001@gmail.com'),
('0857399180', 'Nguyễn Văn Vinh', 'CODE TN', '0857399180', 'nguyenvanvinh1896A3@gmail.com'),
('0967105247', 'Nguyễn Quốc Hưng', 'TNHH NQH', '0967105247', 'nguyenquochung01235@gmail.com'),
('0984795691', 'Test User', 'Test', '0984795691', 'testuser@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenLoaiHang` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('AK', 'Áo Khoác'),
('AT', 'Áo Thun'),
('GD', 'Giày Dép'),
('QJ', 'Quần Jean'),
('QT', 'Quần Tây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `HoTenNV` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ChucVu` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `DiaChi` longtext COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Password` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `Password`) VALUES
('admin', 'Nguyễn Quốc Hưng', 'Quản Lý', 'Đường 22A B7/96 KDC 586, Phú Thứ, Cái Răng, Cần Thơ', '0967105247', 'admin'),
('nv096', 'Võ Ngọc Tươi', 'Thu Ngân', '16C Phạm Hữu Lầu, An Thới, Bình Thủy, Cần Thơ', '0393569096', 'admin'),
('nv641', 'Nguyễn Thế Vinh', 'Bán Hàng', 'Hẻm liên tổ 4-5, An Khánh, Ninh Kiều, Cần Thơ', ' 0939267641', 'admin'),
('nv960', 'Nguyễn Phúc Thịnh', 'Tư Vấn Viên', 'Hẻm 148 Đường 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ', '0939039960', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`id_chitietdathang`),
  ADD KEY `SoDonDH` (`SoDonDH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `id_chitietdathang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
