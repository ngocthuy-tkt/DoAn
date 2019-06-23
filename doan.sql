-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 10:52 PM
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
(7, 1, 1, 100.00, 'Áo dài', NULL);

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
(2, 2, 2, 23.00, 1);

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
-- Table structure for table `chitietphieuhang`
--

CREATE TABLE `chitietphieuhang` (
  `id` int(11) NOT NULL,
  `Id_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
(1, 'Quần', 'tất cả các nhóm quần', 1, 1, '2019-05-21 16:17:42', '1'),
(2, 'Áo', 'tất cả các áo', 2, 1, '2019-05-22 16:18:04', '2'),
(3, 'chân váy', 'tất cả các chân váy', 3, 1, '2019-04-15 16:25:50', '1'),
(4, 'aaa', NULL, 0, 1, NULL, 'aaa'),
(6, 'Áo dài', NULL, 0, 1, '2019-05-21 15:58:46', 'ao-dai'),
(7, 'Áo tân thời', 'áo tân thời', 0, 1, '2019-05-21 15:59:48', 'ao-tan-thoi');

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
(3, NULL, 0, '2019-05-27 16:59:54', '2019-05-27 16:59:54', 220.00, 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'Haf Nooij', 'adadadsad', 0, 1, 1, '', '40'),
(4, NULL, 0, '2019-05-27 17:02:40', '2019-05-27 17:02:40', 140.00, 'Khánh Hoàng', 'khanh@gmail.com', '1234567890', 'dasdas', 'asdasd', 0, 1, 1, '', '20'),
(5, NULL, 3, '2019-06-18 12:27:00', '2019-06-18 12:27:00', 12.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 1, '', '30'),
(6, NULL, 1, '2019-06-21 16:18:05', '2019-06-21 16:18:05', 100.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 2, NULL, '40'),
(7, NULL, 1, '2019-06-21 16:20:08', '2019-06-21 16:20:08', 100.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', NULL, 0, 2, 2, 'L', '20');

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
(1, 1, '2019-06-21 17:00:00', 'Khánh Hoàng', 31231, '280/21 Cổ Nhuế', 'adad');

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
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayTao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TrangThai` int(2) DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Id_NhanVien`, `MaNV`, `HoTen`, `NgaySinh`, `GioiTinh`, `Sdt`, `DiaChi`, `Avatar`, `MatKhau`, `remember_token`, `NgayTao`, `TrangThai`, `quyen`) VALUES
(1, 'admin', 'admin', NULL, '1', NULL, 'admin', NULL, '$2y$10$UPYdggkUWT3rPevI9cVIuOzPHTw3.FqaOGV4pJb0deEQpCCcw6Zye', '', '2019-06-21 17:09:41', 1, 1),
(4, 'admin1', 'Ngocthuy', NULL, NULL, NULL, NULL, NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', '', '2019-05-12 09:49:55', 1, 2),
(5, 'admin2', 'Nguyễn Thủy', NULL, NULL, NULL, NULL, NULL, '$2y$10$Y3xNHiLcS1jJBVaGJg0Fi.EQOaG/0R9mgx2U554bh7RZ9jk6QyDoy', '', '2019-05-12 09:51:15', 0, 3),
(6, 'NV001', 'Khánh', NULL, '1', NULL, 'admin', NULL, '$2y$10$YrQlPKG2wmjlse2./DLLIOtIwU6sZ8FbpdGt9r.1iTGesoa4ElIk6', '', '2019-06-21 17:10:45', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `phieuhang`
--

CREATE TABLE `phieuhang` (
  `id` int(11) NOT NULL,
  `Id_KhachHang` int(11) NOT NULL,
  `NgayTao` int(11) NOT NULL,
  `NgayCapNhap` int(11) NOT NULL,
  `TongTien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL,
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
(1, 7, 'A123', 'Áo dài', 100, 8, '2019-06-18 11:59:49', 1, 12, '/upload/product/5ce7f594cb419.png', 1, NULL, 'a:1:{i:0;s:1:\"L\";}'),
(2, 4, 'QD001', 'Quần dài', 200, 9, '2019-06-18 11:55:47', 1, 11, '/upload/product/5ce919e4b8fbe.jpg', 1, NULL, 'a:1:{i:0;s:1:\"S\";}'),
(3, 7, '2123', 'sadad', 123, 11, '2019-06-18 12:02:03', 1, 22, '/upload/product/5d08d0a84a208.PNG', 1, '12', 'a:2:{i:0;s:1:\"S\";i:1;s:1:\"M\";}');

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
(2, 'Hoàng Khánh', 'hoang@gmail.com', '$2y$10$bOygcQ213H6PppFPF7qGt.CZHlHsl8coA2QNqg.lxX7klY8CAD.xC', 'P6JeiwKptRfglNSwYfttEKu6INK6zXitAoHiUkzpQCHhQNFRbQaYIa5UDIzy', '12345678910', '2019-05-25', 'Hà Nội', 1, '2019-05-25 08:56:41');

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
  MODIFY `Id_CTDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  MODIFY `Id_CTHDBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chitiethoadonmua`
--
ALTER TABLE `chitiethoadonmua`
  MODIFY `Id_CTHDMua` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id_DonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hangloi`
--
ALTER TABLE `hangloi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadonban`
--
ALTER TABLE `hoadonban`
  MODIFY `Id_HoaDonBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadonmua`
--
ALTER TABLE `hoadonmua`
  MODIFY `Id_HoaDonMua` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
