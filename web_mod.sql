-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2022 lúc 02:41 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_mod`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `User` varchar(30) NOT NULL,
  `Pass` varchar(200) DEFAULT NULL,
  `Regist` varchar(30) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Day` date DEFAULT NULL,
  `Loai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`User`, `Pass`, `Regist`, `Email`, `Day`, `Loai`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'nhockenxx2@gmail.com', '2021-10-11', 1),
('admin2', 'e10adc3949ba59abbe56e057f20f883e', 'admin2', 'ken@123.com', '2021-10-27', 3),
('test', '21232f297a57a5a743894a0e4a801fc3', 'test', 'nhockenxxx@gmail.com', '2021-10-27', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) DEFAULT NULL,
  `Gia` varchar(20) DEFAULT NULL,
  `ThoiHan` varchar(20) DEFAULT NULL,
  `LenhMod` varchar(500) DEFAULT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `LinkDown` varchar(100) DEFAULT NULL,
  `PassGiaiNen` varchar(20) DEFAULT NULL,
  `LinkYoutube` varchar(100) DEFAULT NULL,
  `Moder` varchar(30) DEFAULT NULL,
  `Day1` date DEFAULT NULL,
  `Day2` date DEFAULT NULL,
  `Editer` varchar(30) DEFAULT NULL,
  `Logo` varchar(300) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`ID`, `Name`, `Gia`, `ThoiHan`, `LenhMod`, `Image`, `LinkDown`, `PassGiaiNen`, `LinkYoutube`, `Moder`, `Day1`, `Day2`, `Editer`, `Logo`, `Type`) VALUES
(0, 'Demo', 'Free', 'Vĩnh viễn', 'Demo lệnh mod', 'https://vinasport.com.vn/wp-content/uploads/2020/03/Logo-đội-tuyển-game-Esport-hình-rồng-2.png|https://vinasport.com.vn/wp-content/uploads/2020/03/Logo-đội-tuyển-game-Esport-hình-rồng-2.png', 'https://www.facebook.com/modcungken/', '123456', 'https://www.youtube.com/watch?v=27LFWx1-fEk', 'admin', '2021-10-27', '2021-10-27', 'admin', 'https://vinasport.com.vn/wp-content/uploads/2020/03/Logo-đội-tuyển-game-Esport-hình-rồng-2.png', 1),
(1, 'Demo 2', 'Free', 'Vĩnh viễn', 'Demo lệnh mod', 'https://image.shutterstock.com/image-vector/dark-knight-mascot-logo-vector-260nw-1637965831.jpg', 'fb.com', '123456', 'https://www.youtube.com/watch?v=XxpNVLDjobE', 'admin', '2021-10-27', '2021-10-27', 'admin', 'https://image.shutterstock.com/image-vector/dark-knight-mascot-logo-vector-260nw-1637965831.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ID`, `Name`) VALUES
(1, 'NRO'),
(2, 'HSO'),
(3, 'GRO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luottai`
--

CREATE TABLE `luottai` (
  `ID` int(11) NOT NULL,
  `LuotTai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luottai`
--

INSERT INTO `luottai` (`ID`, `LuotTai`) VALUES
(0, 2),
(1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quenpass`
--

CREATE TABLE `quenpass` (
  `ID` int(11) NOT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `PassReset` varchar(150) DEFAULT NULL,
  `Day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`User`);

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `luottai`
--
ALTER TABLE `luottai`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `quenpass`
--
ALTER TABLE `quenpass`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
