-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 24, 2022 lúc 07:13 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `social_network`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chats`
--

CREATE TABLE `chats` (
  `id` int(30) NOT NULL,
  `id_user_send` int(20) NOT NULL,
  `id_user_receive` int(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `msg_seen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_post` int(20) NOT NULL,
  `content` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_post`, `content`, `create_at`) VALUES
(9, 2, 2, 'hello every one', '2022-03-16 09:25:27'),
(80, 2, 2, 'like like like', '2022-03-16 17:41:31'),
(81, 1, 11, 'Phan messi can you share for me', '2022-03-17 14:36:25'),
(84, 1, 14, 'xin chao', '2022-03-19 08:39:56'),
(85, 1, 14, 'xin chao\n', '2022-03-19 08:40:07'),
(87, 1, 15, '\ni like it', '2022-03-19 16:34:50'),
(88, 1, 15, 'hey phan', '2022-03-20 02:35:47'),
(92, 1, 12, 'hello', '2022-03-21 15:39:53'),
(93, 1, 18, 'Hello Phan', '2022-03-21 15:48:25'),
(97, 2, 16, 'hello', '2022-03-22 14:44:33'),
(98, 1, 16, 'hello', '2022-03-22 18:51:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `education`
--

CREATE TABLE `education` (
  `id_user` int(20) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `education`
--

INSERT INTO `education` (`id_user`, `description`, `updated_at`) VALUES
(1, '{\"graduate\":\"graduate\",\"masters\":\"masters\",\"study\":\"HaNoi University Of Science\",\"from\":\"Thanh Xuan\",\"city\":\"Ha Noi\",\"country\":\"UKR\",\"desc\":\"VNU - Vietnam National University\",\"getDetailUserId\":\"1\"}', '2022-03-24 16:35:16'),
(2, '{\"graduate\":\"graduate\",\"study\":\"Hanoi University of Science and Technology\",\"from\":\"Hai Ba trung\",\"city\":\"Ha Noi\",\"country\":\"VNM\",\"desc\":\"I\'m Hust\'s lecturer, I just graduated from school\",\"getDetailUserId\":\"2\"}', '2022-03-24 17:46:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follows`
--

CREATE TABLE `follows` (
  `id` int(30) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_follower` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `follows`
--

INSERT INTO `follows` (`id`, `id_user`, `id_follower`, `created_at`) VALUES
(2, 3, 1, '2022-03-20 17:32:59'),
(80, 1, 2, '2022-03-23 14:58:48'),
(91, 2, 3, '2022-03-23 16:10:45'),
(93, 2, 1, '2022-03-23 16:16:11'),
(94, 3, 5, '2022-03-23 16:28:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_post` int(20) NOT NULL,
  `type` int(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_post`, `type`, `create_at`) VALUES
(1, 1, 1, 0, '2022-03-16 07:59:24'),
(2, 1, 3, 1, '2022-03-16 13:51:19'),
(3, 1, 4, 1, '2022-03-16 17:38:52'),
(4, 2, 7, 0, '2022-03-16 17:41:20'),
(5, 2, 6, 1, '2022-03-16 17:41:22'),
(6, 2, 2, 1, '2022-03-16 17:41:24'),
(10, 1, 12, 1, '2022-03-18 02:49:58'),
(11, 1, 10, 0, '2022-03-18 15:01:35'),
(14, 1, 11, 1, '2022-03-18 16:41:06'),
(47, 1, 13, 1, '2022-03-19 07:46:08'),
(101, 1, 6, 1, '2022-03-19 15:55:43'),
(118, 1, 14, 1, '2022-03-19 16:16:05'),
(131, 1, 15, 1, '2022-03-20 02:39:23'),
(132, 2, 12, 1, '2022-03-20 17:01:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(20) NOT NULL,
  `id_notifier` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_post` int(20) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `id_notifier`, `id_user`, `id_post`, `type`, `status`, `create_at`) VALUES
(21, 1, 2, 6, 1, 0, '2022-03-20 01:53:33'),
(38, 1, 2, 14, 1, 0, '2022-03-20 01:53:33'),
(39, 1, 2, 15, 2, 0, '2022-03-20 01:53:33'),
(40, 1, 2, 15, 2, 0, '2022-03-20 01:53:33'),
(51, 1, 2, 15, 2, 0, '2022-03-20 02:35:47'),
(52, 1, 2, 15, 2, 0, '2022-03-20 02:36:05'),
(53, 1, 2, 15, 2, 0, '2022-03-20 02:36:05'),
(54, 1, 2, 15, 2, 0, '2022-03-20 02:36:05'),
(56, 2, 1, 12, 1, 0, '2022-03-20 17:01:38'),
(58, 1, 1, 12, 2, 0, '2022-03-22 16:06:52'),
(59, 1, 2, 18, 2, 0, '2022-03-21 15:48:34'),
(60, 1, 2, 18, 2, 0, '2022-03-21 15:49:42'),
(61, 1, 2, 18, 2, 0, '2022-03-21 15:49:58'),
(62, 1, 2, 18, 2, 0, '2022-03-21 15:51:52'),
(63, 2, 1, 16, 2, 0, '2022-03-22 16:06:52'),
(64, 1, 1, 16, 2, 0, '2022-03-22 18:51:13'),
(65, 1, 1, 16, 2, 0, '2022-03-22 18:53:11'),
(66, 1, 1, 16, 2, 0, '2022-03-22 18:56:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id_post` int(30) NOT NULL,
  `id_user` int(20) NOT NULL,
  `content` text NOT NULL,
  `media_content` text DEFAULT NULL,
  `create_at` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `content`, `media_content`, `create_at`, `updated_at`) VALUES
(6, 2, 'boring T_T', NULL, 'March 16, 2022 ', '2022-03-16 17:07:29'),
(10, 1, 'Studio Ghibli Inc. (Japanese: 株式会社スタジオジブリ, Hepburn: Kabushiki-gaisha Sutajio Jiburi)[1] is a Japanese animation film studio headquartered in Koganei, Tokyo.[2] It is best known for its animated feature films, and has also produced several short subjects, television commercials, and two television films. Its mascot and most recognizable symbol is a character named Totoro, a giant catlike spirit from the 1988 anime film My Neighbor Totoro. Among the studio\'s highest-grossing films are Spirited Away (2001), Howl\'s Moving Castle (2004) and Ponyo (2008).[3] The studio was founded on June 15, 1985 by directors Hayao Miyazaki and Isao Takahata and producer Toshio Suzuki, after the successful performance of Topcraft\'s Nausicaä of the Valley of the Wind (1984). It has also collaborated with video game studios on the visual development of several games.[', '1-6642634.jpg', 'March 17, 2022 ', '2022-03-17 08:38:18'),
(11, 1, 'play with me ghibli, every body interact with me :))', '1-20maxresdefault (1).jpg', 'March 17, 2022 ', '2022-03-17 14:35:48'),
(12, 1, 'play boy', '1-58218886696_4427144807310095_2028895631001708098_n.jpg', 'March 18, 2022 ', '2022-03-20 15:25:06'),
(14, 2, 'Princess Mononoke (もののけ姫 , Mononoke Hime) is the 10th feature-length animated film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten, Nippon Television Network and Dentsu, and distributed by Toho. It is considered one of Miyazaki\'s masterpieces, taking sixteen years to design and three years to produce, with a recorded box office revenue of ¥19.3 billion yen, breaking box office records in Japanese cinemas at that time.', '2-21maxresdefault.jpg', 'March 19, 2022 ', '2022-03-19 02:23:47'),
(15, 2, '### Totoro is taking a lunch break', '2-10371118.jpg', 'March 19, 2022 ', '2022-03-19 17:25:11'),
(16, 1, 'ghibli', '1-42fBHW2muNc_GQmwdMMd1LUuvpRyPCDVCOuUcxiUD1650.jpg', 'March 20, 2022 ', '2022-03-20 17:10:30'),
(18, 2, '', '2-75marnie006.jpg', 'March 20, 2022 ', '2022-03-20 15:25:52'),
(20, 1, 'blue', '1-73Blue - 1700.mp4', 'March 23, 2022 ', '2022-03-23 09:19:50'),
(23, 2, '', '2-891031688-oceanwaves-04.jpg', 'March 23, 2022 ', '2022-03-23 15:32:18'),
(27, 2, '', '2-86Blue - 1700.mp4', 'March 23, 2022 ', '2022-03-23 15:36:33'),
(28, 2, '', '2-95371116.jpg', 'March 23, 2022 ', '2022-03-23 15:39:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `f_name` varchar(75) DEFAULT NULL,
  `l_name` varchar(75) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(155) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `cover_avatar` varchar(255) DEFAULT NULL,
  `description` varchar(355) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `gender` char(3) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `email`, `phone_number`, `password`, `birthday`, `f_name`, `l_name`, `address`, `username`, `avatar`, `cover_avatar`, `description`, `create_at`, `update_at`, `gender`, `status`) VALUES
(1, 'thesontpst@gmail.com', '0336501958', '801152d02dbe5dfd68bb31d754a51328', '2002-01-04', 'Phan Thế', 'Sơn', 'Văn Miếu - Đường Lâm - Sơn Tây', 'Son Phan The', 'anh-dai-dien-dep.jpg', '1-81c.jpg', 'I graduated from RMIT University Vietnam with a bachelor’s degree in Digital Marketing', NULL, '2022-03-24 01:55:33', '1', 1),
(2, 'phantheson_t65@hus.edu.vn', '0978649772', '801152d02dbe5dfd68bb31d754a51328', '0000-00-00', 'Phan The', 'Son', '', 'phan messi', '2-31avatar-deo-khau-trang.jpg', '2-5542637.png', 'American computer programmer and entrepreneur who cofounded Microsoft Corporation, the world\'s largest personal-computer software company', NULL, '2022-03-23 16:16:33', '1', 1),
(3, 'nguyentathien@gmail.com', NULL, 'c964b5feb9d2e003767fc32992cda318', NULL, 'Nguy', 'Hien', NULL, 'Nguyen Tat Hien', NULL, NULL, NULL, NULL, NULL, '0', 1),
(5, 'localhost@gmail.com', NULL, '801152d02dbe5dfd68bb31d754a51328', NULL, 'liu', 'ying', NULL, 'admin page', NULL, NULL, NULL, '2022-03-23 04:07:59', NULL, '1', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
