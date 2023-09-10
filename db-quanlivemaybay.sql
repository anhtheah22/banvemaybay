-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2023 lúc 02:34 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db-quanlivemaybay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `hoten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `hoten`) VALUES
('bangnghi', '210503', 'Phạm Nguyễn Băng Nghi'),
('hoanganh', 'zxcvbn', 'Lê Hoàng Anh'),
('tanphat', '741852', 'Nguyễn Tấn Phát');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_info`
--

CREATE TABLE `booking_info` (
  `MaVe` varchar(40) NOT NULL,
  `MaTuyen` varchar(6) NOT NULL,
  `MaChuyenBay` int(10) NOT NULL,
  `HoTen` varchar(40) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(40) NOT NULL,
  `SoDienThoai` varchar(40) NOT NULL,
  `Price` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_info`
--

INSERT INTO `booking_info` (`MaVe`, `MaTuyen`, `MaChuyenBay`, `HoTen`, `NgaySinh`, `Email`, `SoDienThoai`, `Price`) VALUES
('1', '245', 2023042806, 'Lê Hoàng Anh', '2023-07-19', '2154810101@vaa.edu.vn', '0849099786', '20000000'),
('64ae27cab6827', '245', 2023042806, 'Lê Hoàng Anh', '2023-07-19', '2154810101@vaa.edu.vn', '0849099786', '20000000'),
('64ae39d94f61b', '245', 2023042806, 'Lê Hoàng Anh', '2023-07-06', '2154810101@vaa.edu.vn', '0849099786', '20000000'),
('64ae437e768d4', '245', 2023042806, 'Hoang Anh', '2023-07-06', '2154810101@vaa.edu.vn', '0849099786', '20000000'),
('64ae470bbee47', '245', 2023042806, 'Lê Hoàng Anh', '2023-07-20', '2154810101@vaa.edu.vn', '0849099786', '20000000'),
('64ae47a40c53f', '245', 2023042806, 'Hoang Anh', '2023-07-27', 'lehoanganh2142003@gmail.com', '0849099786', '20000000'),
('64ae48bdef2e5', '245', 2023042806, 'Lê Hoàng Anh', '2023-07-21', 'lehoanganh2142003@gmail.com', '0849099786', '20000000'),
('64ae49a566cc1', '245', 2023042806, 'Lê Hoàng Anh', '2023-06-29', 'lehoanganh2142003@gmail.com', '0849099786', '20000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canghangkhong`
--

CREATE TABLE `canghangkhong` (
  `MaCHK` varchar(20) NOT NULL,
  `TenCang` varchar(50) NOT NULL,
  `DiaChi` text NOT NULL,
  `SoDienThoai` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `canghangkhong`
--

INSERT INTO `canghangkhong` (`MaCHK`, `TenCang`, `DiaChi`, `SoDienThoai`) VALUES
('CRX', 'CẢNG HÀNG KHÔNG QUỐC TẾ CAM RANH', 'P.Cam Nghĩa, TP.Cam Ranh, tỉnh Khánh Hòa', '0258 3989 918'),
('DAD', 'CẢNG HÀNG KHÔNG QUỐC TẾ ĐÀ NẴNG', 'Phường Hòa Thuận Tây, Quận Hải Châu,TP.Đà Nẵng', '0236 3823 397'),
('DIN', 'CẢNG HÀNG KHÔNG ĐIỆN BIÊN', 'P.Thanh Trường, TP.Điện Biên Phủ, tỉnh Điện Biên', '0215 3824 411'),
('DLI', 'CẢNG HÀNG KHÔNG LIÊN KHƯƠNG', 'Thị trấn Liên Nghĩa, huyện Đức Trọng, Tỉnh Lâm Đồng.', '0263 3843 373'),
('HAN', 'CẢNG HÀNG KHÔNG QUỐC TẾ NỘI BÀI', 'Xã Phú Minh, huyện Sóc Sơn, TP.Hà Nội', '0243 8865 047'),
('HND', 'TOKYO HANEDA NTERNATIONAL AIRPORT', 'Hanedakuko, Ota City, Tokyo, Japan', '+81 3-5757-8111'),
('ICN', 'INCHEON INTERNATIONAL AIRPORT', 'Gonghang-ro, Jung-gu, Incheon, Korea', '+82 1577-2600'),
('LHR', 'HEATHROW AIRPORT', 'Hounslow TW6, London, England', '+44 844 335 180'),
('ORY', 'PARIS ORLY AIRPORT', '94390 Orly, French', '+3301 4975 1515'),
('PQC', 'CẢNG HÀNG KHÔNG QUỐC TẾ PHÚ QUỐC', 'Xã Dương Tơ, huyện Phú Quốc, tỉnh Kiên Giang', '0297 3987 778'),
('PVG', ' SHANGHAI PUDONG INTERNATIONAL AIRPORT', 'Yingbin Expy, Pudong, Shanghai, Trung Quốc', '+86 21 96990'),
('PXU', 'CẢNG HÀNG KHÔNG PLEIKU', 'P.Thống Nhất, TP.Pleiku, tỉnh Gia Lai', '0269 3825 096'),
('SFO', 'SAN FRANCISCO INTERNATIONAL AIRPORT', 'San Francisco, CA 94128, USA', '+1 650 821 8211'),
('SGN', 'CẢNG HÀNG KHÔNG QUỐC TẾ TÂN SƠN NHẤT', 'Phường 2, Tân Bình, TP.Hồ Chí Minh', '0283 8485 383'),
('SYD', 'SYDNEY INTERNATIONAL AIRPORT', 'Sydney, Mascot, Australia', '+61 2 9667 9111'),
('TBB', 'CẢNG HÀNG KHÔNG TUY HÒA', 'P.Phú Thạnh, TP.Tuy Hòa, tỉnh Phú Yên', '0257 3851 950'),
('TPE', 'TAIWAN TAOYUAN INTERNATIONAL AIRPORT', 'angzhan S Rd, Dayuan District, Taoyuan City, Taiwan', '+886 3 398 3274'),
('UIH', 'CẢNG HÀNG KHÔNG PHÙ CÁT', 'xã Cát Tân, huyện Phù Cát, tỉnh Bình Định', '0256 3822 953'),
('VCS', 'CẢNG HÀNG KHÔNG CÔN ĐẢO', 'Khu dân cư số 1, huyện Côn Đảo, tỉnh Bà Rịa – Vũng Tàu', '0254 6297 981'),
('YYZ', ' TORONTO PEARSON INTERNATIONAL AIRPORT', '6301 Silver Dart Dr, Mississauga, Torono, Canada\r\n', '+41 6247 7678');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDon` int(20) NOT NULL,
  `MaDon` int(20) NOT NULL,
  `TenDichVu` varchar(50) NOT NULL,
  `Gia` double NOT NULL,
  `SoLuong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDon`, `MaDon`, `TenDichVu`, `Gia`, `SoLuong`) VALUES
(1, 1, 'Ký gửi Hàng hóa', 700, 1),
(2, 2, 'Tham quan khoang buồng lái', 100, 1),
(3, 2, 'Ký gửi Hàng hóa', 700, 1),
(4, 2, 'Dịch vụ tiện ích giải trí', 100, 1),
(5, 3, 'Hỗ trợ khách hàng bị khiếm thị', 100, 3),
(6, 4, 'Tham quan khoang buồng lái', 100, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenbay`
--

CREATE TABLE `chuyenbay` (
  `MaChuyenBay` int(10) NOT NULL,
  `MaTuyen` varchar(10) NOT NULL,
  `SoHieuTauBay` varchar(6) NOT NULL,
  `ThoiGianDi` datetime NOT NULL,
  `ThoiGianDen` datetime NOT NULL,
  `Price` decimal(11,0) NOT NULL,
  `TrangThai` varchar(20) NOT NULL,
  `ThoiGian` varchar(20) NOT NULL,
  `SoLuongVe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenbay`
--

INSERT INTO `chuyenbay` (`MaChuyenBay`, `MaTuyen`, `SoHieuTauBay`, `ThoiGianDi`, `ThoiGianDen`, `Price`, `TrangThai`, `ThoiGian`, `SoLuongVe`) VALUES
(266, '844', 'dfgh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '25', '888', '3'),
(888, 'fghj', 'sdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '520', ';kjh', 'cvbn', '8'),
(9996, 'dfghjk', 'e456yu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '41', '58', '85', '9'),
(2023043008, '912', 'BK102', '2023-07-14 12:59:18', '2023-07-14 13:59:18', '12122222', 'Active', '1 hour', '348'),
(2023050506, '2163', 'BK201', '2023-07-14 17:59:18', '2023-07-14 18:59:18', '5635555', 'Acive', '1 Hour', '234'),
(2023060105, '713', 'BK301', '2023-07-16 13:05:23', '2023-07-16 16:05:23', '1243444', 'Active', '1 hour', '348'),
(2023060906, '3754', 'BK303', '2023-07-17 13:05:23', '2023-07-17 14:05:23', '3434343', 'Active', '21hour', '214'),
(2023062104, '9014', 'BK401', '2023-07-16 13:05:23', '2023-07-16 15:05:23', '321313', 'Active', '32 hour', '324'),
(2023070302, '2037', 'BK402', '2023-07-17 13:05:23', '2023-07-17 15:05:23', '244234', 'Acitve', '12', '231'),
(2023071604, '3698', 'BK102', '2023-07-17 13:05:23', '2023-07-17 17:05:23', '321312', 'Active', '1 hour', '213'),
(2023071904, '6125', 'BK501', '2023-07-18 13:05:23', '2023-07-17 15:05:23', '123213', 'Active', '1 hour', '212'),
(2023072503, '3079', 'BK502', '2023-07-18 13:05:23', '2023-07-18 17:05:23', '13313132', 'Active', '21', '223'),
(2023080702, '5012', 'BK101', '2023-07-18 13:05:23', '2023-07-18 15:05:23', '3123123', 'Active', '4', '232'),
(2023082903, '1035', 'BK201', '2023-07-18 13:05:23', '2023-07-18 15:05:23', '4343434', 'Active', '2 hour', '232'),
(2023090207, '397', 'BK202', '2023-07-18 13:05:23', '2023-07-18 13:05:23', '313133', '', '', ''),
(2023092906, '3056', 'BK301', '2023-07-19 13:05:23', '2023-07-19 15:05:23', '3432422', '', '', ''),
(2023101003, '3615', 'BK303', '2023-07-20 15:05:23', '2023-07-20 23:05:23', '23123232', '', '', ''),
(2023102006, '1432', 'BK401', '2023-07-18 13:05:23', '2023-07-18 19:05:23', '341431131', '', '', ''),
(2023110905, '9135', 'BK402', '2023-07-19 13:05:23', '2023-07-11 16:05:23', '341343343', '', '', ''),
(2023112002, '2794', 'BK501', '2023-07-19 13:05:23', '2023-07-19 18:05:23', '413414323', '', '', ''),
(2023121607, '675', 'BK502', '2023-07-22 13:05:23', '2023-07-22 23:05:23', '23432432423', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `MaDichVu` int(10) NOT NULL,
  `TenDichVu` varchar(40) NOT NULL,
  `GiaDichVu` decimal(9,6) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `PhanLoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`MaDichVu`, `TenDichVu`, `GiaDichVu`, `hinhanh`, `PhanLoai`) VALUES
(18001, 'Ký gửi Hàng hóa', '700.000000', 'luggage.jpg', 'Mỗi kiện/mỗi hành khách'),
(18002, 'Tham quan khoang buồng lái', '100.000000', 'buonglai.jpg', 'Mỗi hành khách'),
(18003, 'Nhận thêm phần ăn', '500.000000', 'phanan.jpg\r\n', 'Mỗi phần/mỗi hành khách'),
(18004, 'Thuốc thông dụng và dụng cụ y tế', '300.000000', 'dungcuyte.jpg\r\n', 'Mỗi hành khách'),
(18005, 'Tìm bác sĩ hỗ trợ', '1.000000', 'bacsi.jpg', 'Mỗi hành khách'),
(18006, 'Nước uống', '100.000000', 'nuocuong.jpg', 'Mỗi hành khách'),
(18007, 'Đồ ăn vặt', '50.000000', 'anvat.jpg\r\n', 'Mỗi hành khách'),
(18008, 'Đổi chỗ ngồi', '200.000000', 'ghe.jpg', 'Mỗi hành khách'),
(18009, 'Đồ dùng cá nhân', '300.000000', 'dodungcanhan.jpg', 'Mỗi hành khách'),
(18010, 'Dịch vụ xe lăn', '200.000000', 'xelan.jpg', 'Mỗi hành khách'),
(18011, 'Hỗ trợ khách hàng bị khiếm thị', '100.000000', 'khachhangkhiemthi.jpg', 'Mỗi hành khách'),
(18012, 'Hỗ trợ khách hàng bị khiếm thính', '100.000000', 'khachhangkhiemthinh.jpg', 'Mỗi hành khách'),
(18013, 'Đồ lưu niệm và mua hàng miễn thuế', '150.000000', 'doluuniem.jpg', 'Mỗi hành khách'),
(18014, 'Dịch vụ tiện ích giải trí', '100.000000', 'dichvugiaitri.jpg', 'Mỗi hành khách');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(20) NOT NULL,
  `MaKhachHang` int(20) NOT NULL,
  `NgayDat` date NOT NULL,
  `TongTien` double NOT NULL,
  `TrangThai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaKhachHang`, `NgayDat`, `TongTien`, `TrangThai`) VALUES
(1, 0, '2023-07-02', 700, 'Chưa xử lý'),
(2, 0, '2023-07-02', 900, 'Chưa xử lý'),
(3, 0, '2023-07-02', 300, 'Chưa xử lý'),
(4, 0, '2023-07-02', 600, 'Chưa xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(6) NOT NULL,
  `HoTen` varchar(30) NOT NULL,
  `HangThanhVien` varchar(10) NOT NULL,
  `NgaySinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `HoTen`, `HangThanhVien`, `NgaySinh`) VALUES
(113, 'Nguyễn Đình Phương', 'Kim Cương', '2003-02-02'),
(123, 'Phạm Nguyễn Băng Nghi', 'Kim Cương', '2003-05-21'),
(147, 'Nguyễn Văn A', 'Vàng', '2005-05-19'),
(149, 'Vũ Hải', 'Kim Cương', '2003-06-13'),
(159, 'Phạm Thị D', 'Bạc', '2004-12-04'),
(168, 'Trần Thị L', 'Vàng', '1977-08-16'),
(190, 'Phạm Trần Q', 'Vàng', '1998-01-05'),
(223, 'Trần Văn H', 'Bạc', '1987-05-02'),
(246, 'Nguyễn Phạm Khánh Chi', 'Kim Cương', '2003-01-01'),
(258, 'Lê Thị B', 'Bạc', '1995-11-11'),
(357, 'Lê Văn C', 'Đồng', '1999-07-23'),
(369, 'Huỳnh Võ Nguyên Chương', 'Kim Cương', '2003-10-03'),
(445, 'Phạm Thị M', 'Đồng', '1995-12-30'),
(456, 'Lê Hoàng Anh', 'Kim Cương', '2003-02-14'),
(557, 'Nguyễn Tấn Phát', 'Kim Cương', '2001-11-26'),
(568, 'Đinh Hoàng A', 'Đồng', '1997-09-01'),
(632, 'Phan Hồng P', 'Bạc', '1997-02-18'),
(777, 'Trần Thị N', 'Bạc', '2005-11-10'),
(789, 'Nguyễn Đỗ Bảo Ngọc', 'Kim Cương', '2003-12-13'),
(874, 'Nguyễn Hoàng V', 'Vàng', '1999-10-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihinhbay`
--

CREATE TABLE `loaihinhbay` (
  `MaTheLoai` int(5) NOT NULL,
  `TenTheLoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihinhbay`
--

INSERT INTO `loaihinhbay` (`MaTheLoai`, `TenTheLoai`) VALUES
(1, 'Nội địa'),
(2, 'Quốc tế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatkydatve`
--

CREATE TABLE `nhatkydatve` (
  `MaNhatKyDatVe` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaVe` int(11) NOT NULL,
  `TrangThai` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhatkydatve`
--

INSERT INTO `nhatkydatve` (`MaNhatKyDatVe`, `MaKhachHang`, `MaVe`, `TrangThai`) VALUES
(10011, 113, 21, 'giữ chỗ'),
(10012, 123, 11, 'đã thanh toán'),
(10014, 147, 14, 'chưa thanh toán'),
(10015, 159, 17, 'đã thanh toán'),
(10016, 168, 22, 'đã hủy'),
(10019, 190, 23, 'đã hủy'),
(10022, 223, 25, 'giữ chỗ'),
(10024, 246, 19, 'đã hủy'),
(10025, 258, 15, 'chưa thanh toán'),
(10034, 149, 20, 'đã thanh toán'),
(10035, 357, 18, 'chưa thanh toán'),
(10036, 369, 16, 'đã hủy'),
(10044, 445, 26, 'đã thanh toán'),
(10045, 456, 12, 'đã thanh toán'),
(10055, 557, 24, 'đã thanh toán'),
(10056, 568, 28, 'đã thanh toán'),
(10063, 632, 29, 'giữ chỗ'),
(10077, 777, 30, 'đã thanh toán'),
(10078, 789, 13, 'đã hủy'),
(10087, 874, 27, 'đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatkydichvu`
--

CREATE TABLE `nhatkydichvu` (
  `MaNhatKyDichVu` int(10) NOT NULL,
  `MaNhatKyVe` int(10) NOT NULL,
  `MaDichVu` int(10) NOT NULL,
  `TrangThai` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhatkydichvu`
--

INSERT INTO `nhatkydichvu` (`MaNhatKyDichVu`, `MaNhatKyVe`, `MaDichVu`, `TrangThai`) VALUES
(901, 12, 18001, 'da thanh toan'),
(902, 45, 18002, 'chua thanh toan'),
(903, 78, 18003, 'chưa thanh toán'),
(904, 14, 18004, 'đã thanh toán'),
(905, 25, 18005, 'đã thanh toán'),
(906, 36, 18006, 'chua thanh toan'),
(907, 15, 18007, 'da thanh toan'),
(908, 35, 18008, 'chua thanh toan'),
(909, 24, 18009, 'da thanh toan'),
(910, 14, 18010, 'da thanh toan'),
(911, 11, 18011, 'da thanh toan'),
(912, 16, 18012, 'da thanh toan'),
(913, 19, 18013, 'da thanh toan'),
(914, 55, 18014, 'chua thanh toan'),
(915, 22, 18013, 'da thanh toan'),
(916, 44, 18011, 'da thanh toan'),
(917, 87, 18011, 'chua thanh toan'),
(918, 56, 18007, 'chua thanh toan'),
(919, 63, 18004, 'da thanh toan'),
(920, 77, 18002, 'da thanh toan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `MaOrd` int(40) NOT NULL,
  `MaVe` int(40) NOT NULL,
  `MaDichVu` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`MaOrd`, `MaVe`, `MaDichVu`) VALUES
(1, 64, 0),
(2, 64, 0),
(3, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taubay`
--

CREATE TABLE `taubay` (
  `SoHieuTauBay` varchar(6) NOT NULL,
  `TenTauBay` varchar(30) NOT NULL,
  `SoLuongGhe` int(3) NOT NULL,
  `SoLuongGheThuongGia` int(2) NOT NULL,
  `SoLuongGhePhoThong` int(3) NOT NULL,
  `TrangThai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taubay`
--

INSERT INTO `taubay` (`SoHieuTauBay`, `TenTauBay`, `SoLuongGhe`, `SoLuongGheThuongGia`, `SoLuongGhePhoThong`, `TrangThai`) VALUES
('BK101', 'Boeing 787-9 Dreamliner', 250, 30, 220, 0),
('BK102', 'Airbus A321-200', 348, 35, 313, 1),
('BK201', 'Boeing 787-9 Dreamliner', 250, 30, 220, 1),
('BK202', 'Airbus A330-200', 247, 28, 219, 0),
('BK301', 'Airbus A321-200', 348, 35, 313, 1),
('BK303', 'Boeing 787-9 Dreamliner', 250, 30, 220, 0),
('BK401', 'Airbus A330-200', 247, 28, 219, 1),
('BK402', 'Airbus A330-200', 247, 28, 219, 1),
('BK501', 'Airbus A321-200', 348, 35, 313, 1),
('BK502', 'Boeing 787-9 Dreamliner', 250, 30, 220, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `MaKhachHang` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`MaKhachHang`, `name`, `username`, `email`, `password`) VALUES
(15, 'Nguyễn Tấn Phát', 'tanphat', '', '8181'),
(17, 'Nghi', 'bangnghi', '', '4444'),
(19, 'Chi', 'Liliann', '', '3232');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tongtien`
--

CREATE TABLE `tongtien` (
  `MaThanhToan` int(10) NOT NULL,
  `MaVe` int(10) NOT NULL,
  `MaDichVu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tongtien`
--

INSERT INTO `tongtien` (`MaThanhToan`, `MaVe`, `MaDichVu`) VALUES
(10012, 11, 18001),
(10013, 12, 18012),
(10014, 13, 18008),
(10015, 14, 18004),
(10016, 15, 18014),
(10017, 16, 18011),
(10018, 17, 18011),
(10019, 18, 18008),
(10020, 19, 18006),
(10021, 20, 18013),
(10022, 21, 18010),
(10023, 22, 18009),
(10024, 23, 18002),
(10025, 24, 18004),
(10026, 25, 18013),
(10027, 26, 18015),
(10028, 27, 18007),
(10029, 28, 18001),
(10030, 29, 18015),
(10031, 30, 18009);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyenbay`
--

CREATE TABLE `tuyenbay` (
  `MaTuyen` int(6) NOT NULL,
  `MaCHKDen` varchar(5) NOT NULL,
  `MaCHKDi` varchar(5) NOT NULL,
  `KhoangCach` text NOT NULL,
  `Loai` varchar(10) NOT NULL,
  `Images` varchar(50) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyenbay`
--

INSERT INTO `tuyenbay` (`MaTuyen`, `MaCHKDen`, `MaCHKDi`, `KhoangCach`, `Loai`, `Images`, `MoTa`) VALUES
(675, 'BER', 'ORY', '884km', 'Quốc tế', 'Berlin (BER).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...'),
(713, 'CRX', 'PQC', '607km', 'Nội địa', 'Khánh Hòa (CRX).jpg', 'Đang thực hiện ...'),
(912, 'SGN', 'DAD', '608km', 'Nội địa', 'Thành phố Hồ Chí Minh (SGN).jpg', 'Đang thực hiện ...'),
(1035, 'SYD', 'TPE', '7267km', 'Quốc tế', 'Sydney (SYD).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...'),
(1432, 'PVG', 'YYZ', '11400km', 'Quốc tế', 'Shanghai (PVG).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...'),
(1635, 'DAD', 'DLI', '482km', 'Nội địa', 'Đà Nẵng (DAD).jpg', 'Đang thực hiện ...'),
(2037, 'TBB', 'UIH', '106km', 'Nội địa', 'Phú Yên (TBB).jpg', 'Đang thực hiện ...'),
(2163, 'DLI', 'CRX', '100km', 'Nội địa', 'Đà Lạt - Lâm Đồng (DLI).jpg', 'Đang thực hiện ...'),
(2794, 'SFO', 'BER', '6482km', 'Quốc tế', 'San Francisco (SFO).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...'),
(3056, 'ICN', 'HND', '1204km', 'Quốc tế', 'Korea (ICN).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...'),
(3079, 'PXU', 'BMV', '150km', 'Nội địa', 'Pleiku (PXU).jpg', 'Đang thực hiện ...'),
(3615, 'HND', 'PVG', '1738km', 'Quốc tế', 'Tokyo (HND).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...'),
(3698, 'VCS', 'SYD', '6677km', 'Quốc tế', 'Côn Đảo (VCS).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...'),
(3754, 'PQC', 'DIN', '1253km', 'Nội địa', 'Phú Quốc (PQC).jpg', 'Đang thực hiện ...'),
(5012, 'BMV', 'VCS', '467km', 'Nội địa', 'Buôn Ma Thuộc.jpg', 'Đang thực hiện ...'),
(6125, 'UIH', 'PXU', '113km', 'Nội địa', 'Quy Nhơn - Bình Định (UIH).jpg', 'Đang thực hiện ...'),
(9014, 'DIN', 'TBB', '1148km', 'Nội địa', 'Điện Biên Phủ (DIN).jpg', 'Đang thực hiện ...'),
(9135, 'YYZ', 'SFO', '3647km', 'Quốc tế', 'Canada (YYZ).jpg', 'Hãy bay cùng chúng tôi! Bạn sẽ có một trải nghiệm tuyệt vời...');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`MaVe`);

--
-- Chỉ mục cho bảng `canghangkhong`
--
ALTER TABLE `canghangkhong`
  ADD PRIMARY KEY (`MaCHK`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDon`);

--
-- Chỉ mục cho bảng `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD PRIMARY KEY (`MaChuyenBay`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MaDichVu`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `loaihinhbay`
--
ALTER TABLE `loaihinhbay`
  ADD PRIMARY KEY (`MaTheLoai`);

--
-- Chỉ mục cho bảng `nhatkydatve`
--
ALTER TABLE `nhatkydatve`
  ADD PRIMARY KEY (`MaNhatKyDatVe`);

--
-- Chỉ mục cho bảng `nhatkydichvu`
--
ALTER TABLE `nhatkydichvu`
  ADD PRIMARY KEY (`MaNhatKyDichVu`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`MaOrd`);

--
-- Chỉ mục cho bảng `taubay`
--
ALTER TABLE `taubay`
  ADD PRIMARY KEY (`SoHieuTauBay`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `tongtien`
--
ALTER TABLE `tongtien`
  ADD PRIMARY KEY (`MaThanhToan`);

--
-- Chỉ mục cho bảng `tuyenbay`
--
ALTER TABLE `tuyenbay`
  ADD PRIMARY KEY (`MaTuyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chuyenbay`
--
ALTER TABLE `chuyenbay`
  MODIFY `MaChuyenBay` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023121608;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `MaDichVu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18015;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=875;

--
-- AUTO_INCREMENT cho bảng `loaihinhbay`
--
ALTER TABLE `loaihinhbay`
  MODIFY `MaTheLoai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhatkydatve`
--
ALTER TABLE `nhatkydatve`
  MODIFY `MaNhatKyDatVe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10088;

--
-- AUTO_INCREMENT cho bảng `nhatkydichvu`
--
ALTER TABLE `nhatkydichvu`
  MODIFY `MaNhatKyDichVu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=921;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `MaOrd` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tongtien`
--
ALTER TABLE `tongtien`
  MODIFY `MaThanhToan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10032;

--
-- AUTO_INCREMENT cho bảng `tuyenbay`
--
ALTER TABLE `tuyenbay`
  MODIFY `MaTuyen` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
