-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2019 lúc 12:36 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
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
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`Id_CTHDBan`, `Id_SanPham`, `SoLuong`, `DonGia`, `TenSp`, `Id_HoaDonBan`) VALUES
(1, 1, 1, 100.00, 'Áo dài', 1),
(2, 1, 1, 100.00, 'Áo dài', 2),
(3, 2, 1, 200.00, 'Quần dài', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonmua`
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
-- Cấu trúc bảng cho bảng `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `Id_ChiTietKM` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `Id_KhuyenMai` int(11) DEFAULT NULL,
  `GiaSauKM` float(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `Id_DanhGia` int(11) NOT NULL,
  `Id_SanPham` int(11) DEFAULT NULL,
  `Id_KhachHang` int(11) DEFAULT NULL,
  `Sao` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
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
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`Id_DanhMucSp`, `TieuDe`, `MoTa`, `Id_NhomSp_Cha`, `TrangThai`, `NgayTao`, `Slug`) VALUES
(1, 'Quần', 'tất cả các nhóm quần', 1, 1, '2019-05-21 16:17:42', '1'),
(2, 'Áo', 'tất cả các áo', 2, 1, '2019-05-22 16:18:04', '2'),
(3, 'chân váy', 'tất cả các chân váy', 3, 1, '2019-04-15 16:25:50', '1'),
(4, 'aaa', NULL, 0, 0, NULL, 'aaa'),
(6, 'Áo dài', NULL, 0, 1, '2019-05-21 15:58:46', 'ao-dai'),
(7, 'Áo tân thời', 'áo tân thời', 0, 1, '2019-05-21 15:59:48', 'ao-tan-thoi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doihang`
--

CREATE TABLE `doihang` (
  `Id_DoiTra` int(11) NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrangThai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `Id_HoaDonBan` int(11) NOT NULL,
  `Id_NhanVien` int(11) DEFAULT NULL,
  `Id_DoiHang` int(11) DEFAULT NULL,
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
  `KieuThanhToan` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`Id_HoaDonBan`, `Id_NhanVien`, `Id_DoiHang`, `NgayTao`, `NgayCapNhap`, `TongTien`, `TenNguoiNhan`, `email`, `Sdt`, `DiaChi`, `GhiChu`, `TrangThai`, `Id_KhachHang`, `KieuThanhToan`) VALUES
(1, NULL, NULL, '2019-05-25 10:30:58', '2019-05-25 10:30:58', 105.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', 'Giao hàng vào chủ nhật', 0, 2, 1),
(2, NULL, NULL, '2019-05-25 10:34:01', '2019-05-25 10:34:01', 315.00, 'Hoàng Khánh', 'hoang@gmail.com', '12345678910', 'Hà Nội', 'Giao hàng nhanh', 0, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhthuc_thanhtoan`
--

CREATE TABLE `hinhthuc_thanhtoan` (
  `Id_ThanhToan` int(11) NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci,
  `TrangThai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonmua`
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
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `Id_KhachHang` int(11) NOT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgaySinh` timestamp NULL DEFAULT NULL,
  `GioiTinh` tinyint(4) DEFAULT NULL,
  `Sdt` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Avatar` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `TrangThai` int(2) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`Id_KhachHang`, `HoTen`, `NgaySinh`, `GioiTinh`, `Sdt`, `DiaChi`, `Avatar`, `password`, `NgayTao`, `TrangThai`, `email`) VALUES
(2, 'Nguyen A', NULL, NULL, '0389876554', 'hải phòng', '1557927936.jpg', '$2y$10$uYnZ4HtcLlO6IpbvFZWPFOH55fIuoO1SvFWFTp7i2tCiYyEegBXyS', '2019-05-25 08:04:23', NULL, 'nguyenvana@gmail.com'),
(3, 'nguyễnlýggg', NULL, 1, '123_______', 'hnnn', '1558193188.png', '$2y$10$fCpPtm4u3XrflmbmWwiqveIFW7lsaqzbM6MGX2E6QD2OoQQLmfLGu', '2019-05-18 15:57:08', 1, NULL),
(4, 'Khanh Hoang', '2019-05-24 17:00:00', 1, '123456789', 'Ha Noi', NULL, '$2y$10$4zqsy/YWfQGos/OfZAdpMOBoD6/BC2NPoa.pY80OwTRwP/R9p3Zem', '2019-05-25 08:05:47', NULL, 'khanhhoang@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
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
-- Cấu trúc bảng cho bảng `nhanvien`
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
  `NgayTao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TrangThai` int(2) DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Id_NhanVien`, `MaNV`, `HoTen`, `NgaySinh`, `GioiTinh`, `Sdt`, `DiaChi`, `Avatar`, `MatKhau`, `NgayTao`, `TrangThai`, `quyen`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, '$2y$10$WQjLOrtAtTja8MAphzjUNesDI/x8Oaev97gXXHxFA/vBqKza/uAGK', '2019-05-12 09:31:42', 1, 1),
(4, 'admin1', 'Ngocthuy', NULL, NULL, NULL, NULL, NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', '2019-05-12 09:49:55', 1, 2),
(5, 'admin2', 'Nguyễn Thủy', NULL, NULL, NULL, NULL, NULL, '$2y$10$Y3xNHiLcS1jJBVaGJg0Fi.EQOaG/0R9mgx2U554bh7RZ9jk6QyDoy', '2019-05-12 09:51:15', 0, 3),
(6, 'NV001', 'Khánh', NULL, NULL, NULL, NULL, NULL, '$2y$10$4TnaGrQrnvAtRON5B8YOTe8BDXGZj086mPjcAUtZ.aRrLgncWDSH2', '2019-05-22 16:34:26', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
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
  `LuotXem` int(11) DEFAULT NULL,
  `AnhChinh` text COLLATE utf8mb4_unicode_ci,
  `Sp_Hot` int(2) DEFAULT NULL,
  `GiaKhuyenMai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Id_SanPham`, `Id_DanhMucSp`, `MaSP`, `TenSp`, `DonGia`, `SoLuong`, `NgayTao`, `TrangThai`, `LuotXem`, `AnhChinh`, `Sp_Hot`, `GiaKhuyenMai`) VALUES
(1, 7, 'A123', 'Áo dài', 100, 10, '2019-05-24 13:45:56', 1, NULL, '/upload/product/5ce7f594cb419.png', 1, NULL),
(2, 4, 'QD001', 'Quần dài', 200, 10, '2019-05-25 10:33:08', 1, NULL, '/upload/product/5ce919e4b8fbe.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `phone`, `birthday`, `address`, `gender`, `created_at`) VALUES
(1, 'Khánh Hoàng', 'khanh@gmail.com', '$2y$10$WQjLOrtAtTja8MAphzjUNesDI/x8Oaev97gXXHxFA/vBqKza/uAGK', '8q1Azk0J6JrSikokpvMrTltuoa0UbyHeDinrr8an89Qw55f17Htn4I32twic', '3456', NULL, NULL, NULL, NULL),
(2, 'Hoàng Khánh', 'hoang@gmail.com', '$2y$10$bOygcQ213H6PppFPF7qGt.CZHlHsl8coA2QNqg.lxX7klY8CAD.xC', NULL, '12345678910', '2019-05-25', 'Hà Nội', NULL, '2019-05-25 08:56:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `Id_VaiTro` int(11) NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Quyen` int(5) DEFAULT NULL,
  `TrangThai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`Id_VaiTro`, `Ten`, `Quyen`, `TrangThai`) VALUES
(1, 'Admin', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`Id_CTHDBan`) USING BTREE;

--
-- Chỉ mục cho bảng `chitiethoadonmua`
--
ALTER TABLE `chitiethoadonmua`
  ADD PRIMARY KEY (`Id_CTHDMua`) USING BTREE;

--
-- Chỉ mục cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`Id_ChiTietKM`) USING BTREE;

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`Id_DanhGia`) USING BTREE;

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`Id_DanhMucSp`) USING BTREE;

--
-- Chỉ mục cho bảng `doihang`
--
ALTER TABLE `doihang`
  ADD PRIMARY KEY (`Id_DoiTra`) USING BTREE;

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Id_HoaDonBan`) USING BTREE;

--
-- Chỉ mục cho bảng `hinhthuc_thanhtoan`
--
ALTER TABLE `hinhthuc_thanhtoan`
  ADD PRIMARY KEY (`Id_ThanhToan`) USING BTREE;

--
-- Chỉ mục cho bảng `hoadonmua`
--
ALTER TABLE `hoadonmua`
  ADD PRIMARY KEY (`Id_HoaDonMua`) USING BTREE;

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Id_KhachHang`) USING BTREE;

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Id_NCC`) USING BTREE;

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id_NhanVien`) USING BTREE;

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id_SanPham`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`Id_VaiTro`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `Id_CTHDBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chitiethoadonmua`
--
ALTER TABLE `chitiethoadonmua`
  MODIFY `Id_CTHDMua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  MODIFY `Id_ChiTietKM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `Id_DanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `Id_DanhMucSp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `doihang`
--
ALTER TABLE `doihang`
  MODIFY `Id_DoiTra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `Id_HoaDonBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hinhthuc_thanhtoan`
--
ALTER TABLE `hinhthuc_thanhtoan`
  MODIFY `Id_ThanhToan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonmua`
--
ALTER TABLE `hoadonmua`
  MODIFY `Id_HoaDonMua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Id_KhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `Id_NCC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id_NhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `Id_VaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
