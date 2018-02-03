-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 03, 2018 lúc 05:57 AM
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
-- Cơ sở dữ liệu: `mydb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `dh_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `ctdh_soluong` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `ctdh_donGia` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

CREATE TABLE `chude` (
  `cd_ma` tinyint(3) UNSIGNED NOT NULL,
  `cd_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cd_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude_sanpham`
--

CREATE TABLE `chude_sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `cd_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `dh_ma` bigint(20) UNSIGNED NOT NULL,
  `kh_ma` bigint(20) UNSIGNED NOT NULL,
  `dh_thoiGianDatHang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_thoiGianNhan` datetime NOT NULL,
  `dh_nguoiNhan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_dienThoai` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_nguoiGui` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_loiChuc` text COLLATE utf8mb4_unicode_ci,
  `dh_daThanhToan` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `nv_xuly` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `dh_ngayXuLy` datetime DEFAULT NULL,
  `nv_giaoHang` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `dh_ngayLapPhieuGiao` datetime DEFAULT NULL,
  `dh_ngayGiaoHang` datetime DEFAULT NULL,
  `dh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `vc_ma` tinyint(3) UNSIGNED NOT NULL,
  `tt_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopy`
--

CREATE TABLE `gopy` (
  `gy_ma` bigint(20) UNSIGNED NOT NULL,
  `gy_thoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gy_noiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `gy_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `ha_stt` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `ha_ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonle`
--

CREATE TABLE `hoadonle` (
  `hdl_ma` bigint(20) UNSIGNED NOT NULL,
  `hdl_nguoiMuaHang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hdl_dienThoai` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hdl_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_lapHoaDon` smallint(5) UNSIGNED NOT NULL,
  `hdl_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_ma` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonsi`
--

CREATE TABLE `hoadonsi` (
  `hds_ma` bigint(20) UNSIGNED NOT NULL,
  `hds_nguoiMuaHang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hds_tenDonVi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hds_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hds_maSoThue` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hds_soTaiKhoan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nv_lapHoaDon` smallint(5) UNSIGNED NOT NULL,
  `hds_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_thuTruong` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `hds_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hds_cahdshat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hds_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `dh_ma` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `tt_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_ma` bigint(20) UNSIGNED NOT NULL,
  `kh_taiKhoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_matKhau` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `kh_email;` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kh_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kh_diaThoai` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kh_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `km_ma` bigint(20) UNSIGNED NOT NULL,
  `km_ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km_noiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `km_batDau` datetime NOT NULL,
  `km_ketThuc` datetime DEFAULT NULL,
  `km_giaTri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100;100',
  `nv_nguoiLap` smallint(5) UNSIGNED NOT NULL,
  `km_ngayLap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_kyNhay` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `km_ngayKyNhay` datetime DEFAULT NULL,
  `nv_kyDuyet` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `km_ngayKyDuyet` datetime DEFAULT NULL,
  `km_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `km_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `km_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai_sanpham`
--

CREATE TABLE `khuyenmai_sanpham` (
  `km_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `kmsp_giaTri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100;0',
  `kmsp_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `l_ma` tinyint(3) UNSIGNED NOT NULL,
  `l_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `m_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sanpham`
--

CREATE TABLE `mau_sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `m_ma` tinyint(3) UNSIGNED NOT NULL,
  `msp_soLuong` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_02_02_103104_create_vanchuyen_table', 1),
(2, '2018_02_02_103127_create_thanhtoan_table', 1),
(3, '2018_02_02_103144_create_loai_table', 1),
(4, '2018_02_02_103159_create_khachhang_table', 1),
(5, '2018_02_02_103240_create_xuatxu_table', 1),
(6, '2018_02_02_103252_create_mau_table', 1),
(7, '2018_02_02_103311_create_chude_table', 1),
(8, '2018_02_02_103409_create_quyen_table', 1),
(9, '2018_02_02_103429_create_sanpham_table', 1),
(10, '2018_02_02_103500_create_nhanvien_table', 1),
(11, '2018_02_02_103619_create_nhacungcap_table', 1),
(12, '2018_02_02_103643_create_hinhanh_table', 1),
(13, '2018_02_02_103701_create_donhang_table', 1),
(14, '2018_02_02_103720_create_mau_sanpham_table', 1),
(15, '2018_02_02_103743_create_gopy_table', 1),
(16, '2018_02_02_103808_create_chude_sanpham_table', 1),
(17, '2018_02_02_103835_create_khuyenmai_table', 1),
(18, '2018_02_02_103857_create_phieunhap_table', 1),
(19, '2018_02_02_103946_create_chitietdonhang_table', 1),
(20, '2018_02_02_104006_create_hoadonsi_table', 1),
(21, '2018_02_02_104026_create_hoadonle_table', 1),
(22, '2018_02_02_104101_create_khuyenmai_sanpham_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ncc_ma` smallint(5) UNSIGNED NOT NULL,
  `ncc_ten` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_daiDien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_diaChi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ncc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ncc_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `xx_ma` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nv_ma` smallint(5) UNSIGNED NOT NULL,
  `nv_taiKhoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_matKhau` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `nv_email;` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_diaThoai` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `q_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `pn_ma` bigint(20) UNSIGNED NOT NULL,
  `pn_nguoiGiao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pn_soHoaDon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pn_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pn_ghiChu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_nguoiLapPhieu` smallint(5) UNSIGNED NOT NULL,
  `pn_ngayLapPhieu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nv_keToan` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `pn_ngayXacNhan` datetime DEFAULT NULL,
  `nv_thuKho` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `pn_ngayNhapKho` datetime DEFAULT NULL,
  `pn_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pn_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pn_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `ncc_ma` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `q_ma` tinyint(3) UNSIGNED NOT NULL,
  `q_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_dienGiai` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `q_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `q_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `sp_ten` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_giaGoc` int(10) UNSIGNED NOT NULL,
  `sp_giaBan` int(10) UNSIGNED NOT NULL,
  `sp_hinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_thongTin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_danhGia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sp_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sp_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `l_ma` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `tt_ma` tinyint(3) UNSIGNED NOT NULL,
  `tt_ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tt_dienGiai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tt_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tt_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tt_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `vc_ma` tinyint(3) UNSIGNED NOT NULL,
  `vc_ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vc_chiPhi` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `vc_dienGiai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vc_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatxu`
--

CREATE TABLE `xuatxu` (
  `xx_ma` smallint(5) UNSIGNED NOT NULL,
  `xx_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xx_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xx_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xx_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `chitietdonhang_dh_ma_foreign` (`dh_ma`),
  ADD KEY `chitietdonhang_sp_ma_foreign` (`sp_ma`),
  ADD KEY `chitietdonhang_m_ma_foreign` (`m_ma`);

--
-- Chỉ mục cho bảng `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`cd_ma`),
  ADD UNIQUE KEY `chude_cd_ten_unique` (`cd_ten`);

--
-- Chỉ mục cho bảng `chude_sanpham`
--
ALTER TABLE `chude_sanpham`
  ADD KEY `chude_sanpham_cd_ma_foreign` (`cd_ma`),
  ADD KEY `chude_sanpham_sp_ma_foreign` (`sp_ma`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`dh_ma`),
  ADD KEY `donhang_kh_ma_foreign` (`kh_ma`),
  ADD KEY `donhang_nv_xuly_foreign` (`nv_xuly`),
  ADD KEY `donhang_nv_giaohang_foreign` (`nv_giaoHang`),
  ADD KEY `donhang_vc_ma_foreign` (`vc_ma`),
  ADD KEY `donhang_tt_ma_foreign` (`tt_ma`);

--
-- Chỉ mục cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`gy_ma`),
  ADD KEY `gopy_kh_ma_foreign` (`kh_ma`),
  ADD KEY `gopy_sp_ma_foreign` (`sp_ma`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD KEY `hinhanh_sp_ma_foreign` (`sp_ma`);

--
-- Chỉ mục cho bảng `hoadonle`
--
ALTER TABLE `hoadonle`
  ADD PRIMARY KEY (`hdl_ma`),
  ADD KEY `hoadonle_nv_laphoadon_foreign` (`nv_lapHoaDon`),
  ADD KEY `hoadonle_dh_ma_foreign` (`dh_ma`);

--
-- Chỉ mục cho bảng `hoadonsi`
--
ALTER TABLE `hoadonsi`
  ADD PRIMARY KEY (`hds_ma`),
  ADD KEY `hoadonsi_nv_laphoadon_foreign` (`nv_lapHoaDon`),
  ADD KEY `hoadonsi_nv_thutruong_foreign` (`nv_thuTruong`),
  ADD KEY `hoadonsi_dh_ma_foreign` (`dh_ma`),
  ADD KEY `hoadonsi_tt_ma_foreign` (`tt_ma`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_ma`),
  ADD UNIQUE KEY `khachhang_kh_taikhoan_unique` (`kh_taiKhoan`),
  ADD UNIQUE KEY `khachhang_kh_email;_unique` (`kh_email;`),
  ADD UNIQUE KEY `khachhang_kh_diathoai_unique` (`kh_diaThoai`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`km_ma`),
  ADD KEY `khuyenmai_nv_nguoilap_foreign` (`nv_nguoiLap`),
  ADD KEY `khuyenmai_nv_kynhay_foreign` (`nv_kyNhay`),
  ADD KEY `khuyenmai_nv_kyduyet_foreign` (`nv_kyDuyet`);

--
-- Chỉ mục cho bảng `khuyenmai_sanpham`
--
ALTER TABLE `khuyenmai_sanpham`
  ADD KEY `khuyenmai_sanpham_km_ma_foreign` (`km_ma`),
  ADD KEY `khuyenmai_sanpham_sp_ma_foreign` (`sp_ma`),
  ADD KEY `khuyenmai_sanpham_m_ma_foreign` (`m_ma`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`l_ma`),
  ADD UNIQUE KEY `loai_l_ten_unique` (`l_ten`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`m_ma`),
  ADD UNIQUE KEY `mau_m_ten_unique` (`m_ten`);

--
-- Chỉ mục cho bảng `mau_sanpham`
--
ALTER TABLE `mau_sanpham`
  ADD KEY `mau_sanpham_sp_ma_foreign` (`sp_ma`),
  ADD KEY `mau_sanpham_m_ma_foreign` (`m_ma`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ncc_ma`),
  ADD UNIQUE KEY `nhacungcap_ncc_ten_unique` (`ncc_ten`),
  ADD KEY `nhacungcap_xx_ma_foreign` (`xx_ma`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_ma`),
  ADD UNIQUE KEY `nhanvien_nv_taikhoan_unique` (`nv_taiKhoan`),
  ADD UNIQUE KEY `nhanvien_nv_email;_unique` (`nv_email;`),
  ADD UNIQUE KEY `nhanvien_nv_diathoai_unique` (`nv_diaThoai`),
  ADD KEY `nhanvien_q_ma_foreign` (`q_ma`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`pn_ma`),
  ADD KEY `phieunhap_nv_nguoilapphieu_foreign` (`nv_nguoiLapPhieu`),
  ADD KEY `phieunhap_nv_ketoan_foreign` (`nv_keToan`),
  ADD KEY `phieunhap_nv_thukho_foreign` (`nv_thuKho`),
  ADD KEY `phieunhap_ncc_ma_foreign` (`ncc_ma`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`q_ma`),
  ADD UNIQUE KEY `quyen_q_ten_unique` (`q_ten`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_ma`),
  ADD UNIQUE KEY `sanpham_sp_ten_unique` (`sp_ten`),
  ADD KEY `sanpham_l_ma_foreign` (`l_ma`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`tt_ma`),
  ADD UNIQUE KEY `thanhtoan_tt_ten_unique` (`tt_ten`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`vc_ma`),
  ADD UNIQUE KEY `vanchuyen_vc_ten_unique` (`vc_ten`);

--
-- Chỉ mục cho bảng `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`xx_ma`),
  ADD UNIQUE KEY `xuatxu_xx_ten_unique` (`xx_ten`);

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
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ncc_ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `tt_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  MODIFY `vc_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `xx_ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chude_sanpham`
--
ALTER TABLE `chude_sanpham`
  ADD CONSTRAINT `chude_sanpham_cd_ma_foreign` FOREIGN KEY (`cd_ma`) REFERENCES `chude` (`cd_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chude_sanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_kh_ma_foreign` FOREIGN KEY (`kh_ma`) REFERENCES `khachhang` (`kh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_nv_giaohang_foreign` FOREIGN KEY (`nv_giaoHang`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_nv_xuly_foreign` FOREIGN KEY (`nv_xuly`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_tt_ma_foreign` FOREIGN KEY (`tt_ma`) REFERENCES `thanhtoan` (`tt_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_vc_ma_foreign` FOREIGN KEY (`vc_ma`) REFERENCES `vanchuyen` (`vc_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `gopy_kh_ma_foreign` FOREIGN KEY (`kh_ma`) REFERENCES `khachhang` (`kh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gopy_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonle`
--
ALTER TABLE `hoadonle`
  ADD CONSTRAINT `hoadonle_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonle_nv_laphoadon_foreign` FOREIGN KEY (`nv_lapHoaDon`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonsi`
--
ALTER TABLE `hoadonsi`
  ADD CONSTRAINT `hoadonsi_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonsi_nv_laphoadon_foreign` FOREIGN KEY (`nv_lapHoaDon`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonsi_nv_thutruong_foreign` FOREIGN KEY (`nv_thuTruong`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonsi_tt_ma_foreign` FOREIGN KEY (`tt_ma`) REFERENCES `thanhtoan` (`tt_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_nv_kyduyet_foreign` FOREIGN KEY (`nv_kyDuyet`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khuyenmai_nv_kynhay_foreign` FOREIGN KEY (`nv_kyNhay`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khuyenmai_nv_nguoilap_foreign` FOREIGN KEY (`nv_nguoiLap`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuyenmai_sanpham`
--
ALTER TABLE `khuyenmai_sanpham`
  ADD CONSTRAINT `khuyenmai_sanpham_km_ma_foreign` FOREIGN KEY (`km_ma`) REFERENCES `khuyenmai` (`km_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khuyenmai_sanpham_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khuyenmai_sanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mau_sanpham`
--
ALTER TABLE `mau_sanpham`
  ADD CONSTRAINT `mau_sanpham_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mau_sanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD CONSTRAINT `nhacungcap_xx_ma_foreign` FOREIGN KEY (`xx_ma`) REFERENCES `xuatxu` (`xx_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_q_ma_foreign` FOREIGN KEY (`q_ma`) REFERENCES `quyen` (`q_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ncc_ma_foreign` FOREIGN KEY (`ncc_ma`) REFERENCES `nhacungcap` (`ncc_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_nv_ketoan_foreign` FOREIGN KEY (`nv_keToan`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_nv_nguoilapphieu_foreign` FOREIGN KEY (`nv_nguoiLapPhieu`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_nv_thukho_foreign` FOREIGN KEY (`nv_thuKho`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_l_ma_foreign` FOREIGN KEY (`l_ma`) REFERENCES `loai` (`l_ma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
