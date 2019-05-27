/*
 Navicat Premium Data Transfer

 Source Server         : MY PHP
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : webbanhang

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 19/05/2019 21:19:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for chitiethoadonban
-- ----------------------------
DROP TABLE IF EXISTS `chitiethoadonban`;
CREATE TABLE `chitiethoadonban`  (
  `Id_CTHDBan` int(11) NOT NULL AUTO_INCREMENT,
  `Id_SanPham` int(11) NULL DEFAULT NULL,
  `SoLuong` int(11) NULL DEFAULT NULL,
  `DonGia` float(15, 2) NULL DEFAULT NULL,
  `GiaKm` float(15, 2) NULL DEFAULT NULL,
  `TenSp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Id_HoaDonBan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_CTHDBan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chitiethoadonmua
-- ----------------------------
DROP TABLE IF EXISTS `chitiethoadonmua`;
CREATE TABLE `chitiethoadonmua`  (
  `Id_CTHDMua` int(11) NOT NULL AUTO_INCREMENT,
  `Id_SanPham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `SoLuong` int(11) NULL DEFAULT NULL,
  `DonGia` float(15, 2) NULL DEFAULT NULL,
  `Id_HoaDonMua` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_CTHDMua`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chitietkhuyenmai
-- ----------------------------
DROP TABLE IF EXISTS `chitietkhuyenmai`;
CREATE TABLE `chitietkhuyenmai`  (
  `Id_ChiTietKM` int(11) NOT NULL AUTO_INCREMENT,
  `Id_SanPham` int(11) NULL DEFAULT NULL,
  `Id_KhuyenMai` int(11) NULL DEFAULT NULL,
  `GiaSauKM` float(15, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_ChiTietKM`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for danhgia
-- ----------------------------
DROP TABLE IF EXISTS `danhgia`;
CREATE TABLE `danhgia`  (
  `Id_DanhGia` int(11) NOT NULL AUTO_INCREMENT,
  `Id_SanPham` int(11) NULL DEFAULT NULL,
  `Id_KhachHang` int(11) NULL DEFAULT NULL,
  `Sao` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_DanhGia`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for danhmucsanpham
-- ----------------------------
DROP TABLE IF EXISTS `danhmucsanpham`;
CREATE TABLE `danhmucsanpham`  (
  `Id_DanhMucSp` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `MoTa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Id_NhomSp_Cha` int(11) NULL DEFAULT NULL,
  `TrangThai` int(11) NULL DEFAULT NULL,
  `NgayTao` timestamp(0) NULL DEFAULT NULL,
  `Slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id_DanhMucSp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of danhmucsanpham
-- ----------------------------
INSERT INTO `danhmucsanpham` VALUES (1, 'Quần', 'tất cả các nhóm quần', 1, 1, '2019-05-21 23:17:42', '1');
INSERT INTO `danhmucsanpham` VALUES (2, 'Áo', 'tất cả các áo', 2, 1, '2019-05-22 23:18:04', '2');
INSERT INTO `danhmucsanpham` VALUES (3, 'chân váy', 'tất cả các chân váy', 3, 1, '2019-04-15 23:25:50', '1');

-- ----------------------------
-- Table structure for doihang
-- ----------------------------
DROP TABLE IF EXISTS `doihang`;
CREATE TABLE `doihang`  (
  `Id_DoiTra` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NoiDung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TrangThai` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_DoiTra`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for hinhanh
-- ----------------------------
DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE `hinhanh`  (
  `Id_HinhAnh` int(11) NOT NULL AUTO_INCREMENT,
  `Link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `Id_SanPham` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_HinhAnh`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for hinhthuc_thanhtoan
-- ----------------------------
DROP TABLE IF EXISTS `hinhthuc_thanhtoan`;
CREATE TABLE `hinhthuc_thanhtoan`  (
  `Id_ThanhToan` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NoiDung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `TrangThai` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_ThanhToan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for hoadonban
-- ----------------------------
DROP TABLE IF EXISTS `hoadonban`;
CREATE TABLE `hoadonban`  (
  `Id_HoaDonBan` int(11) NOT NULL,
  `Id_NhanVien` int(11) NULL DEFAULT NULL,
  `Id_DoiHang` int(11) NULL DEFAULT NULL,
  `NgayTao` timestamp(0) NULL DEFAULT NULL,
  `NgayCapNhap` timestamp(0) NULL DEFAULT NULL,
  `TongTien` float(15, 2) NULL DEFAULT NULL,
  `GiaVanChuyen` int(11) NULL DEFAULT NULL,
  `TenNguoiNhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Sdt` int(11) NULL DEFAULT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `GhiChu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `TrangThai` int(5) NULL DEFAULT NULL,
  `NVChuyenHang` int(11) NULL DEFAULT NULL,
  `Id_KhachHang` int(11) NULL DEFAULT NULL,
  `Id_ThanhToan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_HoaDonBan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for hoadonmua
-- ----------------------------
DROP TABLE IF EXISTS `hoadonmua`;
CREATE TABLE `hoadonmua`  (
  `Id_HoaDonMua` int(11) NOT NULL AUTO_INCREMENT,
  `Id_NhaCC` int(11) NULL DEFAULT NULL,
  `NgayTao` timestamp(0) NULL DEFAULT NULL,
  `NgayCapNhap` timestamp(0) NULL DEFAULT NULL,
  `TongTien` float(15, 2) NULL DEFAULT NULL,
  `TrangThai` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_HoaDonMua`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for khachhang
-- ----------------------------
DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang`  (
  `Id_KhachHang` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NgaySinh` timestamp(0) NULL DEFAULT NULL,
  `GioiTinh` tinyint(4) NULL DEFAULT NULL,
  `Sdt` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `MatKhau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NgayTao` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `TrangThai` int(2) NULL DEFAULT NULL,
  `Xu` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_KhachHang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of khachhang
-- ----------------------------
INSERT INTO `khachhang` VALUES (2, 'Nguyen A', NULL, NULL, '0389876554', 'hải phòng', '1557927936.jpg', '$2y$10$uYnZ4HtcLlO6IpbvFZWPFOH55fIuoO1SvFWFTp7i2tCiYyEegBXyS', NULL, NULL, NULL);
INSERT INTO `khachhang` VALUES (3, 'nguyễnlýggg', NULL, 1, '123_______', 'hnnn', '1558193188.png', '$2y$10$fCpPtm4u3XrflmbmWwiqveIFW7lsaqzbM6MGX2E6QD2OoQQLmfLGu', '2019-05-18 22:57:08', 1, NULL);

-- ----------------------------
-- Table structure for khuyenmai
-- ----------------------------
DROP TABLE IF EXISTS `khuyenmai`;
CREATE TABLE `khuyenmai`  (
  `Id_KhuyenMai` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NoiDung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `PhanTramKm` float(15, 2) NULL DEFAULT NULL,
  `TrangThai` int(2) NULL DEFAULT NULL,
  `NgayBatDau` date NULL DEFAULT NULL,
  `NgayKetThuc` date NULL DEFAULT NULL,
  `AnhKm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`Id_KhuyenMai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for nhacungcap
-- ----------------------------
DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE `nhacungcap`  (
  `Id_NCC` int(11) NOT NULL AUTO_INCREMENT,
  `TenNCC` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Sdt` int(11) NULL DEFAULT NULL,
  `Gmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `TrangThai` int(2) NULL DEFAULT NULL,
  `NgayTao` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_NCC`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for nhanvien
-- ----------------------------
DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE `nhanvien`  (
  `Id_NhanVien` int(11) NOT NULL AUTO_INCREMENT,
  `MaNV` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NgaySinh` date NULL DEFAULT NULL,
  `GioiTinh` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Sdt` int(11) NULL DEFAULT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `Avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `MatKhau` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayTao` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `TrangThai` int(2) NULL DEFAULT NULL,
  `quyen` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_NhanVien`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of nhanvien
-- ----------------------------
INSERT INTO `nhanvien` VALUES (1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, '$2y$10$WQjLOrtAtTja8MAphzjUNesDI/x8Oaev97gXXHxFA/vBqKza/uAGK', '2019-05-12 16:31:42', 1, 1);
INSERT INTO `nhanvien` VALUES (4, 'admin1', 'Ngocthuy', NULL, NULL, NULL, NULL, NULL, '$2y$10$CKvZ0WbonlubZxzV6x2jheFB7NV/Gd8TH1jEbCSj0qYZ9N.rUAhKa', '2019-05-12 16:49:55', 1, 2);
INSERT INTO `nhanvien` VALUES (5, 'admin2', 'Nguyễn Thủy', NULL, NULL, NULL, NULL, NULL, '$2y$10$Y3xNHiLcS1jJBVaGJg0Fi.EQOaG/0R9mgx2U554bh7RZ9jk6QyDoy', '2019-05-12 16:51:15', 0, 3);

-- ----------------------------
-- Table structure for sanpham
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham`  (
  `Id_SanPham` int(11) NOT NULL AUTO_INCREMENT,
  `Id_DanhMucSp` int(11) NULL DEFAULT NULL,
  `MaSP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TenSp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DonGia` float(15, 0) NULL DEFAULT NULL,
  `Id_KhuyenMai` int(11) NULL DEFAULT NULL,
  `SoLuong` int(11) NULL DEFAULT NULL,
  `NgayTao` timestamp(0) NULL DEFAULT NULL,
  `TrangThai` int(11) NULL DEFAULT NULL,
  `LuotXem` int(11) NULL DEFAULT NULL,
  `AnhChinh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `Sp_Hot` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_SanPham`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for vaitro
-- ----------------------------
DROP TABLE IF EXISTS `vaitro`;
CREATE TABLE `vaitro`  (
  `Id_VaiTro` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Quyen` int(5) NULL DEFAULT NULL,
  `TrangThai` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_VaiTro`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of vaitro
-- ----------------------------
INSERT INTO `vaitro` VALUES (1, 'Admin', 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
