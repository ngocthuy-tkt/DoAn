-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2019 at 03:56 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

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
  `Id_CTHDBan` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` float(15,2) DEFAULT NULL,
  `TenSp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Id_HoaDonBan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`Id_CTHDBan`, `Id_SanPham`, `SoLuong`, `DonGia`, `TenSp`, `Id_HoaDonBan`) VALUES
(1, 1, 1, 100.00, 'Áo dài', 1),
(2, 1, 1, 100.00, 'Áo dài', 2),
(3, 2, 1, 200.00, 'Quần dài', 2),
(4, 4, 1, 12.00, 'áo dài tân thời', 3),
(5, 4, 2, 12.00, 'áo dài tân thời', 4),
(6, 4, 2, 12.00, 'áo dài tân thời', 5),
(7, 2, 1, 2131.00, 'sadsasd', 6),
(8, 3, 2, 121.00, 'quần', 7);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadonban`
--

CREATE TABLE `chitiethoadonban` (
  `Id_CTHDBan` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` float(15,2) DEFAULT NULL,
  `GiaKm` float(15,2) DEFAULT NULL,
  `TenSp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Id_HoaDonBan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

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

-- --------------------------------------------------------

--
-- Table structure for table `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `Id_ChiTietKM` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `Id_KhuyenMai` int(11) DEFAULT NULL,
  `GiaSauKM` float(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `Id_DanhGia` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `Id_KhachHang` int(11) DEFAULT NULL,
  `Sao` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

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
(1, 'Quần', 'tất cả các nhóm quần', 1, 1, '2019-05-21 16:17:42', '1'),
(2, 'Áo', 'tất cả các áo', 2, 1, '2019-05-22 16:18:04', '2'),
(3, 'chân váy', 'tất cả các chân váy', 3, 1, '2019-04-15 16:25:50', '1'),
(4, 'Áo dài', 'tất cả áo dài', 0, 1, '2019-05-22 07:10:07', 'ao-dai'),
(6, 'Áo dài tân thời', 'tất cả áo dài tân thời', 4, 1, '2019-05-22 07:11:48', 'ao-dai-tan-thoi');

-- --------------------------------------------------------

--
-- Table structure for table `doihang`
--

CREATE TABLE `doihang` (
  `Id_DoiTra` int(11) NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrangThai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `Id_HoaDonBan` int(11) NOT NULL,
  `Id_NhanVien` int(11) DEFAULT NULL,
  `Id_DoiHang` int(11) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `NgayCapNhap` timestamp NULL DEFAULT NULL,
  `TongTien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TenNguoiNhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci,
  `GhiChu` text COLLATE utf8mb4_unicode_ci,
  `TrangThai` int(5) DEFAULT '0' COMMENT '0: chờ 1: duyệt 2: đã thanh toán -1: hủy',
  `Id_KhachHang` int(11) DEFAULT NULL,
  `KieuThanhToan` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`Id_HoaDonBan`, `Id_NhanVien`, `Id_DoiHang`, `NgayTao`, `NgayCapNhap`, `TongTien`, `TenNguoiNhan`, `email`, `Sdt`, `DiaChi`, `GhiChu`, `TrangThai`, `Id_KhachHang`, `KieuThanhToan`) VALUES
(1, NULL, NULL, '2019-05-25 10:30:58', '2019-05-25 10:30:58', '105.00', 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', 'Giao hàng vào chủ nhật', 0, 2, 1),
(2, NULL, NULL, '2019-05-25 10:34:01', '2019-05-25 10:34:01', '315.00', 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', 'Giao hàng nhanh', 0, 2, 1),
(3, NULL, NULL, '2019-05-27 01:02:33', '2019-05-27 01:02:33', '12.60', 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'Hà Nội', 'Giao hàng nhanh', 0, 1, 1),
(4, NULL, NULL, '2019-05-27 01:47:53', '2019-05-27 01:47:53', '25.20', 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'Hà Nội', 'Giao hàng nhanh', 0, 1, 1),
(5, NULL, NULL, '2019-05-27 01:48:11', '2019-05-27 01:48:11', '25.20', 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'Hà Nội', 'Giao hàng nhanh', 0, 1, 1),
(6, NULL, NULL, '2019-05-27 01:50:10', '2019-05-27 01:50:10', '2,237.55', 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'Cổ Nhuế', 'ádadsa', 0, 1, 1),
(7, 1, NULL, '2019-05-27 01:52:31', '2019-05-27 01:52:31', '254.10', 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'Cổ Nhuế', 'Giao hàng nhanh cho tôi', -1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `Id_HinhAnh` int(11) NOT NULL,
  `Link` text COLLATE utf8mb4_unicode_ci,
  `Id_SanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `hinhthuc_thanhtoan`
--

CREATE TABLE `hinhthuc_thanhtoan` (
  `Id_ThanhToan` int(11) NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci,
  `TrangThai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `hoadonban`
--

CREATE TABLE `hoadonban` (
  `Id_HoaDonBan` int(11) NOT NULL,
  `Id_NhanVien` int(11) DEFAULT NULL,
  `Id_DoiHang` int(11) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `NgayCapNhap` timestamp NULL DEFAULT NULL,
  `TongTien` float(15,2) DEFAULT NULL,
  `GiaVanChuyen` int(11) DEFAULT NULL,
  `TenNguoiNhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sdt` int(11) DEFAULT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci,
  `GhiChu` text COLLATE utf8mb4_unicode_ci,
  `TrangThai` int(5) DEFAULT NULL,
  `NVChuyenHang` int(11) DEFAULT NULL,
  `Id_KhachHang` int(11) DEFAULT NULL,
  `Id_ThanhToan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

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

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `Id_KhachHang` int(11) NOT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgaySinh` timestamp NULL DEFAULT NULL,
  `GioiTinh` tinyint(4) DEFAULT NULL,
  `Sdt` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Avatar` text COLLATE utf8mb4_unicode_ci,
  `MatKhau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `TrangThai` int(2) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`Id_KhachHang`, `HoTen`, `NgaySinh`, `GioiTinh`, `Sdt`, `DiaChi`, `Avatar`, `MatKhau`, `remember_token`, `NgayTao`, `TrangThai`, `email`) VALUES
(1, 'Nguyễn Văn A', '2019-05-23 17:00:00', 1, '123456789', 'Hà Nội', NULL, '$2y$10$nDj1LoBm8IrUzRzN4sbGweLtoo/76kWHvn0/fgntVBOF1rkgBdgzu', NULL, '2019-05-24 09:46:59', NULL, 'nguyenvana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `Id_KhuyenMai` int(11) NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci,
  `PhanTramKm` float(15,2) DEFAULT NULL,
  `TrangThai` int(2) DEFAULT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL,
  `AnhKm` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

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
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TrangThai` int(2) DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Id_NhanVien`, `MaNV`, `HoTen`, `NgaySinh`, `GioiTinh`, `Sdt`, `DiaChi`, `Avatar`, `MatKhau`, `remember_token`, `NgayTao`, `TrangThai`, `quyen`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, '$2y$10$WQjLOrtAtTja8MAphzjUNesDI/x8Oaev97gXXHxFA/vBqKza/uAGK', 'PLzsJnthHneV8zfvzwAW8iUcChNzZoxAgIPOwQn0kCr8vSfksQyYvxXANikS', '2019-05-23 07:40:38', 1, 1),
(4, 'admin1', 'Ngocthuy', NULL, NULL, NULL, NULL, NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', '80YADXt69iy4N0Z7Sz8IxQ0rBG34MBiVRhNArl5RMfYt049Zu2HmyYnMTt8U', '2019-05-23 04:06:27', 1, 2),
(5, 'admin2', 'Nguyễn Thủy', NULL, NULL, NULL, NULL, NULL, '$2y$10$Y3xNHiLcS1jJBVaGJg0Fi.EQOaG/0R9mgx2U554bh7RZ9jk6QyDoy', NULL, '2019-05-12 09:51:15', 0, 3),
(6, 'NV001', 'NV001', NULL, NULL, NULL, NULL, NULL, '$2y$10$UpC6xwXvt2z0FqMJ15Epj.VQB2pdmT9y9/rkdvxPHVUMpOt75PJ2W', 'ZIv0KLLfs5h59iHSSyfqzfveToILR3BBhDyM8FRp1Y4CwBI9h4jacwfVIc0U', '2019-05-23 01:07:51', 1, 3);

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
  `GiaKhuyenMai` float(15,0) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `LuotXem` int(11) DEFAULT NULL,
  `AnhChinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sp_Hot` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Id_SanPham`, `Id_DanhMucSp`, `MaSP`, `TenSp`, `DonGia`, `GiaKhuyenMai`, `SoLuong`, `NgayTao`, `TrangThai`, `LuotXem`, `AnhChinh`, `Sp_Hot`) VALUES
(2, 6, 'ádasd', 'sadsasd', 2131, NULL, 9, '2019-05-23 03:00:36', 1, NULL, '/upload/product/5ce60cd4a88b4.jpeg', 1),
(3, 4, 'ưeqdqw', 'quần', 123123, 121, 10, '2019-05-23 04:00:10', 0, NULL, '/upload/product/5ce61aca64ed7.jpeg', 0),
(4, 6, 'qqwe', 'áo dài tân thời', 12312, 12, 10, '2019-05-23 03:59:50', 1, NULL, '/upload/product/5ce61a786b5fe.jpeg', 1),
(5, 4, 'q123', 'Áo dài', 100, NULL, 10, '2019-05-24 07:57:56', 1, NULL, '/upload/product/5ce7a40453162.jpeg', 0);

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
(1, 'Khánh Hoàng', 'khanh@gmail.com', '$2y$10$WQjLOrtAtTja8MAphzjUNesDI/x8Oaev97gXXHxFA/vBqKza/uAGK', '8q1Azk0J6JrSikokpvMrTltuoa0UbyHeDinrr8an89Qw55f17Htn4I32twic', '3456', NULL, NULL, NULL, NULL),
(2, 'Hoàng Khánh', 'hoang@gmail.com', '$2y$10$bOygcQ213H6PppFPF7qGt.CZHlHsl8coA2QNqg.lxX7klY8CAD.xC', NULL, '12345678910', '2019-05-25', 'Hà Nội', NULL, '2019-05-25 08:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `Id_VaiTro` int(11) NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Quyen` int(5) DEFAULT NULL,
  `TrangThai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`Id_VaiTro`, `Ten`, `Quyen`, `TrangThai`) VALUES
(1, 'Admin', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`Id_CTHDBan`) USING BTREE;

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
-- Indexes for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`Id_ChiTietKM`) USING BTREE;

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`Id_DanhGia`) USING BTREE;

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`Id_DanhMucSp`) USING BTREE;

--
-- Indexes for table `doihang`
--
ALTER TABLE `doihang`
  ADD PRIMARY KEY (`Id_DoiTra`) USING BTREE;

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Id_HoaDonBan`) USING BTREE;

--
-- Indexes for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`Id_HinhAnh`) USING BTREE;

--
-- Indexes for table `hinhthuc_thanhtoan`
--
ALTER TABLE `hinhthuc_thanhtoan`
  ADD PRIMARY KEY (`Id_ThanhToan`) USING BTREE;

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
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Id_KhachHang`) USING BTREE;

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`Id_KhuyenMai`) USING BTREE;

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
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`Id_VaiTro`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `Id_CTHDBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  MODIFY `Id_CTHDBan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitiethoadonmua`
--
ALTER TABLE `chitiethoadonmua`
  MODIFY `Id_CTHDMua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  MODIFY `Id_ChiTietKM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `Id_DanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `Id_DanhMucSp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doihang`
--
ALTER TABLE `doihang`
  MODIFY `Id_DoiTra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `Id_HoaDonBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `Id_HinhAnh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinhthuc_thanhtoan`
--
ALTER TABLE `hinhthuc_thanhtoan`
  MODIFY `Id_ThanhToan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadonmua`
--
ALTER TABLE `hoadonmua`
  MODIFY `Id_HoaDonMua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Id_KhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `Id_KhuyenMai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `Id_NCC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id_NhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `Id_VaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
