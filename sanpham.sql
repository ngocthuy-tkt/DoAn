-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2019 at 10:08 AM
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
(2, 6, 'ádasd', 'sadsasd', 2131, NULL, 10, '2019-05-23 03:00:36', 1, NULL, '/upload/product/5ce60cd4a88b4.jpeg', 1),
(3, 4, 'ưeqdqw', 'quần', 123123, 121, 12, '2019-05-23 04:00:10', 0, NULL, '/upload/product/5ce61aca64ed7.jpeg', 0),
(4, 6, 'qqwe', 'áo dài tân thời', 12312, 12, 12, '2019-05-23 03:59:50', 1, NULL, '/upload/product/5ce61a786b5fe.jpeg', 1),
(5, 4, 'q123', 'Áo dài', 100, NULL, 10, '2019-05-24 07:57:56', 1, NULL, '/upload/product/5ce7a40453162.jpeg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id_SanPham`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
