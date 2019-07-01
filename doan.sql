-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 02:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `Id_CTDonHang` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` float(15,2) DEFAULT NULL,
  `TenSp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Id_DonHang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`Id_CTDonHang`, `Id_SanPham`, `SoLuong`, `DonGia`, `TenSp`, `Id_DonHang`) VALUES
(1, 1, 1, 100.00, 'Áo dài', 1),
(2, 1, 1, 100.00, 'Áo dài', 2),
(3, 2, 1, 200.00, 'Quần dài', 2),
(4, 2, 1, 200.00, 'Quần dài', 3),
(5, 1, 1, 100.00, 'Áo dài', 4),
(6, 3, 1, 12.00, 'sadad', 5),
(7, 1, 1, 100.00, 'Áo dài', NULL),
(8, 3, 10, 12.00, 'sadad', NULL),
(9, 2, 10, 200.00, 'Quần dài', NULL),
(10, 1, 10, 100.00, 'Áo dài', NULL),
(11, 3, 100, 12.00, 'sadad', 9);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadonban`
--

CREATE TABLE `chitiethoadonban` (
  `Id_CTHDBan` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` float(15,2) DEFAULT NULL,
  `Id_HoaDonBan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `chitiethoadonban`
--

INSERT INTO `chitiethoadonban` (`Id_CTHDBan`, `Id_SanPham`, `SoLuong`, `DonGia`, `Id_HoaDonBan`) VALUES
(1, 1, 1, 12.00, 1),
(2, 2, 2, 23.00, 1),
(3, 1, 1, 100.00, 2),
(4, 2, 2, 123.00, 2),
(5, 1, 1, 100.00, 3),
(6, 2, 2, 200.00, 3),
(7, 3, 3, 123.00, 3),
(8, 2, 4, 200.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadonmua`
--

CREATE TABLE `chitiethoadonmua` (
  `Id_CTHDMua` int(11) NOT NULL,
  `Id_SanPham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` float(15,2) DEFAULT NULL,
  `Id_HoaDonMua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `chitiethoadonmua`
--

INSERT INTO `chitiethoadonmua` (`Id_CTHDMua`, `Id_SanPham`, `SoLuong`, `DonGia`, `Id_HoaDonMua`) VALUES
(1, '1', 10, 100.00, 2),
(2, '2', 12, 123.00, 2),
(3, '1', 1, 100.00, 3),
(4, '2', 2, 200.00, 3),
(5, '2', 3, 200.00, 3),
(6, '3', 4, 123.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieuhang`
--

CREATE TABLE `chitietphieuhang` (
  `id` int(11) NOT NULL,
  `Id_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id_PhieuHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `Id_DanhMucSp` int(11) NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MoTa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Id_NhomSp_Cha` int(11) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `Slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`Id_DanhMucSp`, `TieuDe`, `MoTa`, `Id_NhomSp_Cha`, `TrangThai`, `NgayTao`, `Slug`) VALUES
(1, 'Quần', 'tất cả các nhóm quần', 0, 1, '2019-05-21 16:17:42', '1'),
(2, 'Áo', 'tất cả các áo', 0, 1, '2019-05-22 16:18:04', '2'),
(3, 'chân váy', 'tất cả các chân váy', 0, 1, '2019-04-15 16:25:50', '1'),
(4, 'aaa', NULL, 0, 1, NULL, 'aaa'),
(6, 'Áo dài', NULL, 0, 1, '2019-05-21 15:58:46', 'ao-dai'),
(7, 'Áo tân thời', 'áo tân thời', 0, 1, '2019-05-21 15:59:48', 'ao-tan-thoi'),
(8, 'Áo 1', NULL, 7, 1, '2019-06-27 14:35:08', 'ao-1');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `Id_DonHang` int(11) NOT NULL,
  `Id_NhanVien` int(11) DEFAULT NULL,
  `Id_SanPham` int(11) NOT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `NgayCapNhap` timestamp NULL DEFAULT NULL,
  `TongTien` float(15,2) DEFAULT NULL,
  `TenNguoiNhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci,
  `GhiChu` text COLLATE utf8mb4_unicode_ci,
  `TrangThai` int(5) DEFAULT '0' COMMENT '0: chờ 1: duyệt 2: đã thanh toán -1: hủy',
  `Id_KhachHang` int(11) DEFAULT NULL,
  `KieuThanhToan` tinyint(4) DEFAULT NULL,
  `size` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`Id_DonHang`, `Id_NhanVien`, `Id_SanPham`, `NgayTao`, `NgayCapNhap`, `TongTien`, `TenNguoiNhan`, `email`, `Sdt`, `DiaChi`, `GhiChu`, `TrangThai`, `Id_KhachHang`, `KieuThanhToan`, `size`, `ship`) VALUES
(1, 1, 0, '2019-05-25 10:30:58', '2019-05-25 10:30:58', 105.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', 'Giao hàng vào chủ nhật', 2, 2, 1, '', '20'),
(2, 1, 0, '2019-05-25 10:34:01', '2019-05-25 10:34:01', 315.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', 'Giao hàng nhanh', -1, 2, 1, '', '30'),
(3, 1, 0, '2019-05-27 16:59:54', '2019-05-27 16:59:54', 220.00, 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'Haf Nooij', 'adadadsad', -1, 1, 1, '', '40'),
(4, NULL, 0, '2019-05-27 17:02:40', '2019-05-27 17:02:40', 140.00, 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'dasdas', 'asdasd', 0, 1, 1, '', '20'),
(5, NULL, 3, '2019-06-18 12:27:00', '2019-06-18 12:27:00', 12.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 1, '', '30'),
(6, NULL, 1, '2019-06-21 16:18:05', '2019-06-21 16:18:05', 100.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 2, NULL, '40'),
(7, NULL, 1, '2019-06-21 16:20:08', '2019-06-21 16:20:08', 100.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 2, 'L', '20'),
(8, NULL, 3, '2019-06-22 09:38:41', '2019-06-22 09:38:41', 3140.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 2, 'M', '20'),
(9, NULL, 3, '2019-06-22 09:40:29', '2019-06-22 09:40:29', 1230.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 2, 'M', '30');

-- --------------------------------------------------------

--
-- Table structure for table `hangloi`
--

CREATE TABLE `hangloi` (
  `id` int(11) NOT NULL,
  `Id_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GhiChu` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangloi`
--

INSERT INTO `hangloi` (`id`, `Id_SanPham`, `SoLuong`, `GhiChu`) VALUES
(1, 2, 1, 'Hàng hỏng');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonban`
--

CREATE TABLE `hoadonban` (
  `Id_HoaDonBan` int(11) NOT NULL,
  `Id_NhanVien` int(11) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `TenKhachhang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sdt` int(11) DEFAULT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci,
  `GhiChu` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hoadonban`
--

INSERT INTO `hoadonban` (`Id_HoaDonBan`, `Id_NhanVien`, `NgayTao`, `TenKhachhang`, `Sdt`, `DiaChi`, `GhiChu`) VALUES
(1, 1, '2019-06-21 17:00:00', 'Khánh Hoàng', 31231, '280/21 Cổ Nhuế', 'adad'),
(2, 1, '2019-06-25 17:00:00', 'Khánh Hoàng', 12345678, '280/21 Cổ Nhuế', 'nhanh'),
(3, 1, '2019-06-30 17:00:00', '3', 1234567890, 'Hà Nội', 'Giao hàng nhanh');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonmua`
--

CREATE TABLE `hoadonmua` (
  `Id_HoaDonMua` int(11) NOT NULL,
  `Id_NhaCC` int(11) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `NgayCapNhap` timestamp NULL DEFAULT NULL,
  `TongTien` float(15,2) DEFAULT NULL,
  `TrangThai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hoadonmua`
--

INSERT INTO `hoadonmua` (`Id_HoaDonMua`, `Id_NhaCC`, `NgayTao`, `NgayCapNhap`, `TongTien`, `TrangThai`) VALUES
(2, 1, '2019-06-23 17:00:00', '2019-06-23 17:00:00', 1234.00, NULL),
(3, 1, '2019-06-30 17:00:00', '2019-06-30 17:00:00', 123.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `Id_NCC` int(11) NOT NULL,
  `TenNCC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sdt` int(11) DEFAULT NULL,
  `Gmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci,
  `TrangThai` int(2) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`Id_NCC`, `TenNCC`, `Sdt`, `Gmail`, `DiaChi`, `TrangThai`, `NgayTao`) VALUES
(1, 'khanh', 123456789, 'abc@gmail.com', 'Hà Nội', 1, '2019-06-23 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id_NhanVien` int(11) NOT NULL,
  `MaNV` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sdt` int(11) DEFAULT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci,
  `Avatar` text COLLATE utf8mb4_unicode_ci,
  `MatKhau` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayTao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TrangThai` int(2) DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Id_NhanVien`, `MaNV`, `HoTen`, `NgaySinh`, `GioiTinh`, `Sdt`, `DiaChi`, `Avatar`, `MatKhau`, `remember_token`, `NgayTao`, `TrangThai`, `quyen`) VALUES
(1, 'admin', 'admin', NULL, '1', NULL, 'admin', NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', 'C8AaywqWX76odq9CWm9jhMyDXYg1ykKv7yQYbFuwsxlin7W7JQPFjsGpTMkJ', '2019-06-28 13:34:47', 1, 1),
(4, 'admin1', 'Ngocthuy', NULL, NULL, NULL, NULL, NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', 'X9csMBYpoGPBMmrYqMaGJZW9sgXQJIiZuW4CnzCuJ4p2SxeGyKLK0E8lKNpp', '2019-06-21 23:14:30', 1, 2),
(5, 'admin2', 'Nguyễn Thủy', NULL, NULL, NULL, NULL, NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', '', '2019-06-28 13:35:12', 0, 3),
(6, 'NV001', 'Khánh', NULL, '1', NULL, 'admin', NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', '5kAclowwJSGTouCmfeDmqXf4RbBicu2Z4nSV5ijV6UButs7Mhx1Lw63osjMU', '2019-06-28 13:40:45', 1, 2),
(7, 'NV002', 'NV002', '2019-06-28', '1', 1234567890, '280/21 Cổ Nhuế', NULL, '$2y$10$TQhFCgV4PbMzl7wwZhGt2Olgwj1kF2YngjEhjQzzY72IdVykKhm6u', '', '2019-06-28 13:40:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phieuhang`
--

CREATE TABLE `phieuhang` (
  `id` int(11) NOT NULL,
  `Id_KhachHang` int(11) NOT NULL,
  `NgayTao` date NOT NULL,
  `NgayCapNhap` date NOT NULL,
  `GiaBan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) DEFAULT NULL,
  `GhiChu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Id_SanPham` int(11) NOT NULL,
  `Id_DanhMucSp` int(11) DEFAULT NULL,
  `MaSP` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TenSp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DonGia` float(15,0) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `LuotXem` int(11) DEFAULT '0',
  `AnhChinh` text COLLATE utf8mb4_unicode_ci,
  `Sp_Hot` int(2) DEFAULT NULL,
  `GiaKhuyenMai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Id_SanPham`, `Id_DanhMucSp`, `MaSP`, `TenSp`, `DonGia`, `SoLuong`, `NgayTao`, `TrangThai`, `LuotXem`, `AnhChinh`, `Sp_Hot`, `GiaKhuyenMai`, `size`) VALUES
(1, 7, 'A123', 'Áo dài', 100, 6, '2019-06-18 11:59:49', 1, 20, '/upload/product/5ce7f594cb419.png', 1, NULL, 'a:1:{i:0;s:1:\"L\";}'),
(2, 4, 'QD001', 'Quần dài', 200, 13, '2019-06-18 11:55:47', 1, 18, '/upload/product/5ce919e4b8fbe.jpg', 1, NULL, 'a:1:{i:0;s:1:\"S\";}'),
(3, 7, '2123', 'sadad', 123, 10, '2019-06-27 14:34:08', 1, 38, '/upload/product/5d08d0a84a208.PNG', 0, '12', 'a:3:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `phone`, `birthday`, `address`, `gender`, `created_at`) VALUES
(1, 'Khánh Hoàng', 'khanh@gmail.com', '$2y$10$WQjLOrtAtTja8MAphzjUNesDI/x8Oaev97gXXHxFA/vBqKza/uAGK', 'MBQlwnPhVRa4kSkz0QjLkvd02kOBN2glxRCLG1hnA04II1jMXntz3voy1ZXI', '3456', NULL, NULL, NULL, '2019-05-25 08:56:41'),
(2, 'Hoàng Khánh', 'hoang@gmail.com', '$2y$10$bOygcQ213H6PppFPF7qGt.CZHlHsl8coA2QNqg.lxX7klY8CAD.xC', 'P6JeiwKptRfglNSwYfttEKu6INK6zXitAoHiUkzpQCHhQNFRbQaYIa5UDIzy', '12345678910', '2019-05-25', 'Hà Nội', 1, '2019-05-25 08:56:41'),
(3, 'abc', 'abc@gmail.com', '$2y$10$bEnLgOoM.FMQ0lbxASG7f.oM6.XyW.lCgP1oWC7ovVtf62TSbFw9G', NULL, '1234567890', '2019-06-24', 'Hà Nội', NULL, '2019-06-24 16:36:58'),
(4, 'Khánh Hoàng', 'abc@gmail.com', '$2y$10$.n.cQZ8GY8lrCitCVzbo1ePEp/cXv5DGIMfKkQzNGbIih8YsTciP2', NULL, '12345678901', '2019-06-27', '280/21 Cổ Nhuế', NULL, NULL),
(5, 'Khánh Hoàng', 'abc@gmail.com', '$2y$10$KOLVjuQdxzNF9/.FCsAClueIwX6AZHrnGm9FebqqlTOUzueq4qRXS', NULL, '12345678901', '2019-06-27', '280/21 Cổ Nhuế', NULL, NULL),
(6, '123456', 'asds@gmail.com', '$2y$10$8lUfGLSb/caXGfCGkZeDa.FuDeeo6YZOlZl8nd/wIPXdtHyS4Jm3G', NULL, '12345678912', '2019-06-27', 'Phú Lạc', 1, NULL),
(7, 'Nguyen Thi Ly', 'Ly@gmail.com', '$2y$10$5wqmupayi2NppgAmHx/quOOyrgaHExGqOuibYFC6Hpo3PJ0nETGj6', NULL, '0975344355', '1996-12-01', 'Quan Hoa- Thanh Hoa', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`Id_CTDonHang`) USING BTREE;

--
-- Indexes for table `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  ADD PRIMARY KEY (`Id_CTHDBan`) USING BTREE;

--
-- Indexes for table `chitiethoadonmua`
--
ALTER TABLE `chitiethoadonmua`
  ADD PRIMARY KEY (`Id_CTHDMua`) USING BTREE;

--
-- Indexes for table `chitietphieuhang`
--
ALTER TABLE `chitietphieuhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`Id_DanhMucSp`) USING BTREE;

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Id_DonHang`) USING BTREE;

--
-- Indexes for table `hangloi`
--
ALTER TABLE `hangloi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD PRIMARY KEY (`Id_HoaDonBan`) USING BTREE;

--
-- Indexes for table `hoadonmua`
--
ALTER TABLE `hoadonmua`
  ADD PRIMARY KEY (`Id_HoaDonMua`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Id_NCC`) USING BTREE;

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id_NhanVien`) USING BTREE;

--
-- Indexes for table `phieuhang`
--
ALTER TABLE `phieuhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id_SanPham`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `Id_CTDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  MODIFY `Id_CTHDBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chitiethoadonmua`
--
ALTER TABLE `chitiethoadonmua`
  MODIFY `Id_CTHDMua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chitietphieuhang`
--
ALTER TABLE `chitietphieuhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `Id_DanhMucSp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `Id_DonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hangloi`
--
ALTER TABLE `hangloi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadonban`
--
ALTER TABLE `hoadonban`
  MODIFY `Id_HoaDonBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hoadonmua`
--
ALTER TABLE `hoadonmua`
  MODIFY `Id_HoaDonMua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `Id_NCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id_NhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phieuhang`
--
ALTER TABLE `phieuhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
