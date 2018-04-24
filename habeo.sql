-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2017 lúc 12:24 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `habeo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `Ten`, `Hinh`, `created_by`) VALUES
(1, 'Apple', 'apple.png', '1'),
(9, 'Sam Sung', 'y-nghia-logo-samsung.png', '1'),
(14, 'HTC', 'htc-logo.png', '1'),
(19, 'NOKIA', 'Nokia_wordmark.svg.png', '1'),
(20, 'OPPO', 'Logo Oppo.png', '1'),
(21, 'SONY', '2000px-Sony_logo.svg.png', '1'),
(22, 'VIVO', 'vivo-logo-png-1.png', '1'),
(23, 'HUAWEI', 'Huawei-logo-A8C7CBCAA8-seeklogo.com.png', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gellary`
--

CREATE TABLE `gellary` (
  `id` int(10) NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDanhMuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `ShowMain` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `Ten`, `NoiDung`, `gia`, `Hinh`, `idDanhMuc`, `created_by`, `created_at`, `ShowMain`) VALUES
(1, 'Iphone 6 plus', 'Bắt được con bug to quá =))', '20000', 'iphone-6-3-400x460.png', '1', '3', '2017-10-12 21:04:04.990857', 1),
(10, 'aaaaaaaaaaaaaaaaaaa', 'fix bug mệt vờ cờ lờ :)', '2222222222222222', 'Iphone 7 Plus.jpg', '1', '1', '2017-10-12 21:04:02.031444', 1),
(18, 'SAMSUNG S9', 'SAMSUNG S9', '20000000', 'Samsung Galaxy S7 Edge.jpg', '', '1', '2017-10-12 21:03:58.541079', 1),
(20, 'IPhone 9', 'aaaaaaaaaaaaaaaaaa', '222222222222222', 'Htc one.jpg', '', '1', '2017-10-12 21:34:54.836544', 2),
(21, 'hhhhhhhhhh', 'hhhhhhhhhhhhh', '2222222222222', 'Asus Zenfone 4.jpg', '', '1', '2017-10-12 21:35:21.303636', 4),
(22, 'hkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkkkkkk', '222222222222222222', 'Htc one.jpg', '', '1', '2017-10-12 21:35:46.123570', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `Ten`, `email`, `password`, `avatar`, `gender`, `level`) VALUES
(1, 'Hà Béo', 'admin@xinhgai.com', '7098c5451c764a972be68455ba1f3ac8a1afa056', 'default_avatar_female.jpg', '2', '1'),
(3, 'cù li', 'buiduc1998@gmail.com', '7098c5451c764a972be68455ba1f3ac8a1afa056', 'Lee-Min-Ho-02.jpg', '1', '2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gellary`
--
ALTER TABLE `gellary`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `gellary`
--
ALTER TABLE `gellary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
