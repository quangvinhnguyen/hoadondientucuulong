-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 18, 2018 lúc 03:09 PM
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
-- Cơ sở dữ liệu: `v_hoadon`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'author',
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `avatar`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'fi4Sib7fAQ@gmail.com', '$2y$10$oUR0QYp7dQ7dDdbxiLlD6Ow/lu3dFPDv3k99LrMETHD57lt7QxpNK', 'admin', 'upload/profile/atai_12112387_432816510262523_59285296670757517_n.jpg', '2017-10-22', 'J6Nq9sBSQ7cd42jrfNADySGiasHaSBRrP8gEzTnuA6wbQLfSXw04zwLvIlID', NULL, '2017-10-05 03:28:21'),
(3, 'test', 'abcd@gmail.com', '$2y$10$ODkE37AI6ryN6krwBTVC7.DW9GyY8bG11cFH0YAZPNjPS5h67j8HO', 'author', NULL, NULL, NULL, '2017-10-10 11:15:42', '2017-10-10 11:15:42'),
(4, 'sdasdasd', 'adminasdasd', '$2y$10$wwOR6Qg3qVQncY41gRsCBOBpoghPwnl9X./pqh91cPD2LCuB3psAK', 'author', NULL, NULL, NULL, '2017-10-15 18:38:27', '2017-10-15 18:38:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(15, 'Tin tức', 'tin-tuc', NULL, '2018-01-24 03:52:56', '2018-01-24 03:52:56'),
(19, 'Báo giá', 'bao-gia', NULL, '2018-01-29 06:56:06', '2018-01-29 06:56:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `mast` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tendv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dcdkkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoilienhe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtdd` int(11) DEFAULT NULL,
  `dtb` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `mast`, `tendv`, `dcdkkd`, `nguoilienhe`, `dtdd`, `dtb`, `email`, `created_at`, `updated_at`) VALUES
(1, '0000000000', 'CÔNG TY CỔ PHẦN THƯƠNG MẠI VISNAM', '33 HẢI HỒ , THANH BÌNH , HẢI CHÂU , TP ĐÀ NẴNG', 'VINH NGUYỄN QUANG', 972793680, NULL, 'nqvinhmaster1995@gmail.com', '2018-03-18 14:07:52', '2018-03-18 14:07:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_09_20_151220_create_categories_table', 1),
(3, '2017_09_28_143149_create_admin_table', 1),
(4, '2017_09_20_151116_create_posts_table', 2),
(5, '2017_09_20_153825_create_files_table', 3),
(6, '2017_09_20_151239_create_tags_table', 4),
(7, '2017_10_01_155559_creat_table_post_tag', 5),
(8, '2014_10_12_000000_create_users_table', 6),
(9, '2017_10_09_200454_add_feture_to_posts', 7),
(10, '2017_10_09_200814_add_feture_to_posts', 8),
(11, '2017_10_09_201053_add_feture_to_posts', 9),
(12, '2017_10_09_201200_add_feture_to_posts', 10),
(13, '2017_10_09_201356_add_feture_to_posts', 11),
(14, '2017_10_09_202013_add_feture_to_posts', 12),
(15, '2017_10_09_202500_add_thumb_to_files', 13),
(20, '2018_02_26_090541_vanban', 14),
(22, '2018_03_09_081145_create_khachhang_table', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '1',
  `post_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'text',
  `hot` smallint(6) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `feture` mediumtext COLLATE utf8_unicode_ci,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `description`, `slug`, `view`, `post_type`, `hot`, `status`, `user_id`, `feture`, `category_id`, `created_at`, `updated_at`) VALUES
(45, 'Chúc tết', '<p>ABC</p>', 'abc', 'chuc-tet', 19, 'text', 1, 1, 1, 'upload/posts/8v97_Chuc-tet.jpg', 15, '2018-01-24 07:28:34', '2018-03-08 03:49:34'),
(47, 'demo01', '<p><strong>gggggg</strong></p>', 'zxcvbnm,.\';lkjhgfdsaqwertyuiop[poiuhgfdsasdfhjplkjhgfdsasdfghj;lkjhgfds', 'dem', 9, 'text', 1, 1, 1, 'upload/posts/Z3yb_tn.jpg', 15, '2018-01-29 03:46:09', '2018-03-08 03:39:57'),
(48, 'Lịch nghỉ tết Nguyên Đán', '<p>Trịnh trọng thông báo đến toàn thể công nhân viên và khách hàng thân mếm của công ty Visnam về thời gian nghỉ xuân Mậu Tuất 2018&nbsp;</p>', 'Trịnh trọng thông báo đến toàn thể công nhân viên và khách hàng thân mếm của công ty Visnam về thời gian nghỉ xuân Mậu Tuất 2018', 'lich-nghi-tet-nguyen-dan', 15, 'text', 1, 1, 1, 'upload/posts/qNkG_TBnghitet.png', 15, '2018-01-31 01:02:04', '2018-03-18 14:08:23'),
(49, 'aqaaaaaaaa', '<p>asasasasasasasasasasasasasasas&nbsp;</p>', 'áasasasasasasasasasasa', 'aqaaaaaaaa', 2, 'text', 0, 1, 1, '', 15, '2018-02-26 01:27:07', '2018-02-26 01:36:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'macbook', 'macbook', '2017-10-02 22:00:19', '2017-10-15 18:38:12'),
(5, 'sự kiện', 'su-kien', '2017-10-02 22:00:31', '2017-10-03 20:49:57'),
(6, 'code', 'code', '2017-10-03 20:49:32', '2017-10-03 20:49:32'),
(8, 'nodejs', 'nodejs', '2017-10-03 20:49:43', '2017-10-03 20:49:43'),
(9, 'json', 'json', '2017-10-03 20:52:08', '2017-10-03 20:52:08'),
(10, 'mysql', 'mysql', '2017-10-03 20:52:15', '2017-10-03 20:52:15'),
(11, 'php', 'php', '2017-10-03 20:56:15', '2017-10-03 20:56:15'),
(12, 'javascript', 'javascript', '2017-10-03 20:56:26', '2017-10-03 20:56:26'),
(13, 'Thủ Thuật', 'thu-thuat', '2017-10-08 12:31:28', '2017-10-08 12:31:28'),
(14, 'iphone', 'iphone', '2017-10-08 12:31:57', '2017-10-08 12:31:57'),
(15, 'ios 11', 'ios-11', '2017-10-08 12:32:02', '2017-10-08 12:32:02'),
(16, 'win10', 'win10', '2017-10-08 12:35:00', '2017-10-08 12:35:00'),
(17, 'usb', 'usb', '2017-10-08 12:35:08', '2017-10-08 12:35:08'),
(18, 'Game', 'game', '2017-10-08 12:37:41', '2017-10-08 12:37:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanban`
--

CREATE TABLE `vanban` (
  `id` int(10) UNSIGNED NOT NULL,
  `sokh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trichyeunoidung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaybanhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhthucvanban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coquanbanhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoikyduyet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vanban`
--

INSERT INTO `vanban` (`id`, `sokh`, `trichyeunoidung`, `ngaybanhanh`, `hinhthucvanban`, `coquanbanhanh`, `nguoikyduyet`, `tailieu`, `created_at`, `updated_at`) VALUES
(5, '37/2017/TT-BTC', 'Thông tư 37/2017/TT-BTC ngày 27/04/2017 sửa đổi Thông tư 39/2014/TT-BTC và Thông tư 26/2015/TT-BTC về hóa đơn bán hàng hóa, cung ứng dịch vụ', '27/04/2017', 'Thông tư', 'Bộ Tài chính', 'Đỗ Hoàng Anh Tuấn', 'upload/vanbans/tu2f_DANH_SACH_THAM_GIA_BHBB_2018020624349.xls', '2018-03-01 01:18:51', '2018-03-05 00:44:56'),
(6, '32/2011/TT-BTC', 'Hướng dẫn về khởi tạo, phát hành và sử dụng hoá đơn điện tử bán hàng hóa, cung ứng dịch vụ', '14/03/2011', 'Thông tư', 'Bộ Tài chính', 'Đỗ Hoàng Anh Tuấn', '', '2018-03-02 02:19:41', '2018-03-02 02:19:41'),
(7, '153/2010/TT-BTC', 'Hướng dẫn thi hành Nghị định số 51/2010/NĐ-CP ngày 14 tháng 5 năm 2010 của Chính phủ quy định về hoá đơn bán hàng hóa, cung ứng dịch vụ', '28/09/2010', 'Thông tư', 'Bộ Tài chính', 'Đỗ Hoàng Anh Tuấn', '', '2018-03-02 02:20:58', '2018-03-02 02:20:58'),
(8, '1209/2015/QĐ-BTC', 'Về việc thí điểm sử dụng hóa đơn điện tử có mã xác thực của cơ quan thuế', '23/06/2015', 'Quyết định', 'Bộ Tài chính', 'Bùi Văn Nam', '', '2018-03-02 02:24:48', '2018-03-02 02:24:48'),
(9, '39/2014/TT-BTC', 'Hướng dẫn thi hành nghị định số 51/2010/NĐ-CP ngày 14 tháng 5 năm 2010 và nghị định số 04/2014/NĐ-CP ngày 17 tháng 01 năm 2014 của Chính phủ quy định về hóa đơn bán hàng hóa, cung ứng dịch vụ', '31/03/2014', 'Thông tư', 'Bộ Tài chính', 'Đỗ Hoàng Anh Tuấn', '', '2018-03-02 02:28:16', '2018-03-02 02:28:16'),
(10, '1209/2015/QĐ-BTC', 'Về việc thí điểm sử dụng hóa đơn điện tử có mã xác thực của cơ quan thuế', '23/06/2015', 'Quyết định', 'Bộ Tài chính', 'Bùi Văn Nam', '', '2018-03-02 02:31:18', '2018-03-02 02:31:18'),
(11, '10/2014/TT-BTC', 'Hướng dẫn xử phạt vi phạm hành chính về hóa đơn', '02/03/2014', 'Thông tư', 'Bộ Tài chính', 'Đỗ Hoàng Anh Tuấn', '', '2018-03-02 02:33:47', '2018-03-02 02:33:47');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `admin_name_unique` (`name`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khachhang_mast_unique` (`mast`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vanban`
--
ALTER TABLE `vanban`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanban`
--
ALTER TABLE `vanban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
