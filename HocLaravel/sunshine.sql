-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 01, 2018 lúc 07:56 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sunshine`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `dh_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `ctdh_soLuong` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `ctdh_donGia` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnhap`
--

CREATE TABLE `chitietnhap` (
  `pn_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `ctn_soLuong` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `ctn_donGia` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

CREATE TABLE `chude` (
  `cd_ma` tinyint(3) UNSIGNED NOT NULL,
  `cd_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cd_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude_sanpham`
--

CREATE TABLE `chude_sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `cd_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `dh_ma` bigint(20) UNSIGNED NOT NULL,
  `kh_ma` bigint(20) UNSIGNED NOT NULL,
  `dh_thoiGianDatHang` datetime NOT NULL,
  `dh_thoiGianNhanHang` datetime NOT NULL,
  `dh_nguoiNhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dh_diaChi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dh_dienThoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `dh_nguoiGui` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dh_loiChuc` text COLLATE utf8_unicode_ci,
  `dh_daThanhToan` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `nv_xuLy` smallint(5) UNSIGNED NOT NULL,
  `dh_ngayXuLy` datetime DEFAULT NULL,
  `nv_giaoHang` smallint(5) UNSIGNED NOT NULL,
  `dh_ngayLapPhieuGiao` datetime DEFAULT NULL,
  `dh_ngayGiaoHang` datetime DEFAULT NULL,
  `dh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `vc_ma` tinyint(3) UNSIGNED NOT NULL,
  `tt_ma` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopy`
--

CREATE TABLE `gopy` (
  `gy_ma` bigint(20) UNSIGNED NOT NULL,
  `gy_thoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gy_noiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `kh_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `gy_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `ha_stt` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `ha_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonle`
--

CREATE TABLE `hoadonle` (
  `hdl_ma` bigint(20) UNSIGNED NOT NULL,
  `hdl_nguoiMuaHang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hdl_dienthoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `hdl_diaChi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nv_lapHoaDon` smallint(5) UNSIGNED NOT NULL,
  `hdl_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_ma` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonsi`
--

CREATE TABLE `hoadonsi` (
  `hds_ma` bigint(20) UNSIGNED NOT NULL,
  `hds_nguoiMuaHang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hds_tenDonVi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hsd_diaChi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hds_maSoThue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hds_soTaiKhoan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nv_lapHoaDon` smallint(5) UNSIGNED NOT NULL,
  `hds_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hds_thuTruong` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `hds_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hds_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hds_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `dh_ma` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `tt_ma` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_ma` bigint(20) UNSIGNED NOT NULL,
  `kh_taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kh_matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kh_hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kh_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `kh_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kh_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kh_diaChi` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_dienThoai` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kh_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `km_ma` bigint(20) UNSIGNED NOT NULL,
  `km_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `km_noiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `km_batDau` datetime NOT NULL,
  `km_ketThuc` datetime DEFAULT NULL,
  `km_giaTri` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '100;100',
  `nv_nguoilap` smallint(6) UNSIGNED NOT NULL,
  `km_ngayLap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_kyNhay` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `km_ngayKyNhay` datetime DEFAULT NULL,
  `nv_kyDuyet` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `km_ngayDuyet` datetime DEFAULT NULL,
  `km_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `km_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `km_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai_sanpham`
--

CREATE TABLE `khuyenmai_sanpham` (
  `km_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `kmsp_giaTri` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '100;0',
  `kmsp_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `l_ma` tinyint(3) UNSIGNED NOT NULL,
  `l_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `l_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_trangThai` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `m_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sanpham`
--

CREATE TABLE `mau_sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `msp_soLuong` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ncc_ma` smallint(6) UNSIGNED NOT NULL,
  `ncc_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ncc_daiDien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ncc_diaChi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ncc_dienThoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `ncc_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ncc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ncc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ncc_trangThai` tinyint(4) UNSIGNED NOT NULL,
  `xx_ma` smallint(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nv_ma` smallint(6) UNSIGNED NOT NULL,
  `nv_taiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nv_matKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nv_hoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nv_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `nv_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nv_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_diaChi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nv_dienThoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nv_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `q_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `pn_ma` bigint(20) UNSIGNED NOT NULL,
  `pn_nguoiGiao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pn_soHoaDon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pn_ngayXuatHoaDon` datetime NOT NULL,
  `pn_ghiChu` text COLLATE utf8_unicode_ci,
  `nv_nguoiLapPhieu` smallint(5) UNSIGNED NOT NULL,
  `pn_ngayLapPhieu` datetime DEFAULT NULL,
  `nv_keToan` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `pn_ngayXacNhan` datetime DEFAULT NULL,
  `pn_thuKho` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `pn_ngayNhapKho` datetime DEFAULT NULL,
  `pn_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pn_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pn_trangThai` tinyint(4) NOT NULL DEFAULT '2',
  `ncc_ma` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `q_ma` tinyint(3) UNSIGNED NOT NULL,
  `q_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `q_dienDai` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `q_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `q_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sp_giaGoc` int(10) UNSIGNED NOT NULL,
  `sp_giaBan` int(10) UNSIGNED NOT NULL,
  `sp_hinh` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sp_thongTin` text COLLATE utf8_unicode_ci NOT NULL,
  `so_danhGia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sp_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sp_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sp_trangThai` int(11) NOT NULL DEFAULT '2',
  `l_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `tt_ma` smallint(5) UNSIGNED NOT NULL,
  `tt_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tt_dienGiai` text COLLATE utf8_unicode_ci NOT NULL,
  `tt_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tt_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tt_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `vc_ma` tinyint(3) UNSIGNED NOT NULL,
  `vc_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vc_chiPhi` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `vc_diaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `vc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vc_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatxu`
--

CREATE TABLE `xuatxu` (
  `xx_ma` smallint(6) UNSIGNED NOT NULL,
  `xx_ten` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `xx_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xx_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xx_trangThai` tinyint(4) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `dh_ma` (`dh_ma`),
  ADD KEY `sp_ma` (`sp_ma`),
  ADD KEY `m_ma` (`m_ma`);

--
-- Chỉ mục cho bảng `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD KEY `pn_ma_fk` (`pn_ma`),
  ADD KEY `ctn_sp_ma_fk` (`sp_ma`),
  ADD KEY `ctn_m_ma_fk` (`m_ma`);

--
-- Chỉ mục cho bảng `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`cd_ma`),
  ADD UNIQUE KEY `cd_ten` (`cd_ten`);

--
-- Chỉ mục cho bảng `chude_sanpham`
--
ALTER TABLE `chude_sanpham`
  ADD KEY `cdsp_sp_ma_fk` (`sp_ma`),
  ADD KEY `cdsp_cd_ma_fk` (`cd_ma`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`dh_ma`),
  ADD KEY `kh_ma` (`kh_ma`),
  ADD KEY `nv_xuLy` (`nv_xuLy`),
  ADD KEY `nv_giaoHang` (`nv_giaoHang`),
  ADD KEY `vc_ma` (`vc_ma`),
  ADD KEY `tt_ma` (`tt_ma`);

--
-- Chỉ mục cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`gy_ma`),
  ADD KEY `gy_kh_ma_fk` (`kh_ma`),
  ADD KEY `gy_sp_ma_fk` (`sp_ma`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD KEY `sp_ma_fk` (`sp_ma`);

--
-- Chỉ mục cho bảng `hoadonle`
--
ALTER TABLE `hoadonle`
  ADD PRIMARY KEY (`hdl_ma`),
  ADD KEY `nv_lapHoaDon` (`nv_lapHoaDon`),
  ADD KEY `dh_ma` (`dh_ma`);

--
-- Chỉ mục cho bảng `hoadonsi`
--
ALTER TABLE `hoadonsi`
  ADD PRIMARY KEY (`hds_ma`),
  ADD KEY `nv_lapHoaDon` (`nv_lapHoaDon`),
  ADD KEY `hds_thuTruong` (`hds_thuTruong`),
  ADD KEY `dh_ma` (`dh_ma`),
  ADD KEY `tt_ma` (`tt_ma`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_ma`),
  ADD UNIQUE KEY `kh_taikhoan` (`kh_taikhoan`),
  ADD UNIQUE KEY `kh_email` (`kh_email`),
  ADD UNIQUE KEY `kh_dienThoai` (`kh_dienThoai`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`km_ma`),
  ADD KEY `nv_nguoilap_fk` (`nv_nguoilap`),
  ADD KEY `nv_kynhay_fk` (`nv_kyNhay`),
  ADD KEY `nv_kyduyet_fk` (`nv_kyDuyet`);

--
-- Chỉ mục cho bảng `khuyenmai_sanpham`
--
ALTER TABLE `khuyenmai_sanpham`
  ADD PRIMARY KEY (`km_ma`),
  ADD KEY `kmsp_sp_ma_fk` (`sp_ma`),
  ADD KEY `kmsp_m_ma_fk` (`m_ma`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`l_ma`),
  ADD UNIQUE KEY `l_ten` (`l_ten`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`m_ma`),
  ADD UNIQUE KEY `m_ten` (`m_ten`);

--
-- Chỉ mục cho bảng `mau_sanpham`
--
ALTER TABLE `mau_sanpham`
  ADD KEY `msp_sp_ma_fk` (`sp_ma`),
  ADD KEY `msp_m_ma_fk` (`m_ma`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ncc_ma`),
  ADD UNIQUE KEY `ncc_ten` (`ncc_ten`),
  ADD KEY `xx_ma_fk` (`xx_ma`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_ma`),
  ADD UNIQUE KEY `nv_taiKhoan` (`nv_taiKhoan`),
  ADD KEY `q_ma_fk` (`q_ma`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`pn_ma`),
  ADD UNIQUE KEY `pn_soHoaDon` (`pn_soHoaDon`),
  ADD KEY `ncc_ma_pk` (`ncc_ma`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`q_ma`),
  ADD UNIQUE KEY `q_ten` (`q_ten`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_ma`),
  ADD KEY `l_ma_fk` (`l_ma`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`tt_ma`),
  ADD UNIQUE KEY `tt_ten` (`tt_ten`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`vc_ma`),
  ADD UNIQUE KEY `vc_ten` (`vc_ten`);

--
-- Chỉ mục cho bảng `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`xx_ma`),
  ADD UNIQUE KEY `xx_ten` (`xx_ten`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chude`
--
ALTER TABLE `chude`
  MODIFY `cd_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `dh_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gopy`
--
ALTER TABLE `gopy`
  MODIFY `gy_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonle`
--
ALTER TABLE `hoadonle`
  MODIFY `hdl_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonsi`
--
ALTER TABLE `hoadonsi`
  MODIFY `hds_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `kh_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `km_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai_sanpham`
--
ALTER TABLE `khuyenmai_sanpham`
  MODIFY `km_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `l_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mau`
--
ALTER TABLE `mau`
  MODIFY `m_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ncc_ma` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_ma` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `pn_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `q_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `tt_ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  MODIFY `vc_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `xx_ma` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`),
  ADD CONSTRAINT `chitietdonhang_ibfk_3` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`);

--
-- Các ràng buộc cho bảng `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD CONSTRAINT `ctn_m_ma_fk` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`),
  ADD CONSTRAINT `ctn_sp_ma_fk` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`),
  ADD CONSTRAINT `pn_ma_fk` FOREIGN KEY (`pn_ma`) REFERENCES `phieunhap` (`pn_ma`);

--
-- Các ràng buộc cho bảng `chude_sanpham`
--
ALTER TABLE `chude_sanpham`
  ADD CONSTRAINT `cdsp_cd_ma_fk` FOREIGN KEY (`cd_ma`) REFERENCES `chude` (`cd_ma`),
  ADD CONSTRAINT `cdsp_sp_ma_fk` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`kh_ma`) REFERENCES `khachhang` (`kh_ma`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`nv_xuLy`) REFERENCES `nhanvien` (`nv_ma`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`nv_giaoHang`) REFERENCES `nhanvien` (`nv_ma`),
  ADD CONSTRAINT `donhang_ibfk_4` FOREIGN KEY (`vc_ma`) REFERENCES `vanchuyen` (`vc_ma`),
  ADD CONSTRAINT `donhang_ibfk_5` FOREIGN KEY (`tt_ma`) REFERENCES `thanhtoan` (`tt_ma`);

--
-- Các ràng buộc cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `gy_kh_ma_fk` FOREIGN KEY (`kh_ma`) REFERENCES `khachhang` (`kh_ma`),
  ADD CONSTRAINT `gy_sp_ma_fk` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `sp_ma_fk` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`);

--
-- Các ràng buộc cho bảng `hoadonle`
--
ALTER TABLE `hoadonle`
  ADD CONSTRAINT `hoadonle_ibfk_1` FOREIGN KEY (`nv_lapHoaDon`) REFERENCES `nhanvien` (`nv_ma`),
  ADD CONSTRAINT `hoadonle_ibfk_2` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`);

--
-- Các ràng buộc cho bảng `hoadonsi`
--
ALTER TABLE `hoadonsi`
  ADD CONSTRAINT `hoadonsi_ibfk_1` FOREIGN KEY (`nv_lapHoaDon`) REFERENCES `nhanvien` (`nv_ma`),
  ADD CONSTRAINT `hoadonsi_ibfk_2` FOREIGN KEY (`hds_thuTruong`) REFERENCES `nhanvien` (`nv_ma`),
  ADD CONSTRAINT `hoadonsi_ibfk_3` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`),
  ADD CONSTRAINT `hoadonsi_ibfk_4` FOREIGN KEY (`tt_ma`) REFERENCES `thanhtoan` (`tt_ma`);

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `nv_kyduyet_fk` FOREIGN KEY (`nv_kyDuyet`) REFERENCES `nhanvien` (`nv_ma`),
  ADD CONSTRAINT `nv_kynhay_fk` FOREIGN KEY (`nv_kyNhay`) REFERENCES `nhanvien` (`nv_ma`),
  ADD CONSTRAINT `nv_nguoilap_fk` FOREIGN KEY (`nv_nguoilap`) REFERENCES `nhanvien` (`nv_ma`);

--
-- Các ràng buộc cho bảng `khuyenmai_sanpham`
--
ALTER TABLE `khuyenmai_sanpham`
  ADD CONSTRAINT `km_ma_fk` FOREIGN KEY (`km_ma`) REFERENCES `khuyenmai` (`km_ma`),
  ADD CONSTRAINT `kmsp_m_ma_fk` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`),
  ADD CONSTRAINT `kmsp_sp_ma_fk` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`);

--
-- Các ràng buộc cho bảng `mau_sanpham`
--
ALTER TABLE `mau_sanpham`
  ADD CONSTRAINT `msp_m_ma_fk` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`),
  ADD CONSTRAINT `msp_sp_ma_fk` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`);

--
-- Các ràng buộc cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD CONSTRAINT `xx_ma_fk` FOREIGN KEY (`xx_ma`) REFERENCES `xuatxu` (`xx_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `q_ma_fk` FOREIGN KEY (`q_ma`) REFERENCES `quyen` (`q_ma`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `ncc_ma_pk` FOREIGN KEY (`ncc_ma`) REFERENCES `nhacungcap` (`ncc_ma`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `l_ma_fk` FOREIGN KEY (`l_ma`) REFERENCES `loai` (`l_ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
