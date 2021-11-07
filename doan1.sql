-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2021 lúc 01:19 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boxchat`
--

CREATE TABLE `boxchat` (
  `idchat` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `Mess` text NOT NULL,
  `ThoiGian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkymonhoc`
--

CREATE TABLE `dangkymonhoc` (
  `MaDK` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangkymonhoc`
--

INSERT INTO `dangkymonhoc` (`MaDK`, `MaSV`, `MaMonHoc`) VALUES
(2, 15, 17),
(3, 15, 11),
(4, 15, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsadmin`
--

CREATE TABLE `dsadmin` (
  `MaAdmin` int(11) NOT NULL,
  `Password` int(11) NOT NULL,
  `HoTen` text NOT NULL,
  `NgaySinh` date NOT NULL,
  `CMND` text NOT NULL,
  `GioiTinh` text NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` text NOT NULL,
  `Email` text NOT NULL,
  `idloaitk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsadmin`
--

INSERT INTO `dsadmin` (`MaAdmin`, `Password`, `HoTen`, `NgaySinh`, `CMND`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `idloaitk`) VALUES
(1, 123, 'ADMIN CNTT12', '2000-08-11', '19837474', 'Nữ', 'Quy nhon', '0948563434', 'admin@gmail.com', 1),
(4, 1108, 'Minh Tri1', '1111-11-11', '1238183', 'Nam', 'qwewqew', '78451208451', 'asd@gmail.com', 1),
(5, 1108, 'ADMIN2', '2000-08-11', '439498539', 'Nam', 'where', '0123456789', 'crushemtra@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdiem`
--

CREATE TABLE `dsdiem` (
  `iddiem` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `DiemCC` float NOT NULL,
  `DiemGK` float NOT NULL,
  `DiemThi` float NOT NULL,
  `DiemTBMon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsgiaovien`
--

CREATE TABLE `dsgiaovien` (
  `MaGV` int(11) NOT NULL,
  `Password` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `CMND` text NOT NULL,
  `GioiTinh` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` text NOT NULL,
  `Email` text NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `idloaitk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsgiaovien`
--

INSERT INTO `dsgiaovien` (`MaGV`, `Password`, `HoTen`, `NgaySinh`, `CMND`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `MaMonHoc`, `idloaitk`) VALUES
(18, 1108, 'Nguyễn Văn A', '2021-10-16', '46456456', 'Nam', 'Quy Nhơn', '094856364', 'a@gmail.com', 11, 2),
(19, 1108, 'Minh Tri', '2000-08-11', '1837893198', 'Nữ', 'qwewqew', '0369852147', 'aa@gmail.com', 17, 2),
(20, 1108, 'Giảng viên A', '2021-11-03', '123123123', 'Nam', 'Quy nhơn', '0313923333', 'gva@gmail.com', 16, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dskhoa`
--

CREATE TABLE `dskhoa` (
  `MaKhoa` int(11) NOT NULL,
  `TenKhoa` text NOT NULL,
  `DiaChiKhoa` text NOT NULL,
  `SDTKhoa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dskhoa`
--

INSERT INTO `dskhoa` (`MaKhoa`, `TenKhoa`, `DiaChiKhoa`, `SDTKhoa`) VALUES
(1, 'Công nghệ thông tin', 'Văn phòng 1', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dskhoahoc`
--

CREATE TABLE `dskhoahoc` (
  `MaKhoaHoc` int(11) NOT NULL,
  `TenKhoaHoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dskhoahoc`
--

INSERT INTO `dskhoahoc` (`MaKhoaHoc`, `TenKhoaHoc`) VALUES
(1, 'K41'),
(2, 'K42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dslop`
--

CREATE TABLE `dslop` (
  `MaLop` int(11) NOT NULL,
  `TenLop` text NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  `MaKhoaHoc` int(11) NOT NULL,
  `MaHeDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dslop`
--

INSERT INTO `dslop` (`MaLop`, `TenLop`, `MaKhoa`, `MaKhoaHoc`, `MaHeDT`) VALUES
(1, 'Kỹ thuật phầm mềm', 1, 1, 1),
(2, 'Công nghệ thông tin', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsmonhoc`
--

CREATE TABLE `dsmonhoc` (
  `MaMonHoc` int(11) NOT NULL,
  `TenMonHoc` text NOT NULL,
  `HocKi` varchar(11) NOT NULL,
  `SoTinChi` int(11) NOT NULL,
  `LT` int(11) NOT NULL,
  `TH` int(11) NOT NULL,
  `TL` int(11) NOT NULL,
  `TT` int(11) NOT NULL,
  `MaLop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsmonhoc`
--

INSERT INTO `dsmonhoc` (`MaMonHoc`, `TenMonHoc`, `HocKi`, `SoTinChi`, `LT`, `TH`, `TL`, `TT`, `MaLop`) VALUES
(11, 'Đại cương về Tin học', '1', 3, 30, 30, 0, 0, 1),
(12, 'Đại số tuyến tính', '1', 3, 45, 0, 0, 0, 1),
(13, 'Giải tích', '1', 3, 45, 0, 0, 0, 1),
(14, 'Những NLCB của chủ nghĩa Mác-Lênin 1', '1', 2, 20, 0, 20, 0, 1),
(15, 'Thực hành máy tính (lắp ráp, cài đặt, bảo trì)', '1', 1, 0, 30, 0, 0, 1),
(16, 'Tiếng Anh 1', '1', 3, 45, 0, 0, 0, 1),
(17, 'Giáo dục thể chất 1', '1', 1, 4, 26, 0, 0, 1),
(18, 'Giới thiệu ngành và hướng nghiệp', '1', 2, 30, 0, 0, 0, 1),
(19, 'Hệ quản trị cơ sở dữ liệu', '2', 2, 30, 30, 0, 0, 1),
(20, 'Lập trình cơ bản', '2', 2, 45, 30, 0, 0, 1),
(22, 'Những NLCB của chủ nghĩa Mác-Lênin 2', '2', 3, 30, 0, 30, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsphonghoc`
--

CREATE TABLE `dsphonghoc` (
  `idphong` int(11) NOT NULL,
  `SoPhong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsphonghoc`
--

INSERT INTO `dsphonghoc` (`idphong`, `SoPhong`) VALUES
(1, 'A1.101'),
(2, 'A1.102'),
(3, 'A1.103'),
(4, 'A1.104'),
(5, 'A1.105'),
(6, 'A1.106'),
(7, 'A1.107'),
(8, 'A1.108'),
(9, 'A1.109');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dssinhvien`
--

CREATE TABLE `dssinhvien` (
  `MaSV` int(11) NOT NULL,
  `Password` text NOT NULL,
  `HoTen` text NOT NULL,
  `NgaySinh` date NOT NULL,
  `CMND` int(11) NOT NULL,
  `GioiTinh` text NOT NULL,
  `DiaChi` text NOT NULL,
  `SDT` text NOT NULL,
  `Email` text NOT NULL,
  `MaLop` int(11) NOT NULL,
  `idloaitk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dssinhvien`
--

INSERT INTO `dssinhvien` (`MaSV`, `Password`, `HoTen`, `NgaySinh`, `CMND`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `MaLop`, `idloaitk`) VALUES
(10, '1108', 'Sinh viên 3', '2000-08-11', 12345678, 'Nữ', 'Phú Yên', '09373648833', 'sv3@gmail.com', 2, 3),
(11, '1108', 'Sinh Viên 4', '2000-05-01', 12345323, 'Nữ', 'Gia lai', '0337428934', 'sv4@gmail.com', 2, 3),
(14, '1108', 'Sinh viên 9', '2021-10-21', 23463, 'Nam', 'Phú Tài Club', '0123456789', 'asd@gmail.com', 2, 3),
(15, '1108', 'Minh Trí', '2021-10-08', 121334532, 'Nam', 'Phú Tài Club', '0123456789', 'photru154@gmail.com', 1, 3),
(19, '1108', 'Minh Tri', '1999-11-11', 87686876, 'Nam', 'qwewqew', '0369852147', 'photru154@gmail.com', 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dstiethoc`
--

CREATE TABLE `dstiethoc` (
  `idtiethoc` int(11) NOT NULL,
  `TietHoc` varchar(50) NOT NULL,
  `GioHocBD` time NOT NULL,
  `GioHocKT` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dstiethoc`
--

INSERT INTO `dstiethoc` (`idtiethoc`, `TietHoc`, `GioHocBD`, `GioHocKT`) VALUES
(1, 'Tiết 1-2', '07:00:00', '08:40:00'),
(2, 'Tiết 3-5', '09:00:00', '11:30:00'),
(3, 'Tiết 6-7', '13:00:00', '14:40:00'),
(4, 'Tiết 8-10', '15:00:00', '17:30:00'),
(5, 'Tiết 1-5', '07:00:00', '11:30:00'),
(6, 'Tiết 6-10', '13:00:00', '17:30:00'),
(7, 'Tiết 3-4', '09:00:00', '10:40:00'),
(8, 'Tiết 8-9', '15:00:00', '16:40:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hedaotao`
--

CREATE TABLE `hedaotao` (
  `MaHeDT` int(11) NOT NULL,
  `TenHDT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hedaotao`
--

INSERT INTO `hedaotao` (`MaHeDT`, `TenHDT`) VALUES
(1, 'Chính quy'),
(2, 'Không chính quy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `SoTinChi` int(11) NOT NULL,
  `GiaTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocphi`
--

INSERT INTO `hocphi` (`SoTinChi`, `GiaTien`) VALUES
(1, 300000),
(2, 600000),
(3, 900000),
(4, 1200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhoc`
--

CREATE TABLE `lichhoc` (
  `idlichhoc` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `idthu` int(11) NOT NULL,
  `idtiethoc` int(11) NOT NULL,
  `idphong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichhoc`
--

INSERT INTO `lichhoc` (`idlichhoc`, `MaMonHoc`, `idthu`, `idtiethoc`, `idphong`) VALUES
(1, 17, 1, 1, 1),
(4, 11, 5, 7, 9),
(5, 16, 5, 1, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `idloaitk` int(11) NOT NULL,
  `matk` text NOT NULL,
  `tentk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`idloaitk`, `matk`, `tentk`) VALUES
(1, '02021', 'ADMIN'),
(2, '12021', 'Giáo Viên'),
(3, '22021', 'Sinh Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieu`
--

CREATE TABLE `tailieu` (
  `id` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL,
  `Mô Tả` text NOT NULL,
  `File` varchar(255) NOT NULL,
  `ThoiGianFile` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tailieu`
--

INSERT INTO `tailieu` (`id`, `MaGV`, `Mô Tả`, `File`, `ThoiGianFile`) VALUES
(2, 19, 'đây là word', 'ad19a9600cf61c4aee9f77f7e58bc833.docx', '2021-11-02 22:00:58'),
(3, 19, 'gửi em', '618153007fb2e.xlsx', '2021-11-02 22:02:24'),
(4, 19, 'xinchao', 'Array', '2021-11-02 22:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaogv`
--

CREATE TABLE `thongbaogv` (
  `id` int(11) NOT NULL,
  `MaAdmin` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `MaGV` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaosv`
--

CREATE TABLE `thongbaosv` (
  `id` int(11) NOT NULL,
  `MaAdmin` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbaosv`
--

INSERT INTO `thongbaosv` (`id`, `MaAdmin`, `noidung`, `MaSV`, `ThoiGian`, `status`) VALUES
(2, 1, 'Cách tốt nhất để có được thời gian và ngày hiện tại là bằng hàm date trong PHP: $date = date(\'FORMAT\'); // FORMAT E.g.: Y-m-d H:i:s $current_date = date(\'Y-m-d H:i:s\'); Với dấu thời gian Unix: $now_date = date(\'FORMAT\', time()); // FORMAT Eg : Y-m-d H:i:s', 19, '2021-10-24 17:29:46', 1),
(3, 1, 'anh yeu em', 15, '2021-10-24 23:57:32', 1),
(4, 1, 'xin chào moại người, lại là toai đây', 15, '2021-10-25 00:07:32', 1),
(6, 1, 'ghê hông ghê hông', 15, '2021-10-25 00:09:36', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thungay`
--

CREATE TABLE `thungay` (
  `idthu` int(11) NOT NULL,
  `thumay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thungay`
--

INSERT INTO `thungay` (`idthu`, `thumay`) VALUES
(1, 'Thứ 2'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6'),
(6, 'Thứ 7'),
(7, 'Chủ nhật');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `boxchat`
--
ALTER TABLE `boxchat`
  ADD PRIMARY KEY (`idchat`),
  ADD UNIQUE KEY `MaSV` (`MaSV`);

--
-- Chỉ mục cho bảng `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `sv` (`MaSV`),
  ADD KEY `mh` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `dsadmin`
--
ALTER TABLE `dsadmin`
  ADD PRIMARY KEY (`MaAdmin`),
  ADD KEY `idloaitkadmin` (`idloaitk`);

--
-- Chỉ mục cho bảng `dsdiem`
--
ALTER TABLE `dsdiem`
  ADD PRIMARY KEY (`iddiem`),
  ADD KEY `mamondiem` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `dsgiaovien`
--
ALTER TABLE `dsgiaovien`
  ADD PRIMARY KEY (`MaGV`),
  ADD KEY `quyengv` (`idloaitk`),
  ADD KEY `magvmh` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `dskhoa`
--
ALTER TABLE `dskhoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Chỉ mục cho bảng `dskhoahoc`
--
ALTER TABLE `dskhoahoc`
  ADD PRIMARY KEY (`MaKhoaHoc`);

--
-- Chỉ mục cho bảng `dslop`
--
ALTER TABLE `dslop`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `makhoa` (`MaKhoa`),
  ADD KEY `makhoahoc` (`MaKhoaHoc`),
  ADD KEY `mahedt` (`MaHeDT`);

--
-- Chỉ mục cho bảng `dsmonhoc`
--
ALTER TABLE `dsmonhoc`
  ADD PRIMARY KEY (`MaMonHoc`),
  ADD KEY `malop1` (`MaLop`),
  ADD KEY `stc` (`SoTinChi`);

--
-- Chỉ mục cho bảng `dsphonghoc`
--
ALTER TABLE `dsphonghoc`
  ADD PRIMARY KEY (`idphong`);

--
-- Chỉ mục cho bảng `dssinhvien`
--
ALTER TABLE `dssinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `malop` (`MaLop`),
  ADD KEY `quyensv` (`idloaitk`);

--
-- Chỉ mục cho bảng `dstiethoc`
--
ALTER TABLE `dstiethoc`
  ADD PRIMARY KEY (`idtiethoc`);

--
-- Chỉ mục cho bảng `hedaotao`
--
ALTER TABLE `hedaotao`
  ADD PRIMARY KEY (`MaHeDT`);

--
-- Chỉ mục cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`SoTinChi`);

--
-- Chỉ mục cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD PRIMARY KEY (`idlichhoc`),
  ADD KEY `idthu` (`idthu`),
  ADD KEY `idphong` (`idphong`),
  ADD KEY `id` (`idtiethoc`),
  ADD KEY `monhoc` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`idloaitk`);

--
-- Chỉ mục cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magv1` (`MaGV`);

--
-- Chỉ mục cho bảng `thongbaogv`
--
ALTER TABLE `thongbaogv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maadmingv` (`MaAdmin`),
  ADD KEY `maggv` (`MaGV`);

--
-- Chỉ mục cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maadm` (`MaAdmin`),
  ADD KEY `massv` (`MaSV`);

--
-- Chỉ mục cho bảng `thungay`
--
ALTER TABLE `thungay`
  ADD PRIMARY KEY (`idthu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `boxchat`
--
ALTER TABLE `boxchat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  MODIFY `MaDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dsadmin`
--
ALTER TABLE `dsadmin`
  MODIFY `MaAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dsdiem`
--
ALTER TABLE `dsdiem`
  MODIFY `iddiem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dsgiaovien`
--
ALTER TABLE `dsgiaovien`
  MODIFY `MaGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `dskhoa`
--
ALTER TABLE `dskhoa`
  MODIFY `MaKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `dskhoahoc`
--
ALTER TABLE `dskhoahoc`
  MODIFY `MaKhoaHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dslop`
--
ALTER TABLE `dslop`
  MODIFY `MaLop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dsmonhoc`
--
ALTER TABLE `dsmonhoc`
  MODIFY `MaMonHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `dsphonghoc`
--
ALTER TABLE `dsphonghoc`
  MODIFY `idphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dssinhvien`
--
ALTER TABLE `dssinhvien`
  MODIFY `MaSV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `dstiethoc`
--
ALTER TABLE `dstiethoc`
  MODIFY `idtiethoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hedaotao`
--
ALTER TABLE `hedaotao`
  MODIFY `MaHeDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  MODIFY `SoTinChi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  MODIFY `idlichhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `idloaitk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thongbaogv`
--
ALTER TABLE `thongbaogv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thungay`
--
ALTER TABLE `thungay`
  MODIFY `idthu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `boxchat`
--
ALTER TABLE `boxchat`
  ADD CONSTRAINT `FK_BC_MaSV` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  ADD CONSTRAINT `mh` FOREIGN KEY (`MaMonHoc`) REFERENCES `dsmonhoc` (`MaMonHoc`),
  ADD CONSTRAINT `sv` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `dsadmin`
--
ALTER TABLE `dsadmin`
  ADD CONSTRAINT `idloaitkadmin` FOREIGN KEY (`idloaitk`) REFERENCES `quyen` (`idloaitk`);

--
-- Các ràng buộc cho bảng `dsdiem`
--
ALTER TABLE `dsdiem`
  ADD CONSTRAINT `mamondiem` FOREIGN KEY (`MaMonHoc`) REFERENCES `dsmonhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `dsgiaovien`
--
ALTER TABLE `dsgiaovien`
  ADD CONSTRAINT `magvmh` FOREIGN KEY (`MaMonHoc`) REFERENCES `dsmonhoc` (`MaMonHoc`),
  ADD CONSTRAINT `quyengv` FOREIGN KEY (`idloaitk`) REFERENCES `quyen` (`idloaitk`);

--
-- Các ràng buộc cho bảng `dslop`
--
ALTER TABLE `dslop`
  ADD CONSTRAINT `mahedt` FOREIGN KEY (`MaHeDT`) REFERENCES `hedaotao` (`MaHeDT`),
  ADD CONSTRAINT `makhoa` FOREIGN KEY (`MaKhoa`) REFERENCES `dskhoa` (`MaKhoa`),
  ADD CONSTRAINT `makhoahoc` FOREIGN KEY (`MaKhoaHoc`) REFERENCES `dskhoahoc` (`MaKhoaHoc`);

--
-- Các ràng buộc cho bảng `dsmonhoc`
--
ALTER TABLE `dsmonhoc`
  ADD CONSTRAINT `malop1` FOREIGN KEY (`MaLop`) REFERENCES `dslop` (`MaLop`),
  ADD CONSTRAINT `stc` FOREIGN KEY (`SoTinChi`) REFERENCES `hocphi` (`SoTinChi`);

--
-- Các ràng buộc cho bảng `dssinhvien`
--
ALTER TABLE `dssinhvien`
  ADD CONSTRAINT `malop` FOREIGN KEY (`MaLop`) REFERENCES `dslop` (`MaLop`),
  ADD CONSTRAINT `quyensv` FOREIGN KEY (`idloaitk`) REFERENCES `quyen` (`idloaitk`);

--
-- Các ràng buộc cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD CONSTRAINT `id` FOREIGN KEY (`idtiethoc`) REFERENCES `dstiethoc` (`idtiethoc`),
  ADD CONSTRAINT `idphong` FOREIGN KEY (`idphong`) REFERENCES `dsphonghoc` (`idphong`),
  ADD CONSTRAINT `idthu` FOREIGN KEY (`idthu`) REFERENCES `thungay` (`idthu`),
  ADD CONSTRAINT `monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `dsmonhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `magv1` FOREIGN KEY (`MaGV`) REFERENCES `dsgiaovien` (`MaGV`);

--
-- Các ràng buộc cho bảng `thongbaogv`
--
ALTER TABLE `thongbaogv`
  ADD CONSTRAINT `maadmingv` FOREIGN KEY (`MaAdmin`) REFERENCES `dsadmin` (`MaAdmin`),
  ADD CONSTRAINT `maggv` FOREIGN KEY (`MaGV`) REFERENCES `dsgiaovien` (`MaGV`);

--
-- Các ràng buộc cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  ADD CONSTRAINT `maadm` FOREIGN KEY (`MaAdmin`) REFERENCES `dsadmin` (`MaAdmin`),
  ADD CONSTRAINT `massv` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
